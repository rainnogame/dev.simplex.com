<?php
/**
 * Created by PhpStorm.
 * User: rainnogame
 * Date: 04.11.2016
 * Time: 4:59
 */

namespace app\helpers;


class ViewHelper
{
    public static function generateCategoriesMenu(array $categories)
    {
        $categoriesMenu = [];
        foreach ($categories as $category) {
            $newItem = [];
            $newItem['label'] = $category['title'];
            if (isset($category['items'])) {
                $newItem['icon'] = 'fa fa-circle-o';
                $newItem['items'] = self::generateCategoriesMenu($category['items']);
                $newItem['url'] = ['#'];
            } else {
                $newItem['url'] = ['/category', 'id' => $category['id']];
            }
            $categoriesMenu[] = $newItem;
        }
        return $categoriesMenu;
    }
}