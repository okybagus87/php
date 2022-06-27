<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class C_Mahasiswa extends Controller
{
    public function mahasiswa(){
        return view('frontend.mahasiswa');
    }

    public function getData(){
        return Mahasiswa::all();
    }

    public function getOne($id){
        $mhs = Mahasiswa::where('id', $id)->first();
        return $mhs;
    }

    public function add(Request $request){
        $this->validate($request, [
            'nim' => 'required',
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'umur' => 'required'
        ]);
        $request = Mahasiswa::create($request->all());

    	return response()->json($request);
    }

    public function update(Mahasiswa $mhs, Request $req){
        $mhs = Mahasiswa::find($req->id);
        $mhs->nim = $req->nim;
        $mhs->nama = $req->nama;
        $mhs->jenisKelamin = $req->jenisKelamin;
        $mhs->umur = $req->umur;
        $mhs->save();
        return response()->json($mhs);
    }

    public function destroy($id){
        Mahasiswa::find($id)->delete();
        return response()->json();
    }
}
