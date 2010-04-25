<?php slot('page_title', 'Fortunes list') ?>

<?php if (count($results = $pager->getResults())): ?>
<?php foreach ($results as $fortune): ?>
  <?php include_partial('fortune/fortune', array('fortune' => $fortune)) ?>
<?php endforeach ?>
<?php else: ?>
<p>No fortune yet.</p>
<?php endif; ?>

<?php if ($pager->haveToPaginate()): ?>

<?php endif; ?>