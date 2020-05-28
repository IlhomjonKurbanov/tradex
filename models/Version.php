<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "version".
 *
 * @property int $id
 * @property string $changed_at
 * @property int $page_id
 * @property int $user_id
 * @property string|null $changed_body
 *
 * @property Page $page
 * @property User $user
 */
class Version extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'version';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['changed_at', 'page_id', 'user_id'], 'required'],
            [['changed_at'], 'safe'],
            [['page_id', 'user_id'], 'integer'],
            [['changed_body'], 'string'],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['page_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'changed_at' => 'Changed At',
            'page_id' => 'Page ID',
            'user_id' => 'User ID',
            'changed_body' => 'Changed Body',
        ];
    }

    /**
     * Gets query for [[Page]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'page_id']);
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
}
