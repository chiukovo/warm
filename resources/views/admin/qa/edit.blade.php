@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/libs/bootstrap-datetimepicker/dist/css/bootstrap-datetimepicker.min.css">

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">
        快速辦理QA
      </h4>
      <div class="ml-auto text-right">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">首頁</a></li>
            <li class="breadcrumb-item active" aria-current="page">快速辦理QA</li>
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
              <label class="col-md-1 m-t-15">詳情說明</label>
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
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/admin/qa/doEdit',
        data: {
          content: content,
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