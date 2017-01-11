<?php

namespace IntMag\Controller;


use IntMag\Library\Controller;
use IntMag\Library\Request;
use IntMag\Model\Product;

class SiteController extends Controller
{
    public function indexAction(Request $request)
    {
        $Products = new Product();
        return $this->render('index.php', ['Products' => $Products]);
    }

    public function contactAction()
    {
        return 'contact us';
    }

    public function aboutAction()
    {
        return $this->render('about.php');
    }
}