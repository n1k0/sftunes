<ul>
  <li class="<?php echo 'default' === $section ? 'active' : '' ?>">
    <a href="<?php echo url_for('fortune') ?>">
      Latest
      <small>Recently added quotes</small>
    </a>
  </li>
  <li class="<?php echo 'top' === $section ? 'active' : '' ?>">
    <a href="<?php echo url_for('fortune_top') ?>">
      Top
      <small>Top rated quotes</small>
    </a>
  </li>
  <li class="<?php echo 'worst' === $section ? 'active' : '' ?>">
    <a href="<?php echo url_for('fortune_worst') ?>">
      Worst
      <small>Badly rated quotes</small>
    </a>
  </li>
  <li class="<?php echo 'new' === $section ? 'active' : '' ?>">
    <a href="<?php echo url_for('fortune_new') ?>">
      Add
      <small>Add your own quote!</small>
    </a>
  </li>
</ul>