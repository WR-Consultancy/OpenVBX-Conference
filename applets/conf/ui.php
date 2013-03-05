<?php
$defaultWaitUrl = 'http://twimlets.com/holdmusic?Bucket=com.twilio.music.classical';
$waitUrl = AppletInstance::getValue('wait-url', $defaultWaitUrl);
$musicOptions = array(
                                          array("url" => "http://twimlets.com/holdmusic?Bucket=com.twilio.music.classical",
                                                        "name" => "Classical"),
                                          array("url" => "http://twimlets.com/holdmusic?Bucket=com.twilio.music.ambient",
                                                        "name" => "Ambient"),
                                          array("url" => "http://twimlets.com/holdmusic?Bucket=com.twilio.music.electronica",
                                                        "name" => "Electronica"),
                                          array("url" => "http://twimlets.com/holdmusic?Bucket=com.twilio.music.guitars",
                                                        "name" => "Guitars"),
                                          array("url" => "http://twimlets.com/holdmusic?Bucket=com.twilio.music.rock",
                                                        "name" => "Rock"),
                                          array("url" => "http://twimlets.com/holdmusic?Bucket=com.twilio.music.soft-rock",
                                                        "name" => "Soft Rock"),
                                          );

?>


<div class="vbx-applet conf-applet">
    <h2>Create conference room ID</h2>
    <textarea class="small" name="conf-id"><?php echo AppletInstance::getValue('conf-id') 
    ?></textarea>
 
    <h2>Create A Custom Message</h2>
    <p>Enter in a custom message that your callers will be greeted by.</p>
    <textarea class="medium" name="greet-text"><?php echo AppletInstance::getValue('greet-text') 
    ?></textarea>
 	
    <h2>Moderator?</h2>
    <p>true or false</p>
    <textarea class="medium" name="mod-text"><?php echo AppletInstance::getValue('mod-text') 
    ?></textarea>


 <h2>Hold Music</h2>
                <p>Music is played until two or more people have dialed in, or until a moderator has joined.</p>
                <div class="vbx-full-pane">
                <fieldset class="vbx-input-container">
                        <select name="wait-url" class="medium">
                                <?php foreach($musicOptions as $option): ?>
                                <option value="<?php echo $option['url']?>" <?php echo ($waitUrl == $option['url'])? 'selected="selected"' : '' ?>><?php echo $option['name']; ?></option>
                                <?php endforeach; ?>
                        </select>

                </fieldset>
                </div>
</div>
