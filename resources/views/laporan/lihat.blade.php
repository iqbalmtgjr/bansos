@extends('layouts.master')
@section('active', 'active')

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
                                <textarea class="form-control @error('cacatan_rt') is-invalid @enderror" name="cacatan_rt" id="cacatan_rt"
                                    cols="30" rows="4">{{ $data }}</textarea>
                                @error('cacatan_rt')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Catatan dari RW</label>
                                <textarea class="form-control @error('cacatan_rw') is-invalid @enderror" name="cacatan_rw" id="cacatan_rw"
                                    cols="30" rows="4"></textarea>
                                @error('cacatan_rw')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Catatan dari Desa/Kelurahan</label>
                                <textarea class="form-control @error('cacatan_desa_kel') is-invalid @enderror" name="cacatan_desa_kel"
                                    id="cacatan_desa_kel" cols="30" rows="4"></textarea>
                                @error('cacatan_desa_kel')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Catatan dari Kecamatan</label>
                                <textarea class="form-control @error('cacatan_kecamatan') is-invalid @enderror" name="cacatan_kecamatan"
                                    id="cacatan_kecamatan" cols="30" rows="4"></textarea>
                                @error('cacatan_kecamatan')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
