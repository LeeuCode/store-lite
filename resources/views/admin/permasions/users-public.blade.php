{{-- Profile Picture --}}
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">صورة المستخدم</label>

    <div class="col-sm-2">
        <input class="file-upload" style="display:none;" id="uploadImage" type="file" name="image" accept="image/x-png,image/gif,image/jpeg" />
        <div class="circles">
            <img  class="profile-pic circle" style="object-fit: cover;" src="{{ asset('assets/images/mainUser.png') }}"  alt="Cinque Terre">
        </div>
        <label class="label-upload" for="uploadImage">
            {{-- class="img-thumbnail" --}}
            <i class="fa fa-camera"></i>
        </label>
    </div>
</div>
{{--Username --}}
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="username">اسم المستخدم</label>

    <div class="col-sm-4">
        <input name="name" type="text" id="username" placeholder="أكتب اسم المستخدم هنا" class="col-xs-10 col-sm-12">
    </div>
</div>
{{-- Email --}}
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="email">البريد الالكتروني</label>
    <div class="col-sm-4">
        <input name="email" type="text" id="email" placeholder="أكتب البريد الالكتروني هنا" class="col-xs-10 col-sm-12">
    </div>
</div>
{{-- Password--}}
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="password">كلمة المرور</label>
    <div class="col-sm-4">
        <input name="password" type="password" id="password" placeholder="********" class="col-xs-10 col-sm-12">
    </div>
</div>
{{-- Repeat Password--}}
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="r-password">اعد كتابة كلمة المرور</label>
    <div class="col-sm-4">
        <input name="r-password" type="password" id="r-password" placeholder="********" class="col-xs-10 col-sm-12">
    </div>
</div>
{{-- Address --}}
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="address">العنوان</label>

    <div class="col-sm-4">
        <input name="address" type="text" id="address" placeholder="أكتب عنوان المستخدم هنا" class="col-xs-10 col-sm-12">
    </div>
</div>
{{-- Phone --}}
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="phone">رقم الهاتف</label>

    <div class="col-sm-4">
        <input name="phone" type="text" id="phone" placeholder="أكتب رقم هاتف المستخدم هنا" class="col-xs-10 col-sm-12">
    </div>
</div>
{{-- Store ID --}}
{{-- <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="phone">المخزن</label>
    <div class="col-sm-4">
        <select name="store_id" id="" class="col-xs-10 col-sm-12">
            <option value="">أختار مخزن مناسب</option>
        </select>
    </div>
</div> --}}
{{-- Store Permation --}}
{{-- <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="phone">صلاحيات المخزن</label>
    <div class="col-sm-9">
        <div class="col-md-2">
        <label class="pos-rel">
            <input type="checkbox" class="ace" />
            <span class="lbl"> أذون الاستلام</span>
        </label>
        </div>
        <div class="col-md-2">
        <label class="pos-rel">
            <input type="checkbox" class="ace" />
            <span class="lbl"> أذون صرف </span>
        </label>
        </div>
        <div class="col-md-2">
        <label class="pos-rel">
            <input type="checkbox" class="ace" />
            <span class="lbl"> أذون مرتجع</span>
        </label>
        </div>
    </div>
</div> --}}