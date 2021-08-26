<?php

namespace App\Http\Controllers;

use Request, DB;

class TypesController extends Controller
{
    public function list()
    {
        $name = Request::input('name', '');
        $page = Request::input('page', 1);

        $filters = [];

        if ($name != '') {
            $filters['name'] = $name;
        }

        $datas = DB::table('types');

        if (!empty($filters)) {
            $datas->where($filters);
        }

        $datas = $datas
            ->select()
            ->paginate(config('app.pageSize'))
            ->toArray();

        return view('admin/types/list', [
            'datas' => $datas,
            'name' => $name,
            'page' => $page,
        ]);
    }

    public function edit()
    {
        $routeName = Request::route()->getName();
        
        $isEdit = false;
        $id = Request::input('id', '');
        $name = '';
        $imgUrl = '';

        if ($routeName == 'typesEdit') {
            $isEdit = true;
        }

        if ($id != '') {
            $types = DB::table('types')
                ->where('id', $id)
                ->get()
                ->first();
            
            if (is_null($types)) {
                return redirect('/admin/types/list');
            }

            $name = $types->name;
        }

        return view('admin/types/edit', [
            'isEdit' => $isEdit,
            'name' => $name,
            'id' => $id,
            'word' => $isEdit ? '編輯' : '新增'
        ]);
    }

    public function doEdit()
    {
        $postData = Request::input();
        $date = date('Y-m-d H:i:s');

        $id = $postData['id'] ?? '';
        $name = $postData['name'] ?? '';
        $imgUrl = $postData['img_url'] ?? '';
        $content = $postData['content'] ?? '';

        if ($id == '') {
            //create
            if ($name == '') {
                return response()->json([
                    'status' => 'error',
                    'msg' => '名稱尚未填寫'
                ]);
            }

            //檢查是否名稱已存在
            $checkName = DB::table('types')
                ->where('name', $name)
                ->get()
                ->first();

            if (!is_null($checkName)) {
                return response()->json([
                    'status' => 'error',
                    'msg' => '此名稱已存在'
                ]);
            }

            DB::table('types')->insert([
                'name' => $name,
                'img_url' => $imgUrl,
                'content' => $content,
                'created_at' => $date,
                'updated_at' => $date
            ]);

            return response()->json([
                'status' => 'success',
            ]);
        } else {
            //update
            if ($name == '') {
                return response()->json([
                    'status' => 'error',
                    'msg' => '必填欄位尚未填寫'
                ]);
            }
            
            $updateData = [
                'name' => $name,
                'img_url' => $imgUrl,
                'content' => $content,
                'updated_at' => $date
            ];

            DB::table('types')
                ->where('id', $id)
                ->update($updateData);

            return response()->json([
                'status' => 'success',
            ]);
        }
    }
}
