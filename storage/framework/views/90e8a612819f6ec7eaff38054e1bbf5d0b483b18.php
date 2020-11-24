<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">التصنيفات</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>

    <div class="page-header">
        <h1>
            التصنيفات
            <small>
                <i class="ace-icon fa fa-angle-double-left"></i>
                التصنيفات المتاحه بالمخزن ترتبط بشكل وثيق مع الاصناف
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

        <div class="col-md-4">
            

            <form action="<?php echo e(url('categories')); ?>" method="post" class="form-horizontalz" role="form">
                <?php echo e(csrf_field()); ?>

                <div class="form-group col-md-12">
                    <label class=" control-label " for="company-name">اسم التصنيف </label>
                    <div class="">
                        <input autocomplete="off" name="name" type="text" id="company-name" placeholder="أكتب اسم التصنيف  هنا" class="col-xs-10 col-sm-12">
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <button class="btn btn-white btn-info btn-bold">
                        <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>
                        حفظ
                    </button>
                </div>
                
            </form>
        </div>


        <div class="col-md-8">
            <table id="simple-table" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </th>
                        <th>اسم التصنيف</th>
                        <th>عدد الاصناف الموجده بها</th>
                        <th>تاريخ الأنشاء</th>
                        <th>انشاء بواسطة</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                <?php if(isset($categories)): ?>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td>
                            <p><?php echo e($category->name); ?></p>
                        </td>

                        <td>
                            <span class="label label-sm label-success arrowed arrowed-right">60</span>
                        </td>

                        <td class="hidden-480">
                            <p><?php echo e(date('d-m-y', strtotime($category->created_at))); ?></p>
                        </td>
                        <td class="hidden-480">
                            <p>أحمد محمد</p>
                        </td>

                        <td>
                            <div class="hidden-sm hidden-xs btn-group">
                                <a href="<?php echo e(url('categories/'.$category->id.'/edit')); ?>" class="btn btn-xs btn-info">
                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                </a>

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
            <?php echo e($categories->links()); ?>

        </div><!-- /.span -->
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>