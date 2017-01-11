<?php

namespace IntMag\Controller;

use IntMag\Library\Controller;
use IntMag\Library\Request;

class ErrorController extends Controller
{
    public function errorAction(Request $request, \Exception $e)
    {
        return $this->render('error.php', ['e' => $e]);
    }
}