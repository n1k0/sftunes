<?php

class FortuneTable extends Doctrine_Table
{    
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Fortune');
  }
  
  public function getLatestQuery()
  {
    return $this->createQuery('f')->orderBy('created_at DESC');
  }
  
  public function getTopContributors($max)
  {
    return $this->createQuery('f')
      ->select('author, COUNT(id) as nb')
      ->groupBy('author')
      ->orderBy('nb DESC')
      ->execute()
    ;
  }
  
  public function getTopQuery()
  {
    return $this->createQuery('f')->orderBy('votes DESC');
  }
  
  public function getWorstQuery()
  {
    return $this->createQuery('f')->orderBy('votes ASC');
  }
}