<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;

class DataPengujiController extends Controller
{
    public function index(){
        $penguji = Http::get('https://linksmart-pln.herokuapp.com/api/pegawais?populate=jabatan');
        return view('page.master.dataPenguji', [
            "penguji" => json_decode($penguji)
        ]);
    }

    public function add()
    {
        $penguji = Http::get('https://linksmart-pln.herokuapp.com/api/pegawais?populate=jabatan');
        return view('page.master.addDataPenguji', [
            "penguji" => json_decode($penguji)
        ]);
    }

    public function getPengujiById($id)
    {
        $decryptId = Crypt::decryptString($id);
        $penguji = Http::get('https://linksmart-pln.herokuapp.com/api/pegawais/'.$decryptId);
        return view('page.master.editDataPenguji', [
            "penguji" => json_decode($penguji)
        ]);
    }

    public function updateData(Request $request)
    {
        $color = "teal";
        $msg = "Berhasil mengubah data penguji";
        $decryptId = Crypt::decryptString($request->id);
        $nama = $request->nama;
        Http::put('https://linksmart-pln.herokuapp.com/api/pegawais/'.$decryptId, [
            'data' => [
                'namaPegawai' => $nama
            ]
        ]);
        return redirect()->route('getPenguji')->with(compact('msg', 'color'));
    }

    public function delete($id)
    {
        $color = "teal";
        $msg = "Berhasil menghapus data penguji";
        $decryptId = Crypt::decryptString($id);
        Http::delete('https://linksmart-pln.herokuapp.com/api/pegawais/'.$decryptId);
        return redirect()->route('getPenguji')->with(compact('msg', 'color'));
    }

    public function updateRole($id)
    {
        $color = "teal";
        $msg = "Berhasil menambah data Penguji";
        $decryptId = Crypt::decryptString($id);
        Http::put('https://linksmart-pln.herokuapp.com/api/pegawais/'.$decryptId, [
            'data' => [
                'role' => 'Penguji'
            ]
        ]);
        Http::post('https://linksmart-pln.herokuapp.com/api/pengujis', [
            'data' => [
                'id_penguji' => $decryptId
            ]
        ]);
        return redirect()->route('getPenguji')->with(compact('msg', 'color'));
    }
}
