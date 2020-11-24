@extends('admin.master')

@section('breadcrumb')
    <li class="active">الشركات</li>
@endsection

@section('container')

    <div class="page-header">
        <h1>
            الشركات
            <small>
                <i class="ace-icon fa fa-angle-double-left"></i>
                الشركات و البرندات التي تعمل معها
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
        
        <div class="col-md-4">
            {{-- <h3 class="row header smaller lighter blue">
                <span class="col-xs-6"> تكويد شركة جديده </span><!-- /.col -->
            </h3> --}}

            <form action="{{ url('companies') }}" method="post" class="form-horizontalz" role="form">
                {{ csrf_field() }}
                <div class="form-group col-md-12">
                    <label class=" control-label " for="company-name">اسم الشركة </label>
                    <div class="">
                        <input autocomplete="off"  name="name" type="text" id="company-name" placeholder="أكتب اسم الشركة  هنا" class="col-xs-10 col-sm-12">
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-7">
                    <span class="help-inline ">
                        <label class="middle">
                            <input class="ace" checked type="checkbox" name="state" id="state" />
                            <span class="lbl"> نشط</span>
                        </label>
                    </span>
                </div>

                <div class="form-group col-md-12">
                    <button class="btn btn-white btn-info btn-bold">
                        <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>
                        حفظ
                    </button>
                </div>
                
            </form>
        </div>


        <div class="col-md-8">
            <table id="simple-table" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </th>
                        <th>اسم الشركة</th>
                        <th>عدد الاصناف الموجده بها</th>
                        <th>تاريخ الأنشاء</th>
                        <th>انشاء بواسطة</th>
                        <th>الحالة</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                @if (isset($companies))
                    @foreach ($companies as $company)
                    <tr>
                        <td class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td>
                            <p>{{ $company->name }}</p>
                        </td>

                        <td class="hidden-480">
                            <span class="label label-sm label-success">3000</span>
                        </td>

                        <td class="hidden-480">
                            <p class="text-center" >{{ \date('d-m-Y', strtotime($company->created_at)) }}</p>
                        </td>
                        <td class="hidden-480">
                            <p>أحمد محمد</p>
                        </td>
                        <td class="hidden-480">
                            @if ($company->state == 1)
                                <span class="label label-sm label-primary arrowed-in arrowed-in-right">نشط</span>
                            @else
                                <span class="label label-sm label-danger arrowed-in arrowed-in-right">غير نشط</span>
                            @endif
                            
                        </td>

                        <td>
                            <div class="hidden-sm hidden-xs btn-group">
                                {{-- <button class="btn btn-xs btn-success">
                                    <i class="ace-icon fa fa-check bigger-120"></i>
                                </button> --}}

                            <a href="{{ url('companies/'.$company->id.'/edit') }}" class="btn btn-xs btn-info">
                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                </a>

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

            {{ $companies->links() }}
        </div><!-- /.span -->
    </div>

@endsection