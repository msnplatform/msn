<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user_parent".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $parent_id
 * @property integer $relationship
 * @property integer $created_at
 * @property integer $updated_at
 */
class UserParent extends \yii\db\ActiveRecord
{
    const RELATION_FRIEND = 1;
    const RELATION_PARENT = 2;
    const RELATION_SIBLING = 3;
    const RELATION_EXTENDED_FAMILY = 4;
    const RELATION_SPOUSE = 5;
    const RELATION_COLLEAGUE = 6;
    const RELATION_JUST_KNOW = 7;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_parent';
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
            [['user_id', 'parent_id'], 'required'],
            [['user_id', 'parent_id', 'relationship', 'created_at', 'updated_at'], 'integer']
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
            'parent_id' => Yii::t('app', 'Parent ID'),
            'relationship' => Yii::t('app', 'Relationship'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return PaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PaQuery(get_called_class());
    }

    public static function create($user_id, $parent_id, $relation = null)
    {
        $userParent = new UserParent();
        $userParent->user_id = $user_id;
        $userParent->parent_id = $parent_id;
        $userParent->relationship = $relation;
        if($userParent->save()){
            return true;
        }else{
            return false;
        }
    }
}
