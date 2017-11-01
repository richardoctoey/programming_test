<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_type".
 *
 * @property integer $id
 * @property integer $book_id
 * @property integer $type_id
 */
class BookType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id', 'type_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
            'type_id' => 'Type ID',
        ];
    }
}
