@extends('admin.layouts.master')
@section('title','About Us Staff')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-eye"></i>
               </div>
               <div class="header-title">
                  <h1>About Us Staff</h1>
                  <small>About Us Staff</small>
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

           <!-- <div id="message_success" style="display:none;" class="alert alert-sm alert-success">Status Enabled</div>
            <div id="message_error" style="display:none;" class="alert alert-sm alert-danger">Status Disabled</div> -->
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>View About Us Staff</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <!-- <a class="btn btn-add" href="{{url('admin/add-aboutus_staff')}}"> <i class="fa fa-plus"></i> Add About US staff</a>   -->
                              </div>
                             
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>ID</th>
                                       <th>Staff Name</th>
                                       <th>Staff Post</th>
                                       <th>Image</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                            @foreach($aboutus_staff as $aboutus_staff)
                            <tr>
                            <td>{{$aboutus_staff->id}}</td>
                            <td>{{$aboutus_staff->staff_name}}</td>
                            <td>{{$aboutus_staff->staff_post}}</td>
                            <td>
                              @if(!empty($aboutus_staff->staff_image))
                              <img src="{{ asset('/uploads/aboutus_staffs/'.$aboutus_staff->staff_image) }}" style="width:250px;">
                              @endif
                            </td>
                            <!-- <td>
                                          <input type="checkbox" class="staffStatus btn btn-success" rel="{{$aboutus_staff->id}}"
                                          data-toggle="toggle" data-on="Enabled" data-of="Disabled" data-onstyle="success" data-offstyle="danger"
                                          @if($aboutus_staff['status']=="1") checked @endif>
                                          <div id="myElem" style ="display:none;" class="alert alert-success">Status Enabled</div>
                                       </td> -->
                                      <td>
                                          <a href="{{url('/admin/edit-aboutus_staff/'.$aboutus_staff->id)}}" class="btn btn-add btn-sm" ><i class="fa fa-pencil"></i></button>
                                          <a href="{{url('/admin/delete-aboutus_staff/'.$aboutus_staff->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </button>
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
