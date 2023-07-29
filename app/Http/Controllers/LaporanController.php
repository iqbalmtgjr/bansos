<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use App\Models\Riwayatbansos;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $data = Riwayatbansos::all();
        return view('laporan.index', compact('data'));
    }

    public function destroy($id)
    {
        Riwayatbansos::find($id)->delete();

        toastr()->success('Data riwayat berhasil dihapus.', 'Sukses');
        return redirect()->back();
    }

    public function getdata($id)
    {
        $data = Catatan::where('pengajuan_bansos_id', $id)->get();
        dd($data[0]->user_id);
        return compact('data');
    }

    public function view($id)
    {
        $data = Catatan::where('pengajuan_bansos_id', $id)->get();
        dd($data);
        return view('laporan.lihat', compact('data'));
    }
}
