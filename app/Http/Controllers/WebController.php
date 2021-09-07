<?php

namespace App\Http\Controllers;

use Request, DB;

class WebController extends Controller
{
    public function index()
    {
        $banners = DB::table('index_banner')
            ->orderBy('sort', 'desc')
            ->get()
            ->toArray();
 
        return view('web/index', [
            'banners' => $banners,
        ]);
    }

    public function product($name)
    {   
        $type = DB::table('types')
            ->where('status', 1)
            ->where('name', $name)
            ->get([
                'id',
                'name',
                'img_url',
                'content',
            ])
            ->first();

        if (is_null($type)) {
            return redirect('/');
        }

        $result = [];

        //取得第二層
        $secTypes = DB::table('types')
            ->where('status', 1)
            ->where('pid', $type->id)
            ->get([
                'id',
                'name',
            ])
            ->toArray();

        foreach($secTypes as $secType) {
            $typesIds = [
                'level_1' => (string)$type->id,
                'level_2' => (string)$secType->id,
            ];

            $products = DB::table('products')
                ->where('status', 1)
                ->where('types_ids', json_encode($typesIds))
                ->get()
                ->toArray();

            $result[] = [
                'name' => $secType->name,
                'data' => $products,
            ];
        }

        //無第二層
        if (empty($result)) {
            $typesIds = [
                'level_1' => (string)$type->id,
                'level_2' => '',
            ];
            $products = DB::table('products')
                ->where('status', 1)
                ->where('types_ids', json_encode($typesIds))
                ->get()
                ->toArray();

            $result[] = [
                'name' => $type->name,
                'data' => $products,
            ];
        }

        return view('web/product', [
            'type' => $type,
            'result' => $result,
        ]);
    }

    public function createApply(Request $request)
    {
        $postData = Request::input();
        $ip = Request::ip();
        $type = $postData['type'] ?? '';
        $product = $postData['product'] ?? '';
        $periods = $postData['periods'] ?? '';
        $name = $postData['name'] ?? '';
        $phone = $postData['phone'] ?? '';
        $profession = $postData['profession'] ?? '';
        $age = $postData['age'] ?? '';
 
        //檢查
        if (
            $type == '' ||
            $product == '' ||
            $periods == '' ||
            $name == '' ||
            $phone == '' ||
            $profession == '' ||
            $age == ''
        ) {
            return [
                'status' => 'error',
                'msg' => '必填參數未填寫',
            ];
        }

        if (
            strlen($type) > 100 ||
            strlen($product) > 100 ||
            strlen($periods) > 100 ||
            strlen($name) > 100 ||
            strlen($phone) > 100 ||
            strlen($profession) > 100 ||
            strlen($age) > 100
        ) {
            return [
                'status' => 'error',
                'msg' => '錯誤, 字串過長',
            ];
        }

        DB::table('apply')->insert([
            'types_id' => (int)$type,
            'products_id' => (int)$product,
            'periods' => $periods,
            'name' => $name,
            'phone' => $phone,
            'profession' => $profession,
            'age' => $age,
            'ip' => $ip,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return [
            'status' => 'success',
        ];
    }

    public function apply($name, $product)
    {
        $types = DB::table('types')
            ->where('status', 1)
            ->where('level', 1)
            ->orderBy('created_at', 'desc')
            ->get([
                'id',
                'name',
            ])
            ->toArray();

        $products = DB::table('products')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get([
                'id',
                'name',
            ])
            ->toArray();

        return view('web/apply', [
            'name' => $name,
            'product' => $product,
            'products' => $products,
            'types' => $types,
        ]);
    }

    public function about($name)
    {
        $about = DB::table('about_list')
            ->where('name', $name)
            ->first();

        if (is_null($about)) {
            return redirect('/');
        }
 
        return view('web/about', [
            'about' => $about,
        ]);
    }
}