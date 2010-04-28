<?php
/**
 * fortune actions.
 *
 * @package    sftunes
 * @subpackage fortune
 * @author     Nicolas Perriault
 */
class fortuneActions extends sfActions
{
  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new FortuneForm();
    
    if ($this->form->bindAndSave($request->getParameter('fortune')))
    {
      $this->redirect('@homepage');
    }
    
    $this->setTemplate('new');
  }
  
  public function executeComment(sfWebRequest $request)
  {
    $this->form = $this->getCommentForm($this->fortune = $this->getRoute()->getObject(), $request);
    
    if ($this->form->bindAndSave($request->getParameter('comment')))
    {
      $this->redirect($this->generateUrl('fortune_show', $this->fortune));
    }
    
    $this->comments = $this->getComments($this->fortune);
    
    $this->setTemplate('show');
  }
  
  public function executeDown(sfWebRequest $request)
  {
    $fortune = $this->getRoute()->getObject();

    $fortune->updateVote('down');

    $this->redirect($request->getReferer() ? $request->getReferer() : '@homepage');
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->pager = $this->getPager(Doctrine::getTable('Fortune')->getLatestQuery());
  }
  
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new FortuneForm();
    
    $request->setParameter('section', 'new');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->fortune = $this->getRoute()->getObject();
    
    $this->comments = $this->getComments($this->fortune);
    
    $this->form = $this->getCommentForm($this->fortune, $request);
  }

  public function executeUp(sfWebRequest $request)
  {
    $fortune = $this->getRoute()->getObject();

    $fortune->updateVote('up');

    $this->redirect($request->getReferer() ? $request->getReferer() : '@homepage');
  }

  public function executeTop(sfWebRequest $request)
  {
    $this->pager = $this->getPager(Doctrine::getTable('Fortune')->getTopQuery());
    
    $request->setParameter('section', 'top');

    $this->setTemplate('index');
  }

  public function executeWorst(sfWebRequest $request)
  {
    $this->pager = $this->getPager(Doctrine::getTable('Fortune')->getWorstQuery());
    
    $request->setParameter('section', 'worst');

    $this->setTemplate('index');
  }
  
  protected function getComments(Fortune $fortune)
  {
    return Doctrine::getTable('Comment')->getForFortune($fortune);
  }
  
  protected function getCommentForm(Fortune $fortune, sfWebRequest $request)
  {
    $comment = new Comment();
    
    $comment->setFortuneId($fortune->id);
    
    return new CommentForm($comment);
  }

  protected function getPager(Doctrine_Query $query)
  {
    $pager = new sfDoctrinePager('Fortune', sfConfig::get('app_fortunes_max_items', 10));
    
    $pager->setQuery($query);
    $pager->setPage($this->getRequest()->getParameter('page', 1));
    
    $pager->init();

    return $pager;
  }
}
