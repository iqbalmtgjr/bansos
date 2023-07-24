@extends('layouts.master')
@section('active', 'active')

@section('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('daftar_pengajuan') }}">Daftar
            Pengajuan</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Lihat Data Pengajuan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Data Diri {{ $data->penduduk->nama_penduduk }}</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="row p-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">Nama Pengaju</label>
                                <input class="form-control" type="text" disabled
                                    value="{{ $data->penduduk->nama_penduduk }}">
                            </div>
                            <div class="mb-3">
                                <label for="">No NIK</label>
                                <input class="form-control" type="text" disabled value="{{ $data->penduduk->nik }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Jenis Kelamin</label>
                                <input class="form-control" type="text" disabled
                                    value="{{ $data->penduduk->jenis_kelamin }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Agama</label>
                                <input class="form-control" type="text" disabled value="{{ $data->penduduk->agama }}">
                            </div>
                            <div class="mb-3">
                                <label for="">RT</label>
                                <input class="form-control" type="text" disabled value="{{ $data->penduduk->rt }}">
                            </div>
                            <div class="mb-3">
                                <label for="">RW</label>
                                <input class="form-control" type="text" disabled value="{{ $data->penduduk->rw }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Kelurahan/Desa</label>
                                <input class="form-control" type="text" disabled value="{{ $data->penduduk->kel_desa }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Kecamatan</label>
                                <input class="form-control" type="text" disabled
                                    value="{{ $data->penduduk->kecamatan }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">Kabupaten</label>
                                <input class="form-control" type="text" disabled
                                    value="{{ $data->penduduk->kabupaten }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Provinsi</label>
                                <input class="form-control" type="text" disabled
                                    value="{{ $data->penduduk->provinsi }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Status Kawin</label>
                                @if ($data->penduduk->status_kawin == '1')
                                    <input class="form-control" type="text" disabled value="Kawin">
                                @else
                                    <input class="form-control" type="text" disabled value="Belum Kawin">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="">Pekerjaan</label>
                                <input class="form-control" type="text" disabled
                                    value="{{ $data->penduduk->pekerjaan }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Kewarganegaraan</label>
                                <input class="form-control" type="text" disabled
                                    value="{{ $data->penduduk->kewarganegaraan }}">
                            </div>
                            <div class="mb-3">
                                <label for="">No HP</label>
                                <input class="form-control" type="text" disabled value="{{ $data->penduduk->no_hp }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Penghasilan</label>
                                <input class="form-control" type="text" disabled
                                    value="{{ $data->penduduk->penghasilan }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Tanggungan</label>
                                <input class="form-control" type="text" disabled
                                    value="{{ $data->penduduk->tanggungan }} Orang">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Data Bantuan Sosial</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="row p-4">
                        <div class="mb-3">
                            <label for="">Jenis Bansos</label>
                            <input class="form-control" type="text" disabled
                                value="{{ $data->jenisbansos->nama_bansos }}">
                        </div>
                    </div>
                    <div class="row p-4">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="">Surat Keterangan Tidak Mampu</label> <br>
                                <a href="{{ asset('foto_pengajuan') . '/' . $data->surat_ket_tidak_mampu }}"
                                    target="_blank">
                                    <img style="width: 200px; height: 280px"
                                        src="{{ asset('foto_pengajuan') . '/' . $data->surat_ket_tidak_mampu }}"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="">Pas Foto</label> <br>
                                <a href="{{ asset('foto_pengajuan') . '/' . $data->foto_diri }}" target="_blank">
                                    <img style="width: 200px; height: 280px"
                                        src="{{ asset('foto_pengajuan') . '/' . $data->foto_diri }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="">Foto KK</label> <br>
                                <a href="{{ asset('foto_pengajuan') . '/' . $data->foto_kk }}" target="_blank">
                                    <img style="width: 240px; height: 200px"
                                        src="{{ asset('foto_pengajuan') . '/' . $data->foto_kk }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="">Foto KTP</label> <br>
                                <a href="{{ asset('foto_pengajuan') . '/' . $data->foto_ktp }}" target="_blank">
                                    <img style="width: 240px; height: 200px"
                                        src="{{ asset('foto_pengajuan') . '/' . $data->foto_ktp }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
