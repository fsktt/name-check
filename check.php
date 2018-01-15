<?php
	$api_url = "";
	$words = fopen("words_alpha.txt", "r");
	if ($words) {
		while (($line = fgets($words)) !== false) {
			$filtered = str_replace("\n", "", $line);
			if (strlen($filtered) >= 3) {
				$res = file_get_contents($api_url . $filtered);

				if ($res == '{"success":false}') {
					file_put_contents("available.txt", $filtered . "\n", FILE_APPEND);
				}
			}
		}

		fclose($words);
		echo "finished!"; // if your webhost has a timeout page this won't show, just keep an eye on available.txt
	} else {
		error("error opening wordlist");
	}
?>
