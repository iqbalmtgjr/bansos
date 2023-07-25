<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Bansos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/jenis_bansos/input') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label class="form-label">Nama Bansos</label>
                        <input name="nama_bansos" type="text"
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
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="">-- Pilih Status --</option>
                            <option value="1" @selected(old('status') == '1')>Aktif</option>
                            <option value="0" @selected(old('status') == '0')>Tidak Aktif</option>
                        </select>
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
