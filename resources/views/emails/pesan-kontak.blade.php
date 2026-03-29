<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan dari Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 24px;
        }

        .card {
            background: #ffffff;
            max-width: 560px;
            margin: 0 auto;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .header {
            background: #2d7a4f;
            padding: 24px 28px;
        }

        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 18px;
        }

        .header p {
            color: #a7f3d0;
            margin: 4px 0 0;
            font-size: 13px;
        }

        .body {
            padding: 28px;
        }

        .row {
            margin-bottom: 16px;
        }

        .label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #6b7280;
            margin-bottom: 4px;
        }

        .value {
            font-size: 14px;
            color: #111827;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 10px 14px;
        }

        .pesan {
            white-space: pre-wrap;
            line-height: 1.6;
        }

        .footer {
            background: #f9fafb;
            border-top: 1px solid #e5e7eb;
            padding: 16px 28px;
            font-size: 12px;
            color: #9ca3af;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="header">
            <h1>📨 Pesan Baru dari Website</h1>
            <p>MIS Fathul Iman — Formulir Kontak</p>
        </div>
        <div class="body">
            <div class="row">
                <div class="label">Nama Pengirim</div>
                <div class="value">{{ $data['nama'] }}</div>
            </div>
            <div class="row">
                <div class="label">Email</div>
                <div class="value">{{ $data['email'] }}</div>
            </div>
            @if (!empty($data['telepon']))
                <div class="row">
                    <div class="label">Telepon</div>
                    <div class="value">{{ $data['telepon'] }}</div>
                </div>
            @endif
            <div class="row">
                <div class="label">Subjek</div>
                <div class="value">{{ $data['subjek'] }}</div>
            </div>
            <div class="row">
                <div class="label">Pesan</div>
                <div class="value pesan">{{ $data['pesan'] }}</div>
            </div>
        </div>
        <div class="footer">
            Email ini dikirim otomatis dari website MIS Fathul Iman.
            Balas langsung ke email pengirim: {{ $data['email'] }}
        </div>
    </div>
</body>

</html>
