@extends('admin.master')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
@endsection

@section('breadcrumb')
    <li class="active">المخازن</li>
@endsection

@section('container')

    <div class="page-header">
        <h1>
            المخازن
            <small>
                <i class="ace-icon fa fa-angle-double-left"></i>
                عرض كل المخازن الموجوده في النظام
            </small>
        </h1>
    </div>

    <div class="row">
            <div class="col-xs-12">
                <table id="simple-table" class="table  table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th>اسم المخزن</th>
                            <th>عدد الاصناف بداخله</th>
                            <th>إذون إستلام </th>
                            <th>إذون صرف</th>
                            <th class="hidden-480"> تليفون المخزن</th>
                            <th>تاريخ الانشاء</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                    @if(isset($stores))
                        @foreach($stores as $store)
                        <tr>
                            <td class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td>
                                <p>
                                    <a href="{{ url('store/edit/'.$store->id) }}">{{ $store->name }}</a>
                                </p>
                            </td>

                            <td>
                                <a href="{{ url('store/items/'.$store->id) }}" >
                                    <span class="arrowed-in arrowed-in-right label label-sm label-inverse">
                                        {{ $store->items()->count() }} صنف
                                    </span>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('store/receptions/'.$store->id) }}" >
                                    <span class="label label-sm label-purple arrowed">
                                        {{ $store->receptions()->count() }} إذن صرف
                                    </span>
                                </a>
                            </td>
                            <td class="hidden-480">
                                <a href="{{ url('store/dismissals/'.$store->id) }}" >
                                    <span class="label label-sm label-success arrowed-right">{{ $store->dismissals()->count() }} إذن صرف</span>
                                </a>
                            </td>
                            <td>{{ $store->phone }}</td>

                            <td class="hidden-480">
                                {{ date('d-m-y',strtotime($store->created_at)) }}
                            </td>

                            <td>
                                <div class="hidden-sm hidden-xs btn-group">
                                    <button class="btn btn-xs btn-success">
                                        <i class="ace-icon fa fa-check bigger-120"></i>
                                    </button>

                                    <a href="{{ url('') }}" class="btn btn-xs btn-info">
                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                    </a>

                                    <button class="btn btn-xs btn-danger">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </button>

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