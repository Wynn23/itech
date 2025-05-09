@extends('admin.layout.main')

@section('title', 'Tambah Artikel')

@section('content')
<div class="container mt-4">
    <h2>Tambah Artikel</h2>

    <form action="{{ route('admin.artikel.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Isi Artikel</label>
            <textarea name="isi" id="isi_artikel" class="form-control" rows="6" required></textarea>
        </div>
        <div class="mb-3">
            <label>Author</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection

{{-- Letakkan script CKEditor di section terpisah --}}
@section('scripts')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('isi_artikel');
</script>
@endsection
