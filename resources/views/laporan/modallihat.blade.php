<div class="modal fade" id="lihat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lihat catatan dari role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Catatan dari RT</label>
                            <textarea class="form-control @error('cacatan_rt') is-invalid @enderror" name="cacatan_rt" id="cacatan_rt"
                                cols="30" rows="4"></textarea>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@push('footer')
    <script>
        function getdata(id) {
            console.log(id)
            var url = '{{ url('/getdata/catatan') }}' + '/' + id
            console.log(url);

            $.ajax({
                url: url,
                cache: false,
                success: function(response) {
                    console.log(response);

                    $('#id').val(response.id);
                    // $('#nama_bansos').val(response.nama_bansos);
                    // $('#status').val(response.status);
                }
            });
        }
    </script>
@endpush
