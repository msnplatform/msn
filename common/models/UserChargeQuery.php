<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UserCharge]].
 *
 * @see UserCharge
 */
class UserChargeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return UserCharge[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserCharge|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}