<?php
/**
 * Created by PhpStorm.
 * User: rainnogame
 * Date: 04.11.2016
 * Time: 4:06
 */

namespace app\managers;


use app\helpers\CacheHelper;
use app\helpers\RecordsConvertHelper;
use app\models\Article;
use app\models\ArticleType;
use app\models\Category;
use app\models\Tag;
use yii\base\Component;
use yii\helpers\ArrayHelper;

class ArticlesManager extends Component
{
        
    public function retrieveAllCategories($onlyChild = FALSE)
    {
        return CacheHelper::cache(['all-categories', $onlyChild], function () use ($onlyChild) {
            if ($onlyChild) {
                $records = Category::find()->where('parent_id is not null')->all();
            } else {
                $records = Category::find()->all();
            }
            return RecordsConvertHelper::recordsToArray($records);
        });
    }
    
    public function retrieveCategoryArticles($categoryId)
    {
        return CacheHelper::cache(['category-articles', $categoryId], function () use ($categoryId) {
            return RecordsConvertHelper::recordsToArray(Article::findByCategory($categoryId));
        });
    }
    
    public function retrieveCategory($categoryId)
    {
        return RecordsConvertHelper::recordToArray(Category::findOne($categoryId));
    }
    
    public function retrieveArticleTypes()
    {
        return CacheHelper::cache(['article-types'], function () {
            return RecordsConvertHelper::recordsToArray(ArticleType::find()->all());
        });
    }
    
    public function retrieveTagsMap()
    {
        return CacheHelper::cache(['tags'], function () {
            return  ArrayHelper::map(Tag::find()->all(), 'id', 'title');
        });
    }
}