<?php slot('page_title', 'Fortunes list') ?>

<?php if (count($results = $pager->getResults())): ?>
<?php foreach ($results as $fortune): ?>
  <?php include_partial('fortune/fortune', array('fortune' => $fortune)) ?>
<?php endforeach ?>
<?php else: ?>
<p>No fortune yet.</p>
<?php endif; ?>

<?php if ($pager->haveToPaginate()): ?>
<nav class="pagination">
  <ul>
    <?php if ($pager->getPreviousPage()): ?>
    <li>
      <a href="<?php echo url_for('fortune') ?>?page=<?php echo $pager->getPreviousPage() ?>">Previous</a>
    </li>
    <?php endif; ?>
    
    <?php if ($pager->getNextPage()): ?>
    <li>
      <a href="<?php echo url_for('fortune') ?>?page=<?php echo $pager->getNextPage() ?>">Next</a>
    </li>
    <?php endif; ?>

<?php endif; ?>