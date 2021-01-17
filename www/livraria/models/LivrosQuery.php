<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Livros]].
 *
 * @see Livros
 */
class LivrosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Livros[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Livros|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
