<?php
// auto-generated by sfDefineEnvironmentConfigHandler
// date: 2012/03/19 22:56:33
sfConfig::add(array(
  'app_sfImageTransformPlugin_default_adapter' => 'GD',
  'app_sfImageTransformPlugin_default_image' => array (
  'mime_type' => 'image/png',
  'filename' => 'Untitled.png',
  'width' => 100,
  'height' => 100,
  'color' => '#FFFFFF',
),
  'app_sfImageTransformPlugin_font_dir' => '/home/hormigon/usvn/files/checkout/fotiar/frontsf/plugins/sfImageTransformExtraPlugin/data/example-resources/fonts',
  'app_sfImageTransformPlugin_mime_type' => array (
  'auto_detect' => true,
  'library' => 'gd_mime_type',
),
  'app_recaptcha_enabled' => false,
  'app_sfForkedApply_applyForm' => 'sfApplyApplyForm',
  'app_sfForkedApply_resetForm' => 'sfApplyResetForm',
  'app_sfForkedApply_resetRequestForm' => 'sfApplyResetRequestForm',
  'app_sfForkedApply_settingsForm' => 'sfApplySettingsForm',
  'app_sfForkedApply_editEmailForm' => 'sfApplyEditEmailForm',
  'app_sfForkedApply_mail_editable' => false,
  'app_sfForkedApply_confirmation' => array (
  'reset' => true,
  'apply' => true,
  'email' => true,
  'reset_logged' => false,
),
  'app_sfForkedApply_routes' => array (
  'apply' => '/user/new',
  'reset' => '/user/password-reset',
  'resetRequest' => '/user/reset-request',
  'resetCancel' => '/user/reset-cancel',
  'validate' => '/user/confirm/:validate',
  'settings' => '/user/settings',
),
  'app_sfForkedApply_from' => array (
  'email' => 'claudiobidau@gmail.com',
  'fullname' => 'la gente de FOTIAR',
),
  'app_sf_guard_plugin_allow_login_with_email' => true,
  'app_sf_guard_plugin_success_signout_url' => '@homepage',
  'app_url_backend' => 'http://fotiaradm/',
  'app_mercadopago_client_id' => 3269,
  'app_mercadopago_client_secret' => '6U6duA3QCnkcbfMF5ijQbw9HFbzXj5IA',
));