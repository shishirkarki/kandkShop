@extends('admin.layouts.master')
@section('title','Edit Blog')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-image"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Blog</h1>
                  <small>Edit Blogs</small>
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
                              <a class="btn btn-add " href="{{url('admin/blog')}}"> 
                              <i class="fa fa-eye"></i>  View Blog </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                        <form class="col-sm-6" enctype="multipart/form-data" action="{{ url('/admin/blog-update/'.$blog->id) }}" method="post">
                        @csrf
                              <div class="form-group">
                                 <label>Blog Titl</label>
                                 <input type="text" class="form-control" value="{{$blog->blog_title}}" name="blog_title" id="blog_title" required>
                              </div>
                              <div class="form-group">
                                 <label>Blog Introduction</label>
                                 <input type="text" class="form-control" value="{{$blog->blog_intro}}" name="blog_intro" id="blog_intro" required>
                              </div>
                              <div class="form-group">
                                 <label>Blog Body</label>
                                 <textarea class="form-control" name="blog_body" id="blog_body">
                                 {{$blog->blog_body}}
                                 </textarea>
                              </div>
                              <div class="form-group">
                                         <label>blog Image</label>
                                         <input type="file" name="image" id="image">
                                         @if(!empty($blog->image))
                                        <input type="hidden" name="current_image" value="{{ $blog->image }}"> 
                                        <img src="{{ asset('uploads/blog/'.$blog->image) }}" style="width:250px;">
                                        @endif
                                      </div>

                              <div class="reset-button">
                                <input type="submit"  class="btn btn-success" value="edit blog">
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
