<?php ?>

@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Role</div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('admin.errors')


                    <form class="form-horizontal" role="form" method="POST"
                        action="{{ route('roles.update',$role->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div
                            class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Display Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ $role->name }}" required autofocus>

                                @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div
                            class="form-group{{ $errors->has('permissions') ? ' has-error' : '' }}">
                            <label for="permission" class="col-md-4 control-label">Permissions</label>

                            <div class="col-md-6">
                                @foreach($permissions as $permission)
                                    <input type="checkbox" value="{{ $permission->id }}"
                                        {{ in_array($permission->id, $rolePermissions) ? "checked" : null }}
                                        name="permissions[]">
                                    {{ $permission->name }}<br>
                                @endforeach

                                @if($errors->has('permissions'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('permissions') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>

                                <a class="btn btn-link" href="{{ route('roles.index') }}">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection