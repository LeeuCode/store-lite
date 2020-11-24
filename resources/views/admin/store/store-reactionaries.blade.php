@extends('admin.store-view')

@section('store-container')

<div class="row padding-35">
    <div class="col-xs-12">
        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
                <tr>
                    <th>رقم الفاتورة</th>
                    <th>تاريخ الفاتوره</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(isset($reactionaries)) 
                    @foreach ($reactionaries as $reactionary)
                        <tr>
                            <td><p>{{ $reactionary->barcode }}</p></td>
                            <td><p>{{ date('d-m-Y',strtotime($reactionary->created_at)) }}</p></td>
                            <td>
                                <a href="{{ url('store/reactionaries/bill/'.$reactionary->id) }}" class="btn btn-xs btn-success">
                                    <i class="ace-icon fa fa-check bigger-120"></i>
                                </a>

                                <button class="btn btn-xs btn-info">
                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                </button>

                                <button class="btn btn-xs btn-danger">
                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>

        </table>
    </div>
</div>

@endsection