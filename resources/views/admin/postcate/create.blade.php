<?php ?>
@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title pb-2">
                    <h1 class="m-portlet__head-text">
                        Tạo mới danh mục
                    </h1>
                </div>
            </div>

        </div>
        <div class="m-portlet__body">

            <!-- Display Validation Errors -->
            @include('admin.errors')

            <form class="form-horizontal" role="form" method="POST"
                action="{{ route('postcate.store') }}">
                {{ csrf_field() }}

                <div class="container">
                    <div class="row">
                        <div class="col-md-9">

                            <div class="">
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" class="btn btn-success" aria-controls="home" role="tab" data-toggle="tab">Mặc Định</a></li>
                                    <li role="presentation"><a href="#profile" aria-controls="profile" class="btn btn-success ml-1" role="tab" data-toggle="tab">Custom Danh Mục</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div
                                            class="row form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <label for="name" class="control-label">Tên danh mục</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input id="title" type="text" class="form-control" name="title"
                                                       value="{{ old('title') }}" onkeyup="ChangeToSlug()" required autofocus>

                                                @if($errors->has('title'))
                                                    <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div
                                            class="row form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <label for="slug" class="control-label">Slug danh mục</label>
                                            </div>
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

                                        <div
                                            class="row form-group{{ $errors->has('meta_title') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <label for="meta_title" class="control-label">Meta Title</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input rows="7" id="meta_title" name="meta_title"
                                                       class="form-control" value="{{ old('meta_title') }}" >
                                                @if($errors->has('meta_title'))
                                                    <span class="help-block">
                                <strong>{{ $errors->first('meta_title') }}</strong>
                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div
                                            class="row form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <label for="keywords" class="control-label">SEO Keywords</label>
                                            </div>


                                            <div class="col-md-12">
                                                <input id="keywords" rows="7" name="keysword"
                                                       class="form-control" value="{{ old('keysword') }}">

                                                @if($errors->has('keywords'))
                                                    <span class="help-block">
                                <strong>{{ $errors->first('keywords') }}</strong>
                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div
                                            class="row form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <label for="mdescription" class="control-label">SEO Description</label>
                                            </div>


                                            <div class="col-md-12">
                        <textarea id="mdescription" rows="3" name="mdescription"
                                  class="form-control">{{ old('mdescription') }}</textarea>

                                                @if($errors->has('mdescription'))
                                                    <span class="help-block">
                                <strong>{{ $errors->first('mdescription') }}</strong>
                            </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile">
                                        <div
                                            class="row form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <label for="description" class="control-label">Description</label>
                                            </div>
                                            <div class="col-md-12">
                        <textarea id="mdescription" rows="3" name="description"
                                  class="form-control my-editor">{{ old('description') }}</textarea>

                                                @if($errors->has('description'))
                                                    <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div
                                            class="row form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <label for="body" class="control-label">Body</label>
                                            </div>


                                            <div class="col-md-12">
                        <textarea id="body" rows="7" name="body"
                                  class="form-control my-editor">{{ old('body') }}</textarea>

                                                @if($errors->has('body'))
                                                    <span class="help-block">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="">Thể loại danh mục</label>
                                </div>
                                <div class="col-md-12">
                                    <select name="type" class="form-control">
                                        <option value="postcate">Mặc Định</option>
                                        <option value="catecustom">Custom</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <h3>Index Google</h3>
                                    <input type="checkbox" checked value="1" name="index_seo"> Index Google
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="">Danh mục cha</label>
                                </div>
                                <div class="col-md-12">
                                    <select name="pid" class="form-control">
                                        <option value="0">Chọn</option>
                                        <?php categoryParent($datas); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="thumbnail" class="control-label">Thumbnail</label>
                                </div>
                                <div class="col-md-12">
                        <span class="form-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                            <i class="fa fa-picture-o"></i> Chọn
                        </a>
                        </span>
                                    <input id="thumbnail" class="form-control" type="text" name="image" value="">
                                    <div class="form-group col-md-12">
                                        <div id="holder" style="margin-top:15px;max-height:300px;"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Tạo mới
                        </button>

                        <a class="btn btn-link" href="{{ route('postcate.index') }}">
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
@endsection
