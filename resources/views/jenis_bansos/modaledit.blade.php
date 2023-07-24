<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Bansos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/jenis_bansos/update') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label class="form-label">Nama Bansos</label>
                        <input name="nama_bansos" id="nama_bansos" type="text"
                            class="form-control @error('nama_bansos') is-invalid @enderror"
                            value="{{ old('nama_bansos') }}" placeholder="Masukkan Nama Bansos">
                        @error('nama_bansos')
                            <span class="invalid-feedback" role="alert">
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                </div>
                            </span>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Bansos</label>
                        <input id="status" name="status" type="number"
                            class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}"
                            placeholder="Masukkan status">
                        @error('status')
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
            var url = '{{ url('/jenis_bansos/getdata') }}' + '/' + id
            console.log(url);

            $.ajax({
                url: url,
                cache: false,
                success: function(response) {
                    console.log(response);

                    $('#id').val(response.id);
                    $('#nama_bansos').val(response.nama_bansos);
                    $('#status').val(response.status);
                }
            });
        }
    </script>
@endpush
