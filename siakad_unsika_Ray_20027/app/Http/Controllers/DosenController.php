<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller{
    public function index(){
        $data = Dosen::get();
        return view('dosen.index', ['dosen' => $data]);
    }
    public function create(){
        return view('dosen/create');
    }
    public function show($id){
        $data = Dosen::find($id);
        return view('dosen.detail', ['dosen' => $data]);
    }
    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'nidn' => 'required|unique:dosen',
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

        $dosen = new Dosen;
        $dosen->nidn = $request->input('nidn');
        $dosen->nama = $request->input('nama');
        $dosen->jk = $request->input('jk');
        $dosen->alamat = $request->input('alamat');
        $dosen->tempat = $request->input('tempat');
        $dosen->tgl_lahir = $request->input('tgl_lahir');
        $dosen->photo = $filenameSimpan;
        $dosen->save();

        return redirect()->route('dosen.index')->with('message', "Data {$request['nama']} berhasil ditambahkan!");
    }

    public function destroy($id){
        $dosen = Dosen::find($id);
        $dosen->delete();

        return redirect()->route('dosen.index')->with('message', "Data {$dosen['nama']} berhasil dihapus");
    }

    public function edit($id){
        $data = Dosen::find($id);
        return view('dosen.edit', ['dosen' => $data]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nidn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $dosen = Dosen::find($id);
        $dosen->nidn = $request->input('nidn');
        $dosen->nama = $request->input('nama');
        $dosen->jk = $request->input('jk');
        $dosen->alamat = $request->input('alamat');
        $dosen->tempat = $request->input('tempat');
        $dosen->tgl_lahir = $request->input('tgl_lahir');

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
            $dosen->photo = $filenameSimpan;
        }

        $dosen->update();

        return redirect()->route('dosen.index')->with('message', "Data Dosen berhasil diubah!");
    }
}
