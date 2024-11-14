@extends('dashboard.layouts');

@section('main')
<div class="container">
    <div class="page-inner">
      <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
      >
        <div>
          <h3 class="fw-bold mb-3">Entry Data Pemesanan</h3>
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
                    <form action="/entry" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nomor_polisi">Kendaraan</label>
                            <select name="kendaraan_id" class="form-control" required>
                                @foreach ($kendaraans as $kendaraan)
                                    <option value="{{ $kendaraan->id }}">{{ $kendaraan->jenis }} {{ $kendaraan->merk }} - {{ $kendaraan->nomor_polisi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <label for="driver_id">Pilih Driver</label>
                            <select name="driver_id" class="form-control" required>
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="approved_by">Pihak yang Menyetujui</label>
                            <select name="approved_by" class="form-control">
                                <option value="" disabled>-- Pilih Admin --</option>
                                @foreach ($approvers as $approver)
                                    <option value="{{ $approver->id }}">{{ $approver->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
                            <input type="date" name="tanggal_pemesanan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" class="form-control"></textarea>
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
                <h4 class="card-title">Data Entry Booking</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="basic-datatables"
                    class="display table table-striped table-hover"
                  >
                    <thead>
                      <tr>
                        <th>Id Booking</th>
                        <th>Nama Kendaraan</th>
                        <th>Nama  Driver</th>
                        <th>Pihak Menyetujui</th>
                        <th>Tangggal Booking</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Id Booking</th>
                        <th>Nama Kendaraan</th>
                        <th>Nama  Driver</th>
                        <th>Pihak Menyetujui</th>
                        <th>Tangggal Booking</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->kendaraan->merk}} : {{$item->kendaraan->nomor_polisi}}</td>
                          <td>{{$item->driver->name}}</td>
                          <td>{{$item->approvedBy->name}}</td>
                          <td>{{$item->tanggal_pemesanan}}</td>
                          <td>{{$item->keterangan}}</td>
                          <td>{{$item->status}}</td>
                          <td>
                            <button type="button" class="btn btn-warning btn-sm  btn-round" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit{{$item->id}}">
                                Edit
                            </button>
                            <div class="modal fade" id="staticBackdropEdit{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropEditLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Kendaraan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/entry/{{$item->id}}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label for="nomor_polisi">Kendaraan</label>
                                                <select name="kendaraan_id" class="form-control" required>
                                                    @foreach ($kendaraans as $kendaraan)
                                                        <option value="{{ $kendaraan->id }}" {{$kendaraan->id == $item->kendaraan->id ? 'selected' : '' }}>{{ $kendaraan->jenis }} {{ $kendaraan->merk }} - {{ $kendaraan->nomor_polisi }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="merk">Merk</label>
                                                <label for="driver_id">Pilih Driver</label>
                                                <select name="driver_id" class="form-control" required>
                                                    @foreach ($drivers as $driver)
                                                        <option value="{{ $driver->id }}" {{ $driver->id == $item->driver->id  ? 'selected' : '' }}>{{ $driver->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="approved_by">Pihak yang Menyetujui</label>
                                                <select name="approved_by" class="form-control">
                                                    <option value="" disabled>-- Pilih Admin --</option>
                                                    @foreach ($approvers as $approver)
                                                        <option value="{{ $approver->id }}" {{$approver->id == $item->approvedBy->id ? 'selected' : ''}}>{{ $approver->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
                                                <input type="date" name="tanggal_pemesanan" class="form-control" required value="{{$item->tanggal_pemesanan}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control" required>
                                                    <option value="pending"  {{$item->status == "pending" ? 'selected' : ''}}>Pending</option>
                                                    <option value="approved" {{$item->status == "approved" ? 'selected' : ''}}>Approved</option>
                                                    <option value="rejected" {{$item->status == "rejected" ? 'selected' : ''}}>Rejected</option>
                                                    <option value="done" {{$item->status == "done" ? 'selected' : ''}}>Done</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan</label>
                                                <textarea name="keterangan" class="form-control">{{$item->keterangan}}</textarea>
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
                            <button type="button" class="btn btn-danger btn-sm  btn-round" data-bs-toggle="modal" data-bs-target="#staticBackdropHapus{{$item->id}}">
                                Hapus
                            </button>
                            <div class="modal fade" id="staticBackdropHapus{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropEditLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/entry/{{$item->id}}" method="post">
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
