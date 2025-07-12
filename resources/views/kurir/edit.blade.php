    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit Kurir') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Form Edit Kurir</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('kurir.update', $kurir->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="nama_kurir" class="form-label">Nama Kurir</label>
                                    <input type="text" name="nama_kurir" id="nama_kurir"
                                        class="form-control form-control-lg" value="{{ $kurir->nama_kurir }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="alamat_kurir" class="form-label">Alamat Kurir</label>
                                    <input type="text" name="alamat_kurir" id="alamat_kurir"
                                        class="form-control form-control-lg" value="{{ $kurir->alamat_kurir }}"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="no_telp" class="form-label">No Telp</label>
                                    <input type="text" name="no_telp" id="no_telp"
                                        class="form-control form-control-lg" value="{{ $kurir->no_telp }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                                    <input type="text" name="jenis_kendaraan" id="jenis_kendaraan"
                                        class="form-control form-control-lg" value="{{ $kurir->jenis_kendaraan }}"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="plat_nomor" class="form-label">Plat Nomor</label>
                                    <input type="text" name="plat_nomor" id="plat_nomor"
                                        class="form-control form-control-lg" value="{{ $kurir->plat_nomor }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control form-control-lg" required>
                                        <option value="Aktif" {{ $kurir->status == 'Aktif' ? 'selected' : '' }}>Aktif
                                        </option>
                                        <option value="Tidak Aktif"
                                            {{ $kurir->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="cabang_id" class="form-label">Cabang</label>
                                    <select name="cabang_id" id="cabang_id" class="form-control form-control-lg"
                                        required>
                                        <option value="">-- Pilih Cabang --</option>
                                        @foreach ($cabangs as $cabang)
                                            <option value="{{ $cabang->id }}"
                                                {{ $kurir->cabang_id == $cabang->id ? 'selected' : '' }}>
                                                {{ $cabang->nama_cabang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="photo" class="form-label">Photo</label>
                                    <input type="file" name="photo" id="photo"
                                        class="form-control form-control-lg">
                                    @if ($kurir->photo)
                                        <img src="{{ asset('storage/' . $kurir->photo) }}" width="80"
                                            class="mt-2" />
                                    @endif
                                </div>
                                <div class="form-group text-end">
                                    <button type="submit" class="btn bg-maroon">Update</button>
                                    <a href="{{ route('kurir.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
</div>
<div class="form-group text-end">
    <button type="submit" class="btn bg-maroon">Update</button>
    <a href="{{ route('kurir.index') }}" class="btn btn-secondary ms-2">Kembali</a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
