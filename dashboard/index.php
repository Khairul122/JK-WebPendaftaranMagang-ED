<?php session_start(); ?>
<?php 
if($_SESSION['auth_key'] == ""){
header('location: ../');
}
?>
<?php require_once '../config/conn.php'; ?>
<?php require_once 'layouts/header.php'; ?>
<?php include 'layouts/sidebar.php'; ?>
<?php $page = $_REQUEST['r']; ?>
<?php include_once $page.'.php'; ?>
<?php include 'layouts/footer.php'; ?>