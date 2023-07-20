<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/user/input') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" placeholder="Masukkan Nama">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                </div>
                            </span>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input name="username" type="text"
                            class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"
                            placeholder="Masukkan Username">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                </div>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="Masukkan Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                </div>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1"
                            class="form-label @error('role') is-invalid @enderror">Role</label>
                        <select class="form-control" name="role" id="">
                            <option value="">-- Pilih Role --</option>
                            <option value="rt" @selected(old('role') == 'rt')>RT</option>
                            <option value="rw" @selected(old('role') == 'rw')>RW</option>
                            <option value="kel/desa" @selected(old('role') == 'kel/desa')>Kelurahan/Desa</option>
                        </select>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                </div>
                            </span>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
