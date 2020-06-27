<?php
function getTitle($tit)
{
    switch ($tit) {
        case 'admin':
            $long_title = 'Vietpro Mobile Shop - Administrator';
            break;
        case 'user':
            $long_title = 'Danh sách quản lý thành viên';
            break;
        case 'add_user':
            $long_title = 'Thêm mới một thành viên';
            break;
        case 'edit_user':
            $long_title = 'Sửa thông tin thành viên';
            break;
        case 'category':
            $long_title = 'Quản lý danh mục sản phẩm';
            break;
        case 'add_category':
            $long_title = 'Thêm mới danh mục sản phẩm';
            break;
        case 'edit_category':
            $long_title = 'Sửa thông tin danh mục sản phẩm';
            break;
        case 'product':
            $long_title = 'Quản lý sản phẩm';
            break;
        case 'add_product':
            $long_title = 'Thêm mới một sản phẩm';
            break;
        case 'edit_product':
            $long_title = 'Sửa thông tin sản phẩm';
            break;
    }
    return $long_title;
}
