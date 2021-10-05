@extends('template_backend.home')
@section('subjudul','Pengumuman')
@section('content')
<div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image" style="background-image: url('assets/img/unsplash/eberhard-grossgasteiger-1207565-unsplash.jpg');">
                  <div class="hero-inner">
                    <h2>Pengumuman!</h2>
                    <p class="lead">{{$data->pesan}}</p>
                    <div class="mt-4">
                      <a href="{{route('download.announce')}}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-list"></i> Download File</a>
                    </div>
                  </div>
                </div>
              </div>
@endsection
