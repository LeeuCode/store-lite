@extends('admin.master')

@section('breadcrumb')
    <li><a href="{{ url('companies') }}">الشركات</a></li>
    <li class="active">تعديل </li>
@endsection

@section('container')

    <div class="page-header">
        <h1>
            الشركات
            <small>
                <i class="ace-icon fa fa-angle-double-left"></i>
                تعديل بيانات الشركه
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


        <form action="{{ url('companies/'.$company->id) }}" method="post" class="form-horizontal" role="form">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group" style="width:50%;margin:auto" >
                <label class=" control-label" for="company-name">اسم الشركة </label>
                <div class="">
                    <input autocomplete="off"  name="name" value="{{ $company->name }}" type="text" id="company-name" placeholder="أكتب اسم الشركة  هنا" class="col-xs-10 col-sm-12">
                </div>
            </div>

            <div class="form-group " style="width:50%;margin:auto">
                <span class="help-inline">
                    <label class="middle">
                        <input class="ace" type="checkbox"  name="state" id="state" {{ ($company->state === 1) ? 'checked' : ''  }} />
                        <span class="lbl"> نشط</span>
                    </label>
                </span>
            </div>

            <div style="width:50%;margin:auto">
                <button class="btn btn-white btn-info btn-bold">
                    <i class="ace-icon fa fa-refresh bigger-120 blue"></i>
                    تحديث
                </button>
                <a href="{{ url('companies') }}" class="btn btn-white btn-inverse btn-bold">
                    <i class="ace-icon fa fa-reply bigger-120 black"></i>
                    الرجوع
                </a>
            </div>
            
        </form>
    </div>

@endsection