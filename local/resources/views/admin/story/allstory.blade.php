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
                      <h3 class="box-title">Truyện mới nhất</h3>

                      <div class="box-tools">
                          
                      </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive">
                      <table id="dataTable" class="table table-hover">
                           <thead>
                              <tr>
                                  <th>
                                    <input data-check="all" type="checkbox" name="remember">
                                  </th>
                                  <th>ID</th>
                                  <th>Tiêu đề</th>
                                  <th>Tác giả</th>
                                  <th>Ảnh đại diện</th>
                                  <th>Tags</th>
                                  <th>Ngày tạo</th>
                              </tr>
                            </thead>
                            <tbody>
                              
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
$(function() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('datatables/data') }}",
        columns: [
            { data: 'id', render: function(data, type, row) {
                  return '<input data-check="'+data+'" type="checkbox" name="remember">';
              } },
            { data: 'id', name: 'id' },
            { data: 'story_title', name: 'story_title' },
            { data: 'story_author', name: 'story_author' },
            { data: 'story_author', name: 'story_author' },
            { data: 'story_thumbnail', 
              render: function(data, type, row) {
                  return '<img width="100" src="'+data+'" />';
              } },
            { data: 'created_at', name: 'created_at' },
            
        ]
    });
});
</script>
<style type="text/css" media="screen">
  #dataTable {
  width: 100% !important;
  }
</style>
@endsection