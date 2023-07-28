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
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    {{-- <div class="row" style="padding-left: 4rem">
                        <div class="col-md-2">
                            <h5>Filter</h5>
                        </div>
                        <div class="col-md-2">
                            <select name="role" class="form-control">
                                <option value="">-- Pilih Role --</option>
                                <option value="1">RT</option>
                                <option value="2">RW</option>
                                <option value="3">Kelurahan/Desa</option>
                                <option value="4">Kecamatan</option>
                            </select>
                        </div>
                    </div> --}}
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
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->penduduk->nik }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->penduduk->nama_penduduk }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->pengajuanbansos->jenisbansos->nama_bansos }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($item->status_penerimaan == 1)
                                                <span class="badge badge-sm bg-gradient-success">Diterima</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            {{ $item->catatan }}
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="javascript:;"
                                                class="font-weight-bold text-xs btn btn-danger btn-sm delete"
                                                data-id="{{ $item->id }}" data-nama="{{ $item->penduduk->nama_penduduk }}"
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
            Swal.fire({?
                    title: 'Yakin',
                    text: "Mau hapus " + Nama + " dari riwayat bansos?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = `{{ url('/laporan/hapus/') }}/${Id}`;
                    }
                });
        })
    </script>
@endpush