@extends('template_backend.home')
@section('subjudul','User')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
	{{Session('success')}}
</div>
@endif

 <a href="{{ route('user.create') }}" class="btn btn-info">Tambah User</a>
 <br><br>
 <table class="table table-striped table-hover table-sm table-bordered">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Nama</th>
 			<th>NIP</th>
			 <th>Unit</th>
 			<th>Tipe</th>
 			<th>Action</th>
 		</tr>
 	</thead>
 	<tbody>
@foreach($user as $result => $hasil)
 		<tr>
 			<td>{{ $result + $user->firstitem() }}</td>
 			<td>{{$hasil->name}}</td>
 			<td>{{$hasil->nip}}</td>
			 <td>{{$hasil->unit}}</td>
 			<td>
 				@if($hasil->tipe)
 					<span class="badge badge-secondary">Administrator</span>
 					@else
 					<span class="badge badge-warning">Author</span>
 				@endif
 			</td>
 			<td>
             <form action="{{route('user.destroy',$hasil->id)}}" method="post">
 				@csrf
 				@method('delete')
 				<a href="{{ route('user.edit',$hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
 				<button class="btn btn-danger btn-sm" type="submit">Delete</button>
 				</form>
 			</td>
 		</tr>
@endforeach
 	</tbody>
 </table>
 {{$user->links()}}
@endsection