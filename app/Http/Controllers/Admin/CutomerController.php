<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customers;

use Illuminate\Support\Facades\Hash;

class CutomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = new Customers();

        $is_active = null;

        $keyword = null;

        if (!empty($request->is_active)) {
            $is_active = $request->is_active;
        }

        if (!empty($request->keywords)) {
            $keyword = $request->keywords;
        }

        // sử lý xắp xếp
        $sortBy = $request->input('sort-by');
        $sortType = $request->input('sort-type');

        $allowSort = ['asc', 'desc'];

        if (!empty($sortType) && in_array($sortType, $allowSort)) {
            if ($sortType == 'desc') {
                $sortType = 'asc';
            } else {
                $sortType = 'desc';
            }
        } else {
            $sortType = 'asc';
        }

        $sortArr = [
            'sortBy' => $sortBy,
            'sortType' => $sortType,
        ];

        $customers = $customers->searchCustomer($is_active, $keyword, $sortArr);

        return view('admin.customer.list', compact('customers', 'sortType'));
    }

    // View create
    public function create()
    {
    }

    // Method Post create
    public function store(Request $request)
    {
    }

    // Hiển thị một dữ liệu theo tham số truyền vào.
    public function show(Customers $customer)
    {

        return view('admin.customer.edit', compact('customer'));
    }

    // Cập nhật dữ liệu một danh mục theo tham số truyền vào.
    public function update(Request $request, Customers $customer)
    {
        if ($request->method() == "PATCH") {

            // dd($request->all());

            if (!empty($request->name)) {
                $customer->name = $request->name;
            }
            if (!empty($request->email)) {
                $customer->email = $request->email;
            }
            if (!empty($request->phone)) {
                $customer->phone = $request->phone;
            }
            if (!empty($request->province)) {
                $customer->province = $request->province;
            }
            if (!empty($request->district)) {
                $customer->district = $request->district;
            }
            if (!empty($request->ward)) {
                $customer->ward = $request->ward;
            }
            if (!empty($request->specific_address)) {
                $customer->specific_address = $request->specific_address;
            }

            $customer->password = Hash::make($request->password);
            $customer->is_active = $request->is_active;

            $customer->save();

            // dd($customer);

            return back()->with('msg', 'Thay đổi thông tin người dùng thành công');
        }
        return back()->with('msg', 'Đã có lỗi sảy ra');
    }

    // Xóa một dữ liệu theo tham số truyền vào.
    public function destroy()
    {
    }
}
