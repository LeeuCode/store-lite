<?php $__env->startSection('custom-css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.min.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">إذن مرتجع</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>

    <div class="page-header">
        <h1>
            إذن مرتجع
            <small>
                <i class="ace-icon fa fa-angle-double-left"></i>
                أضافة فاتورة مرتجع جديده 
            </small>
        </h1>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box" id="widget-box-1">
                <div class="widget-header">
                    <h5 class="widget-title">
                        <i class="fa fa-shopping-cart"></i>
                        فاتورة رقم (<span id="bill-id"><?php echo e($id); ?></span>)
                    </h5>

                    <div class="widget-toolbar">
                        <a href="#" data-action="collapse">
                            <i class="ace-icon fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>

                <div class="widget-body">
                    <div class="widget-main" style="overflow: auto">
                        <div class="col-md-3">
                            <label for="form-field-8">المخزن</label>
                            <select id="store-name" class="form-control" name="store_name" id="form-field-8">
                                <?php if( count($stores) != 1 ): ?>
                                    <option value="" selected >أختار المخزن المناسب</option>
                                    <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($store->id); ?>" ><?php echo e($store->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php else: ?>
                                    <option value="<?php echo e($stores[0]->id); ?>" ><?php echo e($stores[0]->name); ?></option>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="form-field-8">كود الصنف</label>
                            <input data-url="<?php echo e(url('treasury-bonds/reactionary/json')); ?>" type="text" class="form-control text-center" id="item-code" placeholder="00" autofocus>
                            <input id="item-id" type="hidden" autofocus>
                        </div>

                        <div class="col-md-3" style="overflow:hidden;position:unset">
                            <label for="item-name">اسم الصنف</label>
                            <input data-url="<?php echo e(url('treasury-bonds/reactionary/item')); ?>" autocomplete="off" class="form-control " id="item-name" placeholder="أكتب اسم الصنف هنا ان لم تتذكر كود الصنف">
                        
                            <div class="autocomplete">
                                <ul id="auto-ul">
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <label for="quantity"> الكمية</label>
                            <input class="form-control text-center" id="quantity" placeholder="00">
                        </div>

                        <div class="col-md-2">
                            <label for="date">تاريخ الفاتورة</label>
                            <input disabled class="form-control text-center" id="date" value="<?php echo e(date('d/m/Y')); ?>">
                        </div>
                        <div class="col-md-1">
                            <label for="Enter">أضافة</label>
                            <br>
                            <button class="btn btn-sm btn-info2 add-item" style="width: 100%;" >
                                <i class="fa fa-plus-circle"></i>
                                أضافة
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xs-12">
            <form id="bill-form" action="<?php echo e(url('treasury-bonds/reactionary/save')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>


                <input id="reception_id" type="hidden" name="reception_id" value="<?php echo e($id); ?>">
                <input id="store-id" type="hidden" name="store_id" >
                <table id="simple-table" class="table  table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>باركود الصنف</th>
                            <th>اسم الصنف</th>
                            <th>الكمية</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody class="item-container-tb">

        
                    </tbody>
                </table>
                <button class="btn btn-sm btn-success add-bill" type="button">
                    <i class="fa fa-save"></i>
                    حفظ الفاتورة
                </button>
            </form>
        </div><!-- /.span -->
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>

    <script src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>

    <script>
        jQuery(function($) {

            $(document).on('change', '#store-name', function(){
                var storeId = $(this).val(), 
                    itemCodeUrl = $('#item-code').data('url'),
                    itemSearchUrl = $('#item-name').data('url');

                if (storeId != "") {
                    $('#item-code').attr('data-url', itemCodeUrl+'/'+storeId);
                    $('#item-name').attr('data-url', itemSearchUrl+'/'+storeId);
                } else {
                    alert('قم باختيار المخزن لكي يقوم صرف المخزون منه !');
                    $(this).focus();
                }
            });

            $('#store-name').select2({
                dir: "rtl",
            });
        });

    </script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>