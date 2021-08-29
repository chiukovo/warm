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

    public function apply($name, $product)
    {
        return view('web/apply');
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