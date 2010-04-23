<?php use_helper('Date', 'Fortune') ?>

<article class="fortune" id="fortune_<?php echo $fortune['id'] ?>">
  <h2>
    <a href="<?php echo url_for('fortune_show', $fortune) ?>">
      #<?php echo $fortune['id'] ?>. <?php echo $fortune['title'] ?>
    </a>
  </h2>
  <blockquote>
    <?php echo fortunize($fortune->getRawValue()) ?>
    <br style="clear:both"/>
  </blockquote>
  <aside class="fortune-infos">
    <p>
      Posted by <strong><?php echo $fortune['author'] ?></strong> 
      <?php echo distance_of_time_in_words(strtotime($fortune['created_at'])) ?> ago. 
      <span class="fortune-actions">
        <strong><?php echo $fortune['votes'] ?> votes</strong> 
        <?php echo link_to('-', 'fortune_down', $fortune, array(
          'method' => 'put',
          'title'  => 'Vote down this fortune',
        )) ?> /
        <?php echo link_to('+', 'fortune_up', $fortune, array(
          'method' => 'put',
          'title'  => 'Vote up this fortune',
        )) ?>
      </span>
    </p>
  </aside>
</article>