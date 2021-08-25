@extends('admin.layouts.app')

@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">產品分類列表</h4>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="text-right m-t-10 m-b-10">
                <a href="/admin/types/edit" class="btn btn-info">新增產品分類</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">產品分類</h5>
                    <form action="">
                        <div class="form form-row align-items-center m-b-10">
                            <div class="col-auto">
                                <label class="text-xs sr-only">名稱</label>
                                <input name="name" type="text" class="form-control" placeholder="請輸入名稱" value="{{ $name }}">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-info">搜尋</button>
                                <button type="button" class="btn" onclick="location.href='/types/list'">清除搜尋條件</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>名稱</th>
                                    <th>創建日期</th>
                                    <th>修改日期</th>
                                    <th>功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function del(id, account) {
        var yes = confirm('確定要刪除帳號 ' + account + ' 嗎？');

        if (yes) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/user/delete',
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