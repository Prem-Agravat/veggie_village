<?php

session_start();
try {

    if (!file_exists('../connection-pdo.php' ))
        throw new Exception();
    else
        require_once('../connection-pdo.php' ); 
		
} catch (Exception $e) {

	$_SESSION['msg'] = 'There were some problem in the Server! Try after some time!';

	header('location: ../../admin/category-list.php');

	exit();
	
}

if (!isset($_REQUEST['id'])) {

	$_SESSION['msg'] = 'Invalid ID';

	header('location: ../../admin/category-list.php');

	exit();

} else {

    $id= $_REQUEST['id'];
    $d_status = $_POST['data_status'];
	$name = $_POST['name'];
	$short_desc = $_POST['short_desc'];
	$long_desc = $_POST['long_desc'];
    $img = $_FILES['img']['name'];
	$temp = $_FILES['img']['tmp_name'];
	$folder = "../../images/" . $img;

    if($img == ""){
        $sql = "UPDATE categories SET name='$name', short_desc='$short_desc', long_desc='$long_desc', data_status='$d_status' WHERE id='$id'";
    }else{
        $sql = "UPDATE categories SET name='$name', short_desc='$short_desc', long_desc='$long_desc', image='$img', data_status='$d_status' WHERE id='$id'";
        move_uploaded_file($temp,$folder);
    }

    $query  = $pdoconn->prepare($sql);
    if ($query->execute()) {

    	$_SESSION['msg'] = 'Category Updated Succesfully!';

		header('location: ../../admin/category-list.php');
		exit();
    	
    } else {

    	$_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';

		header('location: ../../admin/category-list.php');
		exit();

    }


}