<?php

require 'conn.php';

if(!empty($_GET['q']) && $_GET['q'] == 'data') {
	$data = get_members();
	echo json_encode($data);
}
if(!empty($_GET['i'])){
	$data = get_detail($_GET['i']);
	echo json_encode($data);
}
if(!empty($_POST['save'])){
	$data = addData($_POST);
	echo json_encode($data);
}

if(!empty($_GET['i']) && !empty($_POST['edit'])){
	$data = editData($_GET['i'], $_POST);
	echo json_encode($data);
}

if(!empty($_GET['del'])){
	$data = delete($_GET['del']);
	echo json_encode($data);
}