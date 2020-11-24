<?php 
$modulePermissions = json_decode($user->modulePermissions);
?>

<div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
            try{ace.settings.loadState('main-container')}catch(e){}
        </script>

        <div id="sidebar" class="sidebar responsive ace-save-state">
            <script type="text/javascript">
                try{ace.settings.loadState('sidebar')}catch(e){}
            </script>

            <!-- 
            <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                    <button class="btn btn-success">
                        <i class="ace-icon fa fa-signal"></i>
                    </button>

                    <button class="btn btn-info">
                        <i class="ace-icon fa fa-pencil"></i>
                    </button>

                    <button class="btn btn-warning">
                        <i class="ace-icon fa fa-users"></i>
                    </button>

                    <button class="btn btn-danger">
                        <i class="ace-icon fa fa-cogs"></i>
                    </button>
                </div>

                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <span class="btn btn-success"></span>

                    <span class="btn btn-info"></span>

                    <span class="btn btn-warning"></span>

                    <span class="btn btn-danger"></span>
                </div>
            </div><!-- /.sidebar-shortcuts -->

            <ul class="nav nav-list">

                <li <?php echo Request::path() == '/' ? 'class="active"' : ''; ?> >
                    <a href="<?php echo e(url('/')); ?>">
                        <i class="menu-icon fa fa-tachometer"></i>
                        <span class="menu-text"> الرئيسية </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <?php if(moduleAllow('items')): ?>
                <li <?php echo Request::path() == 'items' ? 'class="active"' : ''; ?> >
                    <a href="<?php echo e(url('items')); ?>" >
                        <i class="menu-icon fa fa-cubes"></i>
                        <span class="menu-text"> الأصناف </span>
                    </a>

                    <b class="arrow"></b>
                </li>
                <?php endif; ?>

                <?php if(in_array('items',$modulePermissions->add) ): ?>
                <li <?php echo Request::path() == 'items/create' ? 'class="active"' : ''; ?> >
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
                <li <?php echo Request::path() == 'companies' ? 'class="active"' : ''; ?> >
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
                <li <?php echo Request::path() == 'categories' ? 'class="active"' : ''; ?> >
                    <a href="<?php echo e(url('categories')); ?>" >
                        <i class="menu-icon fa fa-sitemap"></i>
                        <span class="menu-text">
                            التصنيفات
                        </span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <?php endif; ?>

                <?php if(moduleAllow('categories')): ?>
                <li <?php echo Request::path() == 'unities' ? 'class="active"' : ''; ?> >
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
                <li <?php echo Request::path() == 'store/create' ? 'class="active"' : ''; ?> >
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
                <li <?php echo Request::path() == 'stores' ? 'class="active"' : ''; ?> >
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
                <li <?php echo Request::path() == 'treasury-bonds/reception/create' ? 'class="active"' : ''; ?> >
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
                <li <?php echo Request::path() == 'treasury-bonds/dismissal/create' ? 'class="active"' : ''; ?> >
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
                <li <?php echo Request::path() == 'treasury-bonds/reactionary/create' ? 'class="active"' : ''; ?> >
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
                <li <?php echo Request::path() == 'user/create' ? 'class="active"' : ''; ?> >
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
                <li <?php echo Request::path() == 'users' ? 'class="active"' : ''; ?> >
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
                <li <?php echo Request::path() == 'settings' ? 'class="active"' : ''; ?> >
                    <a href="<?php echo e(url('settings')); ?>" >
                        <i class="menu-icon fa fa-sliders"></i>
                        <span class="menu-text">
                            اعدادات النظام
                        </span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <?php endif; ?>   
            </ul><!-- /.nav-list -->

            <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
            </div>
        </div>

