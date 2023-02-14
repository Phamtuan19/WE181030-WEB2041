<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Position;

use App\Models\Module;

use Illuminate\Support\Facades\Gate;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Position::class);

        $positions = Position::all();

        return view('admin.position.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Position::class);

        return view('admin.position.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $position = new Position();

        $request->validate(
            [
                'name' => 'required | unique:positions',
            ],
            [
                'name.required' => 'Tên quyền không được để trống',
                'name.unique' => 'Tên quyền đã tồn tại',
            ]
        );

        $data = [
            'name' => $request->name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $position->insert($data);

        return back()->with('msg', 'Thêm quyền thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function permission(Position $position)
    {
        $modules = new Module();

        $modules = $modules->get();

        $roleJson = $position->permissions;

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);
        } else {
            $roleArr = [];
        }

        // dd($roleArr);

        $roleListArr = [
            'view' => 'Xem',
            'add' => 'Thêm',
            'edit' => 'Sửa',
            'delete' => 'Xóa',
        ];

        $roleListOrderArr = [
            'view' => 'Xem',
            'edit' => 'Sửa',
        ];

        return view('admin.position.permission', compact('position', 'modules', 'roleListArr', 'roleArr', 'roleListOrderArr'));
    }

    public function postPermission(Position $position, Request $request)
    {
        if (!empty($request->role)) {

            $roleArr = $request->role;
        } else {

            $roleArr = [];
        }

        $roleJson = json_encode($roleArr);

        $position->permissions =  $roleJson;

        $position->save();

        return back()->with('msg', 'phân quyền thành công');
    }
}
