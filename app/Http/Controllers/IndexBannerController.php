<?php

namespace App\Http\Controllers;

use Request, DB;

class IndexBannerController extends Controller
{
    public function list()
    {
        $data = Request::input();
        $page = Request::input('page', 1);
        $datas = DB::table('index_banner');

        $datas = $datas
            ->orderBy('sort', 'desc')
            ->select()
            ->paginate(config('app.pageSize'))
            ->toArray();

        return view('admin/indexBanner/list', [
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
        $title = '';
        $imgUrl = '';
        $sort = '';
        $href = '';

        if ($routeName == 'indexBannerEdit') {
            $isEdit = true;
        }

        if ($id != '') {
            $indexBanner = DB::table('index_banner')
                ->where('id', $id)
                ->get()
                ->first();
            
            if (is_null($indexBanner)) {
                return redirect('/admin/index/banner/list');
            }

            $title = $indexBanner->title;
            $imgUrl = $indexBanner->img_url;
            $sort = $indexBanner->sort;
            $href = $indexBanner->href;
        }

        return view('admin/indexBanner/edit', [
            'isEdit' => $isEdit,
            'title' => $title,
            'imgUrl' => $imgUrl,
            'sort' => $sort,
            'href' => $href,
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

        DB::table('index_banner')
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
        $title = $postData['title'] ?? '';
        $href = $postData['href'] ?? '';
        $sort = $postData['sort'] ?? 0;
        $imgUrl = $postData['img_url'] ?? '';

        if ($title == '' || $href == '' || $imgUrl == '') {
            return response()->json([
                'status' => 'error',
                'msg' => '必填欄位尚未填寫'
            ]);
        }

        if ($id == '') {
            DB::table('index_banner')->insert([
                'title' => $title,
                'href' => $href,
                'sort' => (int)$sort,
                'img_url' => $imgUrl,
                'created_at' => $date
            ]);

            return response()->json([
                'status' => 'success',
            ]);
        } else {
            $updateData = [
                'title' => $title,
                'href' => $href,
                'sort' => (int)$sort,
                'img_url' => $imgUrl,
                'updated_at' => $date
            ];


            DB::table('index_banner')
                ->where('id', $id)
                ->update($updateData);

            return response()->json([
                'status' => 'success',
            ]);
        }
    }
}
