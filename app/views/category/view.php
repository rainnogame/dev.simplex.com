<?php
/**
 * Created by PhpStorm.
 * User: rainnogame
 * Date: 04.11.2016
 * Time: 6:21
 */
use app\widgets\article_actions\ArticleActions;
use app\widgets\box\Box;


/** @var \yii\web\View $this */
$this->title = $category['title'];
?>
<div>
    <? foreach ($articles as $article): ?>
        <div class="article-container">
            <? Box::begin([
                'header'        => $article['title'],
                'headerContent' => ArticleActions::widget(['content_id' => $article['id']]),
            ]) ?>
            <div>
                <? foreach ($article['tags_map'] as $tag): ?>
                    <?= \yii\helpers\Html::a($tag, '#', ['class' => 'btn btn-default btn-sm']) ?>
                
                <? endforeach; ?>
            </div>
            
            <div class="box-description">
                <?= $article['description'] ?>
            </div>
           
            
            <div class='modal fade fast-view-<?= $article['id'] ?>' tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title"><?= $article['title'] ?></h4>
                        </div>
                        <div class="modal-body">
                            <?= $article['content_html'] ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <? Box::end([
                'footerContent' => \yii\helpers\Html::a('Fast View', '#', ['style' => 'width: 100%', 'class' => 'btn btn-info', 'data-toggle' => "modal", 'data-target' => '.fast-view-' . $article['id']]),
            ]) ?>
        </div>
    <? endforeach; ?>
</div>