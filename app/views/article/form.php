<?php
/**
 * Created by PhpStorm.
 * User: rainnogame
 * Date: 04.11.2016
 * Time: 7:45
 */
use kartik\markdown\MarkdownEditor;
use kartik\widgets\Select2;
use yii\widgets\ActiveForm;

/** @var \app\models\Article $article */
/** @var \yii\web\View $this */
$this->title = $article->isNewRecord ? "Create Article" : 'Update Article';

?>

<? $form = ActiveForm::begin(); ?>
<?= $form->field($article, 'title')->textInput(); ?>
<?= $form->field($article, 'description')->textInput(); ?>
<?= $form->field($article, 'category_id')->dropDownList($categories); ?>
<?= $form->field($article, 'type_id')->dropDownList($articleTypes); ?>
<?


?>
<?= $form->field($article, 'tag_ids')->widget(Select2::className(), [
    'value'         => $article->tagsMap,
    'data'          => $tags,
    'options'       => ['placeholder' => 'Select tags ...', 'multiple' => TRUE],
    'pluginOptions' => [
        'tags'               => TRUE,
        'maximumInputLength' => 30,
    ],
]); ?>

<?= $form->field($article, 'content')->widget(MarkdownEditor::className(), [

]); ?>


<?= \yii\bootstrap\Html::submitButton(
    $article->isNewRecord ? "Create Article" : 'Update Article',
    [
        'class' => 'btn ' . ($article->isNewRecord ? "btn-success" : 'btn-primary'),
    ]
) ?>
<? ActiveForm::end(); ?>