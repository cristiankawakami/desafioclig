<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "livros".
 *
 * @property int $id
 * @property string $titulo
 * @property string $autor
 * @property int $categoria_id
 *
 * @property Categoria $categoria
 */
class Livros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'livros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'autor', 'categoria_id'], 'required'],
            [['categoria_id'], 'integer'],
            [['titulo'], 'string', 'max' => 500],
            [['autor'], 'string', 'max' => 255],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'autor' => 'Autor',
            'categoria_id' => 'Categoria ID',
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery|CategoriaQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria_id']);
        
    }
    

    /**
     * {@inheritdoc}
     * @return LivrosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LivrosQuery(get_called_class());
    }
}
