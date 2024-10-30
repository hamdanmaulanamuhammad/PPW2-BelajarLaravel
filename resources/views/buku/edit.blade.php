<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mx-auto p-6 max-w-lg bg-white shadow-md rounded-lg">
    <h4 class="text-2xl font-bold mb-4">Edit Buku</h4>
    <form method="POST" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" id="judul" name="judul" value="{{ $buku->judul }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        </div>
        <div class="mb-4">
            <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
            <input type="text" id="penulis" name="penulis" value="{{ $buku->penulis }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        </div>
        <div class="mb-4">
            <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
            <input type="text" id="harga" name="harga" value="{{ $buku->harga }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        </div>
        <div class="mb-4">
            <label for="tgl_terbit" class="block text-sm font-medium text-gray-700">Tanggal Terbit</label>
            <input type="date" id="tgl_terbit" name="tgl_terbit" value="{{ $buku->tgl_terbit }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        </div>
        <div class="mb-4">
            <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Buku</label>
            <input type="file" id="gambar" name="gambar" class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            
            <!-- Menampilkan gambar saat ini jika ada -->
            @if($buku->gambar)
                <div class="mt-3">
                    <p class="text-sm text-gray-600">Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $buku->gambar) }}" alt="Gambar Buku" class="w-32 h-auto rounded-md">
                </div>
            @endif
        </div>
        <div class="flex justify-between items-center">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Update</button>
            <a href="{{ url('/buku') }}" class="text-blue-500 hover:underline">Kembali</a>
        </div>
    </form>
</div>
</body>
</html>
