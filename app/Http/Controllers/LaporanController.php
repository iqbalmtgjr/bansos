<?php

namespace App\Http\Controllers;

use App\Models\Riwayatbansos;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $data = Riwayatbansos::all();
        return view('laporan.index', compact('data'));
    }

    public function destroy($id){
        Riwayatbansos::find($id)->delete();
        
        toastr()->success('Data riwayat berhasil dihapus.', 'Sukses');
        return redirect()->back();
    }
}
