<?php ?>

@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Tạo tag bài viết
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
                action="{{ route('tag.store') }}">

                <div class="row">

                    {{ csrf_field() }}
                    <div class="col-md-9">
                        <div
                            class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-12 control-label">Tên tag bài viết</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ old('name') }}" onkeyup="ChangeToSlug()" required
                                    autofocus>

                                @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div
                            class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="col-md-12 control-label">Slug Tag bài viết</label>

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
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Tạo mới
                                </button>

                                <a class="btn btn-link" href="{{ route('tag.index') }}">
                                    Hủy
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
{{-- <script src="{{ asset('js/tinymce.min.js') }}"></script> --}}
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
    $('#lfm').filemanager('image');

    function ChangeToSlug() {
        var title, slug;

        //Lấy text từ thẻ input title
        title = document.getElementById("name").value;

        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        // var url = '{{ url('/page/') }}';
        // document.getElementById('link').value = url +'/'+ slug;
        document.getElementById('slug').value = slug;

    }
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

    $(document).ready(function () {
        $('.select2').select2();
    });
</script>
</div>


@endsection
