<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-400">
<h1 class="text-center text-4xl font-bold text-white mt-8">TABEL BUKU</h1>
<!-- Tabel Buku -->
<div class="flex justify-center mt-8 mx-10">
    <table class="min-w-full max-w-4xl bg-white border border-gray-200 shadow-md rounded-lg mx-4">
        <thead>
            <tr class="bg-gray-100 border-b border-gray-200">
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">No</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ID</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Judul Buku</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Penulis</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Harga</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Tanggal Terbit</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($data_buku as $index => $buku)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-2 text-sm text-gray-700">{{ $index+1 }}</td>
                <td class="px-4 py-2 text-sm text-gray-700">{{ $buku->id }}</td>
                <td class="px-4 py-2 text-sm text-gray-700">{{ $buku->judul }}</td>
                <td class="px-4 py-2 text-sm text-gray-700">{{ $buku->penulis }}</td>
                <td class="px-4 py-2 text-sm text-gray-700">{{ "Rp. " . number_format($buku->harga, 2, ',', '.') }}</td>
                <td class="px-4 py-2 text-sm text-gray-700">{{ $buku->tgl_terbit }}</td>
                <td class="px-4 py-2 text-sm text-gray-700">
                    <!-- Tombol Update -->
                    <a href="{{ route('buku.edit', $buku->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 shadow-md mr-5">
                        Update
                    </a>

                    <!-- Tombol Delete -->
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin mau dihapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 shadow-md">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Tabel Jumlah Buku dan Total Harga Buku -->
<div class="flex justify-center mt-6">
    <div class="grid grid-cols-2 gap-4 max-w-4xl w-full mx-4">
        <!-- Tabel Kecil untuk Jumlah Buku -->
        <table class="min-w-full bg-white border border-gray-200 shadow-md">
            <thead class="bg-gray-100 border-b border-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Jumlah Buku</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $jumlah_buku }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Tabel Kecil untuk Total Harga Buku -->
        <table class="min-w-full bg-white border border-gray-200 shadow-md">
            <thead class="bg-gray-100 border-b border-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Total Harga Buku</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ "Rp. " . number_format($harga_buku, 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Tombol Tambah Buku -->
<div class="flex justify-center mt-8">
    <a href="{{ route('buku.create') }}" class="bg-blue-500 text-white py-4 px-6 rounded-xl hover:bg-blue-600 shadow-md text-center font-bold mb-8">
        Tambah Buku
    </a>
</div>

</body>
</html>
