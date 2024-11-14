@extends('dashboard.layouts');

@section('main')
<div class="container">
    <div class="page-inner">
      <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
      >
        <div>
          <h3 class="fw-bold mb-3">Servis Kendaraan</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <button type="button" class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Data
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pemakaian BBM</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/servis" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="kendaraan_id">Kendaraan</label>
                            <select  class="form-control" name="kendaraan_id" id="kendaraan_id">
                                @foreach ($kendaraan as $item)
                                <option value="{{$item->id}}">{{$item->jenis}} {{$item->merk}}  [{{$item->nomor_polisi}}]</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="biaya_servis">Biaya Servis</label>
                            <input
                                type="text"
                                class="form-control"
                                id="biaya_servis"
                                placeholder="Biaya Servis"
                                name="biaya_servis"
                                required
                                oninput="formatNumber(this)"
                            />
                        </div>
                        <div class="form-group">
                            <label for="jenis_servis">Jenis Servis</label>
                            <input
                            type="text"
                            class="form-control"
                            id="jenis_servis"
                            placeholder="Jenis Serivs "
                            name="jenis_servis"
                            required
                            />
                        </div>
                        <div class="form-group">
                            <label for="tanggal_servis">Tanggal</label>
                            <input
                            type="date"
                            class="form-control"
                            id="tanggal_servis"
                            name="tanggal_servis"
                            required
                            />
                        </div>
                        <div class="form-group">
                            <textarea  class="form-control" name="keterangan" id="keterangan" cols="30" rows="10">Keterangan..</textarea>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
           {{-- available contten --}}
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h4 class="card-title">Data Servis Kendaraan</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="basic-datatables"
                    class="display table table-striped table-hover"
                  >
                    <thead>
                      <tr>
                        <th>Nama Kendaraan</th>
                        <th>Tanggal Servis</th>
                        <th>Jenis Servis</th>
                        <th>Biaya Servis</th>
                        <th>keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nama Kendaraan</th>
                        <th>Tanggal Servis</th>
                        <th>Jenis Servis</th>
                        <th>Biaya Servis</th>
                        <th>keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                          <td>{{$item->kendaraan->merk}} [{{$item->kendaraan->nomor_polisi}}]</td>
                          <td>{{$item->tanggal_servis}}</td>
                          <td>{{$item->jenis_servis}}</td>
                          <td>{{$item->biaya_servis}}</td>
                          <td>{{$item->keterangan}}</td>
                          <td>
                            {{-- edit --}}
                            <button type="button" class="btn btn-warning btn-sm  btn-round" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit{{$item->id}}">
                                Edit
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdropEdit{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">EDit Servis</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/servis/{{$item->id}}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label for="kendaraan_id">Kendaraan</label>
                                                <select  class="form-control" name="kendaraan_id" id="kendaraan_id">
                                                    @foreach ($kendaraan as $kendaraanItem)
                                                    <option value="{{$kendaraanItem->id}}" {{ $kendaraanItem->id == $item->kendaraan->id ? 'selected' : '' }}>{{$kendaraanItem->jenis}} {{$kendaraanItem->merk}}  [{{$kendaraanItem->nomor_polisi}}]</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="biaya_servis">Biaya Servis</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="biaya_servis"
                                                    placeholder="Biaya Servis"
                                                    name="biaya_servis"
                                                    required
                                                    oninput="formatNumber(this)"
                                                    value="{{$item->biaya_servis}}"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis_servis">Jenis Servis</label>
                                                <input
                                                type="text"
                                                class="form-control"
                                                id="jenis_servis"
                                                placeholder="Jenis Serivs "
                                                name="jenis_servis"
                                                value="{{$item->jenis_servis}}"
                                                required
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_servis">Tanggal</label>
                                                <input
                                                type="date"
                                                class="form-control"
                                                id="tanggal_servis"
                                                name="tanggal_servis"
                                                value="{{$item->tanggal_servis}}"
                                                required
                                                />
                                            </div>
                                            <div class="form-group">
                                                <textarea  class="form-control" name="keterangan" id="keterangan" cols="30" rows="10">{{$item->keterangan}}</textarea>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            {{-- btn delete --}}
                            <button type="button" class="btn btn-danger btn-sm  btn-round" data-bs-toggle="modal" data-bs-target="#staticBackdropHapus{{$item->id}}">
                                Hapus
                            </button>
                            {{-- modal delete --}}
                            <div class="modal fade" id="staticBackdropHapus{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropEditLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/servis/{{$item->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                          </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    function formatNumber(input) {
        // Remove all non-numeric characters except for the period (decimal)
        const value = input.value.replace(/\D/g, '');
        // Format the number with commas
        input.value = new Intl.NumberFormat().format(value);
    }

    function removeFormatting() {
        // Get the biaya_servis input element
        const biayaServisInput = document.getElementById('biaya_servis');
        // Remove commas from the value and set it back to the input
        biayaServisInput.value = biayaServisInput.value.replace(/,/g, '');
    }
    </script>
@endsection
