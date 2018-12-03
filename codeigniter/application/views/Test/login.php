<!DOCTYPE html>
<html>
<head>
  <title>Med Rec Tracking System</title>
  <link rel="stylesheet" type = "text/css" href="<?php echo base_url('assets/css/bootstrap.css')?>">
</head>

<body>

<div class ="navbar navbar-default">
  <div class= "container">

  </div>
</div>

<div class = "container">
  <?php 
      if($this-> session-> flashdata('error_msg'))
      {
      ?>
        <div class="alert alert-dismissible alert-danger">
      <?php echo $this->session->flashdata('error_msg');?>
      </div>
      <?php
      }
      ?>

  <form action="<?php echo base_url('Test/login_validation') ?>" method="post" class=form-horizontal align="center">
      <h3>Login</h3>
    </br></br>
  <div class="form-group">
      <label for="title" class="col-md-2">Username :</label>
      <div class="cold-md-12">
        <input type="text" name="txtUsername" class="form-control" placeholder="Enter Username">
      </div>
          </br>

      <div class="form-group">
      <label for="title">Password</label>
      <input type="password" name="txtPassword" class="form-control" placeholder="Enter Password">
    </div>

      <div class="form-group">
      <label class="col-md-2 text-right"></label>
      <div class="cold-md-10">
        <input type="submit" name="login" class="btn btn-primary " value ="Login">     
      </div>

    </div>
  </form>



        