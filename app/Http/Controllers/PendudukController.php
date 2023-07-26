<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Penduduk::all();

        $provinsi = json_decode(Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json'));
        $kabupaten = json_decode(Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/regencies/61.json'));
        $kecamatan = json_decode(Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/districts/6106.json'));
        $kelurahan = json_decode(Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/villages/6106090.json'));

        return view('penduduk.index', compact('data', 'kelurahan', 'provinsi', 'kabupaten', 'kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nik' => 'required|max:30|unique:penduduk',
            'no_kk' => 'required|max:30',
            'nama_penduduk' => 'required|max:50',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kel_desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'status_kawin' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'no_hp' => 'required',
            'penghasilan' => 'required',
            'tanggungan' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // $create = Penduduk::create($request->all());
        $create = Penduduk::create([
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'nama_penduduk' => $request->nama_penduduk,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kel_desa' => $request->kel_desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'status_kawin' => $request->status_kawin,
            'pekerjaan' => $request->pekerjaan,
            'kewarganegaraan' => $request->kewarganegaraan,
            'no_hp' => '+62' . $request->no_hp,
            'penghasilan' => $request->penghasilan,
            'tanggungan' => $request->tanggungan,
        ]);

        toastr()->success('Data user berhasil ditambahkan.', 'Sukses');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->except(['id', $request->id]), [
            // 'nik' => 'required|max:30|unique:penduduk',
            'no_kk' => 'required|max:30',
            'nama_penduduk' => 'required|max:50',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kel_desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'status_kawin' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'no_hp' => 'required',
            'penghasilan' => 'required',
            'tanggungan' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $fuser = Penduduk::find($request->id);
        $fuser->update([
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'nama_penduduk' => $request->nama_penduduk,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kel_desa' => $request->kel_desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'status_kawin' => $request->status_kawin,
            'pekerjaan' => $request->pekerjaan,
            'kewarganegaraan' => $request->kewarganegaraan,
            'no_hp' => '+62' . $request->no_hp,
            'penghasilan' => $request->penghasilan,
            'tanggungan' => $request->tanggungan,
        ]);

        toastr()->success('Data user berhasil diubah.', 'Sukses');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Penduduk::find($id)->delete();

        toastr()->success('Data user berhasil dihapus.', 'Sukses');
        return redirect()->back();
    }

    public function getdata($id)
    {
        $data = Penduduk::find($id);
        return $data;
    }
}
