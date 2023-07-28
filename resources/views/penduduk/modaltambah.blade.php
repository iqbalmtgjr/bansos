<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Penduduk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/penduduk/input') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">NIK</label>
                                <input name="nik" type="number"
                                    class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}"
                                    placeholder="Masukkan No NIK">
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label class="form-label">No KK</label>
                                <input name="no_kk" type="number"
                                    class="form-control @error('no_kk') is-invalid @enderror"
                                    value="{{ old('no_kk') }}" placeholder="Masukkan No Kartu Keluarga">
                                @error('no_kk')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Penduduk</label>
                                <input name="nama_penduduk" type="text"
                                    class="form-control @error('nama_penduduk') is-invalid @enderror"
                                    value="{{ old('nama_penduduk') }}" placeholder="Masukkan Nama Penduduk">
                                @error('nama_penduduk')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Jenis
                                    Kelamin</label>
                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                    name="jenis_kelamin" id="">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="pria" @selected(old('jenis_kelamin') == 'pria')>Pria</option>
                                    <option value="wanita" @selected(old('jenis_kelamin') == 'wanita')>Wanita</option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label ">Agama</label>
                                <select class="form-control @error('agama') is-invalid @enderror" name="agama"
                                    id="">
                                    <option value="">-- Pilih Agama --</option>
                                    <option value="islam" @selected(old('agama') == 'islam')>Islam</option>
                                    <option value="kristen" @selected(old('agama') == 'kristen')>Kristen</option>
                                    <option value="katolik" @selected(old('agama') == 'katolik')>Katolik</option>
                                    <option value="hindu" @selected(old('agama') == 'hindu')>Hindu</option>
                                    <option value="konghuchu" @selected(old('agama') == 'konghuchu')>Konghuchu</option>
                                </select>
                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status Kawin</label>
                                <select class="form-control @error('status_kawin') is-invalid @enderror"
                                    name="status_kawin" id="">
                                    <option value="">-- Pilih Status Kawin --</option>
                                    <option value="0" @selected(old('status_kawin') == '0')>Belum Kawin</option>
                                    <option value="1" @selected(old('status_kawin') == '1')>Kawin</option>
                                </select>
                                @error('status_kawin')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Provinsi</label>
                                <select class="form-control @error('provinsi') is-invalid @enderror" name="provinsi"
                                    id="">
                                    <option value="">-- Pilih Provinsi --</option>
                                    @foreach ($provinsi as $item)
                                        <option value="{{ $item->name }}" @selected(old('provinsi') == '{{ $item->name }}')>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('provinsi')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kabupaten</label>
                                <select class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten"
                                    id="">
                                    <option value="">-- Pilih Kabupaten --</option>
                                    @foreach ($kabupaten as $item)
                                        <option value="{{ $item->name }}" @selected(old('kabupaten') == '{{ $item->name }}')>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('kabupaten')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kecamatan</label>
                                <select class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan"
                                    id="">
                                    <option value="">-- Pilih Kecamatan --</option>
                                    @foreach ($kecamatan as $item)
                                        <option value="{{ $item->name }}" @selected(old('kecamatan') == '{{ $item->name }}')>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('kecamatan')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kelurahan/Desa</label>
                                <select class="form-control @error('kel_desa') is-invalid @enderror" name="kel_desa"
                                    id="">
                                    <option value="">-- Pilih Kelurahan/Desa --</option>
                                    @foreach ($kelurahan as $item)
                                        <option value="{{ $item->name }}" @selected(old('kel_desa') == '{{ $item->name }}')>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('kel_desa')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">RW</label>
                                <input name="rw" type="number"
                                    class="form-control @error('rw') is-invalid @enderror"
                                    value="{{ old('rw') }}" placeholder="Masukkan RW">
                                @error('rw')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">RT</label>
                                <input name="rt" type="number"
                                    class="form-control @error('rt') is-invalid @enderror"
                                    value="{{ old('rt') }}" placeholder="Masukkan RT">
                                @error('rt')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Pekerjaan</label>
                                <select class="form-control @error('pekerjaan') is-invalid @enderror"
                                    name="pekerjaan" id="">
                                    <option value="">-- Pilih Pekerjaan --</option>
                                    <option value="wiraswasta" @selected(old('pekerjaan') == 'wiraswasta')>
                                        Wiraswasta</option>
                                    <option value="pns" @selected(old('pekerjaan') == 'pns')>
                                        PNS</option>
                                    <option value="polri" @selected(old('pekerjaan') == 'polri')>
                                        Polri</option>
                                    <option value="karyawan" @selected(old('pekerjaan') == 'karyawan')>
                                        Karyawan</option>
                                    <option value="petani" @selected(old('pekerjaan') == 'petani')>
                                        Petani</option>
                                    <option value="ibu rumah tangga" @selected(old('pekerjaan') == 'ibu rumah tangga')>
                                        Ibu Rumah Tangga</option>
                                    <option value="belum bekerja" @selected(old('pekerjaan') == 'belum bekerja')>
                                        Belum Bekerja</option>
                                </select>
                                @error('pekerjaan')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kewarganegaraan</label>
                                <select class="form-control @error('kewarganegaraan') is-invalid @enderror"
                                    name="kewarganegaraan" id="">
                                    <option value="">-- Pilih Kewarganegaraan --</option>
                                    <option value="wni" @selected(old('kewarganegaraan') == 'wni')>WNI</option>
                                    <option value="wna" @selected(old('kewarganegaraan') == 'wna')>WNA</option>
                                </select>
                                @error('kewarganegaraan')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No Handphone</label>
                                <div class="input-group ">
                                    <span class="input-group-text"
                                        id="basic-addon1">+62</span>
                                    <input name="no_hp" type="number"
                                        class="form-control @error('no_hp') is-invalid @enderror"
                                        placeholder="8xxxxxxxxx" value="{{ old('no_hp') }}" aria-label="no_hp"
                                        aria-describedby="basic-addon1">
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Penghasilan</label>
                                <select class="form-control @error('penghasilan') is-invalid @enderror"
                                    name="penghasilan" id="">
                                    <option value="">-- Pilih Penghasilan --</option>
                                    <option value="<2juta" @selected(old('penghasilan') == '<2juta')>
                                        < 2 Juta</option>
                                    <option value=">2juta" @selected(old('penghasilan') == '>2juta')>> 2 Juta</option>
                                    <option value=">5juta" @selected(old('penghasilan') == '>5juta')>> 5 Juta</option>
                                </select>
                                @error('penghasilan')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggungan</label>
                                <input name="tanggungan" type="number"
                                    class="form-control @error('tanggungan') is-invalid @enderror"
                                    value="{{ old('tanggungan') }}" placeholder="Masukkan Jumlah Tanggungan">
                                @error('tanggungan')
                                    <span class="invalid-feedback" role="alert">
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cacat Fisik</label>
                                <select class="form-control @error('cacat') is-invalid @enderror" name="cacat"
                                    id="">
                                    <option value="">-- Cacat atau Tidak --</option>
                                    <option value="1" @selected(old('cacat') == '1')>
                                        Cacat</option>
                                    <option value="0" @selected(old('cacat') == '0')>
                                        Tidak Cacat</option>
                                </select>
                                @error('cacat')
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
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
