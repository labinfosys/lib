<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property int $author_id
 * @property string $book_name
 * @property string $description
 *
 * @property Author $author
 */
class Book extends \yii\db\ActiveRecord
{

    public $coverFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id'], 'integer'],
            [['description'], 'string'],
            [['book_name'], 'string', 'max' => 255],
            [['book_name', 'author_id'], 'required'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['coverFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Автор',
            'book_name' => 'Название',
            'description' => 'Описание',
            'coverFile' => 'Обложка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }


    public function upload()
    {
        if ($this->validate()) {
            $this->coverFile->saveAs('uploads/' . $this->coverFile->baseName . '.' . $this->coverFile->extension);
            return true;
        } else {
            return false;
        }
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert))
        {
            return false;
        }
        $this->coverFile = UploadedFile::getInstance($this, 'coverFile');
        if (!is_null($this->coverFile))
        {
            $this->upload();
            $this->coverFile = $this->coverFile->name;
        }
        return true;
    }
}
