<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateRequest;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\User\EditRequest;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use App\Models\Position;

use Illuminate\Support\Facades\Validator;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Gate;


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

        $this->authorize('viewAny', User::class);

        $users = new User();

        $positions = Position::all();

        // dd($postions);

        $keywords = null;

        $is_active = null;

        $position = null;

        if (!empty($request->is_active)) {
            $is_active = $request->is_active;
        }

        if(!empty($request->position)){
            $position = $request->position;
        }

        if (!empty($request->keywords)) {
            $keywords = $request->keywords;
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

        $users = $users->searchUser($users, $is_active, $position, $keywords, $sortArr)->paginate(3);


        return view('admin.users.list', compact('users', 'sortType', 'positions'));
    }

    public function create()
    {
        $this->authorize('create', User::class);

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
            'is_active' => null,
            'password' => Hash::make($request->password),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $create_user = $users->insert($data);

        if ($create_user) {
            return back()->with('msg', 'Thêm người dùng thành công');
        }
        return back()->with('msg', 'Thêm người thất bại');
    }

    // Hiển thị một dữ liệu theo tham số truyền vào.
    public function show(User $user)
    {

        $this->authorize('view', $user);

        if (Gate::allows('users.edit', $user)) {
            $positions = Position::all();

            return view('admin.users.edit', compact('user', 'positions'));
        }

        if (Gate::denies('users.edit', $user)) {
            abort(403);
        }
    }

    // Cập nhật dữ liệu một danh mục theo tham số truyền vào.
    public function update(EditRequest $request, User $user)
    {
        // dd($request->all());

        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->position_id = $request->position;
        $user->is_active = $request->is_active;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->with('msg', 'Sửa thông tin người dùng thành công');
    }

    // Xóa một dữ liệu theo tham số truyền vào.
    public function destroy($user)
    {

        $this->authorize('delete', $user);

        if (Gate::allows('users.edit', $user)) {
        $this->users->destroy($user);

        return back()->with('msg', 'Xóa thành công');
        }

        if (Gate::denies('users.edit', $user)) {
            abort(403);
        }
    }

    public function edit()
    {
    }
}
