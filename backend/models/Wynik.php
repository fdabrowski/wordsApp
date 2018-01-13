<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "wynik".
 *
 * @property string $id
 * @property string $user_id
 * @property string $zestaw_id
 * @property string $data_wyniku
 * @property integer $wynik
 *
 * @property User $user
 * @property Zestaw $zestaw
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
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['zestaw_id'], 'exist', 'skipOnError' => true, 'targetClass' => Zestaw::className(), 'targetAttribute' => ['zestaw_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'zestaw_id' => 'Zestaw ID',
            'data_wyniku' => 'Data Wyniku',
            'wynik' => 'Wynik',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZestaw()
    {
        return $this->hasOne(Zestaw::className(), ['id' => 'zestaw_id']);
    }
}
