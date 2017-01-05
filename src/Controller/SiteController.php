<?php

namespace IntMag\Controller;


use IntMag\Library\Controller;
use IntMag\Library\Request;

class SiteController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('index.php');
    }
}