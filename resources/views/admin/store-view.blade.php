@extends('admin.master')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
@endsection

@section('breadcrumb')
    <li><a href="{{ url('stores') }}">المخازن</a></li>
    <li class="active">{{ $store->name }}</li>
@endsection

@section('container')

    <div class="page-header">
        <h1>
            {{ $store->name }}
            <small>
                <i class="ace-icon fa fa-angle-double-left"></i>
                تعديل المخزن الحالي
            </small>
        </h1>
    </div>

    <div class="row">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18 tab-size-bigger" id="myTab">
                @if(storePermation('edit',$store->id))
                <li  {!! Request::path() == 'store/edit/'.$store->id ? 'class="active"' : '' !!} >
                    <a  href="{{ url('store/edit/'.$store->id) }}">
                        <i class="blue ace-icon fa fa-edit bigger-120"></i>
                        تعديل
                    </a>
                </li>
                @endif

                <li {!! Request::path() == 'store/items/'.$store->id ? 'class="active"' : '' !!} >
                    <a href="{{ url('store/items/'.$store->id) }}">
                        <i class="blue ace-icon fa fa-cubes bigger-120"></i>
                        الاصناف
                        <span class="badge badge-grey">{{ $store->items()->count() }}</span>
                    </a>
                </li>

                @if(storePermation('reception',$store->id))
                <li {!! Request::path() == 'store/receptions/'.$store->id ? 'class="active"' : '' !!} >
                    <a href="{{ url('store/receptions/'.$store->id) }}">
                        <i class="blue ace-icon fa fa-arrow-circle-o-left bigger-120"></i>
                        إذون الاستلام
                        <span class="badge badge-success">{{ $store->receptions()->count() }}</span>
                    </a>
                </li>
                @endif

                @if(storePermation('dismissal',$store->id))
                <li {!! Request::path() == 'store/dismissals/'.$store->id ? 'class="active"' : '' !!}>
                    <a href="{{ url('store/dismissals/'.$store->id) }}" >
                        <i class="blue ace-icon fa fa-arrow-circle-o-right bigger-120"></i>
                        إذون الصرف
                        <span class="badge badge-inverse">{{ $store->dismissals()->count() }}</span>
                    </a>
                </li>
                @endif

                @if(storePermation('reactionary',$store->id))
                <li {!! Request::path() == 'store/reactionaries/'.$store->id ? 'class="active"' : '' !!} >
                    <a href="{{ url('store/reactionaries/'.$store->id) }}" >
                        <i class="blue ace-icon fa-repeat fa bigger-120"></i>
                        إذون المرتجع
                        <span class="badge badge-info">{{ $store->reactionaries()->count() }}</span>
                    </a>
                </li>
                @endif

            </ul>
        </div>
    </div>

    @yield('store-container')

@endsection