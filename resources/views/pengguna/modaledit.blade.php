<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/user/update') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" id="id" name="id">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input name="name" id="namee" type="text"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                            placeholder="Masukkan Nama">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                </div>
                            </span>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input name="username" id="usernamee" type="text"
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
                        <input name="email" id="emaill" type="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                            placeholder="Masukkan Email">
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
                        <select class="form-control" name="role" id="rolee">
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
@push('footer')
    <script>
        function getdata(id) {
            console.log(id)
            var url = '{{ url('/user/getdata') }}' + '/' + id
            console.log(url);

            $.ajax({
                url: url,
                cache: false,
                success: function(response) {
                    console.log(response);

                    $('#id').val(response.id);
                    $('#namee').val(response.name);
                    $('#usernamee').val(response.username);
                    $('#emaill').val(response.email);
                    $('#rolee').val(response.role);
                }
            });
        }
    </script>
@endpush
