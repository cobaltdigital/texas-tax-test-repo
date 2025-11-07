<?php 
$your_email ='dipakgovani13@gmail.com';// <<=== update to your email address

session_start();
$errors = '';
$name = '';
$visitor_email = '';
$user_message = '';

if(isset($_POST['submit']))
{
	
	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	$user_message = $_POST['message'];
	///------------Do Validations-------------
	if(empty($name)||empty($visitor_email))
	{
		$errors .= "\n Name, Email and are required fields. ";	
	}
	if(IsInjected($visitor_email))
	{
		$errors .= "\n Bad email value!";
	}
	if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors .= "\n The captcha code does not match!";
	}
	
	if(empty($errors))
	{
		//send the email
		$to = $your_email;
		$subject="Make Reservation";
		$from = "Central-City-Chiropractors";
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		
		$body = "A visitor $name submitted the contact form:\n\n".
		"Name: $name\n".
		"Email: $visitor_email \n".
		"Message: \n ".
		"$user_message\n".
		"IP: $ip\n";	
		
		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $visitor_email \r\n";
		
		mail($to, $subject, $body,$headers);
		
		header('Location: thank-you.html');
	}
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>
<!doctype html>
<!--[if IE 7]>    <html class="ie7" > <![endif]-->
<!--[if IE 8]>    <html class="ie8" > <![endif]-->
<!--[if IE 9]>    <html class="ie9" > <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-US"> <!--<![endif]-->
		<head>				
		

           <link href="http://chisticolors.com/ga/wp-content/themes/gonzalez-arrambide/dream/code.css" rel="stylesheet" type="text/css">
		</head>
        
        <body>				
        
				<div class="full-form">
                        
	
                           <div style="color:#F00"><?php
if(!empty($errors)){
echo "<p class='err'>".nl2br($errors)."</p>";
}
?></div><div id='contact_form_errorloc' class='err'></div>
                                           <form method="POST" name="contact_form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"> 
                                           
                   
                   
                                           
              <p> <input type="text" name="name" value='<?php echo htmlentities($name) ?>' class="" placeholder="Name">   </p>
                <p><input type="text" name="email" value='<?php echo htmlentities($visitor_email) ?>' class="" placeholder="Email"> </p>
                   <p> <textarea name="message" class="detail" placeholder="Message"><?php echo htmlentities($user_message) ?></textarea>  </p>
                        
                                 
                                                <div class="form-cell">
                                                    <img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br /><input id="6_letters_code" name="6_letters_code" type="text" class="blk"></p>
     <p><small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
                                                     
                                                </div>
                                             <div class="clear"></div>
                                             <div class="form-cell">
                                                <input type="submit" name="submit" value="Submit" class="submit readmore"/>
                                                    
                                                    <input type="hidden" name="action" value="send_message" />
													<input type="hidden" name="target" value="fahid@960development.com" />
													
                                                    <p id="message-sent">&nbsp;</p>
                                           </div>
                                                <div class="error-container">
                                                </div>
                                            </form>
                                            <script language="JavaScript">
// Code for validating the form
// Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
// for details
var frmvalidator  = new Validator("contact_form");
//remove the following two lines if you like error message box popups
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("name","req","Please provide your name"); 
frmvalidator.addValidation("message","req","Please provide your Details"); 
frmvalidator.addValidation("email","req","Please provide your email"); 
frmvalidator.addValidation("email","email","Please enter a valid email address"); 
</script>
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script> </div>
                     

		</body>
</html>	