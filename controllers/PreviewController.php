<?php

include_once ROOT.'/model/AjaxPreview.php';
/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 07.08.2018
 * Time: 12:08
 */
class PreviewController
{
    public function actionAjax()
    {


        AjaxPreview::preview();

        return true;
    }


}