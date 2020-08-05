<?php ?>

@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Tạo Trang
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                    </li>
                </ul>
            </div>

        </div>
        <div class="m-portlet__body">

            <!-- Display Validation Errors -->
            @include('admin.errors')

            <form class="form-horizontal" style="width:100%" role="form" method="POST"
                action="{{ route('page.store') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-9">
                        <div
                            class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-12 control-label">Tên trang</label>

                            <div class="col-md-12">
                                <input id="title" type="text" class="form-control" name="title"
                                    value="{{ old('title') }}" onkeyup="ChangeToSlug()" required
                                    autofocus>

                                @if($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div
                            class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="col-md-12 control-label">Slug trang</label>

                            <div class="col-md-12">
                                <input id="slug" type="text" class="form-control" name="slug"
                                    value="{{ old('slug') }}">

                                @if($errors->has('slug'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="type" value="page">
                        <div
                            class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">Mô tả ngắn</label>

                            <div class="col-md-12">
                                <textarea rows="7" id="description" name="description"
                                    class="form-control my-editor">{{ old('description') }}</textarea>
                                @if($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div
                            class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-12 control-label">Nội dung</label>

                            <div class="col-md-12">
                                <textarea id="content" rows="40" name="content"
                                    class="form-control my-editor">{{ old('content') }}</textarea>
                                @if($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12" style="padding-top: 30px;padding-bottom: 30px">
                            <h2>SEO
                                <span style="font-size: 40px; float: right" class="" data-toggle="collapse"
                                    data-target="#demo"><i class="fa fa-angle-double-down"
                                        style="font-size: 40px;color: #0b51c5" aria-hidden="true"></i></span>
                            </h2>
                        </div>
                        <div id="demo" class="collapse">
                            <div
                                class="form-group{{ $errors->has('meta_title') ? ' has-error' : '' }}">
                                <label for="meta_title" class="col-md-12 control-label">Meta Title</label>

                                <div class="col-md-12">
                                    <div id="ameta_title"></div>
                                    <input rows="7" id="meta_title" name="meta_title" class="form-control"
                                        value="{{ old('meta_title') }}"></input>
                                    @if($errors->has('meta_title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('meta_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div
                                class="form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
                                <label for="keywords" class="col-md-12 control-label">Meta Keywords</label>

                                <div class="col-md-12">
                                    <div id="akeywords"></div>
                                    <input rows="7" id="keywords" name="keywords" class="form-control"
                                        value="{{ old('keywords') }}"></input>
                                    @if($errors->has('keywords'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('keywords') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div
                                class="form-group{{ $errors->has('mdescription') ? ' has-error' : '' }}">
                                <label for="mdescription" class="col-md-12 control-label">Meta Description</label>

                                <div class="col-md-12">
                                    <div id="amdescription"></div>
                                    <textarea rows="4" id="mdescription" name="mdescription"
                                        class="form-control">{{ old('mdescription') }}</textarea>
                                    @if($errors->has('mdescription'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mdescription') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="col-md-12">
                            <div class="form-group row" style="margin:0px">
                                {{-- <div class="col-md-12">
                                                    
                                                    <label class="col-md-12 col-form-label">Public trang</label>
                                                    <div class="col-md-12">
                                                        <span class="m-switch m-switch--warning">
                                                            <label>
                                                            <input type="checkbox" checked="checked" name="public">
                                                            <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                
                                            </div> --}}
                                <div class="col-md-12">
                                    <label for="image" class="control-label">Ảnh đại diện</label><br>
                                    <span class="form-group-btn">
                                        <a id="lfm" data-input="image" data-preview="holder"
                                            class="btn btn-primary text-white">
                                            <i class="fa fa-picture-o"></i> Chọn
                                        </a>
                                    </span>
                                    <input id="image" class="form-control" type="text" name="image"
                                        value="{{ old('image') }}">
                                    <div id="holder" style="margin-top:15px;max-height:300px;"></div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>




                <div class="form-group">
                    <div class="col-md-12" style="padding-bottom: 30px">
                        <button type="submit" class="btn btn-primary">
                            Tạo mới
                        </button>

                        <a class="btn btn-link" href="{{ route('page.index') }}">
                            Hủy
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.4.1/tinymce.min.js" integrity="sha512-c46AnRoKXNp7Sux2K56XDjljfI5Om/v1DvPt7iRaOEPU5X+KZt8cxzN3fFzemYC6WCZRhmpSlZvPA1pttfO9DQ==" crossorigin="anonymous"></script>
<script src="{{ asset('/admin/js/tiny.js') }}"></script>
<script src="{{ asset('/admin/js/slug.js') }}"></script>
<script type="text/javascript">
    $('#lfm').filemanager('image');
</script>
<script>
    $('#meta_title').keyup(function () {
        $('#ameta_title').text('Bạn đã nhập ' + this.value.length + ' ký tự');
    });
    $('#keywords').keyup(function () {
        $('#akeywords').text('Bạn đã nhập ' + this.value.length + ' ký tự');
    });
    $('#mdescription').keyup(function () {
        $('#amdescription').text('Bạn đã nhập ' + this.value.length + ' ký tự');
    });
</script>
</div>


@endsection