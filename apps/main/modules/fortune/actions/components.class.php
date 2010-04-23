<?php

class fortuneComponents extends sfComponents
{
  public function executeTop_contributors(sfWebRequest $request)
  {
    $this->authors = Doctrine::getTable('Fortune')->getTopContributors(sfConfig::get('app_fortunes_max_top_contributors', 5));
  }
}