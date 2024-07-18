@extends('layouts.admin.index')

@section('title', 'Edit Roles')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Role') }}</div><br>

                <div class="card-body">
                    <form method="POST" action="{{ route('roles.update', $role->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="role_name">{{ __('Role Name') }}</label>
                            <input id="role_name" type="text"
                                class="form-control @error('role_name') is-invalid @enderror" name="role_name"
                                value="{{ $role->role_name }}" required autocomplete="role_name" autofocus>

                            @error('role_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Permissions') }}</label><br>
                            <div class="permission-container">
                                @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]"
                                            value="{{ $permission->id }}"
                                            {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $permission->permission_name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('permissions')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>

                        <button type="submit" class="btn btn-danger">
                            {{ __('Update Role') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
