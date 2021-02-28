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
        switch (@strtoupper($data)) {
            case 'VERIFIED':
            case 'VERIFY':
            case 1:
            $status = "purple";
            break;
            case 'DELETED':
            case 'DECLINED':
            case 'REJECTED':
            case 'DELETE':
            case 'DECLINE':
            case 'REJECT':
            case 'BOUNCED':
            case 'INACTIVE':
            case 2:
            $status = "danger";
            break;
            case 'DISPATCH':
            case 'DISPATCHED':
            case 3:
            $status = "gray";
            break;
            case 'MATURED':
            case 'MATURE':
            case 4:
            $status = "yellow";
            break;
            case 'APPROVED':
            case 'APPROVE':
            case 'SETTLED':
            case 'ACTIVE':
            case 5:
            $status = 'success';
            break;
            case 'PARTIALLYAPPROVED':
            case 6:
            $status = 'info';
            break;
            case 'RECEIVED':
            case 'RECEIVE':
            case 'REPAIRED':
            case 7:
            $status = "darkgreen";
            break;
            case 'ENCASHED':
            case 'ENCASH':
            case 8:
            $status = "brown";
            break;

            case 'PENDING':
            case 0:
            default:
            $status = 'warning';
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
