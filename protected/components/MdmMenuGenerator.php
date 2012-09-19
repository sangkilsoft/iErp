<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MdmMenuGenerator
 *
 * @author M D Munir
 */
class MdmMenuGenerator {

    private static $_guestRole = 'guest';

    public static function getItems() {
        $user = Yii::app()->user;
        if ($user->isGuest) {
            $param = self::$_guestRole;
            $sql = <<<SQL
        select distinct m.*
        from tbl_menu m
        join tbl_role_menu rm on(rm.menu_id=m.menu_id)
        join tbl_role r on(r.role_id=rm.role_id)
        where r.role=:param
SQL;
        } else {
            $param = $user->id;
            $sql = <<<SQL
        select distinct m.*
        from tbl_menu m
        join tbl_role_menu rm on(rm.menu_id=m.menu_id)
        join tbl_user_role ur on(ur.role_id=rm.role_id)
        join tbl_user u on(u.user_id=ur.user_id)
        where u.username=:param
SQL;
        }
        $menus = Yii::app()->db->createCommand($sql)->queryAll(true, array(':param' => $param));
        $menu_ids = Yii::app()->db->createCommand($sql)->queryColumn(array(':param' => $param));
        self::addParentMenu($menus, $menu_ids);
        $_menus = array();
        foreach ($menus as $menu)
            $_menus[$menu['menu_id']] = $menu;

        return self::normalizeMenu($_menus);
    }

    protected static function normalizeMenu($menus) {
        $result = array();
        $orders = array();
        foreach ($menus as $menu) {
            if (empty($menu['parent_id'])) {
                $child = array('label' => $menu['label']);
                $orders[] = $menu['urutan'];
                if (($items = self::getMenuChild($menus, $menu['menu_id'])) !== array())
                    $child['items'] = $items;
                if (!empty($menu['url']))
                    $child['url'] = array($menu['url']);
                $result[] = $child;
            }
        }
        array_multisort($orders, $result);
        return $result;
    }

    protected static function getMenuChild($menus, $p_id) {
        $result = array();
        $orders = array();
        foreach ($menus as $menu) {
            if ($menu['parent_id'] == $p_id) {
                $child = array('label' => $menu['label'],);
                $orders[] = $menu['urutan'];
                if (($items = self::getMenuChild($menus, $menu['menu_id'])) !== array())
                    $child['items'] = $items;
                if (!empty($menu['url']))
                    $child['url'] = array($menu['url']);
                $result[] = $child;
            }
        }
        array_multisort($orders, $result);
        return $result;
    }

    protected static function addParentMenu(&$menus, $menu_ids) {
        $parents = array();
        foreach ($menus as $menu) {
            if (!empty($menu['parent_id']) && !in_array($menu['parent_id'], $menu_ids))
                $parents[] = $menu['parent_id'];
        }
        if (count($parents)) {
            $ids = implode(",", array_unique($parents));
            $sql = "select * from tbl_menu where menu_id in($ids)";
            $_menus = Yii::app()->db->createCommand($sql)->queryAll();
            $_menu_ids = Yii::app()->db->createCommand($sql)->queryColumn();

            self::addParentMenu($_menus, $_menu_ids);
            $menus = array_merge($menus, $_menus);
        }
    }

}

?>
