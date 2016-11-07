<?php
/**
 * Created by PhpStorm.
 * User: rainnogame
 * Date: 04.11.2016
 * Time: 6:20
 */

namespace app\controllers;


use app\behaviours\CategoryMenuBehaviour;
use app\managers\ArticlesManager;
use yii\web\Controller;

class CategoryController extends Controller
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
    
    public function actionIndex($id)
    {
        $articles = $this->articlesManager->retrieveCategoryArticles($id);
        return $this->render('view', [
            'articles' => $articles,
            'category' => $this->articlesManager->retrieveCategory($id),
        ]);
    }
}