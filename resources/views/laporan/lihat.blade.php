@extends('layouts.master')
@section('active_sub_laporan', 'active')

@section('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('laporan') }}">Laporan</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Lihat catatan dari role</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Lihat Catatan</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="row p-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Catatan dari RT</label>
                                @if ($data_rt != null)
                                    <textarea disabled class="form-control" name="cacatan_rt" id="cacatan_rt" cols="30" rows="4">{{ $data_rt->catatan }}</textarea>
                                @else
                                    <textarea disabled class="form-control text-danger" name="cacatan_rt" id="cacatan_rt" cols="30" rows="4">Belum Ada Catatan</textarea>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Catatan dari RW</label>
                                @if ($data_rw != null)
                                    <textarea disabled class="form-control" name="cacatan_rw" id="cacatan_rw" cols="30" rows="4">{{ $data_rw->catatan }}</textarea>
                                @else
                                    <textarea disabled class="form-control text-danger" name="cacatan_rw" id="cacatan_rw" cols="30" rows="4">Belum Ada Catatan</textarea>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Catatan dari Desa/Kelurahan</label>
                                @if ($data_desa != null)
                                    <textarea disabled class="form-control" name="cacatan_desa" id="cacatan_desa" cols="30" rows="4">{{ $data_desa->catatan }}</textarea>
                                @else
                                    <textarea disabled class="form-control text-danger" name="cacatan_desa" id="cacatan_desa" cols="30" rows="4">Belum Ada Catatan</textarea>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Catatan dari Kecamatan</label>
                                @if ($data_kecamatan != null)
                                    <textarea disabled class="form-control" name="cacatan_kecamatan" id="cacatan_kecamatan" cols="30" rows="4">{{ $data_kecamatan->catatan }}</textarea>
                                @else
                                    <textarea disabled class="form-control text-danger" name="cacatan_kecamatan" id="cacatan_kecamatan" cols="30"
                                        rows="4">Belum Ada Catatan</textarea>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
