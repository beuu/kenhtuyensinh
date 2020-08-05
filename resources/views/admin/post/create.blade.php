<?php ?>

@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Tạo bài viết
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

            @include('admin.errors')
            <form class="form-horizontal" style="width:100%" role="form" method="POST"
                action="{{ route('post.store') }}">

                <div class="row">

                    {{ csrf_field() }}
                    <div class="col-md-9">

                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="" class="col-md-12">Danh mục tin</label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control select2" name="cate[]" multiple="multiple">
                                    <?php categoryParentSelect2($data ,$parent = 0, $str="",old('cate') ? old('cate') : []); ?>
                                </select>
                                <p class="help-block"></p>
                                @if($errors->has('cate'))
                                    <p class="help-block">
                                        {{ $errors->first('cate') }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div
                            class="row form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <div class="col-md-2">
                                <label for="title" class="col-md-12 control-label">Tên bài viết</label>
                            </div>
                            <div class="col-md-10">
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
                            class="row form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <div class="col-md-2">
                                <label for="slug" class="col-md-12 control-label">Slug bài viết</label>
                            </div>
                            <div class="col-md-10">
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
                            <div class="col-md-2">
                                <label for="meta_title" class="col-md-12 control-label">Meta Title</label>
                            </div>


                            <div class="col-md-10">
                                <div id="ameta_title"></div>

                                <input id="meta_title" name="meta_title" class="form-control"
                                       value="{{ old('meta_title') }}"/>
                                @if($errors->has('meta_title'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('meta_title') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div
                            class="row form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
                            <div class="col-md-2">
                                <label for="keywords" class="col-md-12 control-label">Meta Keywords</label>
                            </div>


                            <div class="col-md-10">
                                <div id="akeywords"></div>
                                <input id="keywords" name="keywords" class="form-control"
                                       value="{{ old('keywords') }}"/>
                                @if($errors->has('keywords'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('keywords') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>


                        <div
                            class="row form-group{{ $errors->has('mdescription') ? ' has-error' : '' }}">
                            <div class="col-md-2">
                                <label for="mdescription" class="col-md-12 control-label">Meta Description</label>
                            </div>
                            <div class="col-md-10">
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

                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="" class="col-md-12">Thẻ Tags</label>
                                </div>
                                <div class="col-md-10">
                                    <select class="form-control" id="tag" name="tag[]" multiple="multiple">
                                        @if (old('tags'))
                                            @foreach(old('tags') as $tag)
                                                <option value="{{ $tag }}" selected="selected">{{ $tag }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>


                        <div
                            class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">Mô tả ngắn</label>

                            <div class="col-md-12">
                                <textarea rows="5" id="description" name="description"
                                    class="form-control my-editor">{{ old('description') }}</textarea>
                                @if($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div
                            class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="col-md-12 control-label">Nội dung</label>

                            <div class="col-md-12">
                                <textarea id="body" rows="40" name="body"
                                    class="form-control my-editor">{{ old('body') }}</textarea>
                                @if($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12" style="padding-top: 30px">
                                <button type="submit" class="btn btn-primary">
                                    Tạo mới
                                </button>

                                <a class="btn btn-link" href="{{ route('post.index') }}">
                                    Hủy
                                </a>
                            </div>
                        </div>


                    </div>
                    {{-- end md9 --}}
                    <div class="col-md-3">
                        <div class="form-group row" style="margin:0px">

                            <div class="col-md-12">
                                <div class="m-form__group form-group row">
                                    <label class="col-6 col-form-label">Public bài viết</label>
                                    <div class="col-6">
                                                <span class="m-switch m-switch--warning">
                                                    <label>
                                                    <input type="checkbox" checked value="1" name="public">
                                                    <span></span>
                                                    </label>
                                                </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Index Google</label>
                                    </div>
                                    <div class="col-6">
                                        <span class="m-switch m-switch--warning">
                                                    <label>
                                                    <input type="checkbox" checked value="1" name="index_seo">
                                                    <span></span>
                                                    </label>
                                                </span>
                                    </div>

                                </div>
                            </div>

                                    <div class="col-md-12">
                                        <h3>Post template</h3>
                                        <select name="type" id="type" class="form-control">
                                            <option
                                                {{ old('page-type') == 'new' ? 'selected' :'' }}
                                                value="new">Default</option>
                                            <option
                                                {{ old('page-type') == 'newcustom' ? 'selected' :'' }}
                                                value="newcustom">Custom Post</option>
                                        </select>
                                    </div>



                            <div class="col-md-12">
                                <h3 class="pt-2">
                                    <label for="image" class="control-label">Ảnh đại diện</label><br>
                                </h3>

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
            </form>
        </div>
    </div>
</div>
@routes
<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.4.1/tinymce.min.js" integrity="sha512-c46AnRoKXNp7Sux2K56XDjljfI5Om/v1DvPt7iRaOEPU5X+KZt8cxzN3fFzemYC6WCZRhmpSlZvPA1pttfO9DQ==" crossorigin="anonymous"></script>
<script src="{{ asset('/admin/js/tiny.js') }}"></script>
<script src="{{ asset('/admin/js/slug.js') }}"></script>
<script type="text/javascript">
    $('#lfm').filemanager('image');
</script>
<script>
    $("#selectbtn-tag").click(function () {
        $("#selectall-tag > option").prop("selected", "selected");
        $("#selectall-tag").trigger("change");
    });
    $("#deselectbtn-tag").click(function () {
        $("#selectall-tag > option").prop("selected", "");
        $("#selectall-tag").trigger("change");
    });

    $(document).ready(function() {
        $('.select2').select2();
        $('#tag').select2({
            minimumInputLength: 2,
            ajax: {
                url: '{{ route("api.tag.search") }}',
                dataType: 'json',
            },
        });
    });
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
