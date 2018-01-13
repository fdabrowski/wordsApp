<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "zestaw".
 *
 * @property string $id
 * @property string $user_id
 * @property string $jezyk1_id
 * @property string $jezyk2_id
 * @property string $podkategoria_id
 * @property string $nazwa
 * @property string $zestaw
 * @property integer $ilosc_slowek
 * @property string $data_dodania
 * @property string $data_edycji
 *
 * @property Wynik[] $wyniks
 * @property User $user
 * @property Jezyk $jezyk1
 * @property Jezyk $jezyk2
 * @property Podkategoria $podkategoria
 */
class Zestaw extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zestaw';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'jezyk1_id', 'jezyk2_id', 'podkategoria_id', 'nazwa', 'zestaw', 'ilosc_slowek', 'data_dodania'], 'required'],
            [['user_id', 'jezyk1_id', 'jezyk2_id', 'podkategoria_id', 'ilosc_slowek'], 'integer'],
            [['zestaw'], 'string'],
            [['data_dodania', 'data_edycji'], 'safe'],
            [['nazwa'], 'string', 'max' => 200],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['jezyk1_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jezyk::className(), 'targetAttribute' => ['jezyk1_id' => 'id']],
            [['jezyk2_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jezyk::className(), 'targetAttribute' => ['jezyk2_id' => 'id']],
            [['podkategoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Podkategoria::className(), 'targetAttribute' => ['podkategoria_id' => 'id']],
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
            'jezyk1_id' => 'Jezyk1 ID',
            'jezyk2_id' => 'Jezyk2 ID',
            'podkategoria_id' => 'Podkategoria ID',
            'nazwa' => 'Nazwa',
            'zestaw' => 'Zestaw',
            'ilosc_slowek' => 'Ilosc Slowek',
            'data_dodania' => 'Data Dodania',
            'data_edycji' => 'Data Edycji',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWyniks()
    {
        return $this->hasMany(Wynik::className(), ['zestaw_id' => 'id']);
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
    public function getJezyk1()
    {
        return $this->hasOne(Jezyk::className(), ['id' => 'jezyk1_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJezyk2()
    {
        return $this->hasOne(Jezyk::className(), ['id' => 'jezyk2_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPodkategoria()
    {
        return $this->hasOne(Podkategoria::className(), ['id' => 'podkategoria_id']);
    }
}
