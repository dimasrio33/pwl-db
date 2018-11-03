<?php

$conn =mysqli_connect("127.0.0.1","root","") or die("tidak bisa terhubung server database");
mysqli_select_db($conn,"pwldb") or die("database tidak ditemukan");

//select
function get_members(){
	global $conn;
	$query="Select id,fullname,email from members order by fullname limit 0,10";
	$exec =mysqli_query($conn,$query) or die(mysqli_error($conn));

	$data = array();
	$i = 0;
	while($row = mysqli_fetch_array($exec, MYSQLI_ASSOC)){
		$data[$i]['id'] = $row['id'];
		$data[$i]['fullname'] = $row['fullname'];
		$data[$i]['email'] = $row['email'];
		$i++;
	}
	return $data;
}
function get_detail($id){
	global $conn;
	$query = "select * from members where id= ".$id;
	$exec = mysqli_query($conn,$query) or die(mysqli_error($conn));
	$row = mysqli_fetch_array($exec,MYSQLI_ASSOC);
	return $row;
}

// insert query
function addData($data = array()){

	global $conn;

	$fullname = $data['fullname'];
	$email = $data['email'];
	$company = $data['company'];	
	$address = $data['address'];
	$city = $data['city'];
	$country = $data['country'];

	$query = "Insert into members (fullname, email, company, address, city, country) 
		values('$fullname', '$email', '$company', '$address', '$city', '$country')";

	return mysqli_query($conn, $query) or die(mysqli_error($conn));	

}

// delete query
function delete($id){
	global $conn;

	$query = "Delete from members where id=$id";
	return mysqli_query($conn, $query) or die(mysqli_error($conn));	
}


// update query
function editData($id, $data = array()){
	global $conn;

	$fullname = $data['fullname'];
	$email = $data['email'];
	$company = $data['company'];	
	$address = $data['address'];
	$city = $data['city'];
	$country = $data['country'];

	$query = "Update members set fullname = '$fullname', email = '$email',
		company = '$company', address = '$address', city = '$city', country = '$country' 
		Where id = $id";

	return mysqli_query($conn, $query) or die(mysqli_error($conn));	

}

