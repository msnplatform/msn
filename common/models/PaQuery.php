<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UserParent]].
 *
 * @see UserParent
 */
class PaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return UserParent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserParent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}