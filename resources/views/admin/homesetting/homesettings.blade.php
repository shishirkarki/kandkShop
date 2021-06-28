@extends('admin.layouts.master')
@section('title','View Home Settings')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-eye"></i>
               </div>
               <div class="header-title">
                  <h1>Home Settings</h1>
                  <small>Home Settings</small>
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
                                 <h4>View Home Settings</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('admin/add-homesetting')}}"> <i class="fa fa-plus"></i> Add Home Setting
                                 </a>  
                              </div>
                             
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Address</th>
                                       <th> Phone Number</th>
                                       <th>Gmail</th>
                                       <th>Facebook</th>
                                       <th>Twitter</th>
                                       <th>Instagram</th>
                                       <th>Youtube</th>
                                       <th>Ticktok</th>
                                       <th>Image</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                            @foreach($homesettingDetails as $homesettingDetail)
                            <tr>
                            <td>{{$homesettingDetail->address}}</td>
                            <td>{{$homesettingDetail->phone_no}}</td>
                            <td>{{$homesettingDetail->gmail}}</td>
                            <td>{{$homesettingDetail->facebook}}</td>
                            <td>{{$homesettingDetail->twitter}}</td>
                            <td>{{$homesettingDetail->instagram}}</td>
                            <td>{{$homesettingDetail->youtube}}</td>
                            <td>{{$homesettingDetail->tiktok}}</td>
                            <td>
                              @if(!empty($homesettingDetail->image))
                              <img src="{{ asset('/uploads/homesettings/'.$homesettingDetail->image) }}" style="width:250px;">
                              @endif
                            </td>
                                    <!-- <td>
                                          <input type="checkbox" class="homesettingStatus btn btn-success" rel="{{$homesettingDetail->id}}"
                                          data-toggle="toggle" data-on="Enabled" data-of="Disabled" data-onstyle="success" data-offstyle="danger"
                                          @if($homesettingDetail['status']=="1") checked @endif>
                                          <div id="myElem" style ="display:none;" class="alert alert-success">Status Enabled</div>
                                       </td> -->
                                      <td>
                                          <a href="{{url('/admin/edit-homesetting/'.$homesettingDetail->id)}}" class="btn btn-add btn-sm" ><i class="fa fa-pencil"></i></button>
                                          <a href="{{url('/admin/delete-homesetting/'.$homesettingDetail->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </button>
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
