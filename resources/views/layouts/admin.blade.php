<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ADMIN | Dashboard</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link href="{{ asset('admin/assets/vendors/custom/datatables/datatables.bundle.css') }}"
          rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('admin/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet"
          type="text/css" />
    <link href="{{ asset('admin/assets/demo/default/base/style.bundle.css') }}"
          rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <!--RTL version:<link href="assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link rel="shortcut icon" href="{{asset('./images/faicon.jpg')}}">
</head>
<body
    class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<div class="m-grid m-grid--hor m-grid--root m-page">
    <!-- BEGIN: Header -->
    <header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
        <div class="m-container m-container--fluid m-container--full-height">
            <div class="m-stack m-stack--ver m-stack--desktop">
                <!-- BEGIN: Brand -->
                <div class="m-stack__item m-brand  m-brand--skin-dark ">
                    <div class="m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                            <a href="{{ route('home') }}" target="_blank" class="m-brand__logo-wrapper">
                                Trang chủ
                            </a>
                        </div>
                        <div class="m-stack__item m-stack__item--middle m-brand__tools">

                            <!-- BEGIN: Left Aside Minimize Toggle -->
                            <a href="javascript:;" id="m_aside_left_minimize_toggle"
                               class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
                                <span></span>
                            </a>
                            <!-- END -->

                            <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                            <a href="javascript:;" id="m_aside_left_offcanvas_toggle"
                               class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                            <!-- END -->



                            <!-- BEGIN: Responsive Header Menu Toggler -->
                            <a id="m_aside_header_menu_mobile_toggle" href="javascript:;"
                               class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                            <!-- END -->


                            <!-- BEGIN: Topbar Toggler -->
                            <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
                               class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                <i class="flaticon-more"></i>
                            </a>
                            <!-- BEGIN: Topbar Toggler -->
                        </div>
                    </div>
                </div>
                <!-- END: Brand -->
                <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                    <!-- BEGIN: Horizontal Menu -->
                    <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark "
                            id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>

                    <!-- END: Horizontal Menu -->
                    <!-- BEGIN: Topbar -->
                    <div id="m_header_topbar"
                         class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">


                        <div class="m-stack__item m-topbar__nav-wrapper">
                            <ul class="m-topbar__nav m-nav m-nav--inline">
                                <li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light"
                                    m-dropdown-toggle="click" id="m_quicksearch" m-quicksearch-mode="dropdown"
                                    m-dropdown-persistent="1">

                                    <a href="#" class="m-nav__link m-dropdown__toggle">
                                        <span class="m-nav__link-icon"><i class="flaticon-search-1"></i></span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                        <div class="m-dropdown__inner ">
                                            <div class="m-dropdown__header">
                                                <form class="m-list-search__form">
                                                    <div class="m-list-search__form-wrapper">
															<span class="m-list-search__form-input-wrapper">
																<input id="m_quicksearch_input" autocomplete="off"
                                                                       type="text" name="q"
                                                                       class="m-list-search__form-input" value=""
                                                                       placeholder="Search...">
															</span>
                                                        <span class="m-list-search__form-icon-close"
                                                              id="m_quicksearch_close">
																<i class="la la-remove"></i>
															</span>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__scrollable m-scrollable"
                                                     data-scrollable="true" data-height="300"
                                                     data-mobile-height="200">
                                                    <div class="m-dropdown__content">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>



                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                    m-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
											<span class="m-topbar__userpic">
												<img src="{{ Auth::user()->image ? Auth::user()->image : asset('admin/assets/app/media/img/users/user4.jpg') }}"
                                                     class="m--img-rounded m--marginless" alt="" />
											</span>
                                        <span class="m-topbar__username m--hide">{{ Auth::user()->name }}</span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
											<span
                                                class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center" style="">
                                                <div class="m-card-user m-card-user--skin-dark">
                                                    <div class="m-card-user__pic">
                                                        <img src="{{  Auth::user()->image ? Auth::user()->image : asset('admin/assets/app/media/img/users/user4.jpg') }}"
                                                             class="m--img-rounded m--marginless" alt="" />
                                                        <!--
                    <span class="m-type m-type--lg m--bg-danger"><span class="m--font-light">S<span><span>
                    -->
                                                    </div>
                                                    <div class="m-card-user__details">
															<span
                                                                class="m-card-user__name m--font-weight-500">{{ Auth::user()->name }}</span>
                                                        <a href=""
                                                           class="m-card-user__email m--font-weight-300 m-link">{{ Auth::user()->email }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav m-nav--skin-light">
                                                        <li class="m-nav__separator m-nav__separator--fit">
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder"
                                                               href="{{ route('logout') }}"
                                                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                                {{ __('Logout') }}
                                                            </a>

                                                            <form id="logout-form"
                                                                  action="{{ route('logout') }}"
                                                                  method="POST" style="">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                    <!-- END: Topbar -->
                </div>
            </div>
        </div>
    </header>
    <!-- END: Header -->
    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        <!-- BEGIN: Left Aside -->
        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
                class="la la-close"></i></button>

        <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
            <!-- BEGIN: Aside Menu -->
            <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
                 m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
                <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                    <li class="m-menu__item  m-menu__item--active" aria-haspopup="true"><a
                            href="{{ route('admin') }}" class="m-menu__link "><i
                                class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-title">
									<span class="m-menu__link-wrap"> <span class="m-menu__link-text">Dashboard</span>
									</span></span></a></li>
                    @can('user-list')
                        <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true"
                            data-menu-submenu-toggle="hover">
                            <a href="{{ route('user.index') }}"
                               class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-icon flaticon-users"></i>
                                <span class="m-menu__link-text">
										Người Dùng
									</span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu" style="">
                                <span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true">
                                        <a href="{{ route('user.index') }}" class="m-menu__link ">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">
													Danh Sách
												</span>
                                        </a>
                                    </li>

                                    <li class="m-menu__item " aria-haspopup="true">
                                        <a href="{{ route('roles.index') }}"
                                           class="m-menu__link ">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">
													Phân Quyền
												</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endcan



                    {{-- end user --}}

                    @can('postc-list')
                        <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true"
                            data-menu-submenu-toggle="hover">
                            <a href="{{ route('postcate.index') }}"
                               class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-icon flaticon-open-box"></i>
                                <span class="m-menu__link-text">
										Danh Mục
									</span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu" style="">
                                <span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true">
                                        <a href="{{ route('postcate.create') }}" class="m-menu__link ">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">
													Tạo Mới
												</span>
                                        </a>
                                    </li>

                                    <li class="m-menu__item " aria-haspopup="true">
                                        <a href="{{ route('postcate.index') }}"
                                           class="m-menu__link ">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">
													Danh Sách
												</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endcan
                    {{-- end user --}}


                    {{-- new --}}
                    @can('post-list')
                        <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true"
                            data-menu-submenu-toggle="hover">
                            <a href="{{ route('postcate.index') }}"
                               class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-icon flaticon-book"></i>
                                <span class="m-menu__link-text">
										Bài Viết
									</span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu" style="">
                                <span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">

                                    <li class="m-menu__item " aria-haspopup="true">
                                        <a href="{{ route('post.create') }}"
                                           class="m-menu__link ">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">
													Tạo Mới
												</span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item " aria-haspopup="true">
                                        <a href="{{ route('post.index') }}" class="m-menu__link ">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">
													Danh Sách
												</span>
                                        </a>
                                    </li>

                                    <li class="m-menu__item " aria-haspopup="true">
                                        <a href="{{ route('tag.index') }}" class="m-menu__link ">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">
													Thẻ Tag
												</span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item " aria-haspopup="true">
                                        <a href="{{ route('comment.index') }}"
                                           class="m-menu__link ">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">
													Comment Bài Viết
												</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>

                            </a>
                        </li>
                    @endcan
                    {{-- endnew --}}
                    {{-- endevent --}}
                    @can('page-list')
{{--                        <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true"--}}
{{--                            data-menu-submenu-toggle="hover">--}}
{{--                            <a href="{{ route('page.index') }}"--}}
{{--                               class="m-menu__link m-menu__toggle">--}}
{{--                                <i class="m-menu__link-icon flaticon-paper-plane"></i>--}}
{{--                                <span class="m-menu__link-text">--}}
{{--										Trang--}}
{{--									</span>--}}
{{--                                <i class="m-menu__ver-arrow la la-angle-right"></i>--}}
{{--                            </a>--}}
{{--                            <div class="m-menu__submenu" style="">--}}
{{--                                <span class="m-menu__arrow"></span>--}}
{{--                                <ul class="m-menu__subnav">--}}


{{--                                    <li class="m-menu__item " aria-haspopup="true">--}}
{{--                                        <a href="{{ route('page.index') }}" class="m-menu__link ">--}}
{{--                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">--}}
{{--                                                <span></span>--}}
{{--                                            </i>--}}
{{--                                            <span class="m-menu__link-text">--}}
{{--													Danh Sách--}}
{{--												</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="m-menu__item " aria-haspopup="true">--}}
{{--                                        <a href="{{ route('page.create') }}"--}}
{{--                                           class="m-menu__link ">--}}
{{--                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">--}}
{{--                                                <span></span>--}}
{{--                                            </i>--}}
{{--                                            <span class="m-menu__link-text">--}}
{{--													Tạo Mới--}}
{{--												</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
{{--                            </div>--}}

{{--                            </a>--}}
{{--                        </li>--}}
                    @endcan
                    {{-- endevent --}}

                    {{-- endevent --}}
                    @can('menu')
                        <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true"
                            data-menu-submenu-toggle="hover">
                            <a href="{{ route('menu') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-icon flaticon-network"></i>
                                <span class="m-menu__link-text">
										Menu
									</span>

                            </a>

                            </a>
                        </li>
                    @endcan
                    {{-- endevent --}}
                </ul>
            </div>
            <!-- END: Aside Menu -->
        </div>
        <!-- END: Left Aside -->
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        {{-- <h3 class="m-subheader__title ">Dashboard</h3> --}}
                    </div>
                </div>
            </div>
            <!-- END: Subheader -->
            <div class="m-content">

                @yield('content')

            </div>
        </div>


    </div>
    <!-- end:: Body -->


</div>
<!-- end:: Page -->

<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->
<!-- begin::Quick Nav -->
<!-- begin::Quick Nav -->
@stack('scripts')
<!-- begin::Quick Nav -->
<!--begin::Base Scripts -->

<script src="{{ asset('admin/assets/vendors/base/vendors.bundle.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('admin/assets/demo/default/base/scripts.bundle.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('admin/assets/vendors/custom/datatables/datatables.bundle.js') }}"
        type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Snippets -->
<script src="{{ asset('admin/assets/app/js/dashboard.js') }}" type="text/javascript">
</script>
<script
    src="{{ asset('admin/assets/demo/default/custom/crud/forms/widgets/dropzone.js') }}"
    type="text/javascript"></script>
<script>
    $(".alert").fadeTo(4000, 500).slideUp(500, function () {
        $(".alert").slideUp(500);
    });
</script>
@yield('js')
</body>
<!-- end::Body -->

</html>
