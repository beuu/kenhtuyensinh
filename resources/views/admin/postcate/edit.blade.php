<?php ?>

@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Sửa Danh Mục
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

            <form class="form-horizontal" method="POST"
                action="{{ route('postcate.update', $data->id) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}



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
                                                       value="{{ old('title') ? old('title') : $data->title }}"  required autofocus>

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
                                                       value="{{ old('slug') ? old('slug') : $data->slugs->slug }}">

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
                                                       class="form-control" value="{{ old('meta_title') ? old('meta_title') : $data->meta_title}}" >
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
                                                       class="form-control" value="{{ old('keysword') ? old('keysword') : $data->keysword }}">

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
                                  class="form-control">{{ old('mdescription') ? old('mdescription') : $data->mdescription}}</textarea>

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
                                  class="form-control my-editor">{{ old('description') ? old('description') :$data->description }}</textarea>

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
                                            <input type="hidden" name="slugs[id]" value="{{ $data->slugs->id }}">

                                            <div class="col-md-12">
                        <textarea id="body" rows="7" name="body"
                                  class="form-control my-editor">{{ old('body') ? old('body') : $data->body }}</textarea>

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
                                    <input type="checkbox" {{ $data->index_seo != 0 ? 'checked' : null  }} value="1" name="index_seo"> Index Google
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
                            Sửa
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

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
    $('#lfm').filemanager('image');

    function ChangeToSlug() {
        var title, slug;

        //Lấy text từ thẻ input title
        title = document.getElementById("title").value;

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
    var editor_config = {
        path_absolute: "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback: function (field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                'body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document
                .getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>
@endsection
