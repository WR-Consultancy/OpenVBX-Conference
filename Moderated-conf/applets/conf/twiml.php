<?php
$ci = &get_instance();
$confId = AppletInstance::getValue('conf-id');
$confName = $confId;
$isModerator = false;
$defaultWaitUrl = 'http://twimlets.com/holdmusic?Bucket=com.twilio.music.ambient';
$waitUrl = AppletInstance::getValue('wait-url', $defaultWaitUrl);
$hasModerator = true;
$mod = AppletInstance::getValue('mod-text');
$gret = AppletInstance::getValue('greet-text');

if ($mod == "true"){
$isModerator = true;
}
else {$isModerator = false;}

$confOptions = array(
        'muted' => (!$hasModerator || $isModerator)? 'false' : 'true',
        'startConferenceOnEnter' => (!$hasModerator || $isModerator)? 'true' : 'false',
        'endConferenceOnExit' => ($hasModerator && $isModerator)? 'true' : 'false',
        'waitUrl' => $waitUrl,
);


$response = new TwimlResponse();
$response->Say("You are now entering $confId, $gret");

$dial = $response->dial(null, array(
        'timeout' => $ci->vbx_settings->get('dial_timeout', $ci->tenant->id),
        'timeLimit' => 14400
));
$dial->conference($confName, $confOptions);

$response->respond();
