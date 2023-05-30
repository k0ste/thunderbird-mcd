<?php

function getSignatureAll($siga_start_html, $siga_prefix, $ldap_givenname_exploded, $ldap_sn, $ldap_title, $siga_url, $main_telnumber, $ldap_extention, $ldap_pager, $siga_postfix) {
  return $siga_start_html . $siga_prefix . $ldap_givenname_exploded . " " . $ldap_sn . ",<br>" . $ldap_title . $siga_url . $main_telnumber . " " . $ldap_extention . $ldap_pager . $siga_postfix;
}

function getSignatureManager($siga_start_html, $siga_marketing_start, $ldap_facs_to_webaskio, $siga_marketing_end, $siga_prefix, $ldap_givenname_exploded, $ldap_sn, $ldap_title, $ldap_support_mail, $siga_url, $main_telnumber, $ldap_extention, $ldap_pager, $ldap_im, $siga_postfix) {
  return $siga_start_html . $siga_marketing_start . $ldap_facs_to_webaskio . $siga_marketing_end . $siga_prefix . $ldap_givenname_exploded . " " . $ldap_sn . ",<br>" . $ldap_title . $ldap_support_mail . $siga_url . $main_telnumber . " " . $ldap_extention . $ldap_pager . $ldap_im . $siga_postfix;
}
?>
