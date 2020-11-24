
<div class="">
    <div class="checkbox">
        <label style="padding-right: 0;margin-bottom: 10px">
            <input name="manager" type="checkbox" class="ace" value="manager">
            <span class="lbl"><strong> مدير </strong></span>
        </label>
    </div>
</div>

<table class="table  table-bordered table-hover" >
    <thead>
        <tr>
            {{-- <th></th> --}}
            <th>الرئيسية</th>
            <th>القسم</th>
            <th>الكل</th>
            <th>تكويد / أضافة</th>
            <th>تعديل</th>
            <th>حذف</th>
            <th>بحث</th>
            <th>طباعة</th>
            <th>تصدير Excel</th>
        </tr>
    </thead>
    <tbody>

        @foreach(modules() as $key=>$module)

        <tr>
            {{-- <td>
                <label class="pos-rel">
                    <input id="{{ $module['name'] }}" name="allow[]" value="{{ $module['name'] }}" type="checkbox" class="ace check allow" data-class=".{{ $module['name'] }}, .{{ $module['name'] }}-all" />
                    <span class="lbl"></span>
                </label>
            </td> --}}
            <td>
                <label class="pos-rel">
                    <input name="home" type="radio" class="ace is-home {{ $module['name'] }}-home" value="{{ $module['name'] }}" />
                    <span class="lbl"></span>
                </label>
            </td>
            <td>
                {{ $module['label'] }}
            </td>
            <td>
                <label class="pos-rel">
                    <input onchange="chackedAll('.{{ $module['name'] }}')"  type="checkbox" class="ace {{ $module['name'] }}-all" />
                    <span class="lbl"></span>
                </label>
            </td>
            <td>
                @if($module['add'])
                <label class="pos-rel">
                <input type="checkbox" name="modulePermissions[add][]" value="{{ $module['name'] }}" class="ace {{ $module['name'] }}" onchange="itemsChecked('.{{ $module['name'] }}')" />
                    <span class="lbl"></span>
                </label>
                @else
                    <p>-</p>
                @endif
            </td>
            <td>
                @if($module['edit'])
                <label class="pos-rel">
                    <input type="checkbox" name="modulePermissions[edit][]" value="{{ $module['name'] }}" class="ace {{ $module['name'] }}" onchange="itemsChecked('.{{ $module['name'] }}')" />
                    <span class="lbl"></span>
                </label>
                @else
                    <p>-</p>
                @endif
            </td>
            <td>
                @if($module['delete'])
                <label class="pos-rel">
                    <input type="checkbox" name="modulePermissions[delete][]" value="{{ $module['name'] }}" class="ace {{ $module['name'] }}" onchange="itemsChecked('.{{ $module['name'] }}')" />
                    <span class="lbl"></span>
                </label>
                @else
                    <p>-</p>
                @endif
            </td>
            <td>
                @if($module['search'])
                <label class="pos-rel">
                    <input type="checkbox" name="modulePermissions[search][]" value="{{ $module['name'] }}" class="ace {{ $module['name'] }}" onchange="itemsChecked('.{{ $module['name'] }}')" />
                    <span class="lbl"></span>
                </label>
                @else
                    <p>-</p>
                @endif
            </td>
            <td>
                @if($module['print'])
                <label class="pos-rel">
                    <input type="checkbox" name="modulePermissions[print][]" value="{{ $module['name'] }}" class="ace {{ $module['name'] }}" onchange="itemsChecked('.{{ $module['name'] }}')" />
                    <span class="lbl"></span>
                </label>
                @else
                    <p>-</p>
                @endif
            </td>
            <td>
                @if($module['excel'])
                <label class="pos-rel">
                    <input type="checkbox" name="modulePermissions[excel][]" value="{{ $module['name'] }}" class="ace {{ $module['name'] }}" onchange="itemsChecked('.{{ $module['name'] }}')" />
                    <span class="lbl"></span>
                </label>
                @else
                    <p>-</p>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>