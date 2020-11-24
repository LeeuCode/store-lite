<?php $__env->startSection('store-container'); ?>
    
<div class="row padding-35">
    <div class="col-md-12">

        <?php if(Session::has('status')): ?> 

        <div class="alert alert-block alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>

            <p>
                <strong>
                    <i class="ace-icon fa fa-check"></i>
                    تم بنجاح!
                </strong>
                <?php echo e(Session::get('status')); ?>

            </p>
        </div>

        <?php endif; ?>
    </div>

    <div class="col-xs-12">
        <form action="<?php echo e(url('store/save-store')); ?>" method="POST" class="form-horizontal" role="form">
            <?php echo e(csrf_field()); ?>

            
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="store-code">كود المخزن</label>

                <div class="col-sm-2">
                    <input name="barcode" value="<?php echo e($store->barcode); ?>" type="text" id="store-code" placeholder="02" class="col-xs-10 col-sm-5 text-center">
                </div>
            </div>

            <div class="form-group" >
                <label class="col-sm-3 control-label no-padding-right" for="store-name"> اسم المخزن</label>

                <div class="col-sm-9">
                    <input name="name" value="<?php echo e($store->name); ?>" type="text" id="store-name" placeholder="أكتب اسم المخزن هنا" class="col-xs-10 col-sm-5">
                </div>
            </div>

            <div class="form-group" >
                <label class="col-sm-3 control-label no-padding-right" for="store-phone"> تليفون المخزن</label>

                <div class="col-sm-9">
                    <input name="phone" value="<?php echo e($store->phone); ?>" type="text" id="store-phone" placeholder="أكتب تليفون المخزن هنا" class="col-xs-10 col-sm-5">
                </div>
            </div>

            <div class="form-group" >
                <label class="col-sm-3 control-label no-padding-right" for="store-address"> عنوان المخزن</label>

                <div class="col-sm-9">
                    <input name="address" value="<?php echo e($store->address); ?>" type="text" id="store-address" placeholder="أكتب عنوان المخزن هنا" class="col-xs-10 col-sm-5">
                </div>
            </div>

            <div class="form-group" >
                <label class="col-sm-3 control-label no-padding-right" for="store-notes">ملاحظات</label>

                <div class="col-sm-9">
                    <textarea name="notes" id="store-notes" placeholder="أكتب الملاحظات هنا" class="col-xs-10 col-sm-6"><?php echo e($store->notes); ?></textarea>
                </div>
            </div>

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa  fa-save bigger-110"></i>
                        حفظ
                    </button>

                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" type="">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        الرجوع الي المخزن
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.store-view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>