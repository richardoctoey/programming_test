<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $title
 * @property string $author
 * @property integer $book_type
 * @property string $date_published
 * @property integer $number_of_pages
 */
class Book extends \yii\db\ActiveRecord
{

    public $book_type;

    /**
     * @return array of book types (relation)
     */
    public function getTypes(){
        return $this->hasMany(Type::className(), ['id'=>'type_id'])
            ->viaTable('book_type', ['book_id'=>'id']);
    }

    public function getTypeAsArray(){
        $types = [];
        foreach ($this->types as $t) {
            $types[] = $t->name;
        }
        return $types;
    }

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
            [['title', 'author'], 'required'],
            [['number_of_pages'], 'integer'],
            [['date_published','book_type'], 'safe'],
            [['title', 'author'], 'string', 'max' => 50],
        ];
    }

    /**
     * save selected types for a book in CRUD
     * @return true if success save all
     */
    public function saveTypes(){
        $success = true;
        BookType::deleteAll(['book_id'=>$this->id]);
        foreach($this->book_type as $bt){
            $bookType = new BookType();
            $bookType->book_id = $this->id;
            $bookType->type_id = $bt;
            if(!$bookType->save()){
                $success = false;
            }
        }
        return $success;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'book_type' => 'Book Type',
            'date_published' => 'Date Published',
            'number_of_pages' => 'Number Of Pages',
        ];
    }
}
