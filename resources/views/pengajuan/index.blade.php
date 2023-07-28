@extends('layouts.master')
{{-- @section('judul', 'Data Pengguna') --}}
@push('header')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
        rel="stylesheet" />
@endpush

@section('content')
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
                                    @if (auth()->user()->role == 1 || auth()->user()->role == 0)
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ACC RT</th>
                                    @endif
                                    @if (auth()->user()->role == 2 || auth()->user()->role == 0)
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ACC RW</th>
                                    @endif
                                    @if (auth()->user()->role == 3 || auth()->user()->role == 0)
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ACC Kelurahan/Desa</th>
                                    @endif
                                    @if (auth()->user()->role == 4 || auth()->user()->role == 0)
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ACC Kecamatan</th>
                                    @endif

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
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->penduduk->nama_penduduk }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->jenisbansos->nama_bansos }}
                                            </p>
                                        </td>
                                        @if (auth()->user()->role == 1 || auth()->user()->role == 0)
                                            <td class="align-middle text-center text-sm">
                                                @if (auth()->user()->role == 0)
                                                    @if ($item->acc_rt)
                                                        <i class="fas fa-check" style="color: #00ff11;"></i>
                                                    @else
                                                        <i class="fas fa-times" style="color: #f01800;"></i>
                                                    @endif
                                                @else
                                                    <div class="form-check form-switch ps-0">
                                                        <input @if (auth()->user()->role == 0) disabled @endif
                                                            class="form-check-input mt-1 ms-auto" type="checkbox"
                                                            id="navbarFixed"
                                                            onchange="changeAcc({{ $item->id }}, {{ auth()->user()->role }})"
                                                            {{ $item->acc_rt ? 'checked' : '' }}>
                                                    </div>
                                                @endif
                                                {{-- @if ($item->acc_rt == '1')
                                                <span class="badge badge-sm bg-gradient-success">Acc</span>
                                            @elseif($item->acc_rt == '0')
                                                <span class="badge badge-sm bg-gradient-danger">Tidak di Acc</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-secondary">Belum Acc</span>
                                            @endif --}}
                                            </td>
                                        @endif
                                        @if (auth()->user()->role == 2 || auth()->user()->role == 0)
                                            <td class="align-middle text-center text-sm">
                                                @if (auth()->user()->role == 0)
                                                    @if ($item->acc_rw)
                                                        <i class="fas fa-check" style="color: #00ff11;"></i>
                                                    @else
                                                        <i class="fas fa-times" style="color: #f01800;"></i>
                                                    @endif
                                                @else
                                                    <div class="form-check form-switch ps-0">
                                                        <input @if (auth()->user()->role == 0) disabled @endif
                                                            class="form-check-input mt-1 ms-auto" type="checkbox"
                                                            id="navbarFixed"
                                                            onchange="changeAcc({{ $item->id }}, {{ auth()->user()->role }})"
                                                            {{ $item->acc_rw ? 'checked' : '' }}>
                                                    </div>
                                                @endif
                                                {{-- @if ($item->acc_rw == '1')
                                                <span class="badge badge-sm bg-gradient-success">Acc</span>
                                            @elseif($item->acc_rw == '0')
                                                <span class="badge badge-sm bg-gradient-danger">Tidak di Acc</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-secondary">Belum Acc</span>
                                            @endif --}}
                                            </td>
                                        @endif
                                        @if (auth()->user()->role == 3 || auth()->user()->role == 0)
                                            <td class="align-middle text-center text-sm">
                                                @if (auth()->user()->role == 0)
                                                    @if ($item->acc_desa)
                                                        <i class="fas fa-check" style="color: #00ff11;"></i>
                                                    @else
                                                        <i class="fas fa-times" style="color: #f01800;"></i>
                                                    @endif
                                                @else
                                                    <div class="form-check form-switch ps-0">
                                                        <input @if (auth()->user()->role == 0) disabled @endif
                                                            class="form-check-input mt-1 ms-auto" type="checkbox"
                                                            id="navbarFixed"
                                                            onchange="changeAcc({{ $item->id }}, {{ auth()->user()->role }})"
                                                            {{ $item->acc_desa ? 'checked' : '' }}>
                                                    </div>
                                                @endif
                                                {{-- @if ($item->acc_desa == '1')
                                                <span class="badge badge-sm bg-gradient-success">Acc</span>
                                            @elseif($item->acc_desa == '0')
                                                <span class="badge badge-sm bg-gradient-danger">Tidak di Acc</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-secondary">Belum Acc</span>
                                            @endif --}}
                                            </td>
                                        @endif
                                        @if (auth()->user()->role == 4 || auth()->user()->role == 0)
                                            <td class="align-middle text-center text-sm">
                                                @if (auth()->user()->role == 0)
                                                    @if ($item->acc_kecamatan)
                                                        <i class="fas fa-check" style="color: #00ff11;"></i>
                                                    @else
                                                        <i class="fas fa-times" style="color: #f01800;"></i>
                                                    @endif
                                                @else
                                                    <div class="form-check form-switch ps-0">
                                                        <input @if (auth()->user()->role == 0) disabled @endif
                                                            class="form-check-input mt-1 ms-auto" type="checkbox"
                                                            id="navbarFixed"
                                                            onchange="changeAcc({{ $item->id }}, {{ auth()->user()->role }})"
                                                            {{ $item->acc_kecamatan ? 'checked' : '' }}>
                                                    </div>
                                                @endif
                                                {{-- @if ($item->acc_kecamatan == '1')
                                                <span class="badge badge-sm bg-gradient-success">Acc</span>
                                            @elseif($item->acc_kecamatan == '0')
                                                <span class="badge badge-sm bg-gradient-danger">Tidak di Acc</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-secondary">Belum Acc</span>
                                            @endif --}}
                                            </td>
                                        @endif
                                        <td class="align-middle text-center text-sm">
                                            @if ($item->status_sms == 1)
                                                <span class="badge badge-sm bg-gradient-success">Sudah Dikirim</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-warning">Belum Dikirim</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <a href="{{ url('pengajuan/lihat/' . $item->id) }}"
                                                class="font-weight-bold text-md btn btn-info btn-xs" data-toggle="tooltip"
                                                title="Lihat Data Pengajuan"><i class="fas fa-solid fa-eye"></i>
                                                {{-- Lihat Data --}}
                                            </a>
                                            @if (auth()->user()->role == '0')
                                                <a href="{{ url('notif/' . $item->id) }}"
                                                    class="font-weight-bold text-md btn btn-success btn-xs"
                                                    title="Sms Penduduk Diterima"><i class="fas fa-sms"></i>
                                                    {{-- Kirim SMS --}}
                                                </a>
                                                <a href="{{ url('notifgagal/' . $item->id) }}"
                                                    class="font-weight-bold text-md btn btn-warning btn-xs"
                                                    title="Sms Penduduk Ditolak"><i class="fas fa-sms"></i>
                                                    {{-- Kirim SMS --}}
                                                </a>
                                                <a href="javascript:;"
                                                    class="font-weight-bold text-md btn btn-danger btn-xs delete"
                                                    data-id="{{ $item->id }}"
                                                    data-namapen="{{ $item->penduduk->nama_penduduk }}"
                                                    data-nama="{{ $item->jenisbansos->nama_bansos }}" data-toggle="tooltip"
                                                    title="Hapus Pengajuan">
                                                    <i class="fas fa-trash-alt"></i>
                                                    {{-- Hapus --}}
                                                </a>
                                            @endif
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

        function changeAcc(id, user) {
            // alert(id);
            // console.log(id);
            // console.log(user);
            // var pengajuan_id = {{ auth()->user()->role }}
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/changeAcc',
                data: {
                    'user': user,
                    'id': id
                },
                success: function(result) {
                    console.log('asjkhas');
                    if (result) {
                        toastr.success("Toko Buka Hari ini", "Yeeeeyyy!!!");
                    } else {
                        toastr.warning("Toko Tutup Hari ini", "Istirahat!!!");
                    }
                }
            });
        }
    </script>
@endpush
