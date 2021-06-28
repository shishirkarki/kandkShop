 <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
         <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
               <!-- sidebar menu -->
               <ul class="sidebar-menu">
                  <li class="active">
                     <a href="{{url('/admin/dashboard')}}"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li class="">
                     <a href="{{url('/admin/banners')}}"><i class="fa fa-image"></i><span>Banners</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-list"></i><span>Categories</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{url('admin/add-category')}}">Add Category</a></li>
                        <li><a href="{{url('admin/view-categories')}}">View Categories</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-product-hunt"></i><span>Product</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{url('admin/add-product')}}">Add Products</a></li>
                        <li><a href="{{url('admin/view-product')}}">View products</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-gift"></i><span>Coupons</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{url('admin/add-coupon')}}">Add Coupon</a></li>
                        <li><a href="{{url('admin/view-coupons')}}">View Coupons</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="{{url('admin/orders')}}">
                     <i class="pe-7s-cart"></i><span>Orders</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     
                  </li>

                  <li class="treeview">
                     <a href="{{url('admin/customers')}}">
                     <i class="fa fa-users"></i><span>Customers</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     
                  </li>

                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-gift"></i><span>Home Settings</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{url('admin/homesettings')}}">View Home Settings</a></li>
                        <li><a href="{{url('admin/blog')}}">Blog</a></li>
                        <li><a href="{{url('admin/contact')}}">Contact</a></li>
                     </ul>
                  </li>

                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-gift"></i><span>About Us</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{url('admin/aboutus_banner')}}">Banner</a></li>
                        <li><a href="{{url('admin/aboutus_service')}}">Service</a></li>
                        <li><a href="{{url('admin/aboutus_testimonial')}}">Testimonial</a></li>
                        <li><a href="{{url('admin/aboutus_staff')}}">Staff</a></li>
                     </ul>
                  </li>

               </ul>
            </div>
            <!-- /.sidebar -->
         </aside>
         <!-- =============================================== -->