<?php ?>

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="panel panel-default">
                <h1>Edit User</h1>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form class="form-horizontal" role="form" method="POST"
                        action="{{ route('user.update',$user->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div
                            class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-2">
                                <label for="name" class="col-md-4 control-label">Name</label>
                            </div>
                            <div class="col-md-10">
                                <input id="display_name" type="text" class="form-control" name="name"
                                    value="{{ $user->name }}" required autofocus>

                                @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div
                            class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-2">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>
                            </div>
                            <div class="col-md-10">
                                <input id="email" type="text" class="form-control" name="email"
                                    value="{{ $user->email }}" required autofocus>

                                @if($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="image" class="control-label">Ảnh đại diện</label><br>
                    </div>
                    <div class="col-md-10">
                        <span class="form-group-btn">
                        <a id="lfm" data-input="image" data-preview="holderuser" class="btn btn-primary text-white">
                            <i class="fa fa-picture-o"></i> Chọn
                        </a>
                    </span>
                        <input id="image" class="form-control col-md-12" type="text" name="avatar"
                               value="{{ $user->avatar }}">
                        <div id="holderuser" style="margin-top:15px;max-height:100px;">
                            <img src="{{ asset($user->avatar) }}" alt="" width="100px">
                        </div>
                    </div>

                </div>
                        <div
                            class=" row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-2">
                                <label for="password" class="col-md-4 control-label">Password</label>
                            </div>
                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control" name="password" autofocus>
                                @if($errors->has('password'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div
                            class="row form-group{{ $errors->has('confirm-password') ? ' has-error' : '' }}">
                            <div class="col-md-2">
                                <label for="confirm-password" class="col-md-4 control-label">Confirm Password</label>
                            </div>
                            <div class="col-md-10">
                                <input id="confirm-password" type="password" class="form-control" name="confirm-password"
                                       autofocus>
                                @if($errors->has('confirm-password'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('confirm-password') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                <div
                    class="row form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                    <div class="col-md-2">
                        <label for="roles" class="col-md-4 control-label">Roles</label>
                    </div>
                    <div class="col-md-10">

                        <select id="role" name="roles[]" class="form-control select2" multiple>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ in_array($role->id, $userRole) ? "selected" : null }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>

                        @if($errors->has('roles'))
                            <span class="help-block">
                                <strong>{{ $errors->first('roles') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-success">
                            Update
                        </button>

                        <a class="btn btn-danger" href="{{ route('user.index') }}">
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
{{-- <script src="{{ asset('js/tinymce.min.js') }}"></script> --}}

<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
    $('#lfm').filemanager('image');
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>
@endsection
