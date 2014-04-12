<?php
session_save_path('/tmp');
  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
require_once('lib/facebook/facebook.php');

$config = array(
		'appId' => '609137432500839',
		'secret' => '51bddf8538cbce95bcc25946d58de11d',
		'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
		);

$facebook = new Facebook($config);
$user_id = $facebook->getUser();
?>
<html>
  <head></head>
  <body>

<?php
if($user_id) {
	
	// We have a user ID, so probably a logged in user.
	// If not, we'll get an exception, which we handle below.
	try {
		
		$user_profile = $facebook->api('/me','GET');
		print_r($user_profile);
		echo "Name: " . $user_profile['name'];
		
	} catch(FacebookApiException $e) {
		// If the user is logged out, you can have a 
		// user ID even though the access token is invalid.
		// In this case, we'll get an exception, so we'll
		// just ask the user to login again here.
		$login_url = $facebook->getLoginUrl(); 
		echo 'Please <a href="' . $login_url . '">login.</a>';
		error_log($e->getType());
		error_log($e->getMessage());
	}   
} else {
	
	// No user, print a link for the user to login
	$login_url = $facebook->getLoginUrl();
	echo 'Please <a href="' . $login_url . '">login.</a>';
	
}

  ?>

  </body>
</html>