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
        $updated = UpdateCategory($_POST);
        if($updated == true){
            header("location: lists.php");
        }else{
            DisplayErrorMessage("There was an error updating your category");
        }
    }else{
        $saved = SaveCategory($_POST);
        if($saved == true){
            header("location: lists.php");
        }else{
            DisplayErrorMessage("There was an error saving category");
        }
    }
}

include_once("includes/header.php");
$id = $_GET['id'];

$categoryResults = GetCategory($id);

$category = mysqli_fetch_assoc($categoryResults);

echo "<div class='formDiv'>";
DisplayCategoryForm($category);
echo "</div>";
?>