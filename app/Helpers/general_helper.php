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
