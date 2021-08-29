<?php

namespace App\Http\Controllers;

use Request, DB;

class AboutListController extends Controller
{
    public function list()
    {
        $data = Request::input();
        $page = Request::input('page', 1);
        $datas = DB::table('about_list');

        $datas = $datas
            ->orderBy('sort', 'desc')
            ->select()
            ->paginate(config('app.pageSize'))
            ->toArray();

        return view('admin/about/list', [
            'datas' => $datas,
            'page' => $page,
        ]);
    }


    public function edit()
    {
        $routeName = Request::route()->getName();
        
        $isEdit = false;
        $id = Request::input('id', '');
        $page = Request::input('page', 1);
        $name = '';
        $sort = '';
        $content = '';

        if ($routeName == 'aboutEdit') {
            $isEdit = true;
        }

        if ($id != '') {
            $about = DB::table('about_list')
                ->where('id', $id)
                ->get()
                ->first();
            
            if (is_null($about)) {
                return redirect('/admin/index/banner/list');
            }

            $name = $about->name;
            $sort = $about->sort;
            $content = $about->content;
        }

        return view('admin/about/edit', [
            'isEdit' => $isEdit,
            'name' => $name,
            'content' => $content,
            'sort' => $sort,
            'id' => $id,
            'word' => $isEdit ? '編輯' : '新增'
        ]);
    }

    public function doDelete()
    {
        $id = Request::input('id', '');

        if ($id == '') {
            return response()->json([
                'status' => 'error',
                'msg' => 'id為空'
            ]);
        }

        DB::table('about_list')
            ->where('id', $id)
            ->delete();

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
        $sort = $postData['sort'] ?? 0;
        $content = $postData['content'] ?? '';

        if ($name == '') {
            return response()->json([
                'status' => 'error',
                'msg' => '必填欄位尚未填寫'
            ]);
        }

        if ($id == '') {
            //檢查是否已存在
            $checkName = DB::table('about_list')
                ->where('name', $name)
                ->get()
                ->first();

            if (!is_null($checkName)) {
                return response()->json([
                    'status' => 'error',
                    'msg' => '此名稱已存在'
                ]);
            }

            DB::table('about_list')->insert([
                'name' => $name,
                'sort' => (int)$sort,
                'content' => $content,
                'created_at' => $date
            ]);

            return response()->json([
                'status' => 'success',
            ]);
        } else {
            //檢查是否已存在
            $checkName = DB::table('about_list')
                ->where('name', $name)
                ->where('id', '!=', $id)
                ->get()
                ->first();

            if (!is_null($checkName)) {
                return response()->json([
                    'status' => 'error',
                    'msg' => '此名稱已存在'
                ]);
            }

            $updateData = [
                'name' => $name,
                'sort' => (int)$sort,
                'content' => $content,
                'updated_at' => $date
            ];


            DB::table('about_list')
                ->where('id', $id)
                ->update($updateData);

            return response()->json([
                'status' => 'success',
            ]);
        }
    }
}
