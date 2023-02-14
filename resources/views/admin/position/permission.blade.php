@extends('admin.layout.index')

@section('page_heading')
    Phân Quyền: {{ $position->name }}
@endsection

@section('redirect')
    @can('positions', App\Models\Position::class)
        <a href="{{ route('admin.positions.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fa-solid fa-left"></i>
            Danh sách các quyền
        </a>
    @endcan
@endsection

@section('content')

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    <form action="" method="POST">

        @csrf

        <table class="table table-bordered">
            <thead style="background-color: #C0C0C0; color: #333;">
                <tr>
                    <th width="20%">Modules</th>
                    <th>Quyền</th>
                </tr>
            </thead>

            <tbody>
                @if ($modules->count() > 0)
                    @foreach ($modules as $module)
                        <tr>
                            <td style="text-transform: capitalize; text-align: left !important">{{ $module->title }}</td>
                            <td>
                                <div class="row">
                                    @if ($module->name != 'orders')
                                        @if (!empty($roleListArr))
                                            @foreach ($roleListArr as $roleName => $roleLable)
                                                <div class="col-lg-2">
                                                    <label for="role_{{ $module->name }}_{{ $roleName }}" class="d-flex"
                                                        style="align-items: center">
                                                        <input type="checkbox" name="role[{{ $module->name }}][]"
                                                            id="role_{{ $module->name }}_{{ $roleName }}"
                                                            value="{{ $roleName }}"
                                                            {{ isRole($roleArr, $module->name, $roleName) ? 'checked' : false }}
                                                            style="margin-right: 6px">
                                                        {{ $roleLable }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif
                                    @else
                                        @if (!empty($roleListOrderArr))
                                            @foreach ($roleListOrderArr as $roleName => $roleLable)
                                                <div class="col-lg-2">
                                                    <label for="role_{{ $module->name }}_{{ $roleName }}"
                                                        class="d-flex" style="align-items: center">
                                                        <input type="checkbox" name="role[{{ $module->name }}][]"
                                                            id="role_{{ $module->name }}_{{ $roleName }}"
                                                            value="{{ $roleName }}"
                                                            {{ isRole($roleArr, $module->name, $roleName) ? 'checked' : false }}
                                                            style="margin-right: 6px">
                                                        {{ $roleLable }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif

                                    @if ($module->name == 'positions')
                                        <div class="col-lg-3">
                                            <label for="role_{{ $module->name }}_permission" class="d-flex"
                                                style="align-items: center">
                                                <input type="checkbox" name="role[{{ $module->name }}][]"
                                                    id="role_{{ $module->name }}_permission" value="permission"
                                                    {{ isRole($roleArr, $module->name, 'permission') ? 'checked' : false }}
                                                    style="margin-right: 6px">
                                                Phân Quyền
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary mb-4 ml-3">Phân quyền</button>
    </form>
@endsection
