@extends('admin.master')

@section('breadcrumb')
    <li class="active">الاصناف</li>
@endsection

@section('container')

    <div class="page-header">
        <h1>
            الأصناف
            <small>
                <i class="ace-icon fa fa-angle-double-left"></i>
                عرض كل الاصناف المتاحه بالمخازن
            </small>
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="#">الكل</a></li>
                    <li><a href="#">المحذوف</a></li>
                    {{-- <li><a href="#">Page 2</a></li>
                    <li><a href="#">Page 3</a></li> --}}
                  </ul>
            <table id="simple-table" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </th>
                        <th>باركود الصنف</th>
                        <th>اسم الصنف</th>
                        <th>الشركة المنتجة</th>
                        <th>التصنيف</th>
                        <th>الوحدة</th>
                        <th class="hidden-480"> الحد الادني للكمية</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                @if($items)
                    @foreach($items as $item)
                    <tr>
                        <td class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td>
                            <p>{{ $item->barcode }}</p>
                        </td>

                        <td>
                            <p>{{ $item->name }}</p>
                        </td>
                        <td>{{ $item->company->name }}</td>
                        <td class="hidden-480">{{ $item->category->name }}</td>
                        <td>{{ $item->unity->name }}</td>

                        <td class="hidden-480">
                            <span class="label label-sm label-warning">{{ $item->minimum }}</span>
                        </td>

                        <td>
                            <div class="hidden-sm hidden-xs btn-group">
                                <button class="btn btn-xs btn-success">
                                    <i class="ace-icon fa fa-check bigger-120"></i>
                                </button>

                                <button class="btn btn-xs btn-info">
                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                </button>

                                <button class="btn btn-xs btn-danger">
                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                </button>

                                {{-- <button class="btn btn-xs btn-warning">
                                    <i class="ace-icon fa fa-flag bigger-120"></i>
                                </button> --}}
                            </div>

                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                        <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                <span class="blue">
                                                    <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                <span class="green">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                <span class="red">
                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div><!-- /.span -->
    </div><!-- /.row -->
    
@endsection