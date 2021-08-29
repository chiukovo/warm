@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/libs/bootstrap-datetimepicker/dist/css/bootstrap-datetimepicker.min.css">

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">
        首頁輪播圖{{ $word }}
      </h4>
      <div class="ml-auto text-right">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">首頁</a></li>
            <li class="breadcrumb-item"><a href="/admin/index/banner/list">首頁輪播圖列表</a></li>
            <li class="breadcrumb-item active" aria-current="page">首頁輪播圖{{ $word }}</li>
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
              <label class="col-md-1 m-t-15">標題<span class="text-danger">*</span></label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="text" name="title" class="form-control" value="{{ $title }}" placeholder="請輸入標題">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">輪播圖片<span class="text-danger">*</span></label>
              <div class="col-sm-12 col-md-10 col-lg-6">
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" data-input="thumbnail" data-preview="holder" class="btn btn-primary lfm">
                      <i class="fa fa-picture-o"></i> 選擇圖片
                    </button>
                  </span>
                  <input id="thumbnail" class="form-control" type="text" name="img_url" disabled value="{{ $imgUrl }}">
                </div>
                <div id="holder" style="margin:10px 0;max-height:200px;">
                  @if($imgUrl != '')
                    <img src="{{ $imgUrl }}" style="max-height: 200px;">
                  @endif
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">跳轉連結<span class="text-danger">*</span></label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="text" name="href" class="form-control" value="{{ $href }}" placeholder="請輸入跳轉連結">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">排序</label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="number" name="sort" class="form-control" value="{{ $sort }}" placeholder="請輸入排序(序號越大越前面)">
              </div>
            </div>
          </div>
          <div class="border-top">
            <div class="card-body">
              <button id="save" class="btn btn-primary">儲存</button>
            </div>
          </div>
          <input type="hidden" name="id" value="{{ $id }}">
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(function() {
    $('#save').click(function(e) {
      e.preventDefault();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/admin/index/banner/doEdit',
        data: {
          id: $('input[name=id]').val(),
          title: $('input[name=title]').val(),
          img_url: $('input[name=img_url]').val(),
          href: $('input[name=href]').val(),
          sort: $('input[name=sort]').val(),
        },
        type: 'POST',
        success: function(res) {
          if (res.status == 'success') {
            alert('新增/編輯成功');
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