<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/images/layout/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>

  <body>
    <div id="container">
      <? include_partial('global/header'); ?>
      
      <div id="display-<?=$sf_context->getModuleName()?>" class="display">
        <?=$sf_content?>
      </div>
    
      <? include_partial('global/footer'); ?>    
    </div>
  </body>
  
</html>
