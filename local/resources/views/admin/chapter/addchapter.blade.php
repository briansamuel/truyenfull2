@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Thêm truyện mới
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
            <!-- Content Article -->
            <form method="POST" action="{{ url('admin/story') }}">
              <div class="col-md-9 col-sm-12 col-xs-12">
                
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                  <input type="hidden" name="author"  value="{{Auth::user()->name}}">
                  <div class="box box-info">
                    <!-- /.box-header -->
                    <div class="box-body pad">
                      <input name="chapter_title" class="form-control input-lg" type="text" placeholder="Tiêu đề chapter">
                      <br>
                      <div class="input-group" style="width: 100% !important">
                        <!-- /btn-group -->
                        <select class="js-data-example-ajax" style="width: 100% !important;padding:10px;">
                          <option value="-1" selected="selected">Chapter thuộc truyện</option>
                        </select>
                      </div>
                      <br>
                      <div class="input-group">
                        <div class="input-group-btn">
                          <button type="button" id="thumbnail" class="btn btn-info btn-flat">Số thứ tự Chap</button>
                        </div>
                        <!-- /btn-group -->
                        <input min="0" name="chapter_serial" type="number" class="form-control">
                      </div>
                      <br>
                      <div class="form-group">
                        
                        <textarea id="chapter_content" name="chapter_content" class="form-control" rows="3" placeholder="Mô tả"></textarea>

                      </div>
                     
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-default">Cancel</button>
                      <button type="submit" class="btn btn-info pull-right">Thêm chương mới</button>
                    </div>
                  </div>
               
                <!-- /.Articles-box -->
              </div>
              <!-- .Sidebar Admin-box -->
              <div class="col-md-3 col-sm-12 col-xs-12">
                
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Tùy chọn</h3>

                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <div class="box-body">
                  </div>
                
                </div>
              </div>
               <!-- /.Sidebar Admin-box -->
            </form>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
@if ( $errors->any() )
<div class="example-modal">
    <div class="modal modal-danger" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Thông báo lỗi</h4>
                </div>
                <div class="modal-body">
                     
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tắt</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
@endif
@endsection

@section('script')
<link rel="stylesheet" href="plugins/iCheck/square/blue.css">

<link rel="stylesheet" href="plugins/select2/select2.min.css">
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
<!-- CK Editor -->
<script src="plugins/select2/select2.js"></script>

<script src="plugins/ckeditor/ckeditor.js"></script>

<script src="plugins/ckfinder/ckfinder.js"></script>

<script>
  $(function () {

    $(".js-data-example-ajax").select2({ 
      width: 'resolve',
      placeholder: 'Enter a tag',
      ajax: {
          
          url: '{{ url("/admin/ajax/liststory") }}',
          dataType: 'json',
          delay: 400,
          data: function(params) {
              return {
                  term: params.term,
              }
          },
          processResults: function (data, page) {

              return {
                results: $.map(data.items, function(obj) {
                    return { id: obj.id, text: obj.story_title };
                })
               
              };
          },
          cache: true,
      },
    });
    $('#myModal').modal();
  });
</script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" >
    
    function openPopup() {
      CKFinder.popup({
          chooseFiles: true,
          onInit: function(finder) {
              finder.on('files:choose', function(evt) {
                  var file = evt.data.files.first();
                  document.getElementById('xFilePath').value = file.getUrl();
              });
              finder.on('file:choose:resizedImage', function(evt) {
                  document.getElementById('xFilePath').value = evt.data.resizedUrl;
              });
          }
      });
  }
  $(function () {
    var editor = CKEDITOR.replace('chapter_content',{
      filebrowserBrowseUrl : 'plugins/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl : 'plugins/ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl : 'plugins/ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl : 'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl : 'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl : 'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
      height: '300px',
    });
    CKFinder.setupCKEditor( editor, 'plugins/ckfinder/' );
    $('#thumbnail').click(function(){
       openPopup();
    });
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<style type="text/css">
  #listCategorieshmtl {
    list-style-type: none;
    padding: 0px;
  }
  #sublistCategorieshmtl {
    list-style-type: none;
  }
  .select2-container .select2-selection--single {height:auto;}
</style>
@endsection