<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 24.09.2016
 * Time: 13:44
 */

namespace app\widgets\box;


use app\helpers\PhpHelper;
use Yii;
use yii\base\Widget;

class Box extends Widget
{
    
    public static function begin($config = [])
    {
        $header = PhpHelper::issetDefArr($config, 'header', '');
        $headerContent = PhpHelper::issetDefArr($config, 'headerContent', '');
        echo Yii::$app->view->render('@app/widgets/box/views/begin', [
            'header'        => $header,
            'headerContent' => $headerContent,
        ]);
    }
    
    public static function end($config = [])
    {
        $footerContent = PhpHelper::issetDefArr($config, 'footerContent', '');
        echo Yii::$app->view->render('@app/widgets/box/views/end', [
            'footerContent' => $footerContent,
        ]);
    }
    
    
}