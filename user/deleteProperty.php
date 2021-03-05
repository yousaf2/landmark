<?php
require_once('../common/conn.php');

if(isset($_POST['propert_id'])){
    $id = $_POST['propert_id'];

    $deletePropertyImages = "DELETE FROM property_images WHERE property_id = '".$id."'";
    $result = mysqli_query($con, $deletePropertyImages);
    if($result)
    {
        $deleteProperty = "DELETE FROM properties WHERE id = '".$id."'";
        $response = mysqli_query($con, $deleteProperty);
        if($response){
            echo("deleted");
        }else {
            echo("property not deleted");
        }
    }else {
        echo("Images not deleted");
    }

}













?>