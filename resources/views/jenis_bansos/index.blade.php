@extends('layouts.master')
{{-- @section('judul', 'Data Pengguna') --}}
@push('header')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
@endpush

@section('content')
    @include('jenis_bansos/modaltambah')
    @include('jenis_bansos/modaledit')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Data Jenis Bansos</h6>
                    <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#tambah">Tambah
                        Jenis Bansos</button>
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
                                        Nama Bansos</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                            {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');

        $('#myTable').on('click', '.delete', function() {
            let data = $(this).data()
            let Id = data.id
            let Nama = data.nama
            // console.log(Id);
            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau Hapus " + Nama + "?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = `{{ url('/jenis_bansos/hapus/') }}/${Id}`;
                    }
                });
        })
    </script>
@endpush
