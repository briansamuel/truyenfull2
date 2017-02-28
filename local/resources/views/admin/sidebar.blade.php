
<section class="sidebar" style="height: auto;">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{Auth::user()->name}}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Bài viết</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="admin/bai-viet"><i class="fa fa-circle-o"></i>Danh sách bài viết</a></li>
                <li><a href="admin/them-bai-viet"><i class="fa fa-circle-o"></i>Thêm bài viết</a></li>
                <li><a href="admin/them-bai-viet"><i class="fa fa-circle-o"></i>Thêm danh mục</a></li>
            </ul>
        </li>
        
        <li>
            <a href="#">
                <i class="fa fa-book"></i>
                <span>Trang</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="admin/danh-muc"><i class="fa fa-circle-o"></i>Danh sách trang</a></li>
                <li><a href="admin/them-danh-muc"><i class="fa fa-circle-o"></i>Tạo trang</a></li>
            </ul>
        </li>

        <li>
            <a href="#">
                <i class="fa fa-book"></i>
                <span>Danh mục</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="admin/danh-muc"><i class="fa fa-circle-o"></i>Danh sách danh mục</a></li>
                <li><a href="admin/them-danh-muc"><i class="fa fa-circle-o"></i>Thêm danh mục</a></li>
            </ul>
        </li>

        <li>
            <a href="#">
                <i class="fa fa-book"></i>
                <span>Plugins</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="admin/danh-muc"><i class="fa fa-circle-o"></i>Danh sách plugin</a></li>
                <li><a href="admin/them-danh-muc"><i class="fa fa-circle-o"></i>Thêm plugin mới</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-book"></i>
                <span>Theme</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="admin/danh-muc"><i class="fa fa-circle-o"></i>Danh sách theme</a></li>
                <li><a href="admin/them-danh-muc"><i class="fa fa-circle-o"></i>Thêm theme mới</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-book"></i>
                <span>Cài đặt</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="admin/danh-muc"><i class="fa fa-circle-o"></i>Cài đặt chung</a></li>
                <li><a href="admin/them-danh-muc"><i class="fa fa-circle-o"></i>Đường dẫn</a></li>
                <li><a href="admin/them-danh-muc"><i class="fa fa-circle-o"></i>Thư viện ảnh</a></li>
                <li><a href="admin/them-danh-muc"><i class="fa fa-circle-o"></i>Đường dẫn</a></li>
            </ul>
        </li>
    </ul>
</section>

