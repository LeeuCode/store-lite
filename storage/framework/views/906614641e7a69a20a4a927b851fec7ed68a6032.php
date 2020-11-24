<?php $__env->startSection('store-container'); ?>

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
                <?php if(isset($receptions)): ?> 
                    <?php $__currentLoopData = $receptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reception): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><p><?php echo e($reception->barcode); ?></p></td>
                            <td><p><?php echo e(date('d-m-Y',strtotime($reception->created_at))); ?></p></td>
                            <td>
                                <a href="<?php echo e(url('store/reception/bill/'.$reception->id)); ?>" class="btn btn-xs btn-success">
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>

            </tbody>

        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.store-view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>