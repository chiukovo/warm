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
                    <h5 class="card-title">申請列表</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>序號</th>
                                    <th>產品類型</th>
                                    <th>商品</th>
                                    <th>產品期數</th>
                                    <th>申辦人姓名</th>
                                    <th>聯絡電話</th>
                                    <th>職業</th>
                                    <th>年紀</th>
                                    <th>創建日期</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas['data'] as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->types_name }}</td>
                                    <td>{{ $data->products_name }}</td>
                                    <td>{{ $data->periods }}期</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->profession }}</td>
                                    <td>{{ $data->age }}</td>
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
    function del(id, title) {
        var yes = confirm('確定要刪除帳號 ' + title + ' 嗎？');

        if (yes) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/index/banner/delete',
                data: {
                    id: id
                },
                type: 'DELETE',
                success: function(res) {
                    if (res.status == 'success') {
                        location.reload();
                    } else {
                        toastr.warning(res.msg, '訊息');
                    }
                }
            });
        } else {
            return
        }
    }
</script>
@endsection