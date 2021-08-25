@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">圖片管理</h4>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <iframe src="/admin/filemanager" style="width: 100%; height: 600px; overflow: hidden; border: none;">
    </div>
</div>
@endsection