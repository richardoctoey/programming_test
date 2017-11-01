<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type".
 *
 * @property integer $id
 * @property string $name
 */
class Type extends \yii\db\ActiveRecord
{

    /**
     * @return array of books (relation)
     */
    public function getBooks(){
        return $this->hasMany(Book::className(), ['id'=>'book_id'])
            ->viaTable(BookType::className(), ['type_id'=>'id']);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}
