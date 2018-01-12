<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uprawnienia".
 *
 * @property integer $user_id
 * @property integer $podkategoria_id
 */
class Uprawnienia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uprawnienia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'podkategoria_id'], 'required'],
            [['user_id', 'podkategoria_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'Konto ID',
            'podkategoria_id' => 'Podkategoria ID',
        ];
    }
}
