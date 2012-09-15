<?php
// auto-generated by sfViewConfigHandler
// date: 2012/03/19 22:56:35
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'Fotiar', false, false);

  $response->addStylesheet('main.css', '', array ());
  $response->addStylesheet('ui-lightness/jquery-ui-1.8.16.custom.css', '', array ());
  $response->addStylesheet('datePicker.css', '', array ());
  $response->addStylesheet('jquery.multiselect.css', '', array ());
  $response->addStylesheet('jquery.multiselect.filter.css', '', array ());
  $response->addStylesheet('colorbox.css', '', array ());
  $response->addJavascript('jsddm.js', '', array ());
  $response->addJavascript('datepicker.js', '', array ());
  $response->addJavascript('jquery-ui-i18n-it.js', '', array ());
  $response->addJavascript('jquery-ui-1.8.16.custom.min.js', '', array ());
  $response->addJavascript('/sfDependentSelectPlugin/js/SelectDependiente.min.js', '', array ());
  $response->addJavascript('jquery.multiselect.min.js', '', array ());
  $response->addJavascript('jquery.multiselect.filter.js', '', array ());
  $response->addJavascript('jquery.colorbox.js', '', array ());
  $response->addJavascript('ampliar_x.js', '', array ());
  $response->addJavascript('icons_rolover.js', '', array ());


