@extends('dashboard.layouts');

@section('main')
<div class="container">
    <div class="page-inner">
      <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
      >
        <div>
          <h3 class="fw-bold mb-3">Entry Data Kendaraan</h3>
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Kendaraan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/kendaraan" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nomor_polisi">Nomor Polisi</label>
                            <input
                            type="text"
                            class="form-control"
                            id="nomor_polisi"
                            placeholder="Masukan Nomor Polisi"
                            name="nomor_polisi"
                            required
                            />
                        </div>
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input
                            type="text"
                            class="form-control"
                            id="merk"
                            placeholder="Masukan Nomor Polisi"
                            name="merk"
                            required
                            />
                        </div>
                        <div class="form-group">
                            <label for="model">Model Kendaraan</label>
                            <select name="model"  class="form-control" id="model"  required>
                                <option value="Manual">Manual</option>
                                <option value="Automatic">Automatic</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun_produksi">Tahun Produksi</label>
                            <input
                            type="number"
                            class="form-control"
                            id="tahun_produksi"
                            placeholder="Masukan Nomor Polisi"
                            name="tahun_produksi"
                            required
                            />
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select name="jenis" id="jenis" class="form-control"  required>
                                <option value="Mobil">Mobil</option>
                                <option value="Motor">Motor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kapasitas_tangki">Kapasitas Tangki</label>
                            <input
                            type="number"
                            class="form-control"
                            id="kapasitas_tangki"
                            placeholder="Masukan Nomor Polisi"
                            name="kapasitas_tangki"
                            required
                            />
                        </div>
                        <div class="form-group">
                            <label for="jarak_tempuh_total">Jarak Tempuh Total</label>
                            <input
                            type="number"
                            class="form-control"
                            id="jarak_tempuh_total"
                            placeholder="Masukan Nomor Polisi"
                            name="jarak_tempuh_total"
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
                <h4 class="card-title">Data Kendaraan</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="basic-datatables"
                    class="display table table-striped table-hover"
                  >
                    <thead>
                      <tr>
                        <th>Nomor Polisi</th>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Tahun Produksi</th>
                        <th>Jenis</th>
                        <th>Kapasitas Tangki</th>
                        <th>Jarak Tempuh Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nomor Polisi</th>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Tahun Produksi</th>
                        <th>Jenis</th>
                        <th>Kapasitas Tangki</th>
                        <th>Jarak Tempuh Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                          <td>{{$item->nomor_polisi}}</td>
                          <td>{{$item->merk}}</td>
                          <td>{{$item->model}}</td>
                          <td>{{$item->tahun_produksi}}</td>
                          <td>{{$item->jenis}}</td>
                          <td>{{ number_format($item->kapasitas_tangki)}} l</td>
                          <td>{{ number_format($item->jarak_tempuh_total) }} Km</td>
                          <td>{{$item->status}}</td>
                          <td>
                            {{-- edit --}}
                            <button type="button" class="btn btn-warning btn-sm  btn-round" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit{{$item->id}}">
                                Edit
                            </button>
                            {{-- modal edit --}}
                            <div class="modal fade" id="staticBackdropEdit{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropEditLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Kendaraan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/kendaraan/{{$item->id}}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label for="nomor_polisi">Nomor Polisi</label>
                                                <input
                                                type="text"
                                                class="form-control"
                                                id="nomor_polisi"
                                                placeholder="Masukan Nomor Polisi"
                                                name="nomor_polisi"
                                                required
                                                value="{{ $item->nomor_polisi }}"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="merk">Merk</label>
                                                <input
                                                type="text"
                                                class="form-control"
                                                id="merk"
                                                placeholder="Masukan Nomor Polisi"
                                                name="merk"
                                                required
                                                value="{{ $item->merk }}"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="model">Model Kendaraan</label>
                                                <select name="model"  class="form-control" id="model"  required>
                                                    <option value="Manual" {{ $item->model == 'Manual' ? 'selected' : '' }}>Manual</option>
                                                    <option value="Automatic" {{ $item->model == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="tahun_produksi">Tahun Produksi</label>
                                                <input
                                                type="number"
                                                class="form-control"
                                                id="tahun_produksi"
                                                placeholder="Masukan Nomor Polisi"
                                                name="tahun_produksi"
                                                required
                                                value="{{ $item->tahun_produksi }}"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis">Jenis</label>
                                                <select name="jenis" id="jenis" class="form-control"  required>
                                                    <option value="Mobil" {{ $item->jenis == 'Mobil' ? 'selected' : '' }}>Mobil</option>
                                                    <option value="Motor" {{ $item->jenis == 'Motor' ? 'selected' : '' }}>Motor</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="kapasitas_tangki">Kapasitas Tangki</label>
                                                <input
                                                type="number"
                                                class="form-control"
                                                id="kapasitas_tangki"
                                                placeholder="Masukan Nomor Polisi"
                                                name="kapasitas_tangki"
                                                required
                                                value="{{ $item->kapasitas_tangki }}"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="jarak_tempuh_total">Jarak Tempuh Total</label>
                                                <input
                                                type="number"
                                                class="form-control"
                                                id="jarak_tempuh_total"
                                                placeholder="Masukan Nomor Polisi"
                                                name="jarak_tempuh_total"
                                                required
                                                value="{{ $item->jarak_tempuh_total }}"
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
                                        <form action="/kendaraan/{{$item->id}}" method="post">
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
