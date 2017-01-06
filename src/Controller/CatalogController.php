<?php

namespace IntMag\Controller;

use IntMag\Library\Request;

/**
 * Контроллер CatalogController
 * Каталог товаров
 */
class CatalogController
{

    /**
     * Action для страницы "Каталог товаров"
     */
    public function indexAction()
    {
        return 'all product';
    }

    /**
     * Action для страницы "Категория товаров"
     */
    public function categoryAction(Request $request)
    {
        $st = 1;
        $id = $request->get('id');
        if($request->get('st')){
            $st = $request->get('st');
        }
        return 'category ' . $id . 'str = ' . $st ;
    }

}
