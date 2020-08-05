<?php ?>
@extends('layouts.admin')

@section('content')
<div class="container-fluid">
      <div class="col-md-12">
            @if($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <strong>{{ $message }}</strong>
                  </div>
            @endif
      </div>
      <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                  <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                              <h3 class="m-portlet__head-text">
                                    Bài Viết
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

                  <!--begin: Search Form -->
                  <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                        <div class="row">
                              <div class="col-md-4 col-md-offset-4">
                                    <div class="form-group">
                                          <select name="filter_gender" id="filter_gender" class="form-control" required>
                                                <option value="">Chọn danh mục</option>
                                                <?php categoryParent($datas,0,"",0); ?>
                                          </select>
                                    </div>

                                    <div class="form-group" align="center">
                                          <button type="button" name="filter" id="filter"
                                                class="btn btn-info">Filter</button>

                                          <button type="button" name="reset" id="reset"
                                                class="btn btn-default">Reset</button>
                                    </div>
                              </div>
                        </div>
                        <div class="row align-items-center">
                              <div class="col-xl-8 order-2 order-xl-1">

                              </div>
                              <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                    <a href="{{ route('post.create') }}"
                                          class="btn btn-info m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                          <span>
                                                <i class="la la-cart-plus"></i>
                                                <span>Tạo Mới Bài Viết</span>
                                          </span>
                                    </a>
                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                              </div>
                        </div>
                  </div>
                  <!--end: Search Form -->
                  <!--begin: Datatable -->
                  <div class="m_datatable" id="child_data_ajax">

                        <table class="m-datatable__table" id="customer_data">
                              <thead>
                                    <tr>
                                          <th>No</th>
                                          <th>Tên Bài Viết</th>
                                        <th>Danh muc</th>
                                          <th width="120px">Action</th>
                                    </tr>
                              </thead>
                              <tbody>
                              </tbody>
                        </table>
                  </div>
                  <!--end: Datatable -->
            </div>
      </div>

      @routes

            <script type="text/javascript">
                  $(document).ready(function () {
                        $.ajaxSetup({
                              headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                        });
                        fill_datatable();

                        function fill_datatable(filter_gender = '') {

                              var dataTable = $('#customer_data').DataTable({
                                  processing: true,
                                  serverSide: true,
                                    pageLength : 50,
                                    ajax: {
                                          url: "{{ route('post.index') }}",
                                          data: {
                                                filter_gender: filter_gender
                                          }
                                    },
                                    columns: [{
                                                data: 'id',
                                                name: 'id'
                                          },
                                          {
                                                data: 'title',
                                                name: 'title'
                                          },
                                        {
                                            data: 'cate',
                                            name: 'cate'
                                        },
                                          {
                                                data: 'action',
                                                name: 'action',
                                                orderable: false,
                                                searchable: false
                                          },
                                    ]
                              });
                        }

                        $('#filter').click(function () {
                              var filter_gender = $('#filter_gender').val();

                              if (filter_gender != '') {
                                    $('#customer_data').DataTable().destroy();
                                    fill_datatable(filter_gender);
                              } else {
                                    alert('Select Both filter option');
                              }
                        });

                        $('#reset').click(function () {
                              $('#filter_gender').val('');
                              $('#customer_data').DataTable().destroy();
                              fill_datatable();
                        });

                        $('body').on('click', '.deleteUser', function () {
                              //$(".deleteUser").click(function(){

                              var page_id = $(this).data("id");
                              var r = confirm("Bạn chắc chắn muốn xóa !");
                              if (r == true) {
                                    $.ajax({
                                          type: "POST",
                                          data: {
                                                _method: 'delete'
                                          },
                                          url: route('post.destroy', {
                                                id: page_id
                                          }),
                                          success: function (data) {
                                                $('#filter_gender').val('');
                                                $('#customer_data').DataTable().destroy();
                                                fill_datatable();
                                          },
                                          error: function (data) {
                                                console.log('Error:', data);
                                          }
                                    });
                              } else {
                                    return false;
                              }

                        });
                        $(".alert").fadeTo(2000, 500).slideUp(500, function () {
                              $(".alert").slideUp(500);
                        });

                  });
            </script>
</div>
@endsection
