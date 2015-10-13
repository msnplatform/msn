<?php
/**
 * Created by PhpStorm.
 * User: Alireza
 * Date: 10/10/2015
 * Time: 11:34 AM
 */

namespace backend\models;

use common\models\Charge;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class CreateChargesCodes extends Model
{
    public $number;
    public $amount;
    public $currency;

    private $_codes = [];
    private $_charges = [];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'amount','currency'], 'required'],
            [['currency'], 'string', 'max' => 6],
        ];
    }

    /*
     * This function should create charge cards.**/
  public function save()
  {
      if($this->validate())
      {
          $counter = 0;
          while($counter < $this->number)
          {
              $charge = [];
              $charge['code'] = $this->createChargeCode();
              $charge['amount'] = $this->amount;
              $charge['currency'] = $this->currency;
              $charge['archived'] = Charge::ACTIVE;

              $this->_charges[] = $charge;

              $counter++;
          }

          if(!empty($this->_charges))
          {
              $connection = Yii::$app->getDb();
              $connection->createCommand()->batchInsert('charge', ['code', 'amount', 'currency','archived'], $this->_charges)->execute();
              return true;
          }else{
              $this->addError('amount', 'Sorry, could not create charge codes.');
              return false;
          }
      }
  }

    private function createChargeCode()
    {
        $founded = false;

        while(!$founded)
        {
            $code = $this->generateCode();
            $Existed = Charge::findOne([
                'archived' => Charge::ACTIVE,
                'code' => $code
            ]);
            if(empty($Existed))
            {
                $founded = true;
            }
        }
        return $code;

    }

    private function generateCode()
    {
        $code = '';
        while(empty($code) || isset($this->_codes[$code]) )
        {
            $code = Yii::$app->security->generateRandomString(20);
        }
        $this->_codes[$code] = true;
        return $code;
    }
}
