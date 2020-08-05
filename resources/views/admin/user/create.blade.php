<?php ?>
@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="panel panel-default">
                <div class="panel-heading pb-4">
                    <h1>Tạo mới người dùng</h1>
                </div>

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
                        action="{{ route('user.store') }}">
                        {{ csrf_field() }}

                        <div
                            class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-2">

                                <label for="name" class="control-label">Name</label>
                            </div>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ old('name') }}" required autofocus>

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
                                <label for="email" class="col-md-4 control-label">Email:</label>
                            </div>


                            <div class="col-md-10">
                                <input id="email" type="text" class="form-control" name="email"
                                    value="{{ old('email') }}" required autofocus>

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
                                <a id="lfm" data-input="image" data-preview="holderuser"
                                   class="btn btn-dark text-white">
                                    <i class="fa fa-picture-o"></i> Chọn
                                </a>
                                </span>
                                <input id="image" class="form-control" type="text" name="avatar"
                                       value="{{ old('avatar') }}">
                                <div id="holderuser" style="margin-top:15px;max-height:100px;">
                                    <img src="" alt="" width="100px">
                                </div>
                            </div>

                        </div>
                        <div
                            class=" row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-2">

                                <label for="password" class="col-md-4 control-label">Password</label>
                            </div>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control" name="password" required
                                    autofocus>
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
                                <input id="confirm-password" type="password" class="form-control"
                                    name="confirm-password" required autofocus>
                                @if($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
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
                                    @foreach($roles as $key => $role)
                                        <option value="{{ $key }}">{{ $role }}</option>
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
                                    Save
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
<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
    $('#lfm').filemanager('image');
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>
@endsection
