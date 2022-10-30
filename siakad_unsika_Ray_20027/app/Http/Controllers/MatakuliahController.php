<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller{
    public function index(){
        $data = Matakuliah::get();
        return view('matkul.index', ['matakuliah' => $data]);
    }
    public function create(){
        return view('matkul/create');
    }
    public function show($id){
        $data = Matakuliah::find($id);
        return view('matkul.detail', [
            'matkul' => $data
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:matakuliah',
            'nama_mk' => 'required|max:50',
        ]);

        $matkul = new Matakuliah;
        $matkul->kode_mk = $request->input('kode_mk');
        $matkul->nama_mk = $request->input('nama_mk');
        $matkul->save();

        return redirect()->route('matkul.index')->with('message', "Data {$request['nama_mk']} berhasil ditambahkan!");
    }
    public function destroy($id)
    {
        $matkul = Matakuliah::find($id);
        $matkul->delete();

        return redirect()->route('matkul.index')->with('message', "Data {$matkul['nama_mk']} berhasil dihapus!");
    }
    public function edit($id)
    {
        $data = Matakuliah::find($id);
        return view('matkul.edit', [
            'matkul' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_mk' => 'required|unique:matakuliah',
            'nama_mk' => 'required',
        ]);

        $matkul = Matakuliah::find($id);
        $matkul->kode_mk = $request->input('kode_mk');
        $matkul->nama_mk = $request->input('nama_mk');

        $matkul->update();

        return redirect()->route('matkul.index')->with('message', "Data mata kuliah berhasil diubah!");
    }
}
