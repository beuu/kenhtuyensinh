<?php ?>

@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Sửa bài viết
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{ route('allslug', $data2->slugs->slug) }}"
                            target="_blank">XEM TRƯỚC</a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="m-portlet__body">

            <!-- Display Validation Errors -->
            @include('admin.errors')


            <form class="form-horizontal" style="width:100%" role="form" method="POST"
                action="{{ route('page.update',$data2->id) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="row">
                    <div class="col-md-9">
                        <div
                            class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-12 control-label">Tên trang</label>

                            <div class="col-md-12">
                                <input id="title" type="text" class="form-control" name="title"
                                    value="{{ $data2->title }}" required autofocus>

                                @if($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div
                            class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="col-md-12 control-label">Slug bài viết</label>

                            <div class="col-md-12">
                                <input id="slug" type="text" class="form-control" name="slug"
                                    value="{{ $data2->slugs->slug }}">

                                @if($errors->has('slug'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div
                            class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">Mô tả ngắn</label>

                            <div class="col-md-12">
                                <textarea id="description" rows="7" name="description"
                                    class="form-control my-editor">{{ $data2->description }}</textarea>
                                @if($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div
                            class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">Mô tả </label>

                            <div class="col-md-12">
                                <textarea id="content" rows="40" name="content"
                                    class="form-control my-editor">{{ $data2->content }}</textarea>
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
                                        value="{{ $data2->meta_title }}"></input>
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
                                        value="{{ $data2->keywords }}"></input>
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
                                        class="form-control">{{ $data2->mdescription }}</textarea>
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
                            {{-- <div class="m-form__group form-group row">
                                            
                                            <label class="col-3 col-form-label">Public trang</label>
                                            <div class="col-3">
                                                <span class="m-switch m-switch--warning">
                                                    <label>
                                                    <?php
                                                        if ($data2->public ==1) {
                                                            echo "<input type='checkbox' checked='checked' name='public'>";
                                                        }else {
                                                            echo "<input type='checkbox' name='public'>";
                                                        }
                                                    ?>
                                                    <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div> --}}

                        </div>
                        <div class="col-md-12">
                            <label for="image" class="control-label">Ảnh đại diện</label><br>
                            <span class="form-group-btn">
                                <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary text-white">
                                    <i class="fa fa-picture-o"></i> Chọn
                                </a>
                            </span>
                            <input id="image" class="form-control col-md-12" type="text" name="image"
                                value="{{ $data2->image }}">
                            <div id="holder" style="margin-top:15px;max-height:100px;">
                                <img src="{{ asset($data2->image) }}" alt="">
                            </div>
                        </div>

                    </div>
                </div>
        </div>






        <div class="form-group">
            <div class="col-md-8 col-md-offset-4" style="padding-bottom: 30px">
                <button type="submit" class="btn btn-primary">
                    Sửa
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