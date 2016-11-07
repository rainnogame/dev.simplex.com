<?php
namespace app\behaviours;


use app\helpers\PhpHelper;
use app\managers\ArticlesManager;
use yii\base\Behavior;
use yii\base\Controller;

/**
 * Class CategoryMenuBehaviour
 * Init side category menu for controllers
 * Required if controller layout has side categories
 *
 * @package app\behaviours
 */
class CategoryMenuBehaviour extends Behavior
{
    /** @var ArticlesManager $articlesManager */
    private $articlesManager;
    
    public function init()
    {
        $this->articlesManager = \Yii::$app->get('articlesManager');
    }
    
    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'beforeActionEventHandler',
        ];
    }
    
    public function beforeActionEventHandler()
    {
        $categoriesArray = $this->getCategoriesArray();
        $rerangedCategoriesArray = $this->rerangeCategories($categoriesArray);
        $this->owner->view->params['categories'] = $rerangedCategoriesArray;
        
        
    }
    
    /**
     * @return array
     */
    private function getCategoriesArray():array
    {
        return $this->articlesManager->retrieveAllCategories();
    }
    
    /**
     * @param $categoriesArray
     * Build categories tree from categories array
     *
     * @return array
     */
    private function rerangeCategories($categoriesArray):array
    {
        $rerangedCategoriesArray = [];
        foreach ($categoriesArray as $categoryItem) {
            $parentId = $categoryItem['parent_id'];
            if (is_null($parentId)) {
                $categoryItem['items'] = PhpHelper::subarrayFindByKeyValue('parent_id', $categoryItem['id'], $categoriesArray);
                $rerangedCategoriesArray[] = $categoryItem;
            }
        }
        return $rerangedCategoriesArray;
    }
}
