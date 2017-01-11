<?php

namespace IntMag\Controller;

use IntMag\Library\Request;



/**
 * Контроллер ProductController
 * Товар
 */
class ProductController 
{
    /**
     * Action для страницы просмотра товара
     * @param integer $productId <p>id товара</p>
     */
    public function showAction(Request $request)
    {
        $id = $request->get('id');
        return 'product ' . $id;
    }
}
