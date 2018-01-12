<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wynik".
 *
 * @property string $id
 * @property integer $user_id
 * @property integer $zestaw_id
 * @property string $data_wyniku
 * @property integer $wynik
 */
class Wynik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wynik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'zestaw_id', 'data_wyniku', 'wynik'], 'required'],
            [['user_id', 'zestaw_id', 'wynik'], 'integer'],
            [['data_wyniku'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Konto ID',
            'zestaw_id' => 'Zestaw ID',
            'data_wyniku' => 'Data Wyniku',
            'wynik' => 'Wynik',
        ];
    }
}
