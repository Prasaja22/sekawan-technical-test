@extends('dashboard.layouts');

@section('main')
<div class="container">
    <div class="page-inner">
      <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
      >
        <div>
          <h3 class="fw-bold mb-3">Pemakaian Bahan Bakar</h3>
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
                    <form action="/pemakaian" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="driver_id">Nama Driver</label>
                            <select name="driver_id" id="driver_id" class="form-control" required>
                                @foreach ($driver as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kendaraan_id">Kendaraan</label>
                            <select  class="form-control" name="kendaraan_id" id="kendaraan_id">
                                @foreach ($kendaraan as $item)
                                <option value="{{$item->id}}">{{$item->jenis}} {{$item->merk}}  [{{$item->nomor_polisi}}]</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jarak_tempuh_harian">Jarak Tempuh Harian</label>
                            <input
                            type="number"
                            class="form-control"
                            id="jarak_tempuh_harian"
                            placeholder="Masukan Jarak tempuh kendaraan"
                            name="jarak_tempuh_harian"
                            required
                            />
                        </div>
                        <div class="form-group">
                            <label for="bahan_bakar_digunakan">Bahan Bakar digunakan</label>
                            <input
                            type="number"
                            class="form-control"
                            id="bahan_bakar_digunakan"
                            placeholder="Masukan Jumlah bahan bakar"
                            name="bahan_bakar_digunakan"
                            required
                            />
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input
                            type="date"
                            class="form-control"
                            id="tanggal"
                            name="tanggal"
                            required
                            />
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
                <h4 class="card-title">Data Pemakaian BBM</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="basic-datatables"
                    class="display table table-striped table-hover"
                  >
                    <thead>
                      <tr>
                        <th>Nama Driver</th>
                        <th>Nama Kendaraan</th>
                        <th>Jarak Tempuh Harian</th>
                        <th>Bahan Bakar Digunakan</th>
                        <th>tanggal</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nama Driver</th>
                        <th>Nama Kendaraan</th>
                        <th>Jarak Tempuh Harian</th>
                        <th>Bahan Bakar Digunakan</th>
                        <th>tanggal</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->driver->name }}</td>
                            <td>{{ $item->kendaraan->merk }} ({{ $item->kendaraan->nomor_polisi }})</td>
                            <td>{{ number_format($item->jarak_tempuh_harian) }} Km</td>
                            <td>{{ number_format($item->bahan_bakar_digunakan) }} liter</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>
                                {{-- edit --}}
                                <button type="button" class="btn btn-warning btn-sm  btn-round" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit{{$item->id}}">
                                    Edit
                                </button>
                                {{-- modal edit --}}
                                <div class="modal fade" id="staticBackdropEdit{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pemakaian BBM</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/pemakaian/{{$item->id}}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="form-group">
                                                    <label for="driver_id">Nama Driver</label>
                                                    <select name="driver_id" id="driver_id" class="form-control" required>
                                                        @foreach ($driver as $driverItem)
                                                        <option value="{{ $driverItem->id }}"
                                                                {{ $driverItem->id == $item->driver->id ? 'selected' : '' }}>
                                                            {{ $driverItem->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <label for="kendaraan_id">Kendaraan</label>
                                                    <select  class="form-control" name="kendaraan_id" id="kendaraan_id">
                                                        @foreach ($kendaraan as $kendaraanItem)
                                                        <option value="{{$kendaraanItem->id}}" {{ $kendaraanItem->id == $item->kendaraan->id ? 'selected' : '' }}>{{$kendaraanItem->jenis}} {{$kendaraanItem->merk}}  [{{$kendaraanItem->nomor_polisi}}]</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jarak_tempuh_harian">Jarak Tempuh Harian</label>
                                                    <input
                                                    type="number"
                                                    class="form-control"
                                                    id="jarak_tempuh_harian"
                                                    placeholder="Masukan Jarak tempuh kendaraan"
                                                    name="jarak_tempuh_harian"
                                                    value="{{$item->jarak_tempuh_harian}}"
                                                    required
                                                    />
                                                </div>
                                                <div class="form-group">
                                                    <label for="bahan_bakar_digunakan">Bahan Bakar digunakan</label>
                                                    <input
                                                    type="number"
                                                    class="form-control"
                                                    id="bahan_bakar_digunakan"
                                                    placeholder="Masukan Jumlah bahan bakar"
                                                    name="bahan_bakar_digunakan"
                                                    value="{{$item->bahan_bakar_digunakan}}"
                                                    required
                                                    />
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal</label>
                                                    <input
                                                    type="date"
                                                    class="form-control"
                                                    id="tanggal"
                                                    name="tanggal"
                                                    value="{{$item->tanggal}}"
                                                    required
                                                    />
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
                                {{-- button delete --}}
                                <button type="button" class="btn btn-danger btn-sm  btn-round" data-bs-toggle="modal" data-bs-target="#staticBackdropDelete{{$item->id}}">
                                    Hapus
                                </button>
                                {{-- modal delete --}}
                                <div class="modal fade" id="staticBackdropDelete{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pemakaian BBM</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/pemakaian/{{$item->id}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
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
    </div>
  </div>
@endsection
