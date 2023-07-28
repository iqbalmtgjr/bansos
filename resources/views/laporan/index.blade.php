@extends('layouts.master')
{{-- @section('judul', 'Data Pengguna') --}}
@push('header')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Laporan</h6>
                    {{-- <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#tambah">Tambah
                        Jenis Bansos</button> --}}
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-4">
                        <table id="myTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        NIK</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Penduduk</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Jenis Bansos</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status Penerimaan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Catatan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($data as $item)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->nama_bansos }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->nama_bansos }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->nama_bansos }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($item->status == '1')
                                                <span class="badge badge-sm bg-gradient-success">Aktif</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-secondary">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="javascript:;" onclick="getdata({{ $item->id }})"
                                                class="font-weight-bold text-xs btn btn-warning btn-sm"
                                                data-toggle="tooltip" data-original-title="Edit Jenis Bansos"
                                                data-bs-toggle="modal" data-bs-target="#edit">
                                                Edit
                                            </a>
                                            <a href="javascript:;"
                                                class="font-weight-bold text-xs btn btn-danger btn-sm delete"
                                                data-id="{{ $item->id }}" data-nama="{{ $item->nama_bansos }}"
                                                data-toggle="tooltip" data-original-title="Hapus Jenis Bansos">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
