<?php
/**
 * Username generator for GCPEDIA Userlogin.php
 *
 * The users email is used to generate the username, so it is assumed that all emails are in standard GC format:
 * givenname.familyname@institution.gc.ca
 * duplicate usernames are incremented by (int)1 until they are available
 *
 * @param  $emailInput <string> users email address
 *
 * @return always returns "" because we use the response text directly
 *
 * @author Matthew April <Matthew.April@tbs-sct.gc.ca>
 */

$wgAjaxExportList[] = 'AJAXtest';

function AJAXtest( $emailInput ) {
	
	$email = trim($emailInput);
	
	if ( strlen( $email ) > 0 ) {
		
		$domainPos = strpos($email, '@') + 1;
		$domain = substr($email, $domainPos);
		
		# make sure selected domain is not the example domain (this is already checked for in the JS, but do it anyway)
		if($domain == "example") {
			# NOTE: the '>' character is used to make the username invalid.
			echo "> Invalid domain";
			return "";
		}
		
		$dbr = wfGetDB( DB_SLAVE );
		$emailQuery = mysql_real_escape_string($email);
		
		#count number of emails
		$query2 = "SELECT count(*) FROM " .$dbr->tableName('user') ." WHERE user_email = \"". $emailQuery ."\"";
		$result2 = $dbr->query($query2);
		$emailrow = $dbr->fetchRow($result2);
		
		#check if email in use
		if ( $emailrow[0] > 0 ) {
			# NOTE: the '>' character is used to make the username invalid.
			echo "> " . wfMsg('email-in-use'); //translate this
			return "";
		}

		$usrname = ucfirst( strtolower( strtok( $email, '@' ) ) );
		
		##Capitalize first and last name##
		if(substr_count($usrname, ".") == 1) { #make sure they have one, and only one period in their username (should typically be the case, but check anyway)
			
			$lastnamePos = strpos($usrname, ".") + 1;
			$lastnameLetter = substr($usrname, $lastnamePos, 1); #first letter of last name
			$lastnameLetter = strtoupper($lastnameLetter); #force uppercase
			
			$usrname = substr_replace($usrname, $lastnameLetter, $lastnamePos, 1); #replace original with uppercase
		}

		if(rtrim($usrname, "0..9") != "") {
			$usrname = rtrim($usrname, "0..9");
		}


		$tmpusr = strtolower(mysql_real_escape_string($usrname));
               
              #select matching usernames
              $usrnameQuery = mysql_real_escape_string($usrname);
              $query = "SELECT user_id FROM " .$dbr->tableName('user') ." WHERE lower(user_name) LIKE \"". $tmpusr ."\" ";
		$result1 = $dbr->query($query);

		#check if username exists and increment it
		if ( $dbr->numRows($result1) > 0 ){
			
			$unamePostfix = 0;
			
			do {
				$unamePostfix++;
				
				$tmpUsrnameQuery = $usrnameQuery . $unamePostfix;
				
				$query = "SELECT user_id FROM " .$dbr->tableName('user') ." WHERE user_name LIKE \"". $tmpUsrnameQuery ."\"";
				$tmpResult = $dbr->query($query);
				
				$uname = $tmpUsrnameQuery;
				
			} while ( ($dbr->fetchRow($tmpResult)) > 0);
			
		}else{
			#username is available
			$uname = $usrname;
		}
			
		#username output
		echo $uname;
								
	}
	
	return "";
	
}

/**
 * Email character filter
 *
 * Filters out the french characters in an email and replaces them with the english equivelant
 * Array key is the character to remove and the associated item is what will replace it.
 *
 * @param  $emailInput <string> users email address
 *
 * @return always returns "" because we use the response text directly
 *
 * @author Matthew April <Matthew.April@tbs-sct.gc.ca>
 */

$wgAjaxExportList[] = 'characterFilter';
function characterFilter( $email ) {

	$filter = array(
	
		'â' => 'a',
		'à' => 'a',
		'á' => 'a',
		'ç' => 'c',
		'ê' => 'e',
		'é' => 'e',
		'è' => 'e',
		'ô' => 'o',
		'Â' => 'A',
		'À' => 'A',
		'Á' => 'A',
		'Ç' => 'C',
		'Ê' => 'E',
		'É' => 'E',
		'È' => 'E',
		'Ô' => 'O',
	);
	
	foreach( $filter as $remove => $replace ) {
		if( strpos( $email, $remove) ) {
			$email = str_replace($remove, $replace, $email);
		}
	}
	echo $email;
	return "";
}

?>