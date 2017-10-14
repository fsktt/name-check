<?php
	$words = fopen("words_alpha.txt", "r");
	if ($words) {
		while (($line = fgets($words)) !== false) {
			$res = file_get_contents("http://www.roblox.com/UserCheck/DoesUsernameExist?username=" . $line);
			if ($res == '{"success":false}') {
				file_put_contents("available.txt", $line . "\n", FILE_APPEND);
			}
		}

		fclose($words);
	} else {
		error("error opening wordlist");
	}
?>