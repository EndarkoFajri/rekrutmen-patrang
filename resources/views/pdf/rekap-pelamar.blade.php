<!DOCTYPE html>
<html>
<head>
    <title>Rekap Pelamar Universitas Patrang</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
    </style>
</head>
<body>
    <h2>REKAPITULASI PELAMAR UNIVERSITAS PATRANG</h2>
    <p>Tanggal Cetak: {{ date('d-m-Y H:i') }} WIB</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelamar</th>
                <th>Email</th>
                <th>Posisi Lowongan</th>
                <th>Status</th>
                <th>Tgl Melamar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $index => $app)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $app->user->name ?? '-' }}</td>
                <td>{{ $app->user->email ?? '-' }}</td>
                <td>{{ $app->job->title ?? '-' }}</td>
                <td>{{ strtoupper($app->status) }}</td>
                <td>{{ $app->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>