<?php echo $__env->make('admin.components.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="main-content">
    <div class="<?php echo e(('1' == '0') ? 'main-content-inner' : 'main-container ace-save-state'); ?>">
        <?php echo $__env->make('admin.components.top-menu1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php if(1 == 0): ?>
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo e(url('index/')); ?>">الرئيسية</a>
                </li>
                <?php echo $__env->yieldContent('breadcrumb'); ?>
            </ul><!-- /.breadcrumb -->
        </div>
        <?php endif; ?>
        
        <div class="page-content">
            <?php echo $__env->yieldContent('container'); ?>
        </div>
    </div>
</div>

<?php echo $__env->make('admin.components.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>