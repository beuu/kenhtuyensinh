<?php ?>
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chi tiết danh mục</div>

                    <div class="panel-body">


                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Tên danh mục</label>
                            {{ $data->title }}
                        </div>


                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Mô tả danh mục</label>
                            {{ $data->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
