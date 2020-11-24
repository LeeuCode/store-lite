<?php $__env->startSection('custom-css'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.min.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(url('items')); ?>">الاصناف</a></li>
    <li class="active">تكويد الاصناف</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>

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
            <form action="<?php echo e(url('items')); ?>" method="POST" class="form-horizontal" role="form">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="item-barcode"> باركود الصنف</label>

                    <div class="col-sm-9">
                    <input name="barcode" value="<?php echo e($barcode_id); ?>" type="text" id="item-barcode" placeholder="أكتب باركود الصنف هنا" class="col-xs-10 col-sm-5">
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
                        <?php if(isset($companies)): ?>
                            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <option value="<?php echo e($company->id); ?>"><?php echo e($company->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="from-group" style="margin-right: -9px;">
                    <label class="col-sm-3 control-label no-padding-right" for="category">التصنيف</label>
                    <div class="col-sm-3">
                        <select name="category_id" class="chosen-select form-control  chosen-rtl" id="category" data-placeholder="أختار التصنيف من هنا">
                            <option value="">  </option>
                            <?php if(isset($categories)): ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="from-group" style="margin-right: -9px;">
                    <label class="col-sm-3 control-label no-padding-right" for="unity">الوحدة</label>
                    <div class="col-sm-2">
                        <select name="unity_id" class="chosen-select form-control chosen-rtl" id="unity" data-placeholder="أختار الوحدة من هنا">
                            <option value="">  </option>
                            <?php if(isset($unities)): ?>
                                <?php $__currentLoopData = $unities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unity): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($unity->id); ?>"><?php echo e($unity->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="form-group" >
                    <label class="col-sm-3 control-label no-padding-right" for="item-sale-price"> الحد الادني للكمية</label>
                    <div class="col-sm-3">
                        <input name="minimum" type="text" id="item-sale-price" value="5" placeholder="00" class="col-xs-10 col-sm-5 text-center">
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
    
    <script src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>
    

    <script>
    
    jQuery(function($) {
        // if(!ace.vars['touch']) {
        //     // $('.chosen-select').chosen({allow_single_deselect:true}); 
        //     $('.chosen-select').select2({
        //         dir: "rtl"
        //     });
        // }

        select2Ajax('#company','<?php echo e(url('/ajax/companies')); ?>');
        select2Ajax('#category','<?php echo e(url('/ajax/categories')); ?>');
        select2Ajax('#unity','<?php echo e(url('/ajax/unities')); ?>');
    });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>