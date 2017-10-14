<?php
	$words = fopen("words_alpha.txt", "r");
	if ($words) {
		while (($line = fgets($words)) !== false) {
			$filtered = str_replace("\n", "", $line);
			$res = file_get_contents("http://www.roblox.com/UserCheck/DoesUsernameExist?username=" . $filtered);

			if ($res == '{"success":false}') {
				file_put_contents("available.txt", $filtered, FILE_APPEND);
			}
		}

		fclose($words);
		echo "finished";
	} else {
		error("error opening wordlist");
	}
?>