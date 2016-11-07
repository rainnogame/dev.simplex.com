<?php
/**
 * Created by PhpStorm.
 * User: rainnogame
 * Date: 05.11.2016
 * Time: 23:50
 */
use app\widgets\article_actions\ArticleActions;
use app\widgets\box\Box;


?>

<? Box::begin([
    'header'        => $article['title'],
    'headerContent' => ArticleActions::widget(['content_id' => $article['id']]) ,
]) ?>
<?= $article['content_html'] ?>
<? Box::end() ?>
