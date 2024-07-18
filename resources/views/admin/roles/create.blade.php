@extends('layouts.admin.index')

@section('title', 'Create Roles')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Create Role') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="role_name">{{ __('Role Name') }}</label>
                                <input id="role_name" type="text"
                                    class="form-control @error('role_name') is-invalid @enderror" name="role_name"
                                    value="{{ old('role_name') }}" required autocomplete="role_name" autofocus>

                                @error('role_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{ __('Permissions') }}</label><br><br>
                                <div style="max-height: 200px; overflow-y: auto;">
                                    @foreach ($permissions as $permission)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="permissions[]"
                                                value="{{ $permission->id }}">
                                            <label class="form-check-label">{{ $permission->permission_name }}</label>
                                        </div>
                                    @endforeach
                                </div><br>

                                @error('permissions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">
                                {{ __('Create Role') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
