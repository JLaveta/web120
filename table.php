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
        
<!-- START Table -->
<div class="mainContent">
    <table class="menu">
        <caption>Menu Items</caption>
        <thead>
            <tr>
                <th scope="col">Food Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Lasagna Bolognese</td>
                <td>Bolognese sauce, bechemel, spinach pesto, fontina.</td>
                <td>$18</td>
            </tr>
            <tr>
                <td>Nachos</td>
                <td>Tortilla chips, beans, cheese, salsa, sour cream, guacamole, black olives.</td>
                <td>$12</td>
            </tr>
            <tr>
                <td>Chirashi Bowl</td>
                <td>Sushi rice topped with chef's choice sushi.</td>
                <td>$25</td>
            </tr>
            <tr>
                <td>Chili</td>
                <td>Slow-cooked chuck, spices, tomatoes, topped with sour cream and green onions.</td>
                <td>$8</td>
            </tr>
            <tr>
                <td>Kale Caesar Salad</td>
                <td>Kale, caesar dressing, parmesean, croutons.</td>
                <td>$10</td>
            </tr>
        </tbody>
    </table>
</div>
 
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
    } else {
        x.className = "topnav";
    }
}
     </script>
</body>
</html>