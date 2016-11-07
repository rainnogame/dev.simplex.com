<?php
/**
 * Created by PhpStorm.
 * User: rainnogame
 * Date: 04.11.2016
 * Time: 5:48
 */

namespace app\helpers;

use Yii;
use yii\caching\Dependency;

class CacheHelper
{
    /**
     * Data caching
     *
     * @param string     $cacheId    Cache ID
     * @param \Closure   $query      Data to cache
     * @param Dependency $dependency Cache dependency
     * @param int        $cacheTime  Duration in seconds
     *
     * @return mixed Output cached model data
     */
    public static function cache($cacheId, \Closure $query, Dependency $dependency = NULL, $cacheTime = NULL)
    {
        $cacheTime = PhpHelper::issetDefArr(Yii::$app->params, 'cache_time', $cacheTime);
        $data = Yii::$app->cache->get($cacheId);
        
        if ($data === FALSE) {
            $data = $query();
            Yii::$app->cache->set($cacheId, $data, $cacheTime, $dependency);
        }
        
        return $data;
    }
    
}