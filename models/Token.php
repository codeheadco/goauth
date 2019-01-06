<?php

namespace codeheadco\goauth\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "token".
 * 
 * @author Varga Gábor <gabor87@outlook.com>
 * 
 * @property int $id
 * @property string $code
 * @property string $type
 * @property string $data
 * @property string $created_at
 */
class Token extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'token';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['code', 'type', 'data'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'type' => Yii::t('app', 'Type'),
            'data' => Yii::t('app', 'Data'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

}
