<?php

use App\Models\User;

// upload image
function uploadFile($upload_path = null, $files = [])
{
    $image = [];
    if (is_array($files) && !empty($files)) {

        foreach ($files as $key => $file) {
            $ext = strtolower($file->getClientOriginalExtension()); // lấy đôi của file
            $image_name = md5(rand(1000, 10000));
            $image_full_name = $image_name . '.' . $ext;
            $file->move($upload_path, $image_full_name);

            $img_url = $upload_path . $image_full_name;
            $image[$key] = $img_url;
        }

        return $image;
    }
}

// Delete image
function deleteFilePublic($files = [])
{
    foreach ($files as $key => $file) {
        if (file_exists($file)) {
            unlink($file);
        }
        unset($files[$key]);
    }
    return $files;
}

// fomat money
if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ')
    {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . ' ' . "{$suffix}";
        }
    }
}

function isActiveCustomer($email)
{
    $user = User::where('email', $email)->whereNull('is_active')->get();

    if ($user->count() > 0) {
        if ($user[0]->position_id != 3) {
            return 'admin';
        } else {
            return 'member';
        }
    }
    return false;
}


function showCategories($categories, $parentId = null, $char = '')
{
    if ($categories) {
        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parentId) {

                echo '<option value="' . $category->id . '">' . $char . $category->name . '</option>';

                // Xóa chuyên mục đã lặp
                unset($categories[$key]);

                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategories($categories, $category->id, $char . '---- ');
            }
        }
    }
}

// ===================================

function percentReduction($value_1, $value_2)
{
    $relus = (($value_1 - $value_2) / $value_1) * 100;

    return ceil($relus) . '%';
}


// ======================================

function isRole($dataArr, $moduleName, $role = 'view')
{
    if(!empty($dataArr[$moduleName])){
        $roleArr = $dataArr[$moduleName];
        // dd(Auth::user());
        if (!empty($roleArr) && in_array($role, $roleArr)){
            return true;
        }
    }

    return false;
}
