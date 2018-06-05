<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

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
            [['author_id','genre_id'], 'integer'],
            [['description'], 'string'],
            [['book_name'], 'string', 'max' => 255],
            [['book_name', 'author_id'], 'required'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::className(), 'targetAttribute' => ['genre_id' => 'id']],
            [['coverFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif']
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
            'cover' => 'Обложка',
            'genre_id' => 'Жанр'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    public function getGenre()
    {
        return $this->hasOne(Genre::className(), ['id' => 'genre_id']);
    }

    private function upload()
    {
        if ($this->validate()) {
            $path = FileHelper::normalizePath(
                Yii::getAlias('@webroot/uploads/' . $this->id . '/')
            );
            if (!file_exists($path)) {
                FileHelper::createDirectory($path);
            }
            $this->coverFile->saveAs($path . '/' . $this->coverFile->baseName . '.' . $this->coverFile->extension, false);
            return true;
        } else {
            return false;
        }
    }

    public function beforeSave($insert) 
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $this->coverFile = UploadedFile::getInstance($this, 'coverFile');
        if (!is_null($this->coverFile)) {
            $this->cover = $this->coverFile->name;
        }
        return true;
    }

    public function afterSave($insert, $attr) 
    {
        parent::afterSave($insert, $attr);
        if (!is_null($this->coverFile)) {
            $this->upload();
        }
    }
}
