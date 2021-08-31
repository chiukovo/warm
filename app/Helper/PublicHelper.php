<?php

if (!function_exists('testHelper')) {

    /**
     * 測試helper function 是否能啟用
     *
     * @return string
     */
    function testHelper()
    {
        return 'ok';
    }
}

if (!function_exists('adminLoginInfo')) {

    function adminLoginInfo()
    {
        if (!Auth::check()) {
            return [];
        }

        return Auth::user();
    }
}

if (!function_exists('getPaginteLink')) {

    function getPaginteLink($type, $page, $totalPage)
    {
        $params = Request::input();
        $url = Request::url();

        if ($type == 'prev') {
            $page = $page - 1;
        }

        if ($type == 'next') {
            $page = $page + 1;
        }

        if ($page < 1) {
            $page = 1;
        }

        if ($page > $totalPage) {
            $page = $totalPage;
        }

        $params['page'] = $page;
        $query = http_build_query($params);

        return $url . '?' . $query;
    }
}

if (!function_exists('getIndexProClass')) {

    function getIndexProClass($key)
    {
        $number = $key + 1;

        $first = [1, 4, 7, 10, 13];
        $second = [2, 5, 8, 11, 14];
        $third = [3, 6, 9, 12, 15];

        if (in_array($number, $first)) {
            return 'section first';
        }

        if (in_array($number, $second)) {
            return 'section second';
        }

        if (in_array($number, $third)) {
            return 'section third';
        }

        return 'section';
    }
}

if (!function_exists('showNavMenu')) {
    function showNavMenu()
    {
        $routeName = Request::route()->getName();

        if (
            $routeName == 'webIndex' ||
            $routeName == 'webProduct'
        ) {
            return true;
        }

        return false;
    }
}

if (!function_exists('getAboutList')) {
    function getAboutList()
    {
        $aboutList = DB::table('about_list')
            ->orderBy('sort', 'desc')
            ->get()
            ->toArray();

        return $aboutList;
    }
}

if (!function_exists('getSetting')) {
    function getSetting()
    {
        $setting = DB::table('system_setting')
            ->first();

        return $setting;
    }
}


if (!function_exists('getHeaderData')) {

    function getHeaderData()
    {
        $headers = [];
        $nav = [];
        $types = DB::table('types')
            ->where('status', 1)
            ->get([
                'id',
                'name',
                'pid',
                'img_url',
            ])
            ->toArray();

        $products = DB::table('products')
            ->where('status', 1)
            ->get([
                'id',
                'name',
                'img_url',
                'source_money',
                'month_money',
                'types_ids',
                'tags',
            ])
            ->toArray();

        foreach($types as $type) {
            if ($type->pid == 0) {
                $type->subMenu = [];
                $type->products = [];

                foreach($types as $checkType) {
                    if ($type->id == $checkType->pid) {
                        $type->subMenu[] = $checkType;
                    }
                }

                //取得旗下產品
                foreach($products as $product) {
                    $typesIds = json_decode($product->types_ids);
                    $tags = explode(",", $product->tags);
                    $product->tags_array = $tags;
                    
                    if (isset($typesIds->level_1) && $type->id == $typesIds->level_1) {
                        $type->products[] = $product;
                    }
                }
                            
                $headers[] = $type;
            } else {
                $nav[$type->pid][] = $type;
            }
        }
        return [
            'headers' => $headers,
            'nav' => $nav,
        ];
    }
}
