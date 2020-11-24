<div class="col-md-2">
    <label class="pos-rel">
        <input name="store_option" type="radio" value="all" class="ace" checked>
        <span class="lbl"> كل الصلحيات </span>
    </label>
</div>

<div class="col-md-2">
    <label class="pos-rel">
        <input name="store_option" type="radio" class="ace" value="custom">
        <span class="lbl"> مخصص</span>
    </label>
</div>

<div class="col-md-2">
    <label class="pos-rel">
        <input name="store_option" type="radio" class="ace" value="no">
        <span class="lbl"> لا شئ</span>
    </label>
</div>

<div class="col-md-12 custom-stores" style="display: none;">
    <table id="simple-table" class="table  table-bordered table-hover">
        <thead>
            <tr>
                <th> المخزن </th>
                <th> أذون الاستلام </th>
                <th> أذون صرف </th>
                <th>  أذون مرتجع </th>
                <th>تعديل</th>
                <th>حذف</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="store-per">
        </tbody>
    </table>
    <button data-sort="1" class="btn btn-white btn-sm btn-success add-user-store" type="button">
        <i class="fa fa-plus"></i>
        أضافة مخزن جديد للمستخدم
    </button>
</div>