<?php

  echo __('Hola').' '.$nombre_destinatario.'!<br /><br />';

  echo __('Puedes ver la postal haciendo click en este link:').' <a href="http://'.$host.'/'.$sf_user->getCulture().'/fotografias/mostrar-postal/'.$foto_id.'">'.__('Ver Postal').'</a><br /><br />';

  echo __('Busca tus fotos en').' <a href="http://'.$host.'/'.$sf_user->getCulture().'/">www.fotiar.com.ar</a><br /><br />';