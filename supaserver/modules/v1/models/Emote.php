<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "emotes".
 *
 * @property int $id
 * @property string $name Name
 * @property string $description Description
 * @property string $image Image
 * @property string $createdAt Creation time
 * @property string|null $updatedAt Update time
 *
 * @property Comments[] $comments
 */
class Emote extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emotes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'image', 'createdAt'], 'required'],
            [['description'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['name'], 'string', 'max' => 32],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
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
        return $this->hasMany(Comments::className(), ['emote_id' => 'id']);
    }
}
