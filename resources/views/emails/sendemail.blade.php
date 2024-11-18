<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Pemrograman Web2</title>
</head>
<body style="background-color: #f3f4f6; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 1rem; margin: 0;">
    <div style="background-color: white; border-radius: 0.5rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 32rem; width: 100%;">
        <!-- Header Section -->
        <div style="background-color: #2563eb; color: white; text-align: center; padding: 1rem; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
            <h2 style="font-size: 1.5rem; font-weight: bold;">Hello Email</h2>
        </div>

        <!-- Content Section -->
        <div style="padding: 1.5rem;">
            <p style="font-size: 1.125rem; font-weight: 600; color: #4b5563; margin-bottom: 0.25rem;">Halo, {{ $data['name'] }}</p>
            
            <!-- Message Body -->
            <div style="background-color: #e0f2fe; border: 1px solid #bfdbfe; border-radius: 0.5rem; padding: 1rem; margin-bottom: 1.5rem;">
                <p style="color: #374151;">{{ $data['body'] }}</p>
            </div>
        </div>

        <!-- Footer Section -->
        <div style="background-color: #2563eb; color: white; text-align: center; padding: 1rem; border-bottom-left-radius: 0.5rem; border-bottom-right-radius: 0.5rem;">
            <p>Terima kasih</p>
        </div>
    </div>
</body>
</html>
