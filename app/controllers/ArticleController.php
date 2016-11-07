<?php
/**
 * Created by PhpStorm.
 * User: rainnogame
 * Date: 04.11.2016
 * Time: 7:44
 */

namespace app\controllers;

use app\behaviours\CategoryMenuBehaviour;
use app\managers\ArticlesManager;
use app\models\Article;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class ArticleController extends Controller
{
    
    /** @var ArticlesManager $articlesManager */
    private $articlesManager;
    
    public function init()
    {
        $this->articlesManager = \Yii::$app->get('articlesManager');
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            CategoryMenuBehaviour::className(),
        ];
    }
    
    public function actionView($id)
    {
        $article = Article::findOne($id);
        return $this->render('view', [
            'article' => $article,
        ]);
    }
    
    public function actionCreate()
    {
        $article = new Article();
        $categories = ArrayHelper::map($this->articlesManager->retrieveAllCategories(TRUE), 'id', 'title');
        $articleTypes = ArrayHelper::map($this->articlesManager->retrieveArticleTypes(), 'id', 'title');
        $tags = $this->articlesManager->retrieveTagsMap();
        if ($article->load(\Yii::$app->request->post()) && $article->save()) {
            $this->redirect(['/category', 'id' => $article->category_id]);
        }
        return $this->render('form', [
            'article'      => $article,
            'categories'   => $categories,
            'articleTypes' => $articleTypes,
            'tags'         => $tags,
        ]);
    }
    
    public function actionUpdate($id)
    {
        $article = Article::findOne($id);
        $categories = ArrayHelper::map($this->articlesManager->retrieveAllCategories(TRUE), 'id', 'title');
        $articleTypes = ArrayHelper::map($this->articlesManager->retrieveArticleTypes(), 'id', 'title');
        $tags = $this->articlesManager->retrieveTagsMap();
        
        if ($article->load(\Yii::$app->request->post()) && $article->save()) {
            $this->redirect(['/category', 'id' => $article->category_id]);
        }
        return $this->render('form', [
            'article'      => $article,
            'categories'   => $categories,
            'articleTypes' => $articleTypes,
            'tags'         => $tags,
        ]);
    }
    
    public function actionDelete($id)
    {
        Article::deleteAll(['id' => $id]);
    }
}