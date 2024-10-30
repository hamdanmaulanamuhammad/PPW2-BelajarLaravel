<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Menggunakan Storage untuk menyimpan file

class BukuController extends Controller
{

    public function __construct()
     {
        $this->middleware('auth');
        $this->middleware('admin');
     }
     
    public function index()
    {
        $data_buku = Buku::orderByDesc('id')->get();
        $jumlah_buku = Buku::count();
        $harga_buku = Buku::sum('harga');

        return view('buku', compact('data_buku', 'jumlah_buku', 'harga_buku'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
            'gambar' => 'image|nullable|max:1999' // Validasi untuk gambar
        ]);

        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;

        if ($request->hasFile('gambar')) {
            // Menyimpan gambar di storage/app/gambar_buku
            $path = $request->file('gambar')->store('gambar_buku');
            $buku->gambar = $path; // Menyimpan path ke database
        }

        $buku->save();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
            'gambar' => 'image|nullable|max:1999' // Validasi untuk gambar saat update
        ]);

        $buku = Buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;

        if ($request->hasFile('gambar')) {
            // Menghapus gambar lama jika ada
            if ($buku->gambar) {
                Storage::delete($buku->gambar);
            }

            // Menyimpan gambar baru di storage/app/gambar_buku
            $path = $request->file('gambar')->store('gambar_buku');
            $buku->gambar = $path;
        }

        $buku->save();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        // Menghapus gambar dari penyimpanan jika ada
        if ($buku->gambar) {
            Storage::delete($buku->gambar);
        }

        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
