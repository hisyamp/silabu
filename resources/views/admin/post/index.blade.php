@extends('template_backend.home')
@section('subjudul','Data File')
@section('content')

<div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Latest Posts</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-primary">View All</a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Unit</th>
                          <th>Laporan Realisasi Anggaran</th>
                          <th>Laporan Covid</th>
                          <th>Laporan Posisi Kas</th>
                        </tr>
                      </thead>
                      <tbody>   
                    @foreach($data as $file)                      
                        <tr>
                          <td>
                            <a href="#" class="font-weight-600"><img src="assets/img/avatar/avatar-1.png" alt="avatar" width="30" class="rounded-circle mr-1">{{$file->name}}</a>
                          </td>
                          <td>{{$file->unit}}</td>
                          <td>
                            @if($file->path1 != null)
                              <a href="{{url('download1',$file->id)}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Download"><i class="fas fa-download"></i></a>
                            @else
                                <h4>-</h4>
                            @endif
                            
                          </td>
                          <td>
                            @if($file->path2 != null)
                            <a href="{{url('download2',$file->id)}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Download"><i class="fas fa-download"></i></a>
                            @else
                            <h4>-</h4>
                            @endif
                            
                          </td>
                          <td>
                            @if($file->path3 != null)
                            <a href="{{url('download3',$file->id)}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Download"><i class="fas fa-download"></i></a>  
                            @else
                            <h4>-</h4>
                            @endif                         
                          </td>
                          <!-- <td>{{(number_format($file->size1 / 1024,1))}} Kb</td>
                          <td>
                            <a href="{{url('delete',$file->id)}}" class="btn btn-danger btn-action trigger--fire-modal-1" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fas fa-trash"></i></a>
                          </td> --> 
                        </tr>
                    @endforeach
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
</div>

<!-- <div>
    <form action="{{ route('post.upload1') }}"  method="post" enctype="multipart/form-data">
        @csrf
    <input type="file" name="image" id="image">
    <button type="submit">Submit</button>
    </form>
</div> -->

@endsection