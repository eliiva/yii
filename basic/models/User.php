<?php

namespace app\models;
use Yii;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $login
 * @property string $pass
 * @property string $first_name
 * @property string $last_name
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{	
	public $login;
	public $pass;
	public $auth_key;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'pass'], 'required'],
            [['login', 'first_name', 'last_name'], 'string', 'max' => 255],
            [['pass'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'pass' => 'Pass',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
        ];
    }
	
	public static function findByLoginPass($login, $pass){
		return self::findOne(['login' => $login, 'pass' => md5($pass)]);
	}
	
	public static function findIdentity($id)
    {
        return static::findOne($id);
    }
	
	public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
	
	public function getId()
    {
        return $this->id;
    }
	
	public function getAuthKey()
    {
        return $this->auth_key;
    }
	
	public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}
