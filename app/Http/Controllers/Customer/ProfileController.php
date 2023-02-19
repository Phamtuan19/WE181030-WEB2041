<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\Customer\profile\EditProfileRequest;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function customerInfo (User $user) {

        return view('customer.pages.customers_info', compact('user'));
    }

    public function editInfo(EditProfileRequest $request, User $user)
    {
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->province = $request->province;
        $user->district = $request->district;
        $user->ward = $request->ward;
        $user->specific_address = $request->specific_address;

        $user->update();

        return back()->with('msg', 'Cập nhật thông tin thành công');
    }

    public function editPassword(Request $request, User $user)
    {
        $request->validate(
            [
                'old_password' => 'required|min:6',
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required|min:6',
            ],
            [
                'required' => ':attribute cũ không được để trống',
                'required' => ':attribute mới không được để trống',
                'min' => ':attribute phải lớn hơn :min ký tự',
                'confirmed' => ':attribute không khớp',
            ],
            [
                'old_password' => 'Mật khẩu cũ',
                'password' => 'Mật khẩu mới',
                'password_confirmation' => 'Mật khẩu nhập lại',
            ]
        );

        // dd(Hash::check($request->old_password, $user->password));

        if(Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);

            $user->update();

            return back()->with('msg_password', 'Cập nhật thành công');
        }else {

            return back()->with('msgError', 'Mật khẩu không chính sác');
        }
    }
}
