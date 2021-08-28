@extends('admin.layouts.app')

@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">產品列表</h4>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="text-right m-t-10 m-b-10">
                <a href="/admin/products/list" class="btn btn-info">回主列表</a>
                <a href="/admin/products/create" class="btn btn-info">新增產品</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <strong class="text-danger">{{ !empty($pidData) ? $pidData->name : '' }}</strong>
                        產品列表
                    </h5>
                    <form action="">
                        <div class="form form-row align-items-center m-b-10">
                            <div class="col-auto">
                                <label class="text-xs sr-only">名稱</label>
                                <input name="name" type="text" class="form-control" placeholder="請輸入名稱" value="{{ $name }}">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-info">搜尋</button>
                                <button type="button" class="btn" onclick="location.href='/admin/products/list'">清除搜尋條件</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>序號</th>
                                    <th>名稱</th>
                                    <th>圖片</th>
                                    <th>分類</th>
                                    <th>分期</th>
                                    <th>創建日期</th>
                                    <th>修改日期</th>
                                    <th>狀態</th>
                                    <th>功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas['data'] as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        <img src="{{ $data->img_url }}" style="width: 200px">
                                    </td>
                                    <td>{{ $data->mainString }}</td>
                                    <td>{!! $data->stagingString !!}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                    <td>
                                        @if($data->status == 1)
                                        <button type="button" class="btn btn-info btn-sm" onclick="doDisabled('{{ $data->id }}', 0)">已啟用</button>
                                        @else
                                        <button type="button" class="btn btn-danger btn-sm" onclick="doDisabled('{{ $data->id }}', 1)">已禁用</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/admin/products/edit?id={{ $data->id }}">
                                            <button type="button" class="btn btn-success btn-sm">編輯</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @include('admin.layouts.paginate')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function doDisabled(id, status) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/products/disabled',
            data: {
                id: id,
                status: status
            },
            type: 'PUT',
            success: function(res) {
                if (res.status == 'success') {
                    location.reload();
                } else {
                    toastr.warning(res.msg, '訊息');
                }
            }
        });
    }
</script>

@endsection