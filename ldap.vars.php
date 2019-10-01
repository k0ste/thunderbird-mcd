<?php
$ldap_gid = ($info[0]["gidnumber"][0]);
$ldap_givenname = ($info[0]["givenname"][0]);
$ldap_sn = ($info[0]["sn"][0]);
$ldap_title = ($info[0]["title"][0]);
$ldap_mail = ($info[0]["mail"][0]);
$ldap_givenname_exploded = explode(" ",$ldap_givenname);
$ldap_givenname_exploded = $ldap_givenname_exploded[0];
$ldap_mail_replaced = preg_replace('+@+','%40', $ldap_mail);
$ldap_entryuuid = ($info[0][$ldap_map_entryuuid][0]);
?>
