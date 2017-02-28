@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Danh sách bài viết
      </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- List Article -->
            <div class="col-xs-12">
              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Bài viết mới nhất</h3>

                      <div class="box-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                              <div class="input-group-btn">
                                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                      <table id="dataTable" class="table table-hover">
                           <thead>
                              <tr>
                                  <th>
                                    <input data-check="all" type="checkbox" name="remember">
                                  </th>
                                  <th>ID</th>
                                  <th>Tiêu đề</th>
                                  <th>Tác giả</th>
                                  <th>Categories</th>
                                  <th>Tags</th>
                                  <th>Ngày tạo</th>
                              </tr>
                            </thead>
                            <tbody>
                              {!!$articleshtml!!}
                            </tbody>
                      </table>
                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>
            
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('script')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="plugins/iCheck/square/blue.css">
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- DataTable -->
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
    var dataTable = $('#dataTable').DataTable(
    {
        "paging": true, // Allow data to be paged
        "lengthChange": false,
        "searching": true, // Search box and search function will be actived
        "pageLength": 5,    // 5 rows per page

    });
  });
</script>
@endsection