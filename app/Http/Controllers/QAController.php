<?php

namespace App\Http\Controllers;

use Request, DB;

class QAController extends Controller
{
    public function edit()
    {
        $qa = DB::table('qa_page')
            ->where('id', 1)
            ->get()
            ->first();

        $content = $qa->content;

        return view('admin/qa/edit', [
            'content' => $content,
        ]);
    }

    public function doEdit()
    {
        $postData = Request::input();
        $date = date('Y-m-d H:i:s');

        $content = $postData['content'] ?? '';

        $updateData = [
            'content' => $content,
            'updated_at' => $date,
        ];

        DB::table('qa_page')
            ->where('id', 1)
            ->update($updateData);

        return response()->json([
            'status' => 'success',
        ]);

    }
}
