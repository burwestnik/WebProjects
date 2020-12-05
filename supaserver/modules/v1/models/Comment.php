<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $comment Comment text
 * @property string $createdAt Creation time
 * @property string $updatedAt Update time
 * @property int|null $user_id User
 * @property int|null $emote_id Emote
 *
 * @property Users $user
 * @property Emotes $emote
 */
class Comment extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment', 'user_id', 'emote_id'], 'required'],
            [['comment'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['user_id', 'emote_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['emote_id'], 'exist', 'skipOnError' => true, 'targetClass' => Emote::className(), 'targetAttribute' => ['emote_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comment' => 'Comment text',
            'createdAt' => 'Creation time',
            'updatedAt' => 'Update time',
            'user_id' => 'User',
            'emote_id' => 'Emote',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Emote]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmote()
    {
        return $this->hasOne(Emote::className(), ['id' => 'emote_id']);
    }
}