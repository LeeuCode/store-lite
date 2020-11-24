<?php $__env->startSection('store-container'); ?>

<div class="row padding-35">
    <div class="col-xs-12">
        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
                <tr>
                    <th class="center">
                        <label class="pos-rel">
                            <input type="checkbox" class="ace" />
                            <span class="lbl"></span>
                        </label>
                    </th>
                    <th>باركود الصنف</th>
                    <th>اسم الصنف</th>
                    <th>الشركة المنتجة</th>
                    <th>التصنيف</th>
                    <th>الوحدة</th>
                    <th>الكمية</th>
                    <th class="hidden-480"> الحد الادني للكمية</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>

            <?php if($store): ?>
                <?php $__currentLoopData = $store->items()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td>
                            <p><?php echo e($rec->item->barcode); ?></p>
                        </td>

                        <td>
                            <p><?php echo e($rec->item->name); ?></p>
                        </td>
                        <td><?php echo e($rec->item->company->name); ?></td>
                        <td class="hidden-480"><?php echo e($rec->item->category->name); ?></td>
                        <td><?php echo e($rec->item->unity->name); ?></td>

                        <td class="hidden-480">
                            <span class="label label-sm label-inverse"><?php echo e($rec->item_quantity); ?></span>
                        </td>

                        <td class="hidden-480">
                            <span class="label label-sm label-warning"><?php echo e($rec->item->minimum); ?></span>
                        </td>

                        <td>
                            <div class="hidden-sm hidden-xs btn-group">
                                <button class="btn btn-xs btn-success">
                                    <i class="ace-icon fa fa-check bigger-120"></i>
                                </button>

                                <button class="btn btn-xs btn-info">
                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                </button>

                                <button class="btn btn-xs btn-danger">
                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                </button>
                            </div>

                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                        <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                <span class="blue">
                                                    <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                <span class="green">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                <span class="red">
                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div><!-- /.span -->
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.store-view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>