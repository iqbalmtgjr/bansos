<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Pengajuan;
use App\Models\Jenisbansos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function pengajuan(Request $request)
    {
        if (!empty($request->nik) && $this->cekNik($request->nik) == true) {
            $get_id = $this->cekNik($request->nik)->id;
            $jenis_bansos = Jenisbansos::all();

            toastr()->success('Lanjutkan masukkan data pengajuan anda.', 'NIK Terdeteksi');
            return view('form_pengajuan_bansos', compact('get_id', 'jenis_bansos'));
        } elseif ($request->nik != null && $this->cekNik($request->nik) == false) {
            toastr()->error('No NIK anda tidak terdaftar disistem! Silahkan lapor ke pihak RT setempat.', 'Maaf');
            return view('form_pengajuan_bansos');
        } else {
            return view('form_pengajuan_bansos');
        }
    }

    public function cekNik($nik)
    {
        $data = Penduduk::where('nik', $nik)->first();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'jenis_bansos_id' => 'required|max:30',
            'surat_ket_tidak_mampu' => 'required|max:50',
            'foto_kk' => 'required',
            'foto_ktp' => 'required',
            'foto_diri' => 'required',
            'pengajuan_bansos_id' => 'required',
            'foto_rmh_tampak_dpn' => 'required',
            'foto_rmh_tampak_belakang' => 'required',
            'luas_bangunan' => 'required',
            'status_rumah' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
