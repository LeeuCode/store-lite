@extends('admin.master')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
@endsection

@section('breadcrumb')
    <li><a href="{{ url('items') }}">الاصناف</a></li>
    <li class="active">تكويد الاصناف</li>
@endsection

@section('container')

    <div class="page-header">
        <h1>
            تكويد الأصناف
            <small>
                <i class="ace-icon fa fa-angle-double-left"></i>
                أضافة صنف جديد إلي النظام
            </small>
        </h1>
    </div>

    <div class="row">


        <div class="col-md-12">

            @if (Session::has('status')) 

            <div class="alert alert-block alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>

                <p>
                    <strong>
                        <i class="ace-icon fa fa-check"></i>
                        تم بنجاح!
                    </strong>
                    {{ Session::get('status') }}
                </p>
            </div>

            @endif
        </div>

        <div class="col-xs-12">
            <form action="{{ url('items') }}" method="POST" class="form-horizontal" role="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="item-barcode"> باركود الصنف</label>

                    <div class="col-sm-9">
                    <input name="barcode" value="{{ $barcode_id }}" type="text" id="item-barcode" placeholder="أكتب باركود الصنف هنا" class="col-xs-10 col-sm-5">
                    </div>
                </div>

                <div class="form-group" >
                    <label class="col-sm-3 control-label no-padding-right" for="item-name"> اسم الصنف </label>

                    <div class="col-sm-9">
                        <input name="name" type="text" id="item-name" placeholder="أكتب اسم الصنف هنا" class="col-xs-10 col-sm-5">
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="from-group" style="margin-right: -9px;">
                    <label class="col-sm-3 control-label no-padding-right" for="company">الشركة المنتجة</label>
                    <div class="col-sm-4">
                        <select name="company_id" class="chosen-select form-control  chosen-rtl" id="company" data-placeholder="أختار الشركه من هنا">
                            <option value="">  </option>
                        @if (isset($companies))
                            @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        @endif
                        </select>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="from-group" style="margin-right: -9px;">
                    <label class="col-sm-3 control-label no-padding-right" for="category">التصنيف</label>
                    <div class="col-sm-3">
                        <select name="category_id" class="chosen-select form-control  chosen-rtl" id="category" data-placeholder="أختار التصنيف من هنا">
                            <option value="">  </option>
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="from-group" style="margin-right: -9px;">
                    <label class="col-sm-3 control-label no-padding-right" for="unity">الوحدة</label>
                    <div class="col-sm-2">
                        <select name="unity_id" class="chosen-select form-control chosen-rtl" id="unity" data-placeholder="أختار الوحدة من هنا">
                            <option value="">  </option>
                            @if(isset($unities))
                                @foreach($unities as $unity)
                                    <option value="{{ $unity->id }}">{{ $unity->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="form-group" >
                    <label class="col-sm-3 control-label no-padding-right" for="item-sale-price"> الحد الادني للكمية</label>
                    <div class="col-sm-3">
                        <input name="minimum" type="text" id="item-sale-price" placeholder="00" class="col-xs-10 col-sm-5 text-center">
                    </div>
                </div>

                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="submit">
                            <i class="ace-icon fa  fa-save bigger-110"></i>
                            حفظ
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            الرجوع
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('custom-script')
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>

    <script>
    
    jQuery(function($) {
        if(!ace.vars['touch']) {
            $('.chosen-select').chosen({allow_single_deselect:true}); 
        }
    });

    </script>
@endsection