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
