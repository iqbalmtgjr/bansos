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
        $data_rt = Catatan::where('pengajuan_bansos_id', $id)->where('role', 1)->first();
        $data_rw = Catatan::where('pengajuan_bansos_id', $id)->where('role', 2)->first();
        $data_desa = Catatan::where('pengajuan_bansos_id', $id)->where('role', 3)->first();
        $data_kecamatan = Catatan::where('pengajuan_bansos_id', $id)->where('role', 4)->first();

        return compact('data_rt', 'data_rw', 'data_desa', 'data_kecamatan');
    }

    public function view($id)
    {
        $data_rt = Catatan::where('pengajuan_bansos_id', $id)->where('role', 1)->first();
        $data_rw = Catatan::where('pengajuan_bansos_id', $id)->where('role', 2)->first();
        $data_desa = Catatan::where('pengajuan_bansos_id', $id)->where('role', 3)->first();
        $data_kecamatan = Catatan::where('pengajuan_bansos_id', $id)->where('role', 4)->first();

        return view('laporan.lihat', compact('data_rt', 'data_rw', 'data_desa', 'data_kecamatan'));
    }
}
