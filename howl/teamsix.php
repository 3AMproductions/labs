<?php
//header('Content-Type: application/voicexml+xml; charset=UTF-8');
header('Content-Type: application/xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';

$caller = $_GET['callerid'];
$minutes = ((mktime(15,18) - time())/60) - 180;
?>
<vxml version = "2.1" >
	<form>
		<block>
			<prompt cond="session.callerid == '7405033954'">Hello Travis. The information you requested is available online now. Jason will follow up with you in <?=$minutes?> minutes when he is done with his presentation. Goodbye.</prompt>
			<prompt cond="session.callerid != '7405033954'">Jason is currently giving a presentation. He will be available in <?=$minutes?> minutes. Goodbye.</prompt>
		</block>
	</form>
</vxml>