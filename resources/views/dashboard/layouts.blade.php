<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="/home" class="logo">
              <img
                src="assets/img/kaiadmin/logo_light.svg"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Menu</h4>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#kendaraan">
                  <i class="fas fa-book-open"></i>
                  <p>Kendaraan</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="kendaraan">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="/kendaraan">
                        <span class="sub-item">Unit</span>
                      </a>
                    </li>
                    <li>
                      <a href="/pemakaian">
                        <span class="sub-item">Pemakaian Bahan Bakar</span>
                      </a>
                    </li>
                    <li>
                      <a href="/servis">
                        <span class="sub-item">Servis Kendaraan</span>
                      </a>
                    </li>
                    <li>
                     <a href="/riwayat">
                        <span class="sub-item">Riwayat Penggunaan</span>
                     </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-car-side"></i>
                  <p>Booking</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="/entry">
                        <span class="sub-item">Entry Data</span>
                      </a>
                    </li>
                    @if (Auth::user()->role == 'admin')
                    <li>
                        <a href="/pemesanan">
                          <span class="sub-item">Persetujuan</span>
                        </a>
                    </li>
                    @endif

                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'driver')
                    <li>
                        <a href="/penggunaan">
                          <span class="sub-item">Penggunaan kendaraan</span>
                        </a>
                    </li>
                    @endif
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts">
                  <i class="fas fa-user"></i>
                  <p>User Data</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="sidebar-style-2.html">
                        <span class="sub-item">Driver</span>
                      </a>
                    </li>
                    <li>
                      <a href="icon-menu.html">
                        <span class="sub-item">Staff</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="assets/img/profile.jpg"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold">{{ Auth::user()->name }}</span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img
                              src="assets/img/profile.jpg"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4>{{ Auth::user()->name }}</h4>
                            <p class="text-muted">hello@example.com</p>
                            <form action="{{route('logout')}}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-xs btn-secondary btn-sm">Logout</button>
                          </form>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">My Profile</a>
                        <a class="dropdown-item" href="#">My Balance</a>
                        <a class="dropdown-item" href="#">Inbox</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Account Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>
        {{-- container --}}
        @yield('main')
        {{-- container --}}

        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <div class="copyright">
              2024, made with <i class="fa fa-heart heart text-danger"></i> by
               Ghozy Nouval Satya Prasaja
            </div>
            <div>
              Template Distributed byThemeWagon
            </div>
          </div>
        </footer>
      </div>




      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>
     <script>
        $(document).ready(function () {
          $("#basic-datatables").DataTable({});

          $("#multi-filter-select").DataTable({
            pageLength: 5,
            initComplete: function () {
              this.api()
                .columns()
                .every(function () {
                  var column = this;
                  var select = $(
                    '<select class="form-select"><option value=""></option></select>'
                  )
                    .appendTo($(column.footer()).empty())
                    .on("change", function () {
                      var val = $.fn.dataTable.util.escapeRegex($(this).val());

                      column
                        .search(val ? "^" + val + "$" : "", true, false)
                        .draw();
                    });

                  column
                    .data()
                    .unique()
                    .sort()
                    .each(function (d, j) {
                      select.append(
                        '<option value="' + d + '">' + d + "</option>"
                      );
                    });
                });
            },
          });

          // Add Row
          $("#add-row").DataTable({
            pageLength: 5,
          });

          var action =
            '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

          $("#addRowButton").click(function () {
            $("#add-row")
              .dataTable()
              .fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action,
              ]);
            $("#addRowModal").modal("hide");
          });
        });
      </script>
       <script>
        var lineChart = document.getElementById("lineChart").getContext("2d"),
          barChart = document.getElementById("barChart").getContext("2d"),
          pieChart = document.getElementById("pieChart").getContext("2d"),
          doughnutChart = document
            .getElementById("doughnutChart")
            .getContext("2d"),
          radarChart = document.getElementById("radarChart").getContext("2d"),
          bubbleChart = document.getElementById("bubbleChart").getContext("2d"),
          multipleLineChart = document
            .getElementById("multipleLineChart")
            .getContext("2d"),
          multipleBarChart = document
            .getElementById("multipleBarChart")
            .getContext("2d"),
          htmlLegendsChart = document
            .getElementById("htmlLegendsChart")
            .getContext("2d");

        var myLineChart = new Chart(lineChart, {
          type: "line",
          data: {
            labels: [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "May",
              "Jun",
              "Jul",
              "Aug",
              "Sep",
              "Oct",
              "Nov",
              "Dec",
            ],
            datasets: [
              {
                label: "Active Users",
                borderColor: "#1d7af3",
                pointBorderColor: "#FFF",
                pointBackgroundColor: "#1d7af3",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: "transparent",
                fill: true,
                borderWidth: 2,
                data: [
                  542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 900,
                ],
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
              position: "bottom",
              labels: {
                padding: 10,
                fontColor: "#1d7af3",
              },
            },
            tooltips: {
              bodySpacing: 4,
              mode: "nearest",
              intersect: 0,
              position: "nearest",
              xPadding: 10,
              yPadding: 10,
              caretPadding: 10,
            },
            layout: {
              padding: { left: 15, right: 15, top: 15, bottom: 15 },
            },
          },
        });

        var myBarChart = new Chart(barChart, {
          type: "bar",
          data: {
            labels: [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "May",
              "Jun",
              "Jul",
              "Aug",
              "Sep",
              "Oct",
              "Nov",
              "Dec",
            ],
            datasets: [
              {
                label: "Sales",
                backgroundColor: "rgb(23, 125, 255)",
                borderColor: "rgb(23, 125, 255)",
                data: [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4],
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              yAxes: [
                {
                  ticks: {
                    beginAtZero: true,
                  },
                },
              ],
            },
          },
        });

        var myPieChart = new Chart(pieChart, {
          type: "pie",
          data: {
            datasets: [
              {
                data: [50, 35, 15],
                backgroundColor: ["#1d7af3", "#f3545d", "#fdaf4b"],
                borderWidth: 0,
              },
            ],
            labels: ["New Visitors", "Subscribers", "Active Users"],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
              position: "bottom",
              labels: {
                fontColor: "rgb(154, 154, 154)",
                fontSize: 11,
                usePointStyle: true,
                padding: 20,
              },
            },
            pieceLabel: {
              render: "percentage",
              fontColor: "white",
              fontSize: 14,
            },
            tooltips: false,
            layout: {
              padding: {
                left: 20,
                right: 20,
                top: 20,
                bottom: 20,
              },
            },
          },
        });

        var myDoughnutChart = new Chart(doughnutChart, {
          type: "doughnut",
          data: {
            datasets: [
              {
                data: [10, 20, 30],
                backgroundColor: ["#f3545d", "#fdaf4b", "#1d7af3"],
              },
            ],

            labels: ["Red", "Yellow", "Blue"],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
              position: "bottom",
            },
            layout: {
              padding: {
                left: 20,
                right: 20,
                top: 20,
                bottom: 20,
              },
            },
          },
        });

        var myRadarChart = new Chart(radarChart, {
          type: "radar",
          data: {
            labels: ["Running", "Swimming", "Eating", "Cycling", "Jumping"],
            datasets: [
              {
                data: [20, 10, 30, 2, 30],
                borderColor: "#1d7af3",
                backgroundColor: "rgba(29, 122, 243, 0.25)",
                pointBackgroundColor: "#1d7af3",
                pointHoverRadius: 4,
                pointRadius: 3,
                label: "Team 1",
              },
              {
                data: [10, 20, 15, 30, 22],
                borderColor: "#716aca",
                backgroundColor: "rgba(113, 106, 202, 0.25)",
                pointBackgroundColor: "#716aca",
                pointHoverRadius: 4,
                pointRadius: 3,
                label: "Team 2",
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
              position: "bottom",
            },
          },
        });

        var myBubbleChart = new Chart(bubbleChart, {
          type: "bubble",
          data: {
            datasets: [
              {
                label: "Car",
                data: [
                  { x: 25, y: 17, r: 25 },
                  { x: 30, y: 25, r: 28 },
                  { x: 35, y: 30, r: 8 },
                ],
                backgroundColor: "#716aca",
              },
              {
                label: "Motorcycles",
                data: [
                  { x: 10, y: 17, r: 20 },
                  { x: 30, y: 10, r: 7 },
                  { x: 35, y: 20, r: 10 },
                ],
                backgroundColor: "#1d7af3",
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
              position: "bottom",
            },
            scales: {
              yAxes: [
                {
                  ticks: {
                    beginAtZero: true,
                  },
                },
              ],
              xAxes: [
                {
                  ticks: {
                    beginAtZero: true,
                  },
                },
              ],
            },
          },
        });

        var myMultipleLineChart = new Chart(multipleLineChart, {
          type: "line",
          data: {
            labels: [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "May",
              "Jun",
              "Jul",
              "Aug",
              "Sep",
              "Oct",
              "Nov",
              "Dec",
            ],
            datasets: [
              {
                label: "Python",
                borderColor: "#1d7af3",
                pointBorderColor: "#FFF",
                pointBackgroundColor: "#1d7af3",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: "transparent",
                fill: true,
                borderWidth: 2,
                data: [30, 45, 45, 68, 69, 90, 100, 158, 177, 200, 245, 256],
              },
              {
                label: "PHP",
                borderColor: "#59d05d",
                pointBorderColor: "#FFF",
                pointBackgroundColor: "#59d05d",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: "transparent",
                fill: true,
                borderWidth: 2,
                data: [10, 20, 55, 75, 80, 48, 59, 55, 23, 107, 60, 87],
              },
              {
                label: "Ruby",
                borderColor: "#f3545d",
                pointBorderColor: "#FFF",
                pointBackgroundColor: "#f3545d",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: "transparent",
                fill: true,
                borderWidth: 2,
                data: [10, 30, 58, 79, 90, 105, 117, 160, 185, 210, 185, 194],
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
              position: "top",
            },
            tooltips: {
              bodySpacing: 4,
              mode: "nearest",
              intersect: 0,
              position: "nearest",
              xPadding: 10,
              yPadding: 10,
              caretPadding: 10,
            },
            layout: {
              padding: { left: 15, right: 15, top: 15, bottom: 15 },
            },
          },
        });

        var myMultipleBarChart = new Chart(multipleBarChart, {
          type: "bar",
          data: {
            labels: [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "May",
              "Jun",
              "Jul",
              "Aug",
              "Sep",
              "Oct",
              "Nov",
              "Dec",
            ],
            datasets: [
              {
                label: "First time visitors",
                backgroundColor: "#59d05d",
                borderColor: "#59d05d",
                data: [95, 100, 112, 101, 144, 159, 178, 156, 188, 190, 210, 245],
              },
              {
                label: "Visitors",
                backgroundColor: "#fdaf4b",
                borderColor: "#fdaf4b",
                data: [
                  145, 256, 244, 233, 210, 279, 287, 253, 287, 299, 312, 356,
                ],
              },
              {
                label: "Pageview",
                backgroundColor: "#177dff",
                borderColor: "#177dff",
                data: [
                  185, 279, 273, 287, 234, 312, 322, 286, 301, 320, 346, 399,
                ],
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
              position: "bottom",
            },
            title: {
              display: true,
              text: "Traffic Stats",
            },
            tooltips: {
              mode: "index",
              intersect: false,
            },
            responsive: true,
            scales: {
              xAxes: [
                {
                  stacked: true,
                },
              ],
              yAxes: [
                {
                  stacked: true,
                },
              ],
            },
          },
        });

        // Chart with HTML Legends

        var gradientStroke = htmlLegendsChart.createLinearGradient(
          500,
          0,
          100,
          0
        );
        gradientStroke.addColorStop(0, "#177dff");
        gradientStroke.addColorStop(1, "#80b6f4");

        var gradientFill = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
        gradientFill.addColorStop(0, "rgba(23, 125, 255, 0.7)");
        gradientFill.addColorStop(1, "rgba(128, 182, 244, 0.3)");

        var gradientStroke2 = htmlLegendsChart.createLinearGradient(
          500,
          0,
          100,
          0
        );
        gradientStroke2.addColorStop(0, "#f3545d");
        gradientStroke2.addColorStop(1, "#ff8990");

        var gradientFill2 = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
        gradientFill2.addColorStop(0, "rgba(243, 84, 93, 0.7)");
        gradientFill2.addColorStop(1, "rgba(255, 137, 144, 0.3)");

        var gradientStroke3 = htmlLegendsChart.createLinearGradient(
          500,
          0,
          100,
          0
        );
        gradientStroke3.addColorStop(0, "#fdaf4b");
        gradientStroke3.addColorStop(1, "#ffc478");

        var gradientFill3 = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
        gradientFill3.addColorStop(0, "rgba(253, 175, 75, 0.7)");
        gradientFill3.addColorStop(1, "rgba(255, 196, 120, 0.3)");

        var myHtmlLegendsChart = new Chart(htmlLegendsChart, {
          type: "line",
          data: {
            labels: [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "May",
              "Jun",
              "Jul",
              "Aug",
              "Sep",
              "Oct",
              "Nov",
              "Dec",
            ],
            datasets: [
              {
                label: "Subscribers",
                borderColor: gradientStroke2,
                pointBackgroundColor: gradientStroke2,
                pointRadius: 0,
                backgroundColor: gradientFill2,
                legendColor: "#f3545d",
                fill: true,
                borderWidth: 1,
                data: [
                  154, 184, 175, 203, 210, 231, 240, 278, 252, 312, 320, 374,
                ],
              },
              {
                label: "New Visitors",
                borderColor: gradientStroke3,
                pointBackgroundColor: gradientStroke3,
                pointRadius: 0,
                backgroundColor: gradientFill3,
                legendColor: "#fdaf4b",
                fill: true,
                borderWidth: 1,
                data: [
                  256, 230, 245, 287, 240, 250, 230, 295, 331, 431, 456, 521,
                ],
              },
              {
                label: "Active Users",
                borderColor: gradientStroke,
                pointBackgroundColor: gradientStroke,
                pointRadius: 0,
                backgroundColor: gradientFill,
                legendColor: "#177dff",
                fill: true,
                borderWidth: 1,
                data: [
                  542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 900,
                ],
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
              display: false,
            },
            tooltips: {
              bodySpacing: 4,
              mode: "nearest",
              intersect: 0,
              position: "nearest",
              xPadding: 10,
              yPadding: 10,
              caretPadding: 10,
            },
            layout: {
              padding: { left: 15, right: 15, top: 15, bottom: 15 },
            },
            scales: {
              yAxes: [
                {
                  ticks: {
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "500",
                    beginAtZero: false,
                    maxTicksLimit: 5,
                    padding: 20,
                  },
                  gridLines: {
                    drawTicks: false,
                    display: false,
                  },
                },
              ],
              xAxes: [
                {
                  gridLines: {
                    zeroLineColor: "transparent",
                  },
                  ticks: {
                    padding: 20,
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "500",
                  },
                },
              ],
            },
            legendCallback: function (chart) {
              var text = [];
              text.push('<ul class="' + chart.id + '-legend html-legend">');
              for (var i = 0; i < chart.data.datasets.length; i++) {
                text.push(
                  '<li><span style="background-color:' +
                    chart.data.datasets[i].legendColor +
                    '"></span>'
                );
                if (chart.data.datasets[i].label) {
                  text.push(chart.data.datasets[i].label);
                }
                text.push("</li>");
              }
              text.push("</ul>");
              return text.join("");
            },
          },
        });

        var myLegendContainer = document.getElementById("myChartLegend");

        // generate HTML legend
        myLegendContainer.innerHTML = myHtmlLegendsChart.generateLegend();

        // bind onClick event to all LI-tags of the legend
        var legendItems = myLegendContainer.getElementsByTagName("li");
        for (var i = 0; i < legendItems.length; i += 1) {
          legendItems[i].addEventListener("click", legendClickCallback, false);
        }
      </script>
  </body>
</html>
