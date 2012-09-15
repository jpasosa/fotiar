<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('sfJqueryReloadedPlugin');
    $this->enablePlugins('sfThumbnailPlugin');
    $this->enablePlugins('sfWebBrowserPlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('sfForkedDoctrineApplyPlugin');
    $this->enablePlugins('sfDependentSelectPlugin');
    $this->enablePlugins('sfImageTransformPlugin');

    $this->setWebDir($this->getRootDir().'/web');
  }
  
  public function configureDoctrine(Doctrine_Manager $manager)
  {
    $manager->setAttribute(Doctrine::ATTR_QUOTE_IDENTIFIER, true);
  }
}
