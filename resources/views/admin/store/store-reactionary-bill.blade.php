
@extends('admin.master')

@section('breadcrumb')
    <li ><a href="{{ url('stores') }}">المخازن</a></li>
    <li ><a href="{{ url('store/edit/'.$reactionary->store->id) }}">{{ $reactionary->store->name }}</a></li>
    <li ><a href="{{ url('store/reactionaries/'.$reactionary->store->id) }}">إذونات المرتجع</a></li>
    <li class="active">فاتورة رقم ({{ $reactionary->barcode }})</li>
@endsection

@section('container')

    <div class="page-header">
        <h1>
            فاتورة رقم ({{ $reactionary->barcode }})
            
            <small>
                <i class="ace-icon fa fa-angle-double-left"></i>

                تاريخ الفاتوره
            {{ date('d/m/Y',strtotime($reactionary->created_at)) }}
            </small>

            <div class="pull-left" >
                <button class=" btn btn-xs btn-primary" >
                    <i class="fa fa-file-excel-o"></i>
                </button>
                <button class=" btn btn-xs btn-default" >
                    <i class="fa fa-print"></i>
                </button> 
            </div>
            

        </h1>
    </div>
    
    <div class="row padding-35">
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
            <table id="simple-table" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th>باركود الصنف</th>
                        <th>اسم الصنف</th>
                        <th>الشركة المنتجه</th>
                        <th>الوحدة</th>
                        <th>الكمية</th>
                    </tr>
                </thead>

                <tbody class="item-container-tb">

                @if(isset($reactionary))
                    @foreach($reactionary->reactionary_items()->get() as $rec)
                        <tr>
                            <td><p>{{ $rec->item->barcode }}</p></td>
                            <td><p>{{ $rec->item->name }}</p></td>
                            <td><p>{{ $rec->item->company->name }}</p></td>
                            <td><p>{{ $rec->item->unity->name }}</p></td>
                            <td><span class="label label-sm label-info" >{{ $rec->quantity }}</span></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection