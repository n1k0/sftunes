<!DOCTYPE html>
<html class="djortunes">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title><?php echo get_slot('page_title', 'Untitled') ?> - sftunes</title>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body id="djortunes">
    <header>
      <h1>
        <a href="<?php echo url_for('@homepage') ?>">Fortunes</a>
      </h1>
      <p>
        <small>When it's funny, it's quoted™</small>
      </p>
      <nav id="menu">
        <?php include_partial('global/navigation', array(
          'section' => $sf_request->getParameter('section', 'default'),
        )) ?>
      </nav>
    </header>
    
    <div class="holder">
      <section id="main">
        <?php echo $sf_content ?>
      </section>

      <?php if (has_slot('misc')): ?>
      <?php echo get_slot('misc') ?>
      <?php else: ?>
      <section id="misc">
        <div class="content">
          <?php if (has_slot('about')): ?>
          <?php echo get_slot('about') ?>
          <?php else: ?>
          <h2>About</h2>
          <p>
            Fortunes is a repository of quotes. You can create an account to 
            add your own, or get the source to install it on your own server.
          </p>
          <?php endif; ?>
          <?php if (has_slot('contributors')): ?>
          <?php echo get_slot('contributors') ?>
          <?php else: ?>
          <h2>Top contributors</h2>
          <?php include_component('fortune', 'top_contributors') ?>
          <?php endif; ?>
        </div>
      </section>
      <?php endif; ?>
    </div>
    
    <footer>
      <p>
        <small>
          Powered by <a href="http://www.symfony-project.org/">Symfony</a> 
          and <a href="http://github.com/n1k0/sftunes">sftunes</a>
          (get the <a href="http://github.com/n1k0/djortunes">Django version</a>), 
          baked by <a href="http://prendreuncafe.com/">NiKo</a> and 
          originaly inspired by <a href="http://fortunes.inertie.org/">fortunes</a>, 
          by <em>Maurice Svay</em>.
        </small>
      </p>
    </footer>
  </body>
</html>