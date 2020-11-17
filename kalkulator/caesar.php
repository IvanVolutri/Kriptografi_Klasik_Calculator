<?php

// function to encrypt the text given
function encrypt($pswd, $text)
{
	// change key to lowercase for simplicity
	$pswd = strtolower($pswd);
	
	// intialize variables
	$code = "";
	$length = strlen($text);
	$pswd = $pswd % 26;
    if($pswd < 0) {
        $pswd += 26;
    }
	// iterate over each line in text
	for ($i = 0; $i < $length; $i++)
	{
		// if the letter is alpha, encrypt it
		if (ctype_alpha($text[$i]))
		{
			// uppercase
			if (ctype_upper($text[$i]))
			{
				$text[$i] = chr((ord($text[$i]) + $pswd) + ord("A"));
			}
			// lowercase
			else
			{
				$text[$i] = chr((ord($text[$i]) + $pswd) + ord("a"));
			}
		}
	}
	
	// return the encrypted code
	return $text;
}

// function to decrypt the text given
function decrypt($pswd, $text)
{
	// change key to lowercase for simplicity
	$pswd = strtolower($pswd);
	
	// intialize variables
	$code = "";
	$ki = 0;
	$kl = strlen($pswd);
	$length = strlen($text);
	
	// iterate over each line in text
	for ($i = 0; $i < $length; $i++)
	{
		// if the letter is alpha, decrypt it
		if (ctype_alpha($text[$i]))
		{
			// uppercase
			if (ctype_upper($text[$i]))
			{
				$x = chr((ord($text[$i]) - $pswd) + ord("A"));
				if ($x < 0)
				{
					$x += 26;
				}
				
				$x = $x + ord("A");
				
				$text[$i] = chr($x);
			}
			
			// lowercase
			else
			{
				$x = chr((ord($text[$i]) - $pswd) + ord("a"));
				if ($x < 0)
				{
					$x += 26;
				}
				
				$x = $x + ord("A");
				
				$text[$i] = chr($x);
			}
		}
	
	// return the decrypted text
	return $text;
	}
}
?>