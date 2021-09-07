<?php

namespace App\Http\Controllers;

use Request, DB;

class ApplyController extends Controller
{
    public function list()
    {
        $data = Request::input();
        $page = Request::input('page', 1);
        $datas = DB::table('apply');

        $datas = $datas
            ->join('products as p', 'apply.products_id', '=', 'p.id')
            ->join('types as t', 'apply.types_id', '=', 't.id')
            ->select([
                'apply.id as id',
                'apply.periods as periods',
                'apply.name as name',
                'apply.profession as profession',
                'apply.phone as phone',
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
        ]);
    }
}
