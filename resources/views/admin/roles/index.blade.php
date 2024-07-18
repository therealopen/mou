@extends('layouts.admin.index')

@section('title', 'Roles & Permission')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Roles') }}</div>
                    <div class="card-body">
                        <div><a href="{{ route('roles.create') }}" class="btn btn-info">Add Role</a></div><br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="role-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Role Name</th>
                                        <th scope="col">Permissions</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->role_name }}</td>
                                            <td style="max-height: 80px; overflow-y: auto;">
                                                <ol style="list-style-type: decimal; padding-left: 20px; margin: 0;">
                                                    @foreach ($role->permissions as $index => $permission)
                                                        <li>{{ $permission->permission_name }}</li>
                                                        {{-- @if ($index + 1 === 4)
                                                        @break
                                                    @endif --}}
                                                @endforeach
                                            </ol>
                                        </td>
                                        <td>
                                            <a href="{{ route('roles.edit', $role->id) }}"
                                                class="btn btn-secondary">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
