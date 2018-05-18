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
            [['book_name'], 'string', 'max' => 255],
            // [['author.fullName'], 'string', 'max' => 255],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Book::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        // var_dump($params); die();
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'book_name', $this->book_name]);
        
        if (isset($params['sort'])) {
            $query->orderBy($params['sort']);
        }
        
        return $dataProvider;
    }
}