<?php

/**
 * fotografias actions.
 *
 * @package    Fotiar
 * @subpackage fotografias
 * @author     Danilo R. Frid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class fotografiasActions extends sfActions
{
  public function executeIndex(sfWebRequest $request) {
  }
  
  
  public function executeLightbox(sfWebRequest $request) {
    $this->foto = Doctrine::getTable('fotografia')->findOneById($request->getParameter('id'));
    $this->postal_form = new PostalForm();
    if($request->hasParameter('extra')):
      $this->extra = $request->getParameter('extra');
    endif;
    $this->comprada = false;
    if($this->foto->isComprada($this->getUser()->getGuardUser()->id)):
      $this->comprada = true;
    endif;
    $this->location = $request->getParameter('location', 'mid');
    $this->url_prev_page = $request->getParameter('url_prev_page', 'none');
    $this->url_next_page = $request->getParameter('url_next_page', 'none');
  }
  
  
  public function executeEnviarPostal(sfWebRequest $request) {
    $this->foto = Doctrine::getTable('fotografia')->findOneById($request->getParameter('id'));
    $this->postal_form = new PostalForm();
    if ($request->isMethod('post')):
      $this->postal_form->bind($request->getParameter('postal'));
      
      if ($this->postal_form->isValid()):
        $nombre_remitente = $this->getUser()->getGuardUser()->getProfile()->getFirstName();
        $apellido_remitente = $this->getUser()->getGuardUser()->getProfile()->getLastname();
        
        $from = array('contacto@fotiar.com.ar' => $this->getContext()->getI18N()->__('fotiar.com.ar'));

        $message = $this->getMailer()->compose();
        $message->setSubject($nombre_remitente.' '.$this->getContext()->getI18N()->__(' te ha enviado una postal desde www.fotiar.com.ar'));
        $message->setFrom($from);
        $message->setTo($this->postal_form->getValue('email'));
        
        $params = array(
          'nombre_destinatario' => $this->postal_form->getValue('nombre'),
          'nombre_remitente'    => $nombre_remitente,
          'mensaje'             => $this->postal_form->getValue('mensaje'),
          'host'                => $request->getHost(),
          'foto_id'             => $this->foto->id 
        );

        $html = $this->getPartial('fotografias/enviarPostal', $params);
        $message->setBody($html, 'text/html');
        
//        $message = Swift_Message::newInstance()
//          ->setContentType('text/html')
//          ->setFrom($from)
//          ->setTo($this->postal_form->getValue('email'))
//          ->setSubject($nombre_remitente.' '.$this->getContext()->getI18N()->__(' te ha enviado una postal desde el sitio www.fotiar.com.ar'))
//          ->setBody($cuerpo);
////          ->attach(Swift_Attachment::fromPath(sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR.$request->getParameter('file')));
         
        $ok = $this->getMailer()->send($message);

        if($ok):
          $this->setTemplate('enviarPostalComplete');
        else:
          $this->setTemplate('enviarPostalFails');
        endif;
      else:
        $this->setTemplate('enviarPostalInvalid');
      endif;
    endif;
  }

  
  public function executeShowPostal(sfWebRequest $request) {
    $this->foto = Doctrine::getTable('fotografia')->findOneById($request->getParameter('id'));

    if($this->getUser()->isAuthenticated()):
      $this->comprada = false;
      if($this->foto->isComprada($this->getUser()->getGuardUser()->id)):
        $this->comprada = true;
      endif;
    endif;
  }
}