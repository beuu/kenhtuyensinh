<?php ?>
@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Role</div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('admin.errors')

                    <form class="form-horizontal" role="form" method="POST"
                        action="{{ route('roles.store') }}">
                        {{ csrf_field() }}

                        <div
                            class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
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
                            class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                            <label for="permission" class="col-md-4 control-label">Permissions</label>

                            <div class="col-md-6 ">
                                @foreach($permissions as $key => $permission)
                                    <input type="checkbox" class="" value="{{ $key }}" name="permission[]">
                                    {{ $permission }}<br>
                                @endforeach

                                @if($errors->has('permission'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('permission') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
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