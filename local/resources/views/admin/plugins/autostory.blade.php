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

                    <div class="box-body pad">
                      <div class="form-group">
                        
                        <textarea id="story_url" name="story_url" class="form-control" rows="3" placeholder="Link cần lấy"></textarea>

                      </div>
                      <br>
                      <div class="panel panel-success">
                        <div class="panel-heading"> 
                          <h3 class="panel-title">Panel title</h3> 
                        </div> 
                        <div class="panel-body" id="list-result"></div> 
                      </div>
                    </div> 
                    <div class="box-footer">
                      <button type="submit" class="btn btn-default">Cancel</button>
                      <button type="button" data-token="{{ csrf_token() }}" id="start-auto" class="btn btn-info pull-right">Chạy auto</button>
                    </div>
                  </div>
               
                <!-- /.Articles-box -->
              </div>
              <!-- .Sidebar Admin-box -->
              <div class="col-md-3 col-sm-12 col-xs-12">
                
              
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

<script src="plugins/ckfinder/ckfinder.js"></script>
<script>
  $(function () {
    
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
  function addStoryAjax(url)
  {
    var token = $('#start-auto').data("token");
    //console.log(url);
    setTimeout(function() {
      console.log(url);
      $.ajax({

              url: "admin/ajax/addstory",
              type: 'POST',
              dataType: "text",
              data: {
                  "url": url,
                  "_token": token
              },
              success: function(response){ // What to do if we succeed
                  console.log(response);
                  $('#list-result').append(response+"<br>");
              },
              error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                  //console.log(JSON.stringify(jqXHR));
                  //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
              }
          });
     }, 5000);
  }
  function getListStoryAjax(lines,i)
  {
    var token = $('#start-auto').data("token");
   
    if (i < 0) return;
    setTimeout(function() {
        console.log('Start Auto + '+lines[i]);
        $.ajax({

            url: "admin/ajax/getstory",
            type: 'POST',
            dataType: "JSON",
            data: {
                "url": lines[i],
                "_token": token
            },
            success: function(response){ // What to do if we succeed
               
                for (var i = response.length - 1; i >= 0; i--) {
                  addStoryAjax(response[i]);
                    
                 
                  
                }
            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                //console.log(JSON.stringify(jqXHR));
                //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
        console.log("Next Auto");
        getListStoryAjax(lines,i-1);
     }, 10000);
  }
  $(function () {
    
    $('#thumbnail').click(function(){
       openPopup();
    });
    $('#start-auto').click(function()
    {
      var token = $(this).data("token");
      $('#list-result').html('');
      var lines = $('#story_url').val().split('\n');
      getListStoryAjax(lines,lines.length-1);
      console.log('Start Auto');
      
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
</style>
@endsection