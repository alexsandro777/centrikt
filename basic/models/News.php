<?php
/**
 * Created by PhpStorm.
 * User: YsWaY
 * Date: 17.03.15
 * Time: 5:08
 */
namespace app\models;

use Yii;

/**
 * NewsForm is the model behind the News form
 */

class News extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'news';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['id'], 'integer'],
            [['title'], 'string', 'max' => 11]
        ];
    }
}