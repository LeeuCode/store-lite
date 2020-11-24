<?php $__env->startSection('custom-css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/chosen.min.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(url('stores')); ?>">المخازن</a></li>
    <li class="active"><?php echo e($store->name); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>

    <div class="page-header">
        <h1>
            <?php echo e($store->name); ?>

            <small>
                <i class="ace-icon fa fa-angle-double-left"></i>
                تعديل المخزن الحالي
            </small>
        </h1>
    </div>

    <div class="row">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18 tab-size-bigger" id="myTab">
                <?php if(storePermation('edit',$store->id)): ?>
                <li  <?php echo Request::path() == 'store/edit/'.$store->id ? 'class="active"' : ''; ?> >
                    <a  href="<?php echo e(url('store/edit/'.$store->id)); ?>">
                        <i class="blue ace-icon fa fa-edit bigger-120"></i>
                        تعديل
                    </a>
                </li>
                <?php endif; ?>

                <li <?php echo Request::path() == 'store/items/'.$store->id ? 'class="active"' : ''; ?> >
                    <a href="<?php echo e(url('store/items/'.$store->id)); ?>">
                        <i class="blue ace-icon fa fa-cubes bigger-120"></i>
                        الاصناف
                        <span class="badge badge-grey"><?php echo e($store->items()->count()); ?></span>
                    </a>
                </li>

                <?php if(storePermation('reception',$store->id)): ?>
                <li <?php echo Request::path() == 'store/receptions/'.$store->id ? 'class="active"' : ''; ?> >
                    <a href="<?php echo e(url('store/receptions/'.$store->id)); ?>">
                        <i class="blue ace-icon fa fa-arrow-circle-o-left bigger-120"></i>
                        إذون الاستلام
                        <span class="badge badge-success"><?php echo e($store->receptions()->count()); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(storePermation('dismissal',$store->id)): ?>
                <li <?php echo Request::path() == 'store/dismissals/'.$store->id ? 'class="active"' : ''; ?>>
                    <a href="<?php echo e(url('store/dismissals/'.$store->id)); ?>" >
                        <i class="blue ace-icon fa fa-arrow-circle-o-right bigger-120"></i>
                        إذون الصرف
                        <span class="badge badge-inverse"><?php echo e($store->dismissals()->count()); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(storePermation('reactionary',$store->id)): ?>
                <li <?php echo Request::path() == 'store/reactionaries/'.$store->id ? 'class="active"' : ''; ?> >
                    <a href="<?php echo e(url('store/reactionaries/'.$store->id)); ?>" >
                        <i class="blue ace-icon fa-repeat fa bigger-120"></i>
                        إذون المرتجع
                        <span class="badge badge-info"><?php echo e($store->reactionaries()->count()); ?></span>
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>

    <?php echo $__env->yieldContent('store-container'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>