@extends('admin.layouts.app')

@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">申請列表</h4>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form action="">
                    <div class="form form-row align-items-center m-b-10">
                        <div class="col-auto text-xs">申辦人姓名</div>
                        <div class="col-auto">
                            <label class="text-xs sr-only">申辦人姓名</label>
                            <input name="name" type="text" class="form-control" placeholder="請輸入帳號" value="{{ $name }}">
                        </div>
                        <div class="col-auto text-xs">身分證字號</div>
                        <div class="col-auto">
                            <label class="text-xs sr-only">身分證字號</label>
                            <input name="id_number" type="text" class="form-control" placeholder="請輸入名稱" value="{{ $idNumber }}">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-info">搜尋</button>
                            <button type="button" class="btn" onclick="location.href='/admin/apply/list'">清除搜尋條件</button>
                        </div>
                    </div>
                    <h5 class="card-title">申請列表</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>序號</th>
                                    <th>產品類型</th>
                                    <th>商品</th>
                                    <th>姓名</th>
                                    <th>身分證字號</th>
                                    <th>出生年月日</th>
                                    <th>戶籍地址</th>
                                    <th>現居地址</th>
                                    <th>行動電話</th>
                                    <th>身分別</th>
                                    <th>申請人LINE ID</th>
                                    <th>ip</th>
                                    <th>狀態</th>
                                    <th>創建日期</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas['data'] as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>
                                        {{ $data->types_name == null ? '無輸入' : $data->types_name }}
                                    </td>
                                    <td>
                                        {{ $data->products_name == null ? '無輸入' : $data->products_name }}
                                    </td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->id_number }}</td>
                                    <td>{{ $data->age }}</td>
                                    <td>{{ $data->res_address }}</td>
                                    <td>{{ $data->current_address }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->identity }}</td>
                                    <td>{{ $data->line_id }}</td>
                                    <td>{{ $data->ip }}</td>
                                    <td>
                                        @if(!$data->status)
                                        <button type="button" class="btn btn-danger btn-sm" onclick="changeStatus('{{ $data->id }}', 1)">未處理</button>
                                        @else
                                        <button type="button" class="btn btn-info btn-sm" onclick="changeStatus('{{ $data->id }}', 0)">已處理</button>
                                        @endif
                                    </td>
                                    <td>{{ $data->created_at }}</td>
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
    function changeStatus(id, status) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/apply/changeStatus',
            data: {
                id: id,
                status: status,
            },
            type: 'PUT',
            success: function(res) {
                if (res.status == 'success') {
                    location.reload()
                } else {
                    toastr.warning(res.msg, '訊息')
                }
            }
        });
    }
</script>
@endsection