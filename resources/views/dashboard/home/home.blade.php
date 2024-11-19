@extends('dashboard.layouts')

@section('main')
<div class="container">
    <div class="page-inner">
      <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
          <h3 class="fw-bold mb-3">Dashboard</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
           {{-- available content --}}
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                      <div class="card-title">Grafik Booking Kendaraan</div>
                      <div class="card-tools">
                        {{-- conth --}}
                        <!-- Button trigger modal -->

                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'staff' )
                        <button type="button" class="btn btn-label-success btn-round btn-sm me-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <span class="btn-label">
                                <i class="fa fa-pencil"></i>
                              </span>
                              Export
                        </button>
                        @endif


                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="GET" action="/export-pemesanan" class="p-4 bg-light rounded shadow-sm">
                                            <div class="row g-3">
                                                <!-- Start Date -->
                                                <div class="col-md-6">
                                                    <label for="start_date" class="form-label">Start Date:</label>
                                                    <input type="date" id="start_date" name="start_date" class="form-control" required>
                                                </div>

                                                <!-- End Date -->
                                                <div class="col-md-6">
                                                    <label for="end_date" class="form-label">End Date:</label>
                                                    <input type="date" id="end_date" name="end_date" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-file-export me-2"></i> Export to Excel
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- contoh --}}
                      </div>
                    </div>
                  </div>
                  <div class="mt-5">
                    <canvas id="bookingChart"></canvas>
                  </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
      const ctx = document.getElementById('bookingChart').getContext('2d');

        fetch('/getchart')
            .then(response => response.json())
            .then(data => {
                const bookingChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Total Kendaraan digunakan :',
                            data: data.data,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching chart data:', error));

  </script>
@endsection

