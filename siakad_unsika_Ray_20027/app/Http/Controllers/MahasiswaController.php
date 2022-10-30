<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller{
    public function index(){
        $data = Mahasiswa::get();
        return view('mahasiswa.index', ['mahasiswa' => $data]);
    }
    public function create(){
        return view('mahasiswa/create');
    }
    public function show($id){
        $data = Mahasiswa::find($id);
        return view('mahasiswa.detail', [
            'mahasiswa' => $data
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'npm' => 'required|unique:mahasiswa',
            'alamat' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . $request->nama . '-' . time() . '.' . $extension;

            $path = $request->file('photo')->storeAs('public', $filenameSimpan);
        }

        $mahasiswa = new Mahasiswa;
        $mahasiswa->npm = $request->input('npm');
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->prodi = $request->input('prodi');
        $mahasiswa->jk = $request->input('jk');
        $mahasiswa->alamat = $request->input('alamat');
        $mahasiswa->tempat = $request->input('tempat');
        $mahasiswa->tgl_lahir = $request->input('tgl_lahir');
        $mahasiswa->photo = $filenameSimpan;
        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('message', "Data {$request['nama']} berhasil ditambahkan!");
    }

    public function destroy($id){
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('message', "Data {$mahasiswa['nama']} berhasil dihapus");
    }

    public function edit($id){
        $data = Mahasiswa::find($id);
        return view('mahasiswa.edit', [
            'mahasiswa' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'npm' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->npm = $request->input('npm');
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->prodi = $request->input('prodi');
        $mahasiswa->jk = $request->input('jk');
        $mahasiswa->alamat = $request->input('alamat');
        $mahasiswa->tempat = $request->input('tempat');
        $mahasiswa->tgl_lahir = $request->input('tgl_lahir');

        if ($request->hasFile('photo')) {

            $destination = 'public' . $request->gambar;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . $request->nama . '-' . time() . '.' . $extension;

            $path = $request->file('photo')->storeAs('public', $filenameSimpan);
            $mahasiswa->photo = $filenameSimpan;
        }

        $mahasiswa->update();

        return redirect()->route('mahasiswa.index')->with('message', "Data mahasiswa berhasil diubah!");
    }
}
