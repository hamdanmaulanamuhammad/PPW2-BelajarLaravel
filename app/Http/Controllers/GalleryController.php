<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryPost;
use Illuminate\Support\Facades\Storage;



class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'id' => "posts",
            'menu' => 'Gallery',
            'galleries' => GalleryPost::where('picture', '!=', '')
                                ->whereNotNull('picture')
                                ->orderBy('created_at', 'desc')
                                ->paginate(30)
        );
        return view('gallery.gallery')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'picture' => 'image|nullable|max:1999'
        ]);

        // Cek apakah ada file gambar yang di-upload
        if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $basename = uniqid() . '_' . time();
            $smallFilename = "small_{$basename}.{$extension}";
            $mediumFilename = "medium_{$basename}.{$extension}";
            $largeFilename = "large_{$basename}.{$extension}";
            $filenameSimpan = "{$basename}.{$extension}";

            $path = $request->file('picture')->storeAs('posts_image', $filenameSimpan);
        } else {
            $filenameSimpan = 'noimage.png';
        }

        // Simpan data ke database
        $post = new GalleryPost();
        $post->picture = $filenameSimpan;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();

        // Redirect ke halaman gallery dengan pesan sukses
        return redirect('gallery')->with('success', 'Berhasil menambahkan data baru');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = GalleryPost::findOrFail($id);
        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'picture' => 'image|nullable|max:1999'
        ]);
    
        $gallery = GalleryPost::findOrFail($id);
        
        // Jika gambar baru diupload, maka update
        if ($request->hasFile('picture')) {
            // Hapus gambar lama
            if ($gallery->picture && $gallery->picture != 'noimage.png') {
                Storage::delete('posts_image/' . $gallery->picture);
            }
    
            // Upload gambar baru
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $extension = $request->file('picture')->getClientOriginalExtension();
            $basename = uniqid() . '_' . time();
            $filenameSimpan = "{$basename}.{$extension}";
            $path = $request->file('picture')->storeAs('posts_image', $filenameSimpan);
            $gallery->picture = $filenameSimpan;
        }
    
        // Update title dan description
        $gallery->title = $request->input('title');
        $gallery->description = $request->input('description');
        $gallery->save();
    
        return redirect()->route('gallery.index')->with('success', 'Gambar berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = GalleryPost::findOrFail($id);

        // Hapus gambar dari storage jika bukan gambar default
        if ($gallery->picture && $gallery->picture != 'noimage.png') {
            Storage::delete('posts_image/' . $gallery->picture);
        }
    
        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Gambar berhasil dihapus');
    }
}
