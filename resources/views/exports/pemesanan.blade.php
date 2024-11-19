<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h3>Laporan Pemesanan Kendaraan</h3>
    <p>Periode: {{ $startDate }} - {{ $endDate }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kendaraan</th>
                <th>Driver</th>
                <th>Dipesan Oleh</th>
                <th>Disetujui Oleh</th>
                <th>Tanggal Pemesanan</th>
                <th>Keterangan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $booking)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $booking->kendaraan->nama_kendaraan ?? '-' }}</td>
                    <td>{{ $booking->driver->name ?? '-' }}</td>
                    <td>{{ $booking->bookedBy->name ?? '-' }}</td>
                    <td>{{ $booking->approvedBy->name ?? '-' }}</td>
                    <td>{{ $booking->tanggal_pemesanan }}</td>
                    <td>{{ $booking->keterangan }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
