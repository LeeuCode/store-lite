
<div class="">
    <div class="checkbox">
        <label style="padding-right: 0;margin-bottom: 10px">
            <input name="manager" type="checkbox" class="ace" value="manager">
            <span class="lbl"><strong> مدير </strong></span>
        </label>
    </div>
</div>

<table class="table  table-bordered table-hover" >
    <thead>
        <tr>
            
            <th>الرئيسية</th>
            <th>القسم</th>
            <th>الكل</th>
            <th>تكويد / أضافة</th>
            <th>تعديل</th>
            <th>حذف</th>
            <th>بحث</th>
            <th>طباعة</th>
            <th>تصدير Excel</th>
        </tr>
    </thead>
    <tbody>

        <?php $__currentLoopData = modules(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$module): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

        <tr>
            
            <td>
                <label class="pos-rel">
                    <input name="home" type="radio" class="ace is-home <?php echo e($module['name']); ?>-home" value="<?php echo e($module['name']); ?>" />
                    <span class="lbl"></span>
                </label>
            </td>
            <td>
                <?php echo e($module['label']); ?>

            </td>
            <td>
                <label class="pos-rel">
                    <input onchange="chackedAll('.<?php echo e($module['name']); ?>')"  type="checkbox" class="ace <?php echo e($module['name']); ?>-all" />
                    <span class="lbl"></span>
                </label>
            </td>
            <td>
                <?php if($module['add']): ?>
                <label class="pos-rel">
                <input type="checkbox" name="modulePermissions[add][]" value="<?php echo e($module['name']); ?>" class="ace <?php echo e($module['name']); ?>" onchange="itemsChecked('.<?php echo e($module['name']); ?>')" />
                    <span class="lbl"></span>
                </label>
                <?php else: ?>
                    <p>-</p>
                <?php endif; ?>
            </td>
            <td>
                <?php if($module['edit']): ?>
                <label class="pos-rel">
                    <input type="checkbox" name="modulePermissions[edit][]" value="<?php echo e($module['name']); ?>" class="ace <?php echo e($module['name']); ?>" onchange="itemsChecked('.<?php echo e($module['name']); ?>')" />
                    <span class="lbl"></span>
                </label>
                <?php else: ?>
                    <p>-</p>
                <?php endif; ?>
            </td>
            <td>
                <?php if($module['delete']): ?>
                <label class="pos-rel">
                    <input type="checkbox" name="modulePermissions[delete][]" value="<?php echo e($module['name']); ?>" class="ace <?php echo e($module['name']); ?>" onchange="itemsChecked('.<?php echo e($module['name']); ?>')" />
                    <span class="lbl"></span>
                </label>
                <?php else: ?>
                    <p>-</p>
                <?php endif; ?>
            </td>
            <td>
                <?php if($module['search']): ?>
                <label class="pos-rel">
                    <input type="checkbox" name="modulePermissions[search][]" value="<?php echo e($module['name']); ?>" class="ace <?php echo e($module['name']); ?>" onchange="itemsChecked('.<?php echo e($module['name']); ?>')" />
                    <span class="lbl"></span>
                </label>
                <?php else: ?>
                    <p>-</p>
                <?php endif; ?>
            </td>
            <td>
                <?php if($module['print']): ?>
                <label class="pos-rel">
                    <input type="checkbox" name="modulePermissions[print][]" value="<?php echo e($module['name']); ?>" class="ace <?php echo e($module['name']); ?>" onchange="itemsChecked('.<?php echo e($module['name']); ?>')" />
                    <span class="lbl"></span>
                </label>
                <?php else: ?>
                    <p>-</p>
                <?php endif; ?>
            </td>
            <td>
                <?php if($module['excel']): ?>
                <label class="pos-rel">
                    <input type="checkbox" name="modulePermissions[excel][]" value="<?php echo e($module['name']); ?>" class="ace <?php echo e($module['name']); ?>" onchange="itemsChecked('.<?php echo e($module['name']); ?>')" />
                    <span class="lbl"></span>
                </label>
                <?php else: ?>
                    <p>-</p>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
</table>