@extends('admin.layouts.master')
@section('title','Edit About Us Banner')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-image"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Banner</h1>
                  <small>Edit Banners</small>
               </div>
            </section>

            @if(Session::has('flash_message_error'))
                 <div class="alert alert-sm alert-danger alert-block" role="alert">
                    <button type="button" class = "close" data-sidmiss="alert" arial-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                 </div>
                @endif
                @if(Session::has('flash_message_success'))
                 <div class="alert alert-sm alert-success alert-block" role="alert">
                    <button type="button" class = "close" data-sidmiss="alert" arial-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                 </div>
                @endif

            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{url('admin/aboutus_banner')}}"> 
                              <i class="fa fa-eye"></i>  VIew About Us Banners </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                        <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/edit-aboutus_banner/'.$aboutusbannerDetails->id)}}" method="post">
                                {{csrf_field()}}
                              <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" class="form-control" value="{{$aboutusbannerDetails->banner_name}}" name="banner_name" id="banner_name" required>
                              </div>
                              <div class="form-group">
                                         <label>Banner Image</label>
                                         <input type="file" name="banner_image">
                                         @if(!empty($aboutusbannerDetails->banner_image))
                                        <input type="hidden" name="current_banner_image" value="{{ $aboutusbannerDetails->banner_image }}"> 
                                        <img src="{{ asset('uploads/aboutus_banners/'.$aboutusbannerDetails->banner_image) }}" style="width:250px;">
                                        @endif
                                      </div>

                              <div class="reset-button">
                                <input type="submit"  class="btn btn-success" value="Update banner">
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->


@endsection
