@extends('template_backend.home')
@section('subjudul','Edit User')
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

<form action="{{ route('user.update', $user->id) }}" method="post">
	@csrf
	@method('put')
	<div class="form-group">
		<label for="">User</label>
		<input type="text" class="form-control" name="name" value="{{$user->name}}">
	</div>
	<div class="form-group">
		<label for="">NIP</label>
		<input type="text" class="form-control" name="nip" value="{{$user->nip}}">
	</div>
	<div class="form-group">
		<label for="">Unit  Kerja</label>
		<input type="text" class="form-control" name="unit" value="{{$user->unit}}">
	</div>
	<div class="form-group">
		<label for="">Tipe User</label>
		<select class="form-control" name="tipe">
			<option value="" holder>Pilih Tipe User</option>
			<option value="1" holder
			@if($user->tipe == 1)
			selected
			@endif
			>Administrator</option>
			<option value="0" holder
			@if($user->tipe == 0)
			selected
			@endif
			>Author</option>
		</select>
	</div>
	<div class="form-group">
		<label for="">Password</label>
		<input type="password" class="form-control" name="password">
	</div>
	<div class="form-group">
		<button class="btn btn-primary">Update User</button>
	</div>
</form>
@endsection