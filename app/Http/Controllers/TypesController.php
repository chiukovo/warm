<?php

namespace App\Http\Controllers;

use Request, DB;

class TypesController extends Controller
{
    public function listData()
    {
        $mainTypes = DB::table('types')
            ->where('pid', 0)
            ->get([
                'id',
                'pid',
                'name'
            ])
            ->toArray();

        $otherTypes = DB::table('types')
            ->where('pid', '!=', 0)
            ->get([
                'id',
                'pid',
                'name'
            ])
            ->toArray();

        return [
            'mainTypes' => $mainTypes,
            'otherTypes' => $otherTypes
        ];
    }

    public function list()
    {
        $name = Request::input('name', '');
        $pid = Request::input('pid', 0);
        $page = Request::input('page', 1);
        $pidData = [];
        $filters = [];

        if ($pid != 0) {
            //取得id
            $pidData = DB::table('types')
                ->where('id', $pid)
                ->first();

            if (is_null($pidData)) {
                return redirect('/admin/types/list');
            }
        }

        $filters['pid'] = $pid;

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
            'pid' => $pid,
            'pidData' => $pidData,
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
        $pid = Request::input('pid', 0);
        $pidData = [];
        $name = '';
        $content = '';
        $imgUrl = '';

        if ($routeName == 'typesEdit') {
            $isEdit = true;
        }

        if ($pid != 0) {
            //取得id
            $pidData = DB::table('types')
                ->where('id', $pid)
                ->first();

            if (is_null($pidData)) {
                return redirect('/admin/types/list');
            }
        }

        if ($id != '') {
            $editData = DB::table('types')
                ->where('id', $id)
                ->get()
                ->first();
            
            if (is_null($editData)) {
                return redirect('/admin/types/list');
            }
            
            $name = $editData->name;
            $content = $editData->content;
            $imgUrl = $editData->img_url;
        }

        return view('admin/types/edit', [
            'pid' => $pid,
            'pidData' => $pidData,
            'isEdit' => $isEdit,
            'name' => $name,
            'content' => $content,
            'imgUrl' => $imgUrl,
            'id' => $id,
            'word' => $isEdit ? '編輯' : '新增'
        ]);
    }

    public function doDisabled()
    {
        $id = Request::input('id', '');
        $status = Request::input('status', 0);

        if ($id == '') {
            return response()->json([
                'status' => 'error',
                'msg' => '此帳號無法刪除或id為空'
            ]);
        }

        DB::table('types')
            ->where('id', $id)
            ->update([
                'status' => $status
            ]);

        return response()->json([
            'status' => 'success',
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
        $pid = $postData['pid'] ?? 0;
        $level = 1;

        if ($pid == 0) {
            if ($imgUrl == '') {
                return response()->json([
                    'status' => 'error',
                    'msg' => '首頁形象圖尚未設定'
                ]);
            }
        }

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

            if ($pid != 0) {
                $level = 2;
            }

            DB::table('types')->insert([
                'name' => $name,
                'img_url' => $imgUrl,
                'content' => $content,
                'level' => $level,
                'pid' => $pid,
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
