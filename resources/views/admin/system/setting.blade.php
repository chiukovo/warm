@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/libs/bootstrap-datetimepicker/dist/css/bootstrap-datetimepicker.min.css">

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">
        系統設置
      </h4>
      <div class="ml-auto text-right">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">首頁</a></li>
            <li class="breadcrumb-item active" aria-current="page">系統設置</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<div id="app" class="container-fluid">
  <div class="row">
    <div class="col-12">
      <form id="form">
        <div class="card">
          <div class="card-body">
            <div class="form-group row">
              <label class="col-md-1 m-t-15">LINE連結</label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="text" name="line_link" class="form-control" value="{{ $setting->line_link }}" placeholder="請輸入LINE連結">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">FB連結</label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="text" name="fb_link" class="form-control" value="{{ $setting->fb_link }}" placeholder="請輸入FB連結">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">IG連結</label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="text" name="ig_link" class="form-control" value="{{ $setting->ig_link }}" placeholder="請輸入IG連結">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">營業時間</label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="text" name="business_hours" class="form-control" value="{{ $setting->business_hours }}" placeholder="請輸入營業時間">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">地址</label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="text" name="address" class="form-control" value="{{ $setting->address }}" placeholder="請輸入地址">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">電話</label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="text" name="phone" class="form-control" value="{{ $setting->phone }}" placeholder="請輸入電話">
              </div>
            </div>
          </div>
          <div class="border-top">
            <div class="card-body">
              <button id="save" class="btn btn-primary">儲存</button>
            </div>
          </div>
          <input type="hidden" name="id" value="1">
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(function() {
    $('#save').click(function(e) {
      e.preventDefault();
      const data = $('#form').serialize();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/admin/system/setting',
        data: data,
        type: 'POST',
        success: function(res) {
          if (res.status == 'success') {
            alert('編輯成功');
            location.reload();
          } else {
            toastr.warning(res.msg, '訊息');
          }
        }
      });
    });
  });
</script>
@endsection