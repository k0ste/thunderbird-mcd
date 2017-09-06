<?php

function makeCaldavSettings($caldav_entries, $caldav_base_url, $ldap_entryuuid) {
  foreach ($caldav_entries as $cal) {
    $cal_uuid = $cal[uuid];
    $cal_color = $cal[color];
    $cal_name = $cal[name];
    $cal_id = $cal[id];
    $ret .= 'pref("calendar.registry.'.$cal_uuid.'.cache.enabled", true);
  pref("calendar.registry.'.$cal_uuid.'.color", "'.$cal_color.'");
  pref("calendar.registry.'.$cal_uuid.'.imip.identity.key", "id1");
  pref("calendar.registry.'.$cal_uuid.'.name", "'.$cal_name.'");
  pref("calendar.registry.'.$cal_uuid.'.readOnly", false);
  pref("calendar.registry.'.$cal_uuid.'.type", "caldav");
  pref("calendar.registry.'.$cal_uuid.'.uri", "'.$caldav_base_url.'/'.$ldap_entryuuid.'/'.$cal_id.'/");
  ';
  if ($cal === end($caldav_entries)) {
    $ret = rtrim($ret);
  }
}
  return $ret;
}
?>
