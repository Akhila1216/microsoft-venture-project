<?php

session_start();
if(!$_SESSION['LoggedIn']){
    header("location: index.php");
}

include_once ("includes/functions.php");
include_once ("includes/views.php");
include_once ("includes/header.php");

$cats = GetCategories();

echo "<div id='menu'>";
echo "<a href='category.php'>New Category</a>";
echo " | ";
echo "<a href='contact.php'>New Contact</a>";
echo " | " ;
echo "<a href='logout.php'>Logout</a>" ;
echo "</div>";
while($cat = mysqli_fetch_assoc($cats)){
    echo "<h3><a href='category.php?id=".$cat['id']."'>".ucwords($cat['catname'])."</a></h3>";

    $contacts = GetContacts($cat['id']);

    DisplayContacts($contacts);
}

?>