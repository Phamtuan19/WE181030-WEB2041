<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('positions')->insert([
            'name' => 'Administration',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('positions')->insert([
            'name' => 'Editor',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('positions')->insert([
            'name' => 'Member',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('order_status')->insert([
            'name' => 'Chưa xác nhận',
            'slug' => 'chua-xac-nhan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('order_status')->insert([
            'name' => 'Đã xác nhận',
            'slug' => 'da-xac-nhan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('order_status')->insert([
            'name' => 'Đang vận chuyển',
            'slug' => 'da-van-chuyen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('order_status')->insert([
            'name' => 'Thành công',
            'slug' => 'thanh-cong',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('order_status')->insert([
            'name' => 'Hủy hàng',
            'slug' => 'huy-hang',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'Phạm Tuấn',
            'email' => "phamtuan19hd@gmail.com",
            'phone' => "0346027346",
            'position_id' => 1,
            'is_active' => null,
            'password' => Hash::make('admin1234'),
        ]);

        DB::table('modules')->insert([
            'name' => 'users',
            'title' => 'quản lý người dùng',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('modules')->insert([
            'name' => 'posts',
            'title' => 'quản lý bài viết',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('modules')->insert([
            'name' => 'products',
            'title' => 'quản lý sản phẩm',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('modules')->insert([
            'name' => 'categories',
            'title' => 'quản lý danh mục',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('modules')->insert([
            'name' => 'brands',
            'title' => 'quản lý thương hiệu',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('modules')->insert([
            'name' => 'positions',
            'title' => 'Phân Quyền Quản Trị Viên',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
