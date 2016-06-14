<?php
//LDAP
// Connection
$ldap_host = 'ldap.company.local';
$ldap_port = '389';
$ldap_user = 'cn=reader,ou=people,dc=company,dc=local';
$ldap_password = 'reader';
// The root of catalog
$ldap_root = 'dc=company,dc=local';
// Base for search uid
$ldap_base = "ou=people,$ldap_root";
// Base for search memberUid
$ldap_base_manager = "cn=TopManagers,ou=groups,$ldap_root";
// VARS
$ldap_uid = $_GET['user'];
$ldap_filter = "(uid=$ldap_uid)";
$ldap_filter_manager = "(memberUid=$ldap_uid)";
$ldap_target_gid = '1100';
// Organisation
$telnumber_all = '8-800-2000-600';
$telnumber_manager = '8-800-2000-666';
$icq_default = 'ICQ (Public): 911911, 119199';
// Thunderbird
$mail_domain = 'mx.company.local';
$mail_server_type = 'imap';
$mail_server_port = '143';
$mail_smtp_desc = 'SMTP server of our company';
$mail_smtp_port = '25';
$mail_identity_org = 'Damage, Inc.';
$ldap_nonascii_desc = 'Domain';
$ldap_nonascii_uri = "ldap://$ldap_host/$ldap_base??sub?(objectClass=posixAccount)";
$quicktext_default_import = '/home/exchange/quicktext.xml';
$messenger_save_dir = '/tmp';
// Signature
$siga_marketing = "Marketing bullshit<br>";
$siga_prefix = "Best regards, ";
$siga_url = "<br>URL";
$siga_postfix = "Some spam";
?>
