@extends('template_backend.home')
@section('subjudul','Tambah User')
@section('content')

@if(count($errors)>0)
 @foreach($errors->all() as $error)
 <div class="alert alert-danger" role="alert">
 	{{ $error }}
 </div>
 @endforeach
@endif

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
	{{Session('success')}}
</div>
 
@endif

<form action="{{ route('user.store') }}" method="post">
	@csrf
	<div class="form-group">
		<label for="">Nama</label>
		<input type="text" class="form-control" name="name">
	</div>
	<div class="form-group">
		<label for="">NIP</label>
		<input type="text" class="form-control" name="nip">
	</div>
	<div class="form-group">
		<label for="">Unit  Kerja</label>
		<input type="text" class="form-control" name="unit">
	</div>
	<div class="form-group">
		<label for="">Tipe User</label>
		<select class="form-control" name="tipe">
			<option value="" holder>Pilih Tipe User</option>
			<option value="1" holder>Administrator</option>
			<option value="0" holder>Author</option>
		</select>
	</div>
	<div class="form-group">
		<label for="">Password</label>
		<input type="password" class="form-control" name="password">
	</div>
	<div class="form-group">
		<button class="btn btn-primary">Simpan User</button>
	</div>
</form>
@endsection