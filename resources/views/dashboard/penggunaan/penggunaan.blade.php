@extends('dashboard.layouts');

@section('main')
<div class="container">
    <div class="page-inner">
      <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
      >
      @if (Auth::user()->role == 'admin')
        <div>
          <h3 class="fw-bold mb-3">Entry Data Penggunaan Kendaraan</h3>
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

        @endif
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
                <h4 class="card-title">Data Booking Aktif</h4>
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
                            {{-- bbm btm --}}
                            <button type="button" class="btn btn-secondary btn-sm  btn-round" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit{{$item->id}}">
                               BBM
                            </button>
                            {{-- bbm modal --}}
                            <div class="modal fade" id="staticBackdropEdit{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropEditLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form BBM Kendaraan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/penggunaan-bbm" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nomor_polisi">Kendaraan</label>
                                                <select name="kendaraan_id" class="form-control" required @readonly(true)>
                                                    @foreach ($kendaraans as $kendaraan)
                                                        <option value="{{ $kendaraan->id }}" {{$kendaraan->id == $item->kendaraan->id ? 'selected' : '' }}>{{ $kendaraan->jenis }} {{ $kendaraan->merk }} - {{ $kendaraan->nomor_polisi }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="driver_id">Pilih Driver</label>
                                                <select name="driver_id" class="form-control" required @readonly(true)>
                                                    @foreach ($drivers as $driver)
                                                        <option value="{{ $driver->id }}" {{ $driver->id == $item->driver->id  ? 'selected' : '' }}>{{ $driver->name }}</option>
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

                            {{-- servis --}}
                            <button type="button" class="btn btn-primary btn-sm  btn-round" data-bs-toggle="modal" data-bs-target="#staticBackdropServis{{$item->id}}">
                                Servis
                             </button>
                             {{-- bbm modal --}}
                             <div class="modal fade" id="staticBackdropServis{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropEditLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                     <h1 class="modal-title fs-5" id="staticBackdropLabel">Form BBM Kendaraan</h1>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                     </div>
                                     <div class="modal-body">
                                         <form action="/penggunaan-servis" method="post">
                                             @csrf
                                             <div class="form-group">
                                                 <label for="nomor_polisi">Kendaraan</label>
                                                 <select name="kendaraan_id" class="form-control" required @readonly(true)>
                                                     @foreach ($kendaraans as $kendaraan)
                                                         <option value="{{ $kendaraan->id }}" {{$kendaraan->id == $item->kendaraan->id ? 'selected' : '' }}>{{ $kendaraan->jenis }} {{ $kendaraan->merk }} - {{ $kendaraan->nomor_polisi }}</option>
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
                                                <textarea  class="form-control" name="keterangan" id="keterangan" cols="30" rows="10">Digunakan oleh : {{$item->driver->name}}</textarea>
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

                             {{-- riwayat --}}
                             <button type="button" class="btn btn-primary btn-sm  btn-round mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdropRiwayat{{$item->id}}">
                                Selesai
                             </button>
                             {{-- bbm modal --}}
                             <div class="modal fade" id="staticBackdropRiwayat{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropEditLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                     <h1 class="modal-title fs-5" id="staticBackdropLabel">Form BBM Kendaraan</h1>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                     </div>
                                     <div class="modal-body">
                                         <form action="/penggunaan-riwayat" method="post">
                                             @csrf
                                             <div class="form-group">
                                                <input
                                                type="text"
                                                class="form-control"
                                                id="tanggal_mulai"
                                                placeholder="Masukan Jarak tempuh kendaraan"
                                                name="id"
                                                value="{{$item->id}}"
                                                readonly
                                                required
                                                hidden
                                                />
                                            </div>
                                             <div class="form-group">
                                                 <label for="nomor_polisi">Kendaraan</label>
                                                 <select name="kendaraan_id" id="kendaraan_id" class="form-control" @readonly(true)>
                                                    <option value="{{$item->kendaraan->id}}">{{$item->kendaraan->jenis}} {{$item->kendaraan->merk}} : {{$item->kendaraan->nomor_polisi}}</option>
                                                 </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="driver_id">Pilih Driver</label>
                                                <select name="driver_id" class="form-control" required @readonly(true)>
                                                    @foreach ($drivers as $driver)
                                                        <option value="{{ $driver->id }}" {{ $driver->id == $item->driver->id  ? 'selected' : '' }}>{{ $driver->name }}</option>
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
                                                value="{{$item->tanggal_pemesanan}}"
                                                readonly
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

                            @if ( Auth::user()->role == 'admin')
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
                                        <form action="/penggunaan/{{$item->id}}" method="post">
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
                            @endif
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
