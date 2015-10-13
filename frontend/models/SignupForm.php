<?php
namespace frontend\models;

use common\models\Charge;
use common\models\User;
use common\models\UserCharge;
use common\models\UserParent;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $charge_code;
    public $parent;

    private $_charge;
    private $_parent_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['charge_code'], 'required', 'message' => 'Charge Code cannot be blank.'],
            [['parent'], 'required', 'message' => 'Mentor cannot be blank.'],
            [['charge_code', 'parent'], 'string', 'max' => 50],
            ['charge_code', 'validateChargeCode'],
            ['parent', 'validateParent'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->role = User::ROLE_MARKETER;

            if ($user->save()) {
                Charge::addUserCharge($user->id, $this->_charge);
                UserParent::create($user->id, $this->_parent_id);

                return $user;
            }
        }

        return null;
    }

    public function validateChargeCode($attribute, $params)
    {
        $charge = Charge::findOne([
            'code' => $this->charge_code,
            'archived' => Charge::ACTIVE
        ]);

        if(!empty($charge))
        {
            $this->_charge = $charge;
            return true;
        }else{
            $this->addError($attribute,'The provided code is not correct.');
            return false;
        }

    }

    public function validateParent($attribute, $params)
    {
        $parent = User::find()->where([
            'OR',[
                'email' => $this->parent
            ],[
                'username' => $this->parent
            ]
        ])->one();
        if(!empty($parent))
        {
            $this->_parent_id = $parent->id;
            return true;
        }else{
            $this->addError($attribute,'We could not found anyone with provided username or email.');
            return false;
        }
    }
}
