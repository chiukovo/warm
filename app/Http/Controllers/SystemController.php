<?php

namespace App\Http\Controllers;

use Request, DB;

class SystemController extends Controller
{
    public function index()
    {
        $systemSetting = DB::table('system_setting')
            ->get()
            ->first();

        return view('admin/system/setting', [
            'setting' => $systemSetting
        ]);
    }

    public function doEdit()
    {
        $date = date('Y-m-d H:i:s');
        $postData = Request::input();

        $updateData = [
            'line_link' => $postData['line_link'] ?? '',
            'fb_link' => $postData['fb_link'] ?? '',
            'ig_link' => $postData['ig_link'] ?? '',
            'business_hours' => $postData['business_hours'] ?? '',
            'address' => $postData['address'] ?? '',
            'phone' => $postData['phone'] ?? '',
            'updated_at' => $date,
        ];
        
        DB::table('system_setting')
            ->where('id', 1)
            ->update($updateData);

        return response()->json([
            'status' => 'success',
        ]);
    }
}
