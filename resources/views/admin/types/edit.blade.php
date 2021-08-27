@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/libs/bootstrap-datetimepicker/dist/css/bootstrap-datetimepicker.min.css">

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">
        <strong class="text-danger">{{ !empty($pidData) ? $pidData->name : '' }}</strong>
        產品分類{{ $word }}
      </h4>
      <div class="ml-auto text-right">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">首頁</a></li>
            <li class="breadcrumb-item"><a href="/admin/types/list">產品分類列表</a></li>
            @if(!empty($pidData))
            <li class="breadcrumb-item"><a href="/admin/types/list?pid={{ $pid }}">{{ $pidData->name }}</a></li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">產品分類{{ $word }}</li>
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
              <label class="col-md-1 m-t-15">名稱<span class="text-danger">*</span></label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="text" name="name" class="form-control" value="{{ $name }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">說明</label>
              <div class="col-sm-12 col-md-10">
              <textarea id="content" name="content" class="editor" class="form-control" style="height: 300px">
                {{ $content }}
              </textarea>
              </div>
            </div>
          </div>
          <div class="border-top">
            <div class="card-body">
              <button id="save" class="btn btn-primary">儲存</button>
            </div>
          </div>
          <input type="hidden" name="id" value="{{ $id }}">
          <input type="hidden" name="pid" value="{{ $pid }}">
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(function() {
    $('#save').click(function(e) {
      e.preventDefault();
      const content = CKEDITOR.instances.content.getData()
      const data = {
        name: $('input[name=name]').val(),
        img_url: $('input[name=img_url]').val(),
        pid: $('input[name=pid]').val(),
        id: $('input[name=id]').val(),
        content: content,
      }

      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/admin/types/doEdit',
        data: data,
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