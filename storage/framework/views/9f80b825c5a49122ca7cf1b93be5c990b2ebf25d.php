<?php $__env->startSection('breadcrumb'); ?>
    <li ><a href="<?php echo e(url('stores')); ?>">المخازن</a></li>
    <li ><a href="<?php echo e(url('store/edit/'.$dismissal->store->id)); ?>"><?php echo e($dismissal->store->name); ?></a></li>
    <li ><a href="<?php echo e(url('store/dismissals/'.$dismissal->store->id)); ?>">إذونات الإستلام</a></li>
    <li class="active">فاتورة رقم (<?php echo e($dismissal->barcode); ?>)</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>

    <div class="page-header">
        <h1>
            فاتورة رقم (<?php echo e($dismissal->barcode); ?>)
            
            <small>
                <i class="ace-icon fa fa-angle-double-left"></i>

                تاريخ الفاتوره
            <?php echo e(date('d/m/Y',strtotime($dismissal->created_at))); ?>

            </small>

            <div class="pull-left" >
                <button class=" btn btn-xs btn-primary" >
                    <i class="fa fa-file-excel-o"></i>
                </button>
                <button class=" btn btn-xs btn-default" >
                    <i class="fa fa-print"></i>
                </button> 
            </div>
            

        </h1>
    </div>
    
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
            <table id="simple-table" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th>باركود الصنف</th>
                        <th>اسم الصنف</th>
                        <th>الشركة المنتجه</th>
                        <th>الوحدة</th>
                        <th>الكمية</th>
                    </tr>
                </thead>

                <tbody class="item-container-tb">

                <?php if(isset($dismissal)): ?>
                    <?php $__currentLoopData = $dismissal->dismissal_items()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><p><?php echo e($rec->item->barcode); ?></p></td>
                            <td><p><?php echo e($rec->item->name); ?></p></td>
                            <td><p><?php echo e($rec->item->company->name); ?></p></td>
                            <td><p><?php echo e($rec->item->unity->name); ?></p></td>
                            <td><span class="label label-sm label-info" ><?php echo e($rec->quantity); ?></span></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>