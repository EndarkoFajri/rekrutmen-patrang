<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'Plus Jakarta Sans', Arial, sans-serif; background-color: #f2f7fb; color: #334155; margin: 0; padding: 20px; }
        .container { max-width: 600px; background-color: #ffffff; margin: 0 auto; border-radius: 16px; overflow: hidden; border: 1px solid #e2e8f0; }
        .header { background-color: #2596be; padding: 24px; text-align: center; color: #ffffff; }
        .header h1 { margin: 0; font-size: 20px; font-weight: 800; }
        .body { padding: 32px; line-height: 1.6; font-size: 14px; }
        .badge { display: inline-block; padding: 8px 16px; border-radius: 20px; font-weight: bold; font-size: 13px; margin: 12px 0; }
        .badge-success { background-color: #dcfce7; color: #15803d; }
        .badge-warning { background-color: #fef3c7; color: #b45309; }
        .badge-danger { background-color: #ffe4e6; color: #be123c; }
        .btn { display: inline-block; padding: 12px 24px; background-color: #2596be; color: #ffffff !important; text-decoration: none; border-radius: 12px; font-weight: 700; font-size: 13px; }
        .footer { background-color: #f8fafc; padding: 20px; text-align: center; font-size: 12px; color: #94a3b8; border-top: 1px solid #f1f5f9; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎓 Universitas Patrang</h1>
        </div>
        
        <div class="body">
            <p>Assalamualaikum <strong>{{ $application->user->name ?? 'Pelamar' }}</strong>,</p>

            @php
                $status = strtolower($application->status);
            @endphp

            @if($status === 'interview' || $status === 'wawancara')
                <p>Selamat! Anda dinyatakan <strong>LOLOS</strong> seleksi tahap awal untuk posisi <strong>{{ $application->job->title ?? 'Pekerjaan' }}</strong> dan diundang untuk mengikuti tahap wawancara.</p>
                <div style="text-align: center;">
                    <span class="badge badge-warning">Tahap Wawancara</span>
                </div>
            @elseif($status === 'accepted' || $status === 'diterima')
                <p>Selamat! Anda resmi <strong>DITERIMA</strong> bergabung di Universitas Patrang untuk posisi <strong>{{ $application->job->title ?? 'Pekerjaan' }}</strong>.</p>
                <div style="text-align: center;">
                    <span class="badge badge-success">Diterima</span>
                </div>
            @elseif($status === 'rejected' || $status === 'ditolak')
                <p>Mohon maaf, setelah melalui proses evaluasi, Anda belum dapat kami lanjutkan ke tahap berikutnya untuk posisi <strong>{{ $application->job->title ?? 'Pekerjaan' }}</strong>.</p>
                <div style="text-align: center;">
                    <span class="badge badge-danger">Ditolak</span>
                </div>
            @else
                <p>Ada pembaruan status pada lamaran Anda untuk posisi <strong>{{ $application->job->title ?? 'Pekerjaan' }}</strong>.</p>
                <div style="text-align: center;">
                    <span class="badge badge-warning">{{ ucfirst($application->status) }}</span>
                </div>
            @endif

            <p>Silakan masuk ke portal rekrutmen untuk melihat jadwal dan rincian informasi selengkapnya:</p>

            <!-- TOMBOL DIUBAH MENJADI PRESISI DI TENGAH -->
            <div style="text-align: center; margin: 24px 0;">
                <a href="{{ url('/my-applications/' . $application->id) }}" class="btn">
                    Lihat Status Lamaran &rarr;
                </a>
            </div>

            <p style="margin-top: 24px; font-size: 13px; color: #64748b;">
                Wassalamu'alaikum Warahmatullahi Wabarakatuh,<br>
                <strong>Tim Rekrutmen Universitas Patrang</strong>
            </p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} Universitas Patrang. Seluruh hak cipta dilindungi undang-undang.
        </div>
    </div>
</body>
</html>