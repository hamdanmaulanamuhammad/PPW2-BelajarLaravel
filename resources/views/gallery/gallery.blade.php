@extends('auth.layouts')
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Dashboard</span>
                <a href="{{ route('gallery.create') }}" class="btn btn-primary btn-sm">Tambah Gambar</a>
            </div>
            <div class="card-body">
                <div class="row">
                    @if(count($galleries) > 0)
                        @foreach ($galleries as $gallery)
                            <div class="col-sm-3 mb-4">
                                <div class="text-center" style="padding: 10px; border: 1px solid #ddd; border-radius: 8px;">
                                    <a href="{{ asset('storage/posts_image/' . $gallery->picture) }}" data-lightbox="roadtrip" data-title="{{ $gallery->description }}">
                                        <img src="{{ asset('storage/posts_image/' . $gallery->picture) }}" class="img-fluid mb-2" alt="image" style="width: 100px; height: 150px; object-fit: cover; border-radius: 5px;">
                                    </a>
                                    <div class="d-flex justify-content-evenly mt-2">
                                        <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                        <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus gambar ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h3>Tidak ada data.</h3>
                    @endif
                </div>
                <div class="d-flex">
                    {{ $galleries->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
