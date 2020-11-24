<?php $__env->startSection('custom-css'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.min.css')); ?>" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">الاصناف</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>

    <div class="page-header">
        <h1>
            أضافة مستخدم
            <small>
                <i class="ace-icon fa fa-angle-double-left"></i>
                أضافة مستحدم جديد بالنظام
            </small>
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form id="save-user" action="<?php echo e(url('user/save')); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data" >

                <?php echo e(csrf_field()); ?>


                <div class="tabbable">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active">
                            <a data-toggle="tab" href="#home">
                                <i class="blue ace-icon fa fa-home bigger-120"></i>
                                المعلومات الاساسية
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#messages">
                                <i class="green ace-icon fa fa fa-lock bigger-120"></i>
                                صلاحيات المستخدم
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        
                        <div id="home" class="tab-pane fade in active">
                            <?php echo $__env->make('admin.permasions.users-public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                        

                        
                        <div id="messages" class="tab-pane fade" style="overflow: hidden">
                            <h4 class="text-info blue" >الصلاحيات العامة</h4>
                            <?php echo $__env->make('admin.permasions.public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <h4 class="text-info blue" >صلاحيات المخازن</h4>
                            <?php echo $__env->make('admin.permasions.store', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        </div>
                        
                    </div>
                    
                </div>

                <button class="btn btn-white btn-info pull-left" type="submit">
                    <i class="fa fa-save"></i>
                    حفظ بينات المستخدم    
                </button>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
    
    <script src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>
    
    <script>
    
    jQuery(function($) {

        $(document).on('click','.add-user-store',function() {
            var $sortId = $(this).data('sort');

            $('.store-per').append('<tr><td style="width:40%"><div style="width:100%"><select data-store-sort="'+$sortId+'" style="width:100%" class="store-name store-id form-control" name="store_ids[]" id=""><option value="">اختار مخزن</option></select></div></td><td><label class="pos-rel"><input type="checkbox" class="ace storePer'+$sortId+' " data-name="reception"  disabled=""><span class="lbl"></span></label></td><td><label class="pos-rel"><input type="checkbox" class="ace storePer'+$sortId+' " data-name="dismissal" disabled=""><span class="lbl"></span></label></td><td><label class="pos-rel"><input type="checkbox" class="ace storePer'+$sortId+' " data-name="reactionary"  disabled=""><span class="lbl"></span></label></td><td><label class="pos-rel"><input type="checkbox" class="ace storePer'+$sortId+' " data-name="edit"  disabled=""><span class="lbl"></span></label></td><td><label class="pos-rel"><input type="checkbox" class="ace storePer'+$sortId+' " data-name="delete" disabled=""><span class="lbl"></span></label></td><td><button type="button"class="btn btn-xs btn-danger remove-store-per"><i class="ace-icon fa fa-trash-o bigger-120"></i> </button></td></tr>');
            select2Ajax('.store-name','<?php echo e(url('/ajax/stores')); ?>');
            $(this).data('sort',$sortId+1);
            storeSort();
        });

        select2Ajax('.store-name','<?php echo e(url('/ajax/stores')); ?>');
        storeSort();

        $(document).on('change', '.is-home', function () {
            var val = $(this).val();
            if(!$('.'+val).is(':checked')) {
                $(this).prop("checked", false);
                alert('من فضلك اختار اولا القسم');
            }
        });

        $('#save-user').on('submit',function (e) {
            
            var isHome = $("input[name='home']:checked").length;

            if (isHome == 0)  {
                alert('يجب تحديد الصفحة الرئيسية للمستخدم!');
                e.preventDefault();
            }
        });

        $(document).on('change blur','#r-password',function () {
            var pass   = $('#password').val(),
                r_pass = $(this).val();

                if ( pass != r_pass ) {
                    $('.pass-error').remove();
                    $(this).after('<p class="pass-error" >كلمة السر غير متطابقتان</p>');
                } else {
                    $('.pass-error').remove();
                    $('.pass-success').remove();
                    $(this).after('<p class="pass-success" >كلمة السر متطابقتان</p>');
                }
        });

        $(document).on('change','input[name=manager]',function () {
            $('input[type=checkbox]').prop('checked', $(this).prop('checked'));
            $('input[name=home]').prop('checked', $(this).prop('checked'));
        });

        function storeSort() {
            $(document).on('change','.store-id',function(){
                var $sortId = $(this).data('store-sort'),
                    $val = $(this).val(),
                    $checkBox = $('.storePer'+$sortId);

                if ($val != "" ) {
                    $checkBox.prop('disabled',false); // Checks it

                    $checkBox.each(function (index) {
                        var $dataName =  $(this).attr('data-name');
                        $(this).attr('name','storePermation['+$dataName+'][]');
                        $(this).attr('value',$val);
                    });
                } else {
                    $checkBox.prop('disabled', true); // Unchecks it
                }
            });
        }
    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>