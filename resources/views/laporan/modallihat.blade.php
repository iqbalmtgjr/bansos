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
                            <textarea disabled class="form-control" name="cacatan_rt" id="cacatan_rt" cols="30" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Catatan dari RW</label>
                            <textarea disabled class="form-control" name="cacatan_rw" id="cacatan_rw" cols="30" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Catatan dari Desa/Kelurahan</label>
                            <textarea disabled class="form-control" name="cacatan_desa" id="cacatan_desa" cols="30" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Catatan dari Kecamatan</label>
                            <textarea disabled class="form-control" name="cacatan_kecamatan" id="cacatan_kecamatan" cols="30" rows="4"></textarea>
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
                    if (response.data_rt != null) {
                        $('#cacatan_rt').val(response.data_rt['catatan']);
                        document.querySelector('#cacatan_rt').classList.remove('text-danger');
                    } else {
                        $('#cacatan_rt').val('Belum Ada Catatan');
                        document.querySelector('#cacatan_rt').classList.add('text-danger');
                    }
                    if (response.data_rw != null) {
                        $('#cacatan_rw').val(response.data_rw['catatan']);
                        document.querySelector('#cacatan_rw').classList.remove('text-danger');
                    } else {
                        $('#cacatan_rw').val('Belum Ada Catatan');
                        document.querySelector('#cacatan_rw').classList.add('text-danger');
                    }
                    if (response.data_desa != null) {
                        $('#cacatan_desa').val(response.data_desa['catatan']);
                        document.querySelector('#cacatan_desa').classList.remove('text-danger');
                    } else {
                        $('#cacatan_desa').val('Belum Ada Catatan');
                        document.querySelector('#cacatan_desa').classList.add('text-danger');
                    }
                    if (response.data_kecamatan != null) {
                        $('#cacatan_kecamatan').val(response.data_kecamatan['catatan']);
                        document.querySelector('#cacatan_kecamatan').classList.remove('text-danger');
                    } else {
                        $('#cacatan_kecamatan').val('Belum Ada Catatan');
                        document.querySelector('#cacatan_kecamatan').classList.add('text-danger');
                    }
                }
            });
        }
    </script>
@endpush
