<?php

function modules()
{
    $t = array(
            array(
                'label' => 'الأصناف',
                'name' => 'items',
                'add' => true,
                'edit' => true,
                'delete'=> true,
                'search'=> true,
                'print' => true,
                'excel' => true
            ),
            array(
                'label'=> 'الشركات',
                'name' => 'companies',
                'add' => true,
                'edit' => true,
                'delete'=> true,
                'search'=> false,
                'print' => false,
                'excel' => false
            ),
            array(
                'label'=> 'التصنيفات',
                'name' => 'categories',
                'add' => true,
                'edit' => true,
                'delete'=> true,
                'search'=> false,
                'print' => false,
                'excel' => false
            ),
            array(
                'label'=> 'الوحدات',
                'name' => 'unities',
                'add' => true,
                'edit' => true,
                'delete'=> true,
                'search'=> false,
                'print' => false,
                'excel' => false
            ),
            // array(
            //     'label'=> 'المخازن',
            //     'name' => 'stores',
            //     'add' => true,
            //     'edit' => true,
            //     'delete'=> true,
            //     'search'=> false,
            //     'print' => false,
            //     'excel' => false
            // ),
            array(
                'label'=> 'المستخدمين',
                'name' => 'users',
                'add' => true,
                'edit' => true,
                'delete'=> true,
                'search'=> true,
                'print' => false,
                'excel' => false
            ),
            array(
                'label'=> 'التقارير',
                'name' => 'reports',
                'add' => false,
                'edit' => false,
                'delete'=> false,
                'search'=> true,
                'print' => true,
                'excel' => true
            ),
            array(
                'label'=> 'الأعدادات',
                'name' => 'settings',
                'add' => false,
                'edit' => true,
                'delete'=> false,
                'search'=> false,
                'print' => false,
                'excel' => false
            )
        );
    return $t;
}

function moduleAllow(string $moduleName)
{
    $user = Auth::user();
    $modulePermissions = json_decode($user->modulePermissions);
    $inAdd = $inEdit = $inDelete = $inSearch = $inPrint = $inExcel = false;

    if (isset($modulePermissions->add))
        $inAdd = in_array($moduleName,$modulePermissions->add);

    if (isset($modulePermissions->edit))
        $inEdit = in_array($moduleName,$modulePermissions->edit);

    if (isset($modulePermissions->delete))
        $inDelete = in_array($moduleName,$modulePermissions->delete);

    if (isset($modulePermissions->search))
        $inSearch = in_array($moduleName,$modulePermissions->search);

    if (isset($modulePermissions->print))
        $inPrint = in_array($moduleName,$modulePermissions->print);

    if (isset($modulePermissions->excel))
        $inExcel = in_array($moduleName,$modulePermissions->excel);

    if ( $inAdd || $inEdit || $inDelete || $inSearch || $inPrint || $inExcel ) {
        return true;
    } else {
        return false;
    }
}

function storeAllow(string $action)
{
    $user = Auth::user();

    if ($user->store_option == 'no') {
      return false;
    } elseif($user->store_option != 'all') {
        $storePermation = json_decode($user->storePermation,true);
        $storeAction = $storePermation[$action];
        if ( isset($storeAction) && count($storeAction) > 0 ) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}

function storePermation(string $action, int $id)
{
    $user = Auth::user();

    if ($user->store_option != 'all') {
        $storePermation = json_decode($user->storePermation,true);
        $storeAction = $storePermation[$action];

        if (isset($storeAction) && in_array($id,$storeAction)) {
            return true;
        } else {
            return false;
        }

    } else {
        return true;
    }

}
