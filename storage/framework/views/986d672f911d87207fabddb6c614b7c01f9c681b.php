<?php

if (Auth::check()) {
	// The user is logged in...
	$user = Auth::user();
}

//dd($user);
$modulePermissions = json_decode($user->modulePermissions);
//$user

?>
<div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse ace-save-state menu-min" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
    <ul class="nav nav-list">
        
        <li class="hover <?php echo Request::path() == '/' ? 'active' : ''; ?>" >
            <a href="<?php echo e(url('/')); ?>">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> الرئيسية </span>
            </a>

            <b class="arrow"></b>
        </li>
        
        <?php if(moduleAllow('items')): ?>
        <li class="hover <?php echo Request::path() == 'items' ? 'active' : ''; ?>" >
            <a href="<?php echo e(url('items')); ?>" >
                <i class="menu-icon fa fa-cubes"></i>
                <span class="menu-text"> الأصناف </span>
            </a>

            <b class="arrow"></b>
        </li>
        <?php endif; ?>
        
        <?php if(in_array('items',$modulePermissions->add) ): ?>
        <li class="hover <?php echo Request::path() == 'items/create' ? 'active' : ''; ?>" >
            <a href="<?php echo e(url('items/create')); ?>" >
                <i class="menu-icon fa fa-barcode"></i>
                <span class="menu-text">
                    تكويد الأصناف
                </span>
            </a>
            <b class="arrow"></b>
        </li>
        <?php endif; ?>
        
        <?php if(moduleAllow('companies')): ?>
        <li class="hover <?php echo Request::path() == 'companies' ? 'active' : ''; ?>" >
            <a href="<?php echo e(url('companies')); ?>" >
                <i class="menu-icon fa fa-black-tie"></i>
                <span class="menu-text">
                    تكويد الشركات
                </span>
            </a>
            <b class="arrow"></b>
        </li>
        <?php endif; ?>
        
        <?php if(moduleAllow('categories')): ?>
        <li class="hover <?php echo Request::path() == 'categories' ? 'active' : ''; ?>" >
            <a href="<?php echo e(url('categories')); ?>" >
                <i class="menu-icon fa fa-sitemap"></i>
                <span class="menu-text">
                    التصنيفات
                </span>
            </a>
            <b class="arrow"></b>
        </li>
        <?php endif; ?>
        
        <?php if(moduleAllow('unities')): ?>
        <li class="hover <?php echo Request::path() == 'unities' ? 'active' : ''; ?>" >
            <a href="<?php echo e(url('unities')); ?>" >
                <i class="menu-icon fa fa-balance-scale"></i>
                <span class="menu-text">
                    الوحدات
                </span>
            </a>
            <b class="arrow"></b>
        </li>
        <?php endif; ?>
        
        <?php if( storeAllow('reception') ): ?>
        <li class="hover <?php echo Request::path() == 'store/create' ? 'active' : ''; ?>" >
            <a href="<?php echo e(url('store/create')); ?>" >
                <i class="menu-icon fa fa-plus-square-o"></i>
                <span class="menu-text">
                    تكويد مخزن
                </span>
            </a>
            <b class="arrow"></b>
        </li>
        <?php endif; ?>
        
        <?php if( storeAllow('reception') ): ?>
        <li class="hover <?php echo Request::path() == 'stores' ? 'active' : ''; ?>" >
            <a href="<?php echo e(url('stores')); ?>" >
                <i class="menu-icon fa fa-building-o"></i>
                <span class="menu-text">
                    المخازن
                </span>
            </a>
            <b class="arrow"></b>
        </li>
        <?php endif; ?>
        
        <?php if( storeAllow('reception') ): ?>
        <li class="hover <?php echo Request::path() == 'treasury-bonds/reception/create' ? 'active' : ''; ?>" >
            <a href="<?php echo e(url('treasury-bonds/reception/create')); ?>" >
                <i class="menu-icon fa fa-cart-arrow-down"></i>
                <span class="menu-text">
                    اذن استلام
                </span>

                <!-- <b class="arrow fa fa-angle-down"></b> -->
            </a>
            <b class="arrow"></b>
        </li>
        <?php endif; ?>
        
        <?php if( storeAllow('dismissal') ): ?>
        <li class="hover <?php echo Request::path() == 'treasury-bonds/dismissal/create' ? 'active' : ''; ?>" >
            <a href="<?php echo e(url('treasury-bonds/dismissal/create')); ?>" >
                <i class="menu-icon fa  fa-dropbox"></i>
                <span class="menu-text">
                    اذن صرف
                </span>
            </a>
            <b class="arrow"></b>
        </li>
        <?php endif; ?>
        
        <?php if( storeAllow('reactionary') ): ?>
        <li class="hover <?php echo Request::path() == 'treasury-bonds/reactionary/create' ? 'active' : ''; ?>" >
            <a href="<?php echo e(url('treasury-bonds/reactionary/create')); ?>" >
                <i class="menu-icon fa fa-reply-all"></i>
                <span class="menu-text">
                    اذن مرتجع
                </span>
            </a>
            <b class="arrow"></b>
        </li>
        <?php endif; ?>

        <?php if( in_array('users',$modulePermissions->add)): ?>
        <li class="hover <?php echo Request::path() == 'user/create' ? 'active' : ''; ?>" >
            <a href="<?php echo e(url('user/create')); ?>" >
                <i class="menu-icon fa fa-user-plus"></i>
                <span class="menu-text">
                    أضافة مستخدم جديد
                </span>
            </a>
            <b class="arrow"></b>
        </li>
        <?php endif; ?>

        <?php if( moduleAllow('users')): ?>
        <li class="hover <?php echo Request::path() == 'users' ? 'active' : ''; ?>" >
            <a href="<?php echo e(url('users')); ?>" >
                <i class="menu-icon fa fa-group"></i>
                <span class="menu-text">
                    المستخدمين
                </span>
            </a>
            <b class="arrow"></b>
        </li>
        <?php endif; ?>

        <?php if( moduleAllow('settings') ): ?>
        <li class="hover <?php echo Request::path() == 'settings' ? 'active' : ''; ?>" >
            <a href="<?php echo e(url('settings')); ?>" >
                <i class="menu-icon fa fa-sliders"></i>
                <span class="menu-text">
                    اعدادات النظام
                </span>
            </a>
            <b class="arrow"></b>
        </li>
        <?php endif; ?>
        
        <li class="hover" >
            <a href="javascript:void(0)" data-target="#sidebar2">
                <i id="sidebar2-toggle-icon" class="menu-icon sidebar-collapse ace-save-state ace-icon fa fa-angle-double-down" data-icon1="ace-icon fa fa-angle-double-up" data-icon2="ace-icon fa fa-angle-double-down"></i>
                <span class="menu-text">Collapse</span>
            </a>
        </li>
        
    </ul><!-- /.nav-list -->
</div>