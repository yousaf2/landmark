
<?php
require_once('common/conn.php');


$useremail = "ali@ali.com.pk";
$property_type = $_POST['property-type'];
$property_status = $_POST['property-status'];
$price = $_POST['price'];
$area_size = $_POST['size'];
$size_type = $_POST['size-type'];
$plot = $_POST['plot'];
$street = $_POST['street'];
$phase = $_POST['phase'];
$society = $_POST['society'];
$city = $_POST['city'];
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$posteremail = $_POST['email'];
$role = $_POST['role'];
$country = $_POST['country'];
$image = "ali-image";
$status = "0";
$last_id = '0';


$insert_property = "INSERT INTO properties SET `email`= '$useremail', `property_type`= '$property_type', 
`property_status`= '$property_status', `price`= '$price', `area_size`= '$area_size', `size_type`= '$size_type', 
`plot`= '$plot', `street`= '$street', `phase`= '$phase', `society`= '$society', `city`= '$city', 
`fullname`= '$fullname', `phone`= '$phone', `posteremail`= '$posteremail', `role`= '$role', `country`= '$country',
`status`= '$status'";

$add_property = mysqli_query($con, $insert_property);
if($add_property){
    $last_id = $con->insert_id;
    // Count total files
    $countfiles = count($_FILES['files']['name']);
    // Upload directory
    $upload_location = "img/";
    // To store uploaded files path
    $files_arr = array();

    // Loop all files
    for($index = 0;$index < $countfiles; $index++){
        if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
            // File name
            $filename = $_FILES['files']['name'][$index];
            // rename image
            $temp = explode(".", $filename);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            // Get extension
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            // Valid image extension
            $valid_ext = array("png","jpeg","jpg");
            if(in_array($ext, $valid_ext)){
                // File path
                $path = $upload_location.$newfilename;
                // Upload file
                if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
                $files_arr[] = $path;
                }
            }

            // add images into the database
            $insert_image = "INSERT INTO property_images SET `property_id`= '$last_id', `image`= '$newfilename'";
            $add_image = mysqli_query($con, $insert_image);
            if($add_image){
                // echo "image_is_added";
            }else{
                echo "image not added!";
            }
        }
    }

    echo "success";

}else{
    echo "property not added!";
}

?>