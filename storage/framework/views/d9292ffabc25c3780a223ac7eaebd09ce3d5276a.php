<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(url('companies')); ?>">الشركات</a></li>
    <li class="active">تعديل </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>

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


        <form action="<?php echo e(url('companies/'.$company->id)); ?>" method="post" class="form-horizontal" role="form">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

            <div class="form-group" style="width:50%;margin:auto" >
                <label class=" control-label" for="company-name">اسم الشركة </label>
                <div class="">
                    <input autocomplete="off"  name="name" value="<?php echo e($company->name); ?>" type="text" id="company-name" placeholder="أكتب اسم الشركة  هنا" class="col-xs-10 col-sm-12">
                </div>
            </div>

            <div class="form-group " style="width:50%;margin:auto">
                <span class="help-inline">
                    <label class="middle">
                        <input class="ace" type="checkbox"  name="state" id="state" <?php echo e(($company->state === 1) ? 'checked' : ''); ?> />
                        <span class="lbl"> نشط</span>
                    </label>
                </span>
            </div>

            <div style="width:50%;margin:auto">
                <button class="btn btn-white btn-info btn-bold">
                    <i class="ace-icon fa fa-refresh bigger-120 blue"></i>
                    تحديث
                </button>
                <a href="<?php echo e(url('companies')); ?>" class="btn btn-white btn-inverse btn-bold">
                    <i class="ace-icon fa fa-reply bigger-120 black"></i>
                    الرجوع
                </a>
            </div>
            
        </form>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>