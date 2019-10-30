<!DOCTYPE html>
<html lang="en">
  <head>
    <title>John Laveta</title>
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="noindex,nofollow" />
    <meta charset="utf-8">
    <script src="https://use.fontawesome.com/6a71565c22.js"></script>
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/portal.css" />
    <link rel="stylesheet" href="css/form.css" />
  </head>

  <body>
    <!-- START WRAPPER -->
    <main class="wrapper">
      <?php include './includes/header.php';?>
      <?php
        /*
         * Below are 2 different forms to be re-used       
         * 
         * Only use one at a time, comment out the other!       
         *
         */
        include 'includes/contact_include.php'; #site keys & code here

        //echo loadContact('simple.php');#demonstrates a simple contact form
        echo loadContact('multiple.php');#demonstrates multiple form elements
	    ?>
 
      <!-- START Footer -->
      <?php include './includes/footer.php';?>  
      <!-- END Footer --> 
    </main>
    <!-- END WRAPPER -->

    <!-- JavaScript associated with the W3Schools.com Top Navigation Response Exercise --> 
    <script>
    /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
      function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
          x.className += " responsive";
        }  else {
          x.className = "topnav";
        }
      }
    </script>
  </body>
</html>