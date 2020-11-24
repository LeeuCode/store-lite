
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">صورة المستخدم</label>

    <div class="col-sm-2">
        <input class="file-upload" style="display:none;" id="uploadImage" type="file" name="image" accept="image/x-png,image/gif,image/jpeg" />
        <div class="circles">
            <img  class="profile-pic circle" style="object-fit: cover;" src="<?php echo e(asset('assets/images/mainUser.png')); ?>"  alt="Cinque Terre">
        </div>
        <label class="label-upload" for="uploadImage">
            
            <i class="fa fa-camera"></i>
        </label>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="username">اسم المستخدم</label>

    <div class="col-sm-4">
        <input name="name" type="text" id="username" placeholder="أكتب اسم المستخدم هنا" class="col-xs-10 col-sm-12">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="email">البريد الالكتروني</label>
    <div class="col-sm-4">
        <input name="email" type="text" id="email" placeholder="أكتب البريد الالكتروني هنا" class="col-xs-10 col-sm-12">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="password">كلمة المرور</label>
    <div class="col-sm-4">
        <input name="password" type="password" id="password" placeholder="********" class="col-xs-10 col-sm-12">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="r-password">اعد كتابة كلمة المرور</label>
    <div class="col-sm-4">
        <input name="r-password" type="password" id="r-password" placeholder="********" class="col-xs-10 col-sm-12">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="address">العنوان</label>

    <div class="col-sm-4">
        <input name="address" type="text" id="address" placeholder="أكتب عنوان المستخدم هنا" class="col-xs-10 col-sm-12">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="phone">رقم الهاتف</label>

    <div class="col-sm-4">
        <input name="phone" type="text" id="phone" placeholder="أكتب رقم هاتف المستخدم هنا" class="col-xs-10 col-sm-12">
    </div>
</div>



