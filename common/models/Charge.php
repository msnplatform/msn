<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "charge".
 *
 * @property integer $id
 * @property string $code
 * @property integer $amount
 * @property string $currency
 * @property integer $archived
 * @property integer $created_at
 * @property integer $updated_at
 */
class Charge extends \yii\db\ActiveRecord
{
    const ARCHIVED = 1;
    const ACTIVE = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'charge';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'amount', 'currency'], 'required'],
            [['amount', 'archived', 'created_at', 'updated_at'], 'integer'],
            [['code'], 'string', 'max' => 32],
            [['currency'], 'string', 'max' => 6],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'amount' => Yii::t('app', 'Amount'),
            'currency' => Yii::t('app', 'Currency'),
            'archived' => Yii::t('app', 'Archived'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return ChargeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ChargeQuery(get_called_class());
    }

    public static function addUserCharge($user_id, Charge $charge, $added = null)
    {
        if(UserCharge::create($user_id, $charge->id, $added)){
            $charge->archived = self::ARCHIVED;
            $charge->save();

            return true;
        }else{
            return false;
        }
    }
}
