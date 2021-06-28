@extends('admin.layouts.master')
@section('title','Edit About Us Testimonial')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-image"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Testimonial</h1>
                  <small>Edit Testimonials</small>
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
                              <a class="btn btn-add " href="{{url('admin/aboutus_testimonial')}}"> 
                              <i class="fa fa-eye"></i>  VIew About Us Testimonial </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                        <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/edit-aboutus_testimonial/'.$aboutustestimonialDetails->id)}}" method="post">
                                {{csrf_field()}}
                              <div class="form-group">
                                 <label>Testimonial Title</label>
                                 <input type="text" class="form-control" value="{{$aboutustestimonialDetails->testimonial_title}}" name="testimonial_title" id="testimonial_title" required>
                              </div>
                              <div class="form-group">
                                 <label>Testimonial FeedBack</label>
                                 <input type="text" class="form-control" value="{{$aboutustestimonialDetails->testimonial_feedback}}" name="testimonial_feedback" id="testimonial_intro" required>
                              </div>
                              <div class="form-group">
                                 <label>Testimonial Name</label>
                                 <input type="text" class="form-control" value="{{$aboutustestimonialDetails->testimonial_name}}" name="testimonial_name" id="testimonial_description" required>
                              </div>
                              <div class="form-group">
                                 <label>Testimonial Post</label>
                                 <input type="text" class="form-control" value="{{$aboutustestimonialDetails->testimonial_post}}" name="testimonial_post" id="testimonial_description" required>
                              </div>
                              <div class="form-group">
                                         <label>testimonial Image</label>
                                         <input type="file" name="testimonial_image">
                                         @if(!empty($aboutustestimonialDetails->testimonial_image))
                                        <input type="hidden" name="current_testimonial_image" value="{{ $aboutustestimonialDetails->testimonial_image }}"> 
                                        <img src="{{ asset('uploads/aboutus_testimonials/'.$aboutustestimonialDetails->testimonial_image) }}" style="width:250px;">
                                        @endif
                                      </div>

                              <div class="reset-button">
                                <input type="submit"  class="btn btn-success" value="Update testimonial">
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
