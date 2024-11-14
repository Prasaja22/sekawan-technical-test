@extends('dashboard.layouts');

@section('main')
<div class="container">
    <div class="page-inner">
      <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
      >
        <div>
          <h3 class="fw-bold mb-3">Riwayat Pemakaian</h3>
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
                    <form action="/riwayat" method="post">
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
                            <label for="tanggal_mulai">Tanggal Booking</label>
                            <input
                            type="date"
                            class="form-control"
                            id="tanggal_mulai"
                            placeholder="Masukan Jarak tempuh kendaraan"
                            name="tanggal_mulai"
                            required
                            />
                        </div>
                        <div class="form-group">
                            <label for="tanggal_selesai">Tanggal Selesai</label>
                            <input
                            type="date"
                            class="form-control"
                            id="tanggal_selesai"
                            placeholder="Masukan Jumlah bahan bakar"
                            name="tanggal_selesai"
                            required
                            />
                        </div>
                        <div class="form-group">
                            <label for="keperluan">Keperluan</label>
                            <input
                            type="text"
                            class="form-control"
                            id="keperluan"
                            name="keperluan"
                            required
                            placeholder="Keperluan"
                            />
                        </div>
                        <div class="form-group">
                            <label for="lokasi_asal">Lokasi Asal</label>
                            <input
                            type="text"
                            class="form-control"
                            id="lokasi_asal"
                            name="lokasi_asal"
                            required
                            placeholder="Lokasi awal anda"
                            />
                        </div>
                        <div class="form-group">
                            <label for="lokasi_tujuan">Lokasi Tujuan</label>
                            <input
                            type="text"
                            class="form-control"
                            id="lokasi_tujuan"
                            name="lokasi_tujuan"
                            placeholder="lokasi tujuan anda"
                            required
                            />
                        </div>
                        <div class="form-group">
                            <label for="jarak_tempuh">Jarak Tempuh</label>
                            <input
                            type="number"
                            class="form-control"
                            id="jarak_tempuh"
                            name="jarak_tempuh"
                            placeholder="jarak tempuh anda"
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
                <h4 class="card-title">Data Riwayat Penggunaan</h4>
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
                        <th>Tanggal Booking</th>
                        <th>Tanggal Selesai</th>
                        <th>Keperluan</th>
                        <th>Lokasi Asal</th>
                        <th>Lokasi Tujuan</th>
                        <th>Jarak Tempuh</th>
                        <th>Nama Driver</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nama Kendaraan</th>
                        <th>Tanggal Booking</th>
                        <th>Tanggal Selesai</th>
                        <th>Keperluan</th>
                        <th>Lokasi Asal</th>
                        <th>Lokasi Tujuan</th>
                        <th>Jarak Tempuh</th>
                        <th>Nama Driver</th>
                        <td>Aksi</td>
                      </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                          <td>{{ $item->kendaraan->merk }} ({{ $item->kendaraan->nomor_polisi }})</td>
                          <td>{{$item->tanggal_mulai}}</td>
                          <td>{{$item->tanggal_selesai}}</td>
                          <td>{{$item->keperluan}}</td>
                          <td>{{$item->lokasi_asal}}</td>
                          <td>{{$item->lokasi_tujuan}}</td>
                          <td>{{$item->jarak_tempuh}} Km</td>
                          <td>{{$item->driver->name}}</td>
                          <td>
                            {{-- edit --}}
                            <button type="button" class="btn btn-warning btn-round btn-sm " data-bs-toggle="modal" data-bs-target="#staticBackdropEdit{{$item->id}}">
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
                                        <form action="/riwayat/{{$item->id}}" method="post">
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
                                                <label for="tanggal_mulai">Tanggal Booking</label>
                                                <input
                                                type="date"
                                                class="form-control"
                                                id="tanggal_mulai"
                                                placeholder="Masukan Jarak tempuh kendaraan"
                                                name="tanggal_mulai"
                                                required
                                                value="{{$item->tanggal_mulai}}"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                                <input
                                                type="date"
                                                class="form-control"
                                                id="tanggal_selesai"
                                                placeholder="Masukan Jumlah bahan bakar"
                                                name="tanggal_selesai"
                                                value="{{$item->tanggal_selesai}}"
                                                required
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="keperluan">Keperluan</label>
                                                <input
                                                type="text"
                                                class="form-control"
                                                id="keperluan"
                                                name="keperluan"
                                                required
                                                placeholder="Keperluan"
                                                value="{{$item->keperluan}}"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="lokasi_asal">Lokasi Asal</label>
                                                <input
                                                type="text"
                                                class="form-control"
                                                id="lokasi_asal"
                                                name="lokasi_asal"
                                                required
                                                placeholder="Lokasi awal anda"
                                                value="{{$item->lokasi_asal}}"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="lokasi_tujuan">Lokasi Tujuan</label>
                                                <input
                                                type="text"
                                                class="form-control"
                                                id="lokasi_tujuan"
                                                name="lokasi_tujuan"
                                                placeholder="lokasi tujuan anda"
                                                required
                                                value="{{$item->lokasi_tujuan}}"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="jarak_tempuh">Jarak Tempuh</label>
                                                <input
                                                type="number"
                                                class="form-control"
                                                id="jarak_tempuh"
                                                name="jarak_tempuh"
                                                placeholder="jarak tempuh anda"
                                                value="{{$item->jarak_tempuh}}"
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
                            {{-- button hapus --}}
                            <button type="button" class="btn btn-danger btn-sm  btn-round" data-bs-toggle="modal" data-bs-target="#staticBackdropHapus{{$item->id}}">
                                Hapus
                            </button>
                            {{-- modal hapus --}}
                            <div class="modal fade" id="staticBackdropHapus{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropEditLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/riwayat/{{$item->id}}" method="post">
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
@endsection
