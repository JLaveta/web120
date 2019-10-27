    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=en"></script>
***REMOVED***
***REMOVED****
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** requires reCAPTCHA so user doesn't lose form data 
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** https://stackoverflow.com/questions/27706594/how-can-i-make-recaptcha-a-required-field
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** 
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** In this version, jQuery is required and code will find first form on page and require 
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** the reCAPTCHA for that form using document.forms[0]
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    
        function checkRecaptcha()***REMOVED*****REMOVED***
            res = $('#g-recaptcha-response').val();
            if (res == "" || res == undefined || res.length == 0)
                return false;
            else
                return true;
***REMOVED***
        $(function()***REMOVED*****REMOVED***
            let thisForm = document.forms[0];
            $(thisForm).submit(function(e)***REMOVED*****REMOVED***            
    ***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***!checkRecaptcha())***REMOVED*****REMOVED***
                    alert("Please confirm you are not a robot.");
                    return false;
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***);
***REMOVED***); 
***REMOVED***