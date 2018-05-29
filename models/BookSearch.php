<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class BookSearch extends Book
{

    public function rules()
    {
        return [
            [['book_name', 'description'], 'string', 'max' => 255],
            [['author.fullName'], 'string', 'max' => 255],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), ['author.fullName']);
    }

    public function search($params)
    {
        $query = Book::find(); // ActiveQuery 
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $query->joinWith(['author']);


        $dataProvider->sort->attributes['author.fullName'] = [
            'asc' => ['author.surname' => SORT_ASC],
            'desc' => ['author.surname' => SORT_DESC],
        ];
         
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'book_name', $this->book_name]);
        $query->andFilterWhere(['like', 'author.surname', $this->getAttribute('author.fullName')]);
        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}