@extends('template_backend.home')
@section('subjudul','Dashboard')
@section('content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Status Upload Data</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mt-4">
                      <div class="col-12 col-lg-8 offset-lg-2">
                        <div class="wizard-steps">
                        @if($data->path1 != null)
                            <div class="wizard-step wizard-step-success">
                          @else 
                            <div class="wizard-step wizard-step-danger">
                          @endif 
                            <div class="wizard-step-icon">
                              <i class="fas fa-box-open"></i>
                            </div>
                            <div class="wizard-step-label">
                            Laporan Realisasi Anggaran
                            </div>
                            @if($data->path1 == null)
                            <div class="wizard-step-label">
                                <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modal1">Upload Data</button>
                                </div>
                            @endif 
                          </div>
                          @if($data->path2 != null)
                            <div class="wizard-step wizard-step-success">
                          @else 
                            <div class="wizard-step wizard-step-danger">
                          @endif 
                            <div class="wizard-step-icon">
                              <i class="fas fa-server"></i>
                            </div>
                            <div class="wizard-step-label">
                            Laporan Covid	
                            </div>
                            @if($data->path2 == null)
                                <div class="wizard-step-label">
                                <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modal2">Upload Data</button>
                                </div>
                            @endif 
                          </div>
                          @if($data->path3 != null)
                            <div class="wizard-step wizard-step-success">
                          @else 
                            <div class="wizard-step wizard-step-danger">
                          @endif    
                          
                            <div class="wizard-step-icon">
                              <i class="fas fa-book-open"></i>
                            </div>
                            <div class="wizard-step-label">
                            Laporan Posisi Kas
                            </div>
                            @if($data->path3 == null)
                            <div class="wizard-step-label">
                                <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modal3">Upload Data</button>
                                </div>
                            @endif 
                         </div>
                          
                          
                        </div>
                      </div>
                    </div>
                    </div>
                    
        
@endsection
@push('script')
<!-- Modal1 -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Laporan Realisasi Anggaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('post.upload1') }}"  method="post" enctype="multipart/form-data">
                              @csrf
                              <input type="file" name="image1" id="imag1e">
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                          </form>
                        </div>
                    </div>
                    </div>
        </div>
<!-- Modal2 -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Laporan Covid</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('post.upload2') }}"  method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image2" id="image2">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>
        </div>
<!-- Modal3 -->
<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Laporan Posisi Kas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('post.upload3') }}"  method="post" enctype="multipart/form-data">
                              @csrf
                              <input type="file" name="image3" id="image3">
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                          </form>
                        </div>
                    </div>
                    </div>
        </div>
@endpush
