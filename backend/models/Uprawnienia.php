<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "uprawnienia".
 *
 * @property string $user_id
 * @property string $podkategoria_id
 *
 * @property User $user
 * @property Podkategoria $podkategoria
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
            [['user_id', 'podkategoria_id'], 'unique', 'targetAttribute' => ['user_id', 'podkategoria_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['podkategoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Podkategoria::className(), 'targetAttribute' => ['podkategoria_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'podkategoria_id' => 'Podkategoria ID',
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
    public function getPodkategoria()
    {
        return $this->hasOne(Podkategoria::className(), ['id' => 'podkategoria_id']);
    }
}
