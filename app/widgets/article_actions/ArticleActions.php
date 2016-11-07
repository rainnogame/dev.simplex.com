<?php
/**
 * Created by PhpStorm.
 * User: rainnogame
 * Date: 06.11.2016
 * Time: 0:34
 */

namespace app\widgets\article_actions;


use yii\base\Widget;
use yii\helpers\Html;

class ArticleActions extends Widget
{
    public $content_id;
    
    public function run()
    {
        $edit = Html::a(Html::tag('i', '', ['class' => 'fa fa-pencil-square-o']),
            ['/article/update', 'id' => $this->content_id], ['class' => 'btn btn-sm btn-warning']);
        $delete = Html::a(Html::tag('i', '', ['class' => 'fa fa-times']),
            ['/article/delete', 'id' => $this->content_id], ['class' => 'btn btn-sm btn-danger']);
        $view = Html::a(Html::tag('i', '', ['class' => 'fa fa-eye']),
            ['/article/view', 'id' => $this->content_id], ['class' => 'btn  btn-sm btn-primary']);
        $actions = Html::tag('div', $view . $edit . $delete, ['class' => 'action-buttons']);
        
        return $actions;
    }
    
    
}