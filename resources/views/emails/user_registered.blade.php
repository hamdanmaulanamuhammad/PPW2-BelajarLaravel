<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f7; color: #333; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
        
        <!-- Header Section -->
        <div style="background-color: #007bff; color: #ffffff; padding: 20px; text-align: center;">
            <h1 style="font-size: 24px; margin: 0;">Selamat Datang, {{ $name }}!</h1>
            <p style="margin: 5px 0 0; font-size: 16px;">Anda telah berhasil terdaftar di aplikasi kami</p>
        </div>

        <!-- Content Section -->
        <div style="padding: 30px;">
            <p style="font-size: 16px; color: #333;">Halo, {{ $name }},</p>
            <p style="color: #555;">Terima kasih telah bergabung dengan kami! Berikut adalah informasi akun Anda:</p>

            <!-- User Information -->
            <div style="background-color: #f1f8ff; padding: 15px; border-radius: 8px; margin-top: 10px;">
                <p style="margin: 0; font-size: 16px;"><strong>Nama:</strong> {{ $name }}</p>
                <p style="margin: 0; font-size: 16px;"><strong>Email:</strong> <a href="mailto:{{ $email }}" style="color: #007bff; text-decoration: none;">{{ $email }}</a></p>
                <p style="margin: 0; font-size: 16px;"><strong>Tanggal Pendaftaran:</strong> {{ $registered_at }}</p>
            </div>
        </div>

        <!-- Footer Section -->
        <div style="background-color: #f4f4f7; padding: 20px; text-align: center; font-size: 14px; color: #888;">
            <p style="margin: 0;">Salam hangat,</p>
            <p style="margin: 0; font-weight: bold; color: #333;">Tim Kami</p>
            <hr style="border: none; border-top: 1px solid #ddd; margin: 20px 0;">
            <p style="margin: 0;">© 2024 Your App, Inc. All rights reserved.</p>
            <a href="https://yourapp.com/privacy" style="color: #007bff; text-decoration: none;">Kebijakan Privasi</a> | <a href="https://yourapp.com/terms" style="color: #007bff; text-decoration: none;">Syarat dan Ketentuan</a>
        </div>
    </div>
</body>
</html>
