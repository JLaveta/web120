***REMOVED***
***REMOVED***
***REMOVED*** simple.php is a postback application designed to provide a 
***REMOVED*** contact form for users to email our clients.  
***REMOVED*** 
***REMOVED*** simple.php provides a typical feedback form for a website
***REMOVED***
***REMOVED*** @package nmCAPTCHA2
***REMOVED*** @author Bill & Sara Newman <williamnewman@gmail.com>
***REMOVED*** @version 2 2019/10/13
***REMOVED*** @link http://www.newmanix.com/
***REMOVED*** @license http://www.apache.org/licenses/LICENSE-2.0
***REMOVED*** @see contact_include.php  
***REMOVED*** @todo none
***REMOVED*****REMOVED***

#--------------END CONFIG AREA ------------------------#
***REMOVED***
	<!-- START HTML FORM -->
	<form action="***REMOVED*** echo basename($_SERVER['PHP_SELF']); ***REMOVED***" method="post">
	<div>
		<label>
			Name:<br /><input type="text" name="Name" required="required" placeholder="Full Name (required)" title="Name is required" tabindex="10" size="44" autofocus />
		</label>
	</div>
	<div>	
		<label>
			Email:<br /><input type="email" name="Email" required="required" placeholder="Email (required)" title="A valid email is required" tabindex="20" size="44" />
		</label>
	</div>
	<!-- below change the HTML to your form elements - only 'Name' & 'Email' (above) are significant -->
	<div>	
		<label>
			Comments:<br /><textarea name="Comments" cols="36" rows="4" placeholder="Your comments are important to us!" tabindex="30"></textarea>
		</label>
	</div>	
    <div class="g-recaptcha" data-sitekey="<?=$siteKey;***REMOVED***"></div> 
	<div>
		<input type="submit" value="submit" />
	</div>
    </form>
	<!-- END HTML FORM -->
