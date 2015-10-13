<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Charge]].
 *
 * @see Charge
 */
class ChargeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Charge[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Charge|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}