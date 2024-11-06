<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Berhasil</title>
    <style>
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #007bff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Pendaftaran Berhasil</h1>
    <p>Halo {{ $nama }},</p>
    <p>Terima kasih telah mendaftar. Anda dapat memeriksa status pendaftaran Anda dengan mengklik tombol berikut:</p>
    <p><a href="{{ $statusLink }}" class="button">Cek Status Pendaftaran</a></p>
    <p>Salam,</p>
    <p>Admin PAUD Bunga Pandan</p>
</body>
</html>
