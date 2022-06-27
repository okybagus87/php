<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Yajra\Datatables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Pegawai;

class DataPesertaController extends Controller
{
    public function index()
    {
        // $msg = "tidakAda";
        $peserta = Http::get('https://linksmart-pln.herokuapp.com/api/pegawais?populate=jabatan');
        return view('page.master.dataPeserta', [
            "peserta" => json_decode($peserta)
        ]);
    }

    public function add()
    {
        $peserta = Http::get('https://linksmart-pln.herokuapp.com/api/pegawais?populate=jabatan');
        return view('page.master.addDataPeserta', [
            "peserta" => json_decode($peserta)
        ]);
    }

    public function updateRole($id)
    {
        $color = "teal";
        $msg = "Berhasil menambah data peserta";
        $decryptId = Crypt::decryptString($id);
        Http::put('https://linksmart-pln.herokuapp.com/api/pegawais/'.$decryptId, [
            'data' => [
                'role' => 'Peserta'
            ]
        ]);
        $delPenguji = Http::get('https://linksmart-pln.herokuapp.com/api/pengujis?populate=*');
        $dd = json_decode($delPenguji);
        $i = 0;
        foreach ($dd->data as $data) {
            if($data->attributes->id_penguji->data->id == (int)$decryptId){
                Http::delete('https://linksmart-pln.herokuapp.com/api/pengujis/'.$data->id);
            }
            $i++;
        }
        return redirect()->route('getPeserta')->with(compact('msg', 'color'));
    }

    public function getPesertaById($id)
    {
        $decryptId = Crypt::decryptString($id);
        $peserta = Http::get('https://linksmart-pln.herokuapp.com/api/pegawais/'.$decryptId);
        return view('page.master.editDataPeserta', [
            "peserta" => json_decode($peserta)
        ]);
    }
    public function updateData(Request $request)
    {
        $color = "teal";
        $msg = "Berhasil mengubah data peserta";
        $decryptId = Crypt::decryptString($request->id);
        $nama = $request->nama;
        Http::put('https://linksmart-pln.herokuapp.com/api/pegawais/'.$decryptId, [
            'data' => [
                'namaPegawai' => $nama
            ]
        ]);
        return redirect()->route('getPeserta')->with(compact('msg', 'color'));
    }
    public function delete($id)
    {
        $color = "teal";
        $msg = "Berhasil menghapus data peserta";
        $decryptId = Crypt::decryptString($id);
        Http::delete('https://linksmart-pln.herokuapp.com/api/pegawais/'.$decryptId);
        return redirect()->route('getPeserta')->with(compact('msg', 'color'));
    }

    // public function json()
    // {
    //     $peserta = DB::table('pegawais as p')->select('p.id', 'p.nama_pegawai', 'p.nip', 'p.grade', 'p.jenjang');
    //     return DataTables::of($peserta)
    //     ->addIndexColumn()
    //     ->addColumn('action', function($row){
    //         $btn = '<div style="min-width:200px; class="btn-group  " role="group" data-placement="top" title="" data-original-title=".btn-xlg">';
    //         $btn = $btn . '<a href=" "><button data-toggle="tooltip" title="Edit" class="btn btn-primary btn-mini  waves-effect waves-light"><i class="fas fa-edit"></i></button></a>';
    //         $btn = $btn . '<a href="#delModal" data-id="' . $row->id. '" data-toggle="modal"><button data-toggle="tooltip" title="Hapus" class="btn btn-danger btn-mini waves-effect waves-light"><i class="fas fa-trash"></i></button></a>';

    //         $btn = $btn . '</div>';

    //         return $btn;
    //     })
    //     ->rawColumns(['action'])
    //     ->make(true);
    // }
}
