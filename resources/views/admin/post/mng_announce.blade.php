@extends('template_backend.home')
@section('subjudul','Tambah User')
@section('content')

<form action="{{ route('post.announce') }}" method="post" enctype="multipart/form-data">
	@csrf
    <label for="pesan">Pesan</label>
	<div class="form-group">
        <textarea name="pesan" id="pesan" cols="100" rows="3"></textarea>
	</div>
	<div class="form-group">
		<label for="">File</label>
		<input type="file" name="file_announce">
	</div>
	<div class="form-group">
		<button class="btn btn-primary">Buat Pengumuman</button>
	</div>
</form>
@endsection