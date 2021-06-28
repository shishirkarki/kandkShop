@extends('admin.layouts.master')
@section('title','Blogs')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-eye"></i>
               </div>
               <div class="header-title">
                  <h1>Blogs</h1>
                  <small>Blogs</small>
               </div>
            </section>

            @if(Session::has('flash_message_error'))
               <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                  </button>
               <strong>{{ session('flash_message_error') }}</strong>
               </div>
               @endif
               @if(Session::has('flash_message_success'))
               <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                  </button>
               <strong>{{ session('flash_message_success') }}</strong>
               </div>
           @endif

           <div id="message_success" style="display:none;" class="alert alert-sm alert-success">Status Enabled</div>
            <div id="message_error" style="display:none;" class="alert alert-sm alert-danger">Status Disabled</div>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>View Blogs</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('admin/blog_create')}}"> <i class="fa fa-plus"></i> Add blog
                                 </a>  
                              </div>
                             
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                    <!-- <th>Image</th> -->
                                    <th>Blog Title</th>
                                    <th>Blog Title Intro</th>
                                    <th>Blog Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                            <td>{{$blog->blog_title}}</td>
                            <td>{{$blog->blog_intro}}</td>
                            <td>{{$blog->blog_body}}</td>
                            <td>
                              @if(!empty($blog->image))
                              <img src="{{ asset('/uploads/blog/'.$blog->image) }}" style="width:250px;">
                              @endif
                            </td>
                            <td>
                                          <input type="checkbox" class="BlogStatus btn btn-success" rel="{{$blog->id}}"
                                          data-toggle="toggle" data-on="Enabled" data-of="Disabled" data-onstyle="success" data-offstyle="danger"
                                          @if($blog['status']=="1") checked @endif>
                                          <div id="myElem" style ="display:none;" class="alert alert-success">Status Enabled</div>
                                       </td>

                                      <td>
                                          <a href="{{url('/admin/blog-edit/'.$blog->id)}}" class="btn btn-add btn-sm" ><i class="fa fa-pencil"></i></button>
                                          <a href="{{url('/admin/blog-delete/'.$blog->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </button>
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
              
            </section>
            <!-- /.content -->
</div>
         <!-- /.content-wrapper -->


@endsection
