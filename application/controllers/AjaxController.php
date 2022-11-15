<?php

class AjaxController
{
    public function actionXaja()
    {

        require_once(ROOT . '/application/ajax/index.php');
        return true;

    }
    public function actionOpen()
    {

        require_once(ROOT . '/application/ajax/ajax.php') ;
        return true;

    }

}