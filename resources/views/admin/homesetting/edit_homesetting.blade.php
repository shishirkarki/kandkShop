@extends('admin.layouts.master')
@section('title','Edit Home Setting')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-image"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Home Setting</h1>
                  <small>Edit Home Settings</small>
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
                           <a class="btn btn-add " href="{{url('admin/homesettings')}}"> 
                              <i class="fa fa-eye"></i>  VIew Home Setting </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                        <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/edit-homesetting/'.$homesettingDetails->id)}}" method="post">
                                {{csrf_field()}}
                              <div class="form-group">
                                 <label>Address</label>
                                 <input type="text" class="form-control"value="{{$homesettingDetails->address}}" name="address" id="address" required>
                              </div>
                              <div class="form-group">
                                 <label>Phone Number</label>
                                 <input type="text" class="form-control" value="{{$homesettingDetails->phone_no}}" name="phone_no" id="phone_no" required>
                              </div>
                              <div class="form-group">
                                 <label>Gmail</label>
                                 <input type="gmail" class="form-control" value="{{$homesettingDetails->gmail}}" name ="gmail" id ="gmail" required>
                              </div>
                              <div class="form-group">
                                 <label>Facebook</label>
                                 <input type="text" class="form-control" value="{{$homesettingDetails->facebook}}" name ="facebook" id ="facebook" required>
                              </div>
                              <div class="form-group">
                                 <label>Twitter</label>
                                 <input type="text" class="form-control" value="{{$homesettingDetails->twitter}}" name ="twitter" id ="twitter" required>
                              </div>
                              <div class="form-group">
                                 <label>Instagram</label>
                                 <input type="text" class="form-control" value="{{$homesettingDetails->instagram}}" name ="instagram" id ="instagram" required>
                              </div>
                              <div class="form-group">
                                 <label>Youtube</label>
                                 <input type="text" class="form-control" value="{{$homesettingDetails->youtube}}" name ="youtube" id ="youtube" required>
                              </div>
                              <div class="form-group">
                                 <label>Tiktok</label>
                                 <input type="text" class="form-control" value="{{$homesettingDetails->tiktok}}" name ="tiktok" id ="tiktok" required>
                              </div>
                              <div class="form-group">
                                 <label>homesetting Image</label>
                                 <input type="file" name="image">
                                 @if(!empty($homesettingDetails->image))
                                        <input type="hidden" name="current_image" value="{{ $homesettingDetails->image }}"> 
                                        <img src="{{ asset('uploads/homesettings/'.$homesettingDetails->image) }}" style="width:250px;">
                                        @endif
                              </div>

                              <div class="reset-button">
                                <input type="submit"  class="btn btn-success" value="Add homesetting">
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
