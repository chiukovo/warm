<?php

namespace App\Http\Controllers;

use Request, DB;

class ApplyController extends Controller
{
    public function changeStatus()
    {
        $id = Request::input('id', '');
        $status = Request::input('status', 0);

        if ($id == '') {
            return response()->json([
                'status' => 'error',
                'msg' => '此帳號無法刪除或id為空'
            ]);
        }

        DB::table('apply')
            ->where('id', $id)
            ->update([
                'status' => $status
            ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function list()
    {
        $data = Request::input();
        $page = Request::input('page', 1);
        $name = Request::input('name', '');
        $idNumber = Request::input('id_number', '');
        $datas = DB::table('apply');

        if ($name != '') {
            $datas = $datas->where('apply.name', $name);
        }

        if ($idNumber != '') {
            $datas = $datas->where('apply.id_number', $idNumber);
        }

        $datas = $datas
            ->leftJoin('products as p', 'apply.products_id', '=', 'p.id')
            ->leftJoin('types as t', 'apply.types_id', '=', 't.id')
            ->select([
                'apply.id as id',
                'apply.name as name',
                'apply.phone as phone',
                'apply.status as status',
                'apply.id_number as id_number',
                'apply.res_address as res_address',
                'apply.current_address as current_address',
                'apply.identity as identity',
                'apply.line_id as line_id',
                'apply.age as age',
                'apply.ip as ip',
                't.name as types_name',
                'p.name as products_name',
                'apply.created_at as created_at',
            ])
            ->paginate(config('app.pageSize'))
            ->toArray();

        return view('admin/apply/list', [
            'datas' => $datas,
            'page' => $page,
            'name' => $name,
            'idNumber' => $idNumber,
        ]);
    }
}
