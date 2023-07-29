<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use App\Models\Detailrumah;
use App\Models\Penduduk;
use App\Models\Pengajuan;
use App\Models\Jenisbansos;
use App\Models\Riwayatbansos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SmsNotification;
use App\Notifications\SmsNotificationGagal;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function notifterima($id)
    {
        $pengajuan = Pengajuan::find($id);
        $pengajuan->update([
            'status_sms' => 1
        ]);

        $penduduk_id = $pengajuan->penduduk->id;
        // dd($penduduk_id);
        $riwayatbansos = Riwayatbansos::where('penduduk_id', $penduduk_id)
            ->get()
            ->count();

        if ($riwayatbansos > 0) {
            toastr()->warning('Pengajuan ini sudah ada di fitur laporan.', 'Peringatan');
            return redirect('/daftar_pengajuan');
        }
        $data = Penduduk::find($penduduk_id);
        // $data->notify(new SmsNotification);

        $riwayat = Riwayatbansos::create([
            'user_id' => Auth()->user()->id,
            'penduduk_id' => $penduduk_id,
            'pengajuan_bansos_id' => $pengajuan->id,
            'status_penerimaan' => 1,
        ]);

        toastr()->success('Sms notifikasi telah dikirim.', 'Sukses');
        return redirect('/daftar_pengajuan');
    }

    public function notiftolak($id)
    {
        $pengajuan = Pengajuan::find($id);
        $pengajuan->update([
            'status_sms' => 1
        ]);

        $jenisbansos = $pengajuan->jenisbansos->id;

        $penduduk_id = $pengajuan->penduduk->id;
        // dd($penduduk_id);
        $riwayatbansos = Riwayatbansos::where('penduduk_id', $penduduk_id)
            ->get()
            ->count();

        if ($riwayatbansos > 0) {
            toastr()->warning('Pengajuan ini sudah ada di fitur laporan.', 'Peringatan');
            return redirect('/daftar_pengajuan');
        }
        $data = Penduduk::find($penduduk_id);
        // $data->notify(new SmsNotificationGagal);

        $riwayat = Riwayatbansos::create([
            'user_id' => Auth()->user()->id,
            'penduduk_id' => $penduduk_id,
            'pengajuan_bansos_id' => $pengajuan->id,
            'status_penerimaan' => 0,
        ]);

        toastr()->success('Sms notifikasi telah dikirim.', 'Sukses');
        return redirect('/daftar_pengajuan');
    }

    public function index()
    {
        $data = Pengajuan::all();
        return view('pengajuan.index', compact('data'));
    }

    public function view($id)
    {
        $data = Pengajuan::find($id);
        return view('pengajuan.view', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function pengajuan(Request $request)
    {
        if (!empty($request->nik) && $this->cekNik($request->nik) == true) {
            $data = $this->cekNik($request->nik)->id;
            toastr()->success('Lanjutkan masukkan data pengajuan anda.', 'NIK Terdeteksi');
            return redirect('form_pengajuan' . '/' . $data);
        } elseif ($request->nik != null && $this->cekNik($request->nik) == false) {
            toastr()->error('No NIK anda tidak terdaftar disistem! Silahkan lapor ke pihak RT setempat.', 'Maaf');
            return view('pengajuan.pengajuan_bansos');
        } else {
            return view('pengajuan.pengajuan_bansos');
        }
    }

    public function formPengajuan($data)
    {
        $get_id = $data;
        $jenis_bansos = Jenisbansos::where('status', '1')->get();

        return view('pengajuan.form_pengajuan_bansos', compact('get_id', 'jenis_bansos'));
    }

    public function cekNik($nik)
    {
        $data = Penduduk::where('nik', $nik)->first();
        return $data;
    }

    public function cekPenduduk($id)
    {
        $data = Penduduk::where('id', $id)->first();
        return $data;
    }

    public function jumlahPengajuan($id)
    {
        // $penduduk = Penduduk::where('nik', $nik)->first()->id;
        $data = Pengajuan::where('penduduk_id', $id)->get();

        return $data;
    }

    public function store(Request $request)
    {
        // dd($this->jumlahPengajuan($request->penduduk_id)->count());

        $validator = Validator::make($request->all(), [
            'jenis_bansos_id' => 'required',
            'surat_ket_tidak_mampu' => 'required',
            'foto_kk' => 'required',
            'foto_ktp' => 'required',
            'foto_diri' => 'required',

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

        if ($this->jumlahPengajuan($request->penduduk_id)->count() >= 2) {
            toastr()->error('Anda sudah melebihi 2 kali pengajuan.', 'Maaf');
            return view('pengajuan.pengajuan_bansos');
        } else {
            // upload surat ket tidak mampu
            $nama_file_surat_ket_tidak_mampu = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('surat_ket_tidak_mampu')->getClientOriginalName());
            $request->file('surat_ket_tidak_mampu')->move(public_path('foto_pengajuan/'), $nama_file_surat_ket_tidak_mampu);
            // upload foto kk
            $nama_file_foto_kk = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('foto_kk')->getClientOriginalName());
            $request->file('foto_kk')->move(public_path('foto_pengajuan/'), $nama_file_foto_kk);
            // upload foto ktp
            $nama_file_foto_ktp = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('foto_ktp')->getClientOriginalName());
            $request->file('foto_ktp')->move(public_path('foto_pengajuan/'), $nama_file_foto_ktp);
            // upload foto pas foto
            $nama_file_foto_diri = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('foto_diri')->getClientOriginalName());
            $request->file('foto_diri')->move(public_path('foto_pengajuan/'), $nama_file_foto_diri);

            $create_pengajuan = Pengajuan::create([
                'penduduk_id' => $request->penduduk_id,
                'jenis_bansos_id' => $request->jenis_bansos_id,
                'surat_ket_tidak_mampu' => $nama_file_surat_ket_tidak_mampu,
                'foto_kk' => $nama_file_foto_kk,
                'foto_ktp' => $nama_file_foto_ktp,
                'foto_diri' => $nama_file_foto_diri,
                'acc_rt' => '0',
                'acc_rw' => '0',
                'acc_desa' => '0',
                'acc_kecamatan' => '0'
            ]);

            // upload foto rmh tampak dpn
            $nama_file_foto_rmh_tampak_dpn = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('foto_rmh_tampak_dpn')->getClientOriginalName());
            $request->file('foto_rmh_tampak_dpn')->move(public_path('foto_pengajuan/'), $nama_file_foto_rmh_tampak_dpn);
            // upload foto rmh tampak belakang
            $nama_file_foto_rmh_tampak_belakang = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('foto_rmh_tampak_belakang')->getClientOriginalName());
            $request->file('foto_rmh_tampak_belakang')->move(public_path('foto_pengajuan/'), $nama_file_foto_rmh_tampak_belakang);

            $create_detail_rumah = Detailrumah::create([
                'pengajuan_bansos_id' => $create_pengajuan->id,
                'foto_rmh_tampak_dpn' => $nama_file_foto_rmh_tampak_dpn,
                'foto_rmh_tampak_belakang' => $nama_file_foto_rmh_tampak_belakang,
                'luas_bangunan' => $request->luas_bangunan,
                'status_rumah' => $request->status_rumah,
            ]);

            toastr()->success('Data anda berhasil diajukan.', 'Sukses');
            return redirect('/');
        }
    }

    public function acc(Request $request)
    {
        $data = Pengajuan::find($request->id);
        if ($request->user == 1) {
            if ($data->acc_rt == 1) {
                $data->acc_rt = 0;
            } else {
                $data->acc_rt = 1;
            }
        } elseif ($request->user == 2) {
            if ($data->acc_rw == 0) {
                $data->acc_rw = 1;
            } else {
                $data->acc_rw = 0;
            }
        } elseif ($request->user == 3) {
            if ($data->acc_desa == 0) {
                $data->acc_desa = 1;
            } else {
                $data->acc_desa = 0;
            }
        } elseif ($request->user == 4) {
            if ($data->acc_kecamatan == 0) {
                $data->acc_kecamatan = 1;
            } else {
                $data->acc_kecamatan = 0;
            }
        }
        $data->save();
    }

    public function getdata($id)
    {
        $data = Pengajuan::find($id);
        return $data;
    }

    public function destroy(string $id)
    {
        Pengajuan::find($id)->delete();
        Detailrumah::where('pengajuan_bansos_id', $id)->first()->delete();

        toastr()->success('Data pengajuan berhasil dihapus.', 'Sukses');
        return redirect()->back();
    }
}
