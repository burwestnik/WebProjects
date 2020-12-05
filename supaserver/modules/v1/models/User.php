<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username Username
 * @property string $password Password
 * @property string $createdAt Creation time
 * @property string|null $updatedAt Update time
 *
 * @property Comments[] $comments
 */
class User extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['username', 'password'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'createdAt' => 'Creation time',
            'updatedAt' => 'Update time',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['user_id' => 'id']);
    }
}