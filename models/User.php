<?php

namespace codeheadco\goauth\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string $password_hash
 * @property string $role
 * @property string $auth_key
 * @property string $lastlogin_at
 * @property string $confirmed_at
 * @property string $blocked_at
 * @property string $deleted_at
 * @property string $created_at
 */
class User extends ActiveRecord implements IdentityInterface
{
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lastlogin_at', 'confirmed_at', 'blocked_at', 'deleted_at', 'created_at'], 'safe'],
            [['email', 'password_hash', 'role', 'auth_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('user', 'ID'),
            'email' => Yii::t('user', 'Email'),
            'password_hash' => Yii::t('user', 'Password Hash'),
            'role' => Yii::t('user', 'Role'),
            'auth_key' => Yii::t('user', 'Auth Key'),
            'lastlogin_at' => Yii::t('user', 'Lastlogin At'),
            'confirmed_at' => Yii::t('user', 'Confirmed At'),
            'blocked_at' => Yii::t('user', 'Blocked At'),
            'deleted_at' => Yii::t('user', 'Deleted At'),
            'created_at' => Yii::t('user', 'Created At'),
        ];
    }
    
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        $model = Token::findOne([
            'code' => $token,
            'type' => $type,
        ]);
        
        if ($model->created_at < date('Y-m-d H:i:s', strtotime('-24 hour'))) {
            return null;
        }
        
        return static::findIdentity($model->data);
    }

    public function getAuthKey(): string
    {
        
    }

    public function getId()
    {
        
    }

    public function validateAuthKey($authKey): bool
    {
        
    }
    
}
