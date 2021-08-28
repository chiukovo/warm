<?php

namespace App\Http\Controllers;

use Request, DB;

class ProductsController extends Controller
{
    public function list()
    {
        $name = Request::input('name', '');
        $page = Request::input('page', 1);
        $filters = [];

        if ($name != '') {
            $filters['name'] = $name;
        }

        $datas = DB::table('products');

        if (!empty($filters)) {
            $datas->where($filters);
        }

        $types = DB::table('types')
            ->get([
                'id',
                'pid',
                'name'
            ])
            ->toArray();

        $datas = $datas
            ->select()
            ->paginate(config('app.pageSize'))
            ->toArray();

        foreach($datas['data'] as $key => $data) {
            $typesIds = json_decode($data->types_ids);
            $staging = json_decode($data->staging);
            $mainString = '';
            $stagingString = '';

            foreach($types as $type) {
                if (isset($typesIds->level_1) && $type->id == $typesIds->level_1) {
                    $mainString = $type->name; 
                }

                if (isset($typesIds->level_2) && $type->id == $typesIds->level_2) {
                    $mainString .= '->' . $type->name; 
                }
            }

            if (isset($staging->staging_6)) {
                $stagingString = '6期: $' . $staging->staging_6 . '<br>';
            }
            if (isset($staging->staging_12)) {
                $stagingString .= '12期: $' . $staging->staging_12 . '<br>';
            }
            if (isset($staging->staging_24)) {
                $stagingString .= '24期: $' . $staging->staging_24 . '<br>';
            }
            if (isset($staging->staging_30)) {
                $stagingString .= '30期: $' . $staging->staging_30;
            }

            $data->stagingString = $stagingString;
            $data->mainString = $mainString;

            $datas['data'][$key] = $data;
        }

        return view('admin/products/list', [
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
        $sourceMoney = '';
        $monthMoney = '';
        $content = '';
        $contentDetail = '';
        $imgUrl = '';
        $mainTypes = '';
        $secTypes = '';
        $staging_6 = '';
        $staging_12 = '';
        $staging_24 = '';
        $staging_30 = '';
        $tags = '';

        if ($routeName == 'productsEdit') {
            $isEdit = true;
        }

        if ($id != '') {
            $editData = DB::table('products')
                ->where('id', $id)
                ->get()
                ->first();
            
            if (is_null($editData)) {
                return redirect('/admin/products/list');
            }
            
            $name = $editData->name;
            $content = $editData->content;
            $contentDetail = $editData->content_detail;
            $imgUrl = $editData->img_url;
            $tags = $editData->tags;
            $staging = json_decode($editData->staging);
            $sourceMoney = $editData->source_money;
            $monthMoney = $editData->month_money;
            $typesIds = json_decode($editData->types_ids);

            if (isset($typesIds->level_1)) {
                $mainTypes = $typesIds->level_1; 
            }

            if (isset($typesIds->level_2)) {
                $secTypes = $typesIds->level_2; 
            }

            if (isset($staging->staging_6)) {
                $staging_6 = $staging->staging_6;
            }
            if (isset($staging->staging_12)) {
                $staging_12 = $staging->staging_12;
            }
            if (isset($staging->staging_24)) {
                $staging_24 = $staging->staging_24;
            }
            if (isset($staging->staging_30)) {
                $staging_30 = $staging->staging_30;
            }
        }

        return view('admin/products/edit', [
            'isEdit' => $isEdit,
            'name' => $name,
            'imgUrl' => $imgUrl,
            'tags' => $tags,
            'sourceMoney' => $sourceMoney,
            'monthMoney' => $monthMoney,
            'content' => $content,
            'contentDetail' => $contentDetail,
            'mainTypes' => $mainTypes,
            'secTypes' => $secTypes,
            'staging_6' => $staging_6,
            'staging_12' => $staging_12,
            'staging_24' => $staging_24,
            'staging_30' => $staging_30,
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

        DB::table('products')
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
        $contentDetail = $postData['content_detail'] ?? '';
        $monthMoney = $postData['month_money'] ?? '';
        $sourceMoney = $postData['source_money'] ?? '';
        $monthMoney_6 = $postData['month_money_6'] ?? '';
        $monthMoney_12 = $postData['month_money_12'] ?? '';
        $monthMoney_24 = $postData['month_money_24'] ?? '';
        $monthMoney_30 = $postData['month_money_30'] ?? '';
        $mainTypes = $postData['mainTypes'] ?? '';
        $secTypes = $postData['secTypes'] ?? '';
        $tags = $postData['tags'] ?? '';

        if (
            $name == '' ||
            $imgUrl == '' ||
            $monthMoney == '' ||
            $sourceMoney == '' ||
            $mainTypes == ''
        ) {
            return response()->json([
                'status' => 'error',
                'msg' => '必填欄位尚未填寫'
            ]);
        }

        if ($secTypes == '') {
            //檢查是否真的沒下層
            $secTypes = DB::table('types')
                ->where('pid', $mainTypes)
                ->get()
                ->first();
            
            if (!is_null($secTypes)) {
                return response()->json([
                    'status' => 'error',
                    'msg' => '第二層欄位尚未填寫'
                ]);
            }
        }

        //處理分期資料
        $staging = [
            'staging_6' => $monthMoney_6,
            'staging_12' => $monthMoney_12,
            'staging_24' => $monthMoney_24,
            'staging_30' => $monthMoney_30,
        ];

        $typesIds = [
            'level_1' => $mainTypes,
            'level_2' => $secTypes,
        ];

        if ($id == '') {
            DB::table('products')->insert([
                'name' => $name,
                'img_url' => $imgUrl,
                'content' => $content,
                'content_detail' => $contentDetail,
                'types_ids' => json_encode($typesIds, true),
                'month_money' => $monthMoney,
                'source_money' => $sourceMoney,
                'staging' => json_encode($staging, true),
                'tags' => $tags,
                'created_at' => $date,
            ]);

            return response()->json([
                'status' => 'success',
            ]);
        } else {
            $updateData = [
                'name' => $name,
                'img_url' => $imgUrl,
                'content' => $content,
                'content_detail' => $contentDetail,
                'types_ids' => json_encode($typesIds, true),
                'month_money' => $monthMoney,
                'source_money' => $sourceMoney,
                'staging' => json_encode($staging, true),
                'tags' => $tags,
                'updated_at' => $date
            ];

            DB::table('products')
                ->where('id', $id)
                ->update($updateData);

            return response()->json([
                'status' => 'success',
            ]);
        }
    }
}
