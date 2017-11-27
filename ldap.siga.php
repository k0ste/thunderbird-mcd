<?php

function getSignatureAll($siga_prefix, $ldap_givenname_exploded, $ldap_sn, $ldap_title, $siga_url, $main_telnumber, $ldap_extention, $ldap_pager, $siga_postfix) {
  return $siga_prefix . $ldap_givenname_exploded . " " . $ldap_sn . ",<br>" . $ldap_title . $siga_url . $main_telnumber . " " . $ldap_extention . $ldap_pager . $siga_postfix;
}

function getSignatureManager($siga_marketing, $siga_prefix, $ldap_givenname_exploded, $ldap_sn, $ldap_title, $siga_url, $main_telnumber, $ldap_extention, $ldap_pager, $ldap_im, $siga_postfix) {
  return $siga_marketing . $siga_prefix . $ldap_givenname_exploded . " " . $ldap_sn . ",<br>" . $ldap_title . $siga_url . $main_telnumber . " " . $ldap_extention . $ldap_pager . $ldap_im . $siga_postfix;
}
?>
