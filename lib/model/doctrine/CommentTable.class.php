<?php

class CommentTable extends Doctrine_Table
{
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Comment');
  }
  
  public function getForFortune(Fortune $fortune)
  {
    return $this->createQuery('c')
      ->where('c.fortune_id = ?', $fortune->id)
      ->orderBy('c.created_at DESC')
      ->execute()
    ;
  }
}