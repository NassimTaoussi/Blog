<?php

namespace NTaoussi\Lib\Controller;

use NTaoussi\Lib\Controller\Controller;

class ErrorController extends Controller {


    public function error(\Exception $e) {          
        $this->render('error/error401.html.twig', [
            'error' => $e
        ]);
    }

}

?>