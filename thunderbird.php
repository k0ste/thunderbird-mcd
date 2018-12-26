<?php

// (c) 2015-2018, Konstantin Shalygin <k0ste@k0ste.ru>

require_once 'ldap.cfg.php';
require_once 'ldap.defaults.php';
require_once 'ldap.siga.php';
require_once 'caldav.php';

if(empty($_GET['user'])) {
  exit('Error: user not present');
}

$link = ldap_connect($ldap_host, $ldap_port);
ldap_set_option($link, LDAP_OPT_PROTOCOL_VERSION, 3);
$ldap_bind = ldap_bind($link, $ldap_user, $ldap_password);

if(!$ldap_bind) {
  $ldap_errno = ldap_errno($link);
  $ldap_error = ldap_err2str($ldap_errno);
  exit('Error (' . ldap_errno($link) . '): ' . $ldap_error . "\n");
}

$result_uid = ldap_search($link, $ldap_base, $ldap_filter, $ldap_attributes);
$entry_uid = ldap_first_entry($link, $result_uid);

if($entry_uid == false) {
  ldap_unbind($link);
  exit('Error: uid not found <br>');
}

$info = ldap_get_entries($link, $result_uid);

if (isset($info[0]["telephonenumber"])) {
  $ldap_extention = $info[0]["telephonenumber"][0];
  $ldap_extention = "$exten_prefix$ldap_extention";
} else {
  $ldap_extention = '';
}

if($im_enabled == true) {
  if (isset($info[0]["telexnumber"])) {
    $ldap_im = $info[0]["telexnumber"][0];
    $ldap_im = "<br>$im_prefix$ldap_im";
  } else {
    $ldap_im = $im_default;
  }
}

if (isset($info[0]["pager"])) {
  $ldap_pager = $info[0]["pager"][0];
  $ldap_pager = "<br>+$ldap_pager";
}
elseif (isset($info[0]["homephone"])) {
  $ldap_pager = $info[0]["homephone"][0];
  $ldap_pager = "<br>+$ldap_pager";
} else {
  $ldap_pager = '';
}

require_once 'ldap.vars.php';

$result_manager = ldap_search($link, $ldap_base_manager, $ldap_filter_manager);
$entry_manager = ldap_first_entry($link, $result_manager);

if($entry_manager == false) {
  if($ldap_gid == $ldap_target_gid) {
    $signature = getSignatureManager($siga_marketing, $siga_prefix, $ldap_givenname_exploded, $ldap_sn, $ldap_title, $siga_url, $telnumber_all, $ldap_extention, $ldap_pager, $ldap_im, $siga_postfix);
} else {
    $signature = getSignatureAll($siga_prefix, $ldap_givenname_exploded, $ldap_sn, $ldap_title, $siga_url, $telnumber_all, $ldap_extention, $ldap_pager, $siga_postfix);
  }
} else {
  $ldap_attributes = ldap_get_attributes($link, $entry_manager);
  $counter = $ldap_attributes["count"];
  if($counter < 1) {
    $signature = getSignatureAll($siga_prefix, $ldap_givenname_exploded, $ldap_sn, $ldap_title, $siga_url, $telnumber_all, $ldap_extention, $ldap_pager, $siga_postfix);
  } else {
    $signature = getSignatureManager($siga_marketing, $siga_prefix, $ldap_givenname_exploded, $ldap_sn, $ldap_title, $siga_url, $telnumber_manager, $ldap_extention, $ldap_pager, $ldap_im, $siga_postfix);
  }
}

if ($caldav_enable == true) {
  $caldav_settings = makeCaldavSettings($caldav_entries, $caldav_base_url, $ldap_entryuuid);
}

ldap_unbind($link);
require_once 'ldap.settings.php';

?>
