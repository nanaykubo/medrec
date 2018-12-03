<?php $this -> load -> view('layout/header'); ?>


<div class = "container">
	<h3>List</h3>

 <?php 
      if($this-> session-> flashdata('success_msg'))
      {
      ?>
        <div class="alert alert-dismissible alert-success">
      <?php echo $this->session->flashdata('success_msg');?>
      </div>
      <?php
      } 
  ?>

    <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">ADD
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    <li><a href="<?php echo base_url('Test/add/'.$data[1]['finfo'][0]->HCID); ?>">Add Patient</a></li>
    <li><a href="<?php echo base_url('Test/viewFamily/'.$data[1]['finfo'][0]->HCID); ?>">Add Family</a></li>
    </ul>
    </div>  

    <br/>

    <br/><br/>  
      <form action="<?php echo base_url('Test/filtered_logged/'.$data[1]['finfo'][0]->HCID); ?>" method="post" class="form-inline my-2 my-lg-0" align="right">
      <input class="form-control mr-sm-2" name="searchValue" id="searchValue" type="text" placeholder="Search">
      <input type="submit" name="Submit" value="Search">
    </form>
      <a href="<?php echo base_url('Test/logged'); ?>" class="btn btn-default float-right">Back</a>
    <br/>

	<table class="table table-hover" id="Search">
  	<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Status</th>
      <th scope="col">Type</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Family Code</th>
      <th scope="col">Action</th>
    </tr> 

    <tbody>      

      <?php
      //retrive parameters from Test.php controller
      if($data[1]['finfo'][0])
      {
        //set dataset info to variable test
        foreach ($data[1]['finfo'] as $test) 
        //get header ID and print out each
        {
      ?>

    	<td><?php echo $test->ID; ?></td>
      <td><?php echo $test->Status; ?></td>
    	<td><?php echo $test->Type; ?></td>
      <td><?php echo $test->LN ;?> <?php echo $test->FN; ?> <?php echo $test->MN; ?></td>
      <td><?php echo $test->Brgy ;?><?php echo " ";?><?php echo $test->St;?> <?php echo $test->City; ?></td>
      <td><?php echo $test->FamilyCode; ?></td>

    	<td>  
    		<a href="<?php echo base_url('Test/edit/'.$test->ID); ?>" class="btn btn-info btn-sm">Edit</a>    
    		<a href="<?php echo base_url('Test/delete/'.$test->ID); ?>" class="btn btn-danger btn-sm">Delete</a>
        <br/><br/>
        <a href="<?php echo base_url('Test/view/'.$test->ID); ?>" class="btn btn-warning btn-sm">View Records</a>
    	</td>
    </tbody>

      <?php
      //continuation to loop all in the dataset to the body

      }

      }
      ?>


      <?php      
        $this -> load -> view('layout/footer'); 
      ?>
