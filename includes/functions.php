<?php

function ProcessLogin($post){
    $conn = getConnection();
    $query = "Select * from Persons where username='" .$post['username']. "' and password='" .$post['pass']."'";
    $results = mysqli_query($conn, $query);
    if($results && mysqli_num_rows($results) > 0){
        $row = mysqli_fetch_assoc($results);
        $_SESSION['LoggedIn'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        return true;
    }
}

function UpdateContact($post){

    $conn = GetConnection();

    $query = "update contacts set fname = '" .$post["fname"]."',lname='".$post['lname']."', email = '".$post['email']."',phone = '".$post['phone'].
        "', catid = '".$post["catid"]."' where id = '".$post["id"]."'";
    $results = mysqli_query($conn, $query);

    if(mysqli_affected_rows($conn)>0)
    {
        return true;
    }
    return false;
}

function SaveContact($post){

    $conn = GetConnection();
    $query = "insert into contacts(fname, lname, email, phone, catid) values (
     "."'".$post['fname']."', '".$post["lname"]."', '".$post["email"]."', '".$post['phone']."', '".$post['catid']."')";

    $results = mysqli_query($conn, $query);

    if($results && mysqli_affected_rows($conn)>0)
    {
        return true;
    }
    return false;

}

function UpdateCategory($post){

    $conn = GetConnection();

    $query = "update categories set catname = '" .$post["catname"]."'where id='".$post['id']."'";

    $results = mysqli_query($conn, $query);

    if(mysqli_affected_rows($conn)>0)
    {
        return true;
    }
    return false;

}

function SaveCategory($post){

    $conn = GetConnection();

    $query = "insert into categories (catname) values ('".$post["catname"]."')";
    $result = mysqli_query($conn, $query);

    if($result && mysqli_affected_rows($conn)>0)
    {
        return true;
    }
    return false;
}

function GetCategories(){

    $conn = GetConnection();

    $query = "select * from categories";
    $results = mysqli_query($conn, $query);

    return $results;

}

function GetContacts($catId){

    $conn = GetConnection();

    $query = "select * from contacts where catid = '$catId'";
    $results = mysqli_query($conn, $query);
    return $results;

}

function GetContact($id){

    $conn = GetConnection();

    $query = "select * from contacts where id = '$id'";
    $results = mysqli_query($conn, $query);
    return $results;

}

function GetCategory($id){

    $conn = GetConnection();

    $query = "select * from categories where id = '$id'";
    $results = mysqli_query($conn, $query);
    return $results;
}

function GetConnection(){
    $conn = mysqli_connect("127.0.0.1","root","");
    mysqli_select_db($conn, 'contactManagement');
    return $conn;
}

function DisplayErrorMessage($msg){
    echo "<div class='err'>$msg</div>";
}

?>