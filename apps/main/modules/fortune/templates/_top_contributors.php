<?php if (count($authors)): ?>
<ol>
<?php foreach ($authors as $author): ?>
  <li><?php echo $author['author'] ?> (<?php echo $author['nb'] ?>)</li>
<?php endforeach; ?>
</ol>
<?php else: ?>
<p>No author yet</p>
<?php endif; ?>