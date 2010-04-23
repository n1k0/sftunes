<?php

/**
 * Comment form.
 *
 * @package    sftunes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentForm extends BaseCommentForm
{
  public function configure()
  {
    $this->useFields(array(
      'author',
      'content',
    ));
  }
}
