<?php slot('page_title', sprintf('Fortune #%d %s', $fortune['id'], $fortune['title'])) ?>

<?php include_partial('fortune/fortune', array('fortune' => $fortune)); ?>

<section class="fortune-comments">
  <div class="comments-block">
    <h3>Comments</h3>
    <?php if (count($comments)): ?>
    <?php foreach ($comments as $comment): ?>
    <article class="fortune-comment" id="c_<?php echo $comment['id'] ?>">
      <blockquote>
        <?php echo $comment['content'] ?>
      </blockquote>
      <p>
        Posted by <?php echo $comment['author'] ?> 
        <?php echo time_ago_in_words(strtotime($comment['created_at'])) ?> ago
      </p>
    </article>
    <?php endforeach; ?>
    <?php else: ?>
    <p>No comment yet</p>
    <?php endif; ?>
  </div>
</section>

<section class="fortune-comment-form">
  <div class="comment-form-block">
    <h3>Add a comment</h3>
    <?php echo $form->renderFormTag(url_for('fortune_comment', $fortune)) ?>
      <?php $form->renderHiddenFields() ?>
      <?php $form->renderGlobalErrors() ?>
      <table>
        <?php echo $form ?>
        <tr>
          <td></td>
          <td><input type="submit" value="Comment this quote"/></td>
        </tr>
      </table>
    </form>
  </div>
</section>

<aside class="fortune-context-actions">
  <nav>
    <p>
      Back to <a href="<?php echo url_for('fortune') ?>">fortunes list</a> |
      <a href="<?php echo url_for('fortune_new') ?>">Add a new fortune</a>
    </p>
  </nav>
</aside>