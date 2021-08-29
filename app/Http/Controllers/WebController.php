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
}