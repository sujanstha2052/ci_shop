<?php

if (!function_exists('displayArr')) {
    function displayArr($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

if (!function_exists('getStatus')) {
    function getStatus($data)
    {
        switch ($data) {
            case 'pending':
            $status = 'warning';
            break;
            case 'active':
            $status = 'success';
            break;

            case 'inactive':
            $status = 'danger';
            break;

            default:
            $status = 'default';
            break;
        }

        return $status;
    }
}

if(!function_exists('show_404')) {
    function show_404()
    {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
}

if(!function_exists('deleteImage')) {
    function deleteImage($path = '') {
        if($path == '') {
            show_404();
        }

        if(is_file($path)) {
            @unlink($path);
        }
    }
}
