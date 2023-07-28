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
}
