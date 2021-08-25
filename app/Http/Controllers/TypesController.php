<?php

namespace App\Http\Controllers;

use Request, DB;

class TypesController extends Controller
{
    public function list()
    {
        $name = Request::input('name', '');

        return view('admin.types.list', [
            'name' => $name
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
}
