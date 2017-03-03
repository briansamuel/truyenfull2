
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
                <span>Tuyển tập truyện</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="admin/story?action=allstory"><i class="fa fa-circle-o"></i>Danh sách truyện</a></li>
                <li><a href="admin/story?action=addstory"><i class="fa fa-circle-o"></i>Thêm truyện</a></li>
                <li><a href="admin/chapter?action=allchapter"><i class="fa fa-circle-o"></i>Danh sách chương</a></li>
                <li><a href="admin/chapter?action=addchapter"><i class="fa fa-circle-o"></i>Thêm chương</a></li>
                <li><a href="admin/category?action=addcategory"><i class="fa fa-circle-o"></i>Thêm danh mục</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-sticky-note"></i>
                <span>Plugins</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="admin/plugins"><i class="fa fa-circle-o"></i>Danh sách plugin</a></li>
                <li><a href="admin/plugins?action=addplugin"><i class="fa fa-circle-o"></i>Thêm plugin mới</a></li>
            </ul>
        </li>
        <li>
            <a href="admin/comments">
                <i class="fa fa-commenting-o"></i>
                <span>Comments</span>
            </a>
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
                <i class="fa fa-cog"></i>
                <span>Cài đặt</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="admin/setting?action=general"><i class="fa fa-circle-o"></i>Cài đặt chung</a></li>
                <li><a href="admin/setting?action=permalink"><i class="fa fa-circle-o"></i>Đường dẫn</a></li>
                <li><a href="admin/setting?action=gallery"><i class="fa fa-circle-o"></i>Thư viện ảnh</a></li>
            </ul>
        </li>
    </ul>
</section>

