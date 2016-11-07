<?php
/**
 * Created by PhpStorm.
 * User: rainnogame
 * Date: 04.11.2016
 * Time: 4:12
 */

namespace app\helpers;


use yii\base\Arrayable;
use yii\base\Exception;
use yii\db\ActiveRecord;

/**
 * Convert records to array
 * Class DataConvertHelper
 *
 * @package app\helpers
 */
class RecordsConvertHelper
{
    public static function recordsToArray(array $records)
    {
        $resultArray = [];
        foreach ($records as $record) {
            if ($record instanceof Arrayable) {
                $resultArray[] = $record->toArray();
            } elseif ($record instanceof ActiveRecord) {
                $resultArray[] = $record->getAttributes();
            } else {
                throw new Exception('Cannot convert an object of type' . get_class($record) . ' to array');
            }
        }
        return $resultArray;
    }
    
    public static function recordToArray($record)
    {
        if ($record instanceof Arrayable) {
            return $record->toArray();
        } elseif ($record instanceof ActiveRecord) {
            return $record->getAttributes();
        } else {
            throw new Exception('Cannot convert an object of type' . get_class($record) . ' to array');
        }
    }
}