<?php
session_start();

if(!$_SESSION['LoggedIn'])
{
    header("location:index.php");
}

include_once("includes/functions.php");
include_once("includes/forms.php");

if($_POST['submitted']){
    if($_POST['id']>0){
        $updated = UpdateContact($_POST);
        if($updated == true){
            header("location: lists.php");
        }else{
            DisplayErrorMessage("There was an error updating your contacts");
        }
    }else{
        $saved = SaveContact($_POST);
        if($saved == true){
            header("location: lists.php");
        }else{
            DisplayErrorMessage("There was an error saving contact");
        }
    }
}

include_once("includes/header.php");
$id = $_GET['id'];

$contactResults = GetContact($id);

$contact = mysqli_fetch_assoc($contactResults);

echo "<div class='formDiv'>";
DisplayContactForm($contact);
echo "</div>";
?>