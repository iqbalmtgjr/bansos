@extends('layouts.master')
{{-- @section('judul', 'Data Pengguna') --}}
@push('header')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
        rel="stylesheet" />
@endpush

@section('content')
    {{-- @include('jenis_bansos/modaltambah') --}}
    {{-- @include('pengajuan/modalview') --}}
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Pengajuan</h6>
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
                                        Nama Penduduk</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jenis Bansos</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ACC RT</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ACC RW</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ACC Kelurahan/Desa</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ACC Kecamatan</th>
                                    @if (auth()->user()->role == 'admin')
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->penduduk->nama_penduduk }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->jenisBansos->nama_bansos }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($item->acc_rt == '1')
                                                <span class="badge badge-sm bg-gradient-success">Acc</span>
                                            @elseif($item->acc_rt == '0')
                                                <span class="badge badge-sm bg-gradient-danger">Tidak di Acc</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-secondary">Belum Acc</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($item->acc_rw == '1')
                                                <span class="badge badge-sm bg-gradient-success">Acc</span>
                                            @elseif($item->acc_rw == '0')
                                                <span class="badge badge-sm bg-gradient-danger">Tidak di Acc</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-secondary">Belum Acc</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($item->acc_desa == '1')
                                                <span class="badge badge-sm bg-gradient-success">Acc</span>
                                            @elseif($item->acc_desa == '0')
                                                <span class="badge badge-sm bg-gradient-danger">Tidak di Acc</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-secondary">Belum Acc</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($item->acc_kecamatan == '1')
                                                <span class="badge badge-sm bg-gradient-success">Acc</span>
                                            @elseif($item->acc_kecamatan == '0')
                                                <span class="badge badge-sm bg-gradient-danger">Tidak di Acc</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-secondary">Belum Acc</span>
                                            @endif
                                        </td>
                                        @if (auth()->user()->role == 'admin')
                                            <td class="align-middle text-center text-sm">

                                                <a href="{{ url('pengajuan/lihat/' . $item->id) }}"
                                                    class="font-weight-bold text-xs btn btn-success btn-sm"
                                                    data-toggle="tooltip" data-original-title="Lihat Data Pengajuan">
                                                    Lihat Data
                                                </a>
                                                <a href="#"
                                                    class="font-weight-bold text-xs btn btn-warning btn-sm">Kirim
                                                    SMS</a>
                                                <a href="javascript:;"
                                                    class="font-weight-bold text-xs btn btn-danger btn-sm delete"
                                                    data-id="{{ $item->id }}"
                                                    data-namapen="{{ $item->penduduk->nama_penduduk }}"
                                                    data-nama="{{ $item->jenisbansos->nama_bansos }}" data-toggle="tooltip"
                                                    data-original-title="Hapus Pengajuan">
                                                    Hapus
                                                </a>
                                            </td>
                                        @endif
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
            let Namabansos = data.nama
            let Namapenduduk = data.namapen
            // console.log(Id);
            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau hapus data pengajuan " + Namapenduduk + " dengan jenis bansos " + Namabansos +
                        "?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = `{{ url('/pengajuan/hapus/') }}/${Id}`;
                    }
                });
        })
    </script>
@endpush
