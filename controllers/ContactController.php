<?php
/**
 * Created by PhpStorm.
 * User: alexandr
 * Date: 25.09.17
 * Time: 21:44
 */

namespace app\controllers;


class ContactController extends AppController
{

    public function actionView()
    {
        return $this->render('view');
    }


}