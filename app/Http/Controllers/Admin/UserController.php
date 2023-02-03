<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateRequest;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\User\EditRequest;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use App\Models\Position;

class UserController extends Controller
{
    //

    protected $users;

    public function __construct()
    {
        $this->users = new User();
    }

    public function index(Request $request)
    {
        $users = new User();

        $keywords = null;
        if(!empty($request->keywords)){
            $keywords = $request->keywords;
        }

        $users = $users->getAll($keywords);
        return view('admin.users.list', compact('users'));
    }

    public function create()
    {
        $positions = new Position();

        $positions = $positions->get();

        return view('admin.users.create', compact('positions'));
    }

    public function store(CreateRequest $request)
    {
        $users = new User();

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'position_id' => $request->position,
            'is_active' => 1,
            'password' => Hash::make($request->password),
        ];

        // dd($data);

        $create_user = $users->insert($data);

        if ($create_user) {
            return back()->with('msg', 'Thêm người dùng thành công');
        }
        return back()->with('msg', 'Thêm người thất bại');
    }

    // Hiển thị một dữ liệu theo tham số truyền vào.
    public function show($id)
    {
        $user = $this->users->find($id);

        return view('admin.users.edit', compact('user'));
    }

    // Cập nhật dữ liệu một danh mục theo tham số truyền vào.
    public function update(EditRequest $request, $id)
    {
        // dd($request->all());

        $data = [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'position_id' => $request->position,
            'is_active' => $request->is_active,
            'password' => Hash::make($request->password),
        ];

        // dd($data);

        $this->users->find($id)->update($data);

        return redirect()->back()->with('msg', 'Sửa thông tin người dùng thành công');
    }

    // Xóa một dữ liệu theo tham số truyền vào.
    public function destroy($user)
    {
        $this->users->destroy($user);

        return back()->with('msg', 'Xóa thành công');
    }

    public function edit()
    {

    }
}
