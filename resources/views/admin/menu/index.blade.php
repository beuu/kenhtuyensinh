@extends('layouts.admin')

@section('content')

<?php
$currentUrl = url()->current();
?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="{{asset('menu/style.css')}}" rel="stylesheet">
<div id="hwpwrap">
	<div class="custom-wp-admin wp-admin wp-core-ui js   menu-max-depth-0 nav-menus-php auto-fold admin-bar">
        <div class="row">
            <div class="col-md-12">
                <div class="manage-menus">
                    <form method="get" action="{{ $currentUrl }}">
                        <label for="menu" class="selected-menu">Chọn menu bạn muốn chỉnh sửa:</label>
                        {!! menuselect('menu', $menulist)!!}

                        <span class="submit-btn">
                            <input type="submit" class="btn btn-success" value="Chọn">
                        </span>
                        <span class="add-new-menu-action"> hoặc <a href="{{ $currentUrl }}?action=edit&menu=0">Tạo mới menu menu</a>. </span>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                @if(request()->has('menu')  && !empty(request()->input("menu")))
								<div id="menu-settings-column" class="metabox-holder" style="padding-top: 15px">

									<div class="clear"></div>

									<form id="nav-menu-meta" action="" class="nav-menu-meta" method="post" enctype="multipart/form-data">
										<div id="side-sortables" class="accordion-container">
											<ul class="outer-border">
												<li class="control-section accordion-section  open add-page" id="add-page">
													<h3 class="accordion-section-title hndle" tabindex="0"> Custom Link <span class="screen-reader-text">Press return or enter to expand</span></h3>
													<div class="accordion-section-content ">
														<div class="inside">
															<div class="customlinkdiv" id="customlinkdiv">
																<p id="menu-item-url-wrap">
																	<label class="howto" for="custom-menu-item-url"> <span>URL</span>&nbsp;&nbsp;&nbsp;
                                  <input id="custom-menu-item-url" name="url" type="text" class="menu-item-textbox " placeholder="{{ url('/') }}">
																	</label>
																</p>

																<p id="menu-item-name-wrap">
																	<label class="howto" for="custom-menu-item-name"> <span>Label</span>&nbsp;
																		<input id="custom-menu-item-name" name="label" type="text" class="regular-text menu-item-textbox input-with-default-title" title="Label menu">
																	</label>
																</p>

																<p class="button-controls">

																	<a  href="#" onclick="addcustommenu()"  class="btn btn-success"  >Thêm menu item</a>
																	<span class="spinner" id="spincustomu"></span>
																</p>

															</div>
														</div>
													</div>
												</li>

											</ul>
										</div>
									</form>

								</div>
                                @endif
                                @if(request()->has('menu')  && !empty(request()->input("menu")))
								<div id="menu-settings-column" class="metabox-holder">

									<div class="clear"></div>

									<form id="nav-menu-meta" action="" class="nav-menu-meta" method="post" enctype="multipart/form-data">
										<div id="side-sortables" class="accordion-container">
											<ul class="outer-border">
												<li class="control-section accordion-section  open add-page" id="add-page">
													<h3 class="accordion-section-title hndle" tabindex="0">Danh mục<span class="screen-reader-text">Press return or enter to expand</span></h3>
													<div class="accordion-section-content ">
														<div class="inside">
															<div class="customlinkdiv" id="customlinkdiv">
                                <div class="row">
                                  <div class="col-md-12">
                                          <select onchange="val()" name="label" id="label" width="100%">
                                            <option value="">Chọn danh mục</option>
                                            @foreach ($cate as $item)
                                      <option value="{{ $item->title}}" hidden-attr="{{ "/".$item->slugs->slug}}">{{ $item->title}}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                  <div class="col-md-12">
                                    <p class="button-controls">

                                      <a  href="#" onclick="addcustommenucate()"  class="btn btn-success"  >Add</a>
                                      <span class="spinner" id="spincustomu"></span>
                                    </p>
                                  </div>
                                </div>
															</div>
														</div>
													</div>
												</li>

											</ul>
										</div>
									</form>

								</div>
                @endif
                {{-- Page --}}
                @if(request()->has('menu')  && !empty(request()->input("menu")))
								<div id="menu-settings-column" class="metabox-holder">

									<div class="clear"></div>

									<form id="nav-menu-meta" action="" class="nav-menu-meta" method="post" enctype="multipart/form-data">
										<div id="side-sortables" class="accordion-container">
											<ul class="outer-border">
												<li class="control-section accordion-section  open add-page" id="add-page">
													<h3 class="accordion-section-title hndle" tabindex="0">Trang<span class="screen-reader-text">Press return or enter to expand</span></h3>
													<div class="accordion-section-content ">
														<div class="inside">
															<div class="customlinkdiv" id="customlinkdiv">
                                <div class="row">
                                  <div class="col-md-12">
                                          <select onchange="val()" name="label" id="labelp" width="100%">
                                            <option value="">Chọn Trang</option>
                                            @foreach ($page as $item)
                                      <option value="{{ $item->title}}" hidden-attr="{{"/".$item->slugs->slug}}">{{ $item->title}}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                  <div class="col-md-12">
                                    <p class="button-controls">

                                      <a  href="#" onclick="addcustommenupage()"  class="btn btn-success"  >Add</a>
                                      <span class="spinner" id="spincustomu"></span>
                                    </p>
                                  </div>
                                </div>
															</div>
														</div>
													</div>
												</li>

											</ul>
										</div>
									</form>

								</div>
                @endif
                {{-- end page --}}
            </div>
            {{-- end md3 --}}
            <div class="col-md-9">
                <form id="update-nav-menu" action="" method="post" enctype="multipart/form-data">
                    <div class="menu-edit ">
                        <div id="nav-menu-header">
                            <div class="major-publishing-actions">
                                <label class="menu-name-label howto open-label" for="menu-name"> <span>Name</span>
                                    <input name="menu-name" id="menu-name" type="text" class="menu-name regular-text menu-item-textbox" title="Enter menu name" value="@if(isset($indmenu)){{$indmenu->name}}@endif">
                                    <input type="hidden" id="idmenu" value="@if(isset($indmenu)){{$indmenu->id}}@endif" />
                                </label>

                                @if(request()->has('action'))
                                <div class="publishing-action">
                                    <a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="btn btn-success">Tạo mới menu</a>
                                </div>
                                @elseif(request()->has("menu"))
                                <div class="publishing-action">
                                    <a onclick="getmenus()" name="save_menu" id="save_menu_header" class="btn btn-success">Lưu menu</a>
                                    <span class="spinner" id="spincustomu2"></span>
                                </div>

                                @else
                                <div class="publishing-action">
                                    <a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="btn btn-success">Tạo mới menu</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div id="post-body">
                            <div id="post-body-content">

                                @if(request()->has("menu"))
                                <h3>Menu Structure</h3>
                                <div class="drag-instructions post-body-plain" style="">
                                    <p>
                                        Place each item in the order you prefer. Click on the arrow to the right of the item to display more configuration options.
                                    </p>
                                </div>

                                @else
                                <h3>Tạo mới Menu</h3>
                                <div class="drag-instructions post-body-plain" style="">
                                    <p>
                                        Vui lòng nhập tên và nhấn "Tạo mới menu" button
                                    </p>
                                </div>
                                @endif

                                <ul class="menu ui-sortable" id="menu-to-edit">
                                    @if(isset($menus))
                                    @foreach($menus as $m)
                                    <li id="menu-item-{{$m->id}}" class="menu-item menu-item-depth-{{$m->depth}} menu-item-page menu-item-edit-inactive pending" style="display: list-item;">
                                        <dl class="menu-item-bar">
                                            <dt class="menu-item-handle">
                                                <span class="item-title"> <span class="menu-item-title"> <span id="menutitletemp_{{$m->id}}">{{$m->label}}</span> <span style="color: transparent;">|{{$m->id}}|</span> </span> <span class="is-submenu" style="@if($m->depth==0)display: none;@endif">Subelement</span> </span>
                                                <span class="item-controls"> <span class="item-type">Link</span> <span class="item-order hide-if-js"> <a href="{{ $currentUrl }}?action=move-up-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44" class="item-move-up"><abbr title="Move Up">↑</abbr></a> | <a href="{{ $currentUrl }}?action=move-down-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44" class="item-move-down"><abbr title="Move Down">↓</abbr></a> </span> <a class="item-edit" id="edit-{{$m->id}}" title=" " href="{{ $currentUrl }}?edit-menu-item={{$m->id}}#menu-item-settings-{{$m->id}}"> </a> </span>
                                            </dt>
                                        </dl>

                                        <div class="menu-item-settings" id="menu-item-settings-{{$m->id}}">
                                            <input type="hidden" class="edit-menu-item-id" name="menuid_{{$m->id}}" value="{{$m->id}}" />
                                            <p class="description description-thin">
                                                <label for="edit-menu-item-title-{{$m->id}}"> Label
                                                    <br>
                                                    <input type="text" id="idlabelmenu_{{$m->id}}" class="widefat edit-menu-item-title" name="idlabelmenu_{{$m->id}}" value="{{$m->label}}">
                                                </label>
                                            </p>

                                            <p class="field-css-classes description description-thin">
                                                <label for="edit-menu-item-classes-{{$m->id}}"> Class CSS (optional)
                                                    <br>
                                                    <input type="text" id="clases_menu_{{$m->id}}" class="widefat code edit-menu-item-classes" name="clases_menu_{{$m->id}}" value="{{$m->class}}">
                                                </label>
                                            </p>

                                            <p class="field-css-url description description-wide">
                                                <label for="edit-menu-item-url-{{$m->id}}"> Url
                                                    <br>
                                                    <input type="text" id="url_menu_{{$m->id}}" class="widefat code edit-menu-item-url" id="url_menu_{{$m->id}}" value="{{$m->link}}">
                                                </label>
                                            </p>

                                            @if(!empty($roles))
                                            <p class="field-css-role description description-wide">
                                                <label for="edit-menu-item-role-{{$m->id}}"> Role
                                                    <br>
                                                    <select id="role_menu_{{$m->id}}" class="widefat code edit-menu-item-role" name="role_menu_[{{$m->id}}]" >
                                                        <option value="0">Select Role</option>
                                                        @foreach($roles as $role)
                                                            <option @if($role->id == $m->role_id) selected @endif value="{{ $role->$role_pk }}">{{ ucwords($role->$role_title_field) }}</option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                            </p>
                                            @endif

                                            <p class="field-move hide-if-no-js description description-wide">
                                                <label> <span>Move</span> <a href="{{ $currentUrl }}" class="menus-move-up" style="display: none;">Move up</a> <a href="{{ $currentUrl }}" class="menus-move-down" title="Mover uno abajo" style="display: inline;">Move Down</a> <a href="{{ $currentUrl }}" class="menus-move-left" style="display: none;"></a> <a href="{{ $currentUrl }}" class="menus-move-right" style="display: none;"></a> <a href="{{ $currentUrl }}" class="menus-move-top" style="display: none;">Top</a> </label>
                                            </p>

                                            <div class="menu-item-actions description-wide submitbox">

                                                <a class="item-delete submitdelete deletion" id="delete-{{$m->id}}" href="{{ $currentUrl }}?action=delete-menu-item&menu-item={{$m->id}}&_wpnonce=2844002501">Delete</a>
                                                <span class="meta-sep hide-if-no-js"> | </span>
                                                <a class="item-cancel submitcancel hide-if-no-js" id="cancel-{{$m->id}}" href="{{ $currentUrl }}?edit-menu-item={{$m->id}}&cancel=1424297719#menu-item-settings-{{$m->id}}">Cancel</a>
                                                <span class="meta-sep hide-if-no-js"> | </span>
                                                <a onclick="getmenus()" class="btn btn-success" id="update-{{$m->id}}" href="javascript:void(0)">Update item</a>

                                            </div>

                                        </div>
                                        <ul class="menu-item-transport"></ul>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                                <div class="menu-settings">

                                </div>
                            </div>
                        </div>
                        <div id="nav-menu-footer">
                            <div class="major-publishing-actions">

                                @if(request()->has('action'))
                                <div class="publishing-action">
                                    <a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="btn btn-success">Create menu</a>
                                </div>
                                @elseif(request()->has("menu"))
                                <span class="delete-action"> <a class="submitdelete deletion menu-delete" onclick="deletemenu()" href="javascript:void(9)">Delete menu</a> </span>
                                <div class="publishing-action">

                                    <a onclick="getmenus()" name="save_menu" id="save_menu_header" class="btn btn-success">Save menu</a>
                                    <span class="spinner" id="spincustomu2"></span>
                                </div>

                                @else
                                <div class="publishing-action">
                                    <a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="btn btn-success">Create menu</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            {{-- end md9 --}}
        </div>
	</div>
</div>
@routes
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
	var menus = {
		"oneThemeLocationNoMenus" : "",
		"moveUp" : "Move up",
		"moveDown" : "Mover down",
		"moveToTop" : "Move top",
		"moveUnder" : "Move under of %s",
		"moveOutFrom" : "Out from under  %s",
		"under" : "Under %s",
		"outFrom" : "Out from %s",
		"menuFocus" : "%1$s. Element menu %2$d of %3$d.",
		"subMenuFocus" : "%1$s. Menu of subelement %2$d of %3$s."
	};
	var arraydata = [];
	var addcustommenur= '{{ route("haddcustommenu") }}';
	var updateitemr= '{{ route("hupdateitem")}}';
	var generatemenucontrolr= '{{ route("hgeneratemenucontrol") }}';
	var deleteitemmenur= '{{ route("hdeleteitemmenu") }}';
	var deletemenugr= '{{ route("hdeletemenug") }}';
	var createnewmenur= '{{ route("hcreatenewmenu") }}';
	var menuwr = "{{ url()->current() }}";
	$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
});
</script>
<script>

  function val() {
    d = document.getElementById("label").value;
    var hidden = $('#label').find("option:selected").attr("hidden-attr");
}
    var arraydata = [];
function getmenus() {
  arraydata = [];
  $('#spinsavemenu').show();

  var cont = 0;
  $('#menu-to-edit li').each(function(index) {
    var dept = 0;
    for (var i = 0; i < $('#menu-to-edit li').length; i++) {
      var n = $(this)
        .attr('class')
        .indexOf('menu-item-depth-' + i);
      if (n != -1) {
        dept = i;
      }
    }
    var textoiner = $(this)
      .find('.item-edit')
      .text();
    var id = this.id.split('-');
    var textoexplotado = textoiner.split('|');
    var padre = 0;
    if (
      !!textoexplotado[textoexplotado.length - 2] &&
      textoexplotado[textoexplotado.length - 2] != id[2]
    ) {
      padre = textoexplotado[textoexplotado.length - 2];
    }
    arraydata.push({
      depth: dept,
      id: id[2],
      parent: padre,
      sort: cont
    });
    cont++;
  });
  updateitem();
  actualizarmenu();
}

function addcustommenu() {
  $('#spincustomu').show();

  $.ajax({
    data: {
      labelmenu: $('#custom-menu-item-name').val(),
      linkmenu: $('#custom-menu-item-url').val(),
      rolemenu: $('#custom-menu-item-role').val(),
      idmenu: $('#idmenu').val()
    },

    url: route('haddcustommenu') +'?_token=' + '{{ csrf_token() }}',
    type: 'POST',
    success: function(response) {
      window.location.reload();
    },
    complete: function() {
      $('#spincustomu').hide();
    }
  });
}
function addcustommenucate() {
  $('#spincustomu').show();

  $.ajax({
    data: {
      labelmenu: $("#label").val(),
      linkmenu: $('#label').find("option:selected").attr("hidden-attr"),
      rolemenu: $('#custom-menu-item-role').val(),
      idmenu: $('#idmenu').val()
    },

    url: route('haddcustommenu') +'?_token=' + '{{ csrf_token() }}',
    type: 'POST',
    success: function(response) {
      window.location.reload();
    },
    complete: function() {
      $('#spincustomu').hide();
    }
  });
}

function addcustommenupage() {
  $('#spincustomu').show();

  $.ajax({
    data: {
      labelmenu: $("#labelp").val(),
      linkmenu: $('#labelp').find("option:selected").attr("hidden-attr"),
      rolemenu: $('#custom-menu-item-role').val(),
      idmenu: $('#idmenu').val()
    },

    url: route('haddcustommenu') +'?_token=' + '{{ csrf_token() }}',
    type: 'POST',
    success: function(response) {
      window.location.reload();
    },
    complete: function() {
      $('#spincustomu').hide();
    }
  });
}

function updateitem(id = 0) {
  if (id) {
    var label = $('#idlabelmenu_' + id).val();
    var clases = $('#clases_menu_' + id).val();
    var url = $('#url_menu_' + id).val();
    var role_id = 0;
    if ($('#role_menu_' + id).length) {
      role_id = $('#role_menu_' + id).val();
    }

    var data = {
      label: label,
      clases: clases,
      url: url,
      role_id: role_id,
      id: id
    };
  } else {
    var arr_data = [];
    $('.menu-item-settings').each(function(k, v) {
      var id = $(this)
        .find('.edit-menu-item-id')
        .val();
      var label = $(this)
        .find('.edit-menu-item-title')
        .val();
      var clases = $(this)
        .find('.edit-menu-item-classes')
        .val();
      var url = $(this)
        .find('.edit-menu-item-url')
        .val();
      var role = $(this)
        .find('.edit-menu-item-role')
        .val();
      arr_data.push({
        id: id,
        label: label,
        class: clases,
        link: url,
        role_id: role
      });
    });

    var data = { arraydata: arr_data };
  }
  $.ajax({
    data: data,
    url: route('hupdateitem') +'?_token=' + '{{ csrf_token() }}',
    type: 'POST',
    beforeSend: function(xhr) {
      if (id) {
        $('#spincustomu2').show();
      }
    },
    success: function(response) {},
    complete: function() {
      if (id) {
        $('#spincustomu2').hide();
      }
    }
  });
}

function actualizarmenu() {
  $.ajax({
    dataType: 'json',
    data: {
      arraydata: arraydata,
      menuname: $('#menu-name').val(),
      idmenu: $('#idmenu').val()
    },

    url: route('hgeneratemenucontrol') +'?_token=' + '{{ csrf_token() }}',
    type: 'POST',
    beforeSend: function(xhr) {
      $('#spincustomu2').show();
    },
    success: function(response) {
      console.log('aqu llega');
    },
    complete: function() {
      $('#spincustomu2').hide();
    }
  });
}

function deleteitem(id) {
  $.ajax({
    dataType: 'json',
    data: {
      id: id
    },

    url: route('hdeleteitemmenu') +'?_token=' + '{{ csrf_token() }}',
    type: 'POST',
    success: function(response) {}
  });
}

function deletemenu() {
  var r = confirm('Do you want to delete this menu ?');
  if (r == true) {
    $.ajax({
      dataType: 'json',

      data: {
        id: $('#idmenu').val()
      },

      url: route('hdeletemenug') +'?_token=' + '{{ csrf_token() }}',
      type: 'POST',
      beforeSend: function(xhr) {
        $('#spincustomu2').show();
      },
      success: function(response) {
        if (!response.error) {
          alert(response.resp);
          window.location = menuwr;
        } else {
          alert(response.resp);
        }
      },
      complete: function() {
        $('#spincustomu2').hide();
      }
    });
  } else {
    return false;
  }
}

function createnewmenu() {
  if (!!$('#menu-name').val()) {
    $.ajax({
      dataType: 'json',

      data: {
        menuname: $('#menu-name').val()
      },

      url: route('hcreatenewmenu') +'?_token=' + '{{ csrf_token() }}',
      type: 'POST',
      success: function(response) {
        window.location = menuwr + '?menu=' + response.resp;
      }
    });
  } else {
    alert('Enter menu name!');
    $('#menu-name').focus();
    return false;
  }
}
</script>
<script type="text/javascript" src="{{asset('menu/scripts.js')}}"></script>
<script type="text/javascript" src="{{asset('menu/scripts2.js')}}"></script>
<script type="text/javascript" src="{{asset('menu/menu.js')}}"></script>