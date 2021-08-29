@extends('admin.layouts.app')

@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">關於我們列表</h4>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="text-right m-t-10 m-b-10">
                <a href="/admin/about/create" class="btn btn-info">新增關於我們</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">關於我們</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>排序</th>
                                    <th>名稱</th>
                                    <th>創建日期</th>
                                    <th>修改日期</th>
                                    <th>功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas['data'] as $data)
                                <tr>
                                    <td>{{ $data->sort }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                    <td>
                                        <a href="/admin/about/edit?id={{ $data->id }}">
                                            <button type="button" class="btn btn-success btn-sm">編輯</button>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="del('{{ $data->id }}', '{{ $data->name }}')">移除</button>
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
    function del(id, name) {
        var yes = confirm('確定要刪除帳號 ' + name + ' 嗎？');

        if (yes) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/about/delete',
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