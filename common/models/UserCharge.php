<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user_charge".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $charge_id
 * @property integer $added
 * @property integer $created_at
 * @property integer $updated_at
 */
class UserCharge extends \yii\db\ActiveRecord
{
    const ADDED = 1;
    const NOT_ADDED = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_charge';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'charge_id'], 'required'],
            [['user_id', 'charge_id', 'added', 'created_at', 'updated_at'], 'integer'],
            ['added', 'default', 'value' => self::NOT_ADDED]
        ];
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
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'charge_id' => Yii::t('app', 'Charge ID'),
            'added' => Yii::t('app', 'Added'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return UserChargeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserChargeQuery(get_called_class());
    }

    public static function create($user_id, $charge_id, $added = null)
    {
        $userCharge = new UserCharge();
        $userCharge->user_id = $user_id;
        $userCharge->charge_id = $charge_id;
        if(!empty($added)){
            $userCharge->added = $added;
        }
        if($userCharge->save()){
            return true;
        }else{
            $e = $userCharge->getErrors();
            var_dump($e);
            die;
            return false;
        }
    }
}
