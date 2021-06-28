@extends('admin.layouts.master')
@section('title','Add About Us Satff')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-image"></i>
               </div>
               <div class="header-title">
                  <h1>Add About Us Satff</h1>
                  <small>Add About Us Satffs</small>
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
                              <a class="btn btn-add " href="{{url('admin/aboutus_staff')}}"> 
                              <i class="fa fa-eye"></i>  View About Us staff </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/add-aboutus_staff')}}" method="post">
                                {{csrf_field()}}
                              <div class="form-group">
                                 <label>staff Name</label>
                                 <input type="text" class="form-control" placeholder="Enter Name" name="staff_name" id="staff_name" required>
                              </div>
                              <div class="form-group">
                                 <label>staff Post</label>
                                 <input type="text" class="form-control" placeholder="Enter Post" name="staff_post" id="staff_post" required>
                              </div>
                              <div class="form-group">
                                 <label>staff Image</label>
                                 <input type="file" name="staff_image">
                              </div>

                              <div class="reset-button">
                                <input type="submit"  class="btn btn-success" value="Add staff">
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
