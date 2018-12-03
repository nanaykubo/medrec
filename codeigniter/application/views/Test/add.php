<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <title>Medical Record Tracking System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type = "text/css" href="<?php echo base_url('assets/css/bootstrap.css')?>">

<script>
$(document).ready(function(){

  $("#ServicesCode").hide();
  $("#Services_2").hide();
  $("#Services_").hide();
  $("#ServicesCode2").hide();

  $("#BDAY").change(function() 
  {    
    $val= $(this).val();
    var today = new Date();
    var birthDate = new Date($val);
    var age = today.getFullYear() - birthDate.getFullYear();
                document.getElementById("Age").value = age;
    if(age > 59)
    {
        document.getElementById("hide").value = "SENIOR";
        document.getElementById("Type").value = "SENIOR";
         $("#lblPhilhealth").show();
         $("#Philhealth").show();
    }
    else if (age > 19)
    {
      document.getElementById("hide").value = "ADULT";
      document.getElementById("Type").value = "ADULT";
       $("#lblPhilhealth").show();
       $("#Philhealth").show();
    }
     else if (age > 12)
    {
      document.getElementById("hide").value = "ADOLESCENCE";
      document.getElementById("Type").value = "ADOLESCENCE";
      $("#lblPhilhealth").hide();
      $("#Philhealth").hide();
    }
     else
    {
    document.getElementById("hide").value = "CHILD";
     document.getElementById("Type").value = "CHILD";
     $("#lblPhilhealth").hide();
     $("#Philhealth").hide();
    }
  });

  $("#Service").change(function() {
        if($(this).val() == "SERVICE") 
        {
            $("#Result2").hide();
            $("#Prescription2").hide();
            $("#Diagnosis2").hide();
            $("#ReturnDate").hide();
            $("#Result").hide();
            $("#Prescription").hide();
            $("#Diagnosis").hide();

            $("#ServicesCode").show();
            $("#Services_2").show();
            $("#Services_").show();
            $("#ServicesCode2").show();

        }
        else 
        {
            $("#ServicesCode").hide();
            $("#Services_2").hide();
            $("#Services_").hide();
            $("#ServicesCode2").hide();

            $("#Result2").show();
            $("#Prescription2").show();
            $("#Diagnosis2").show();
            $("#Return_Date").show();
            $("#Return_Date2").show();
            $("#Date_Given").show();
            $("#ReturnDate").show();
            $("#Result").show();
            $("#Prescription").show();
            $("#Diagnosis").show();
            $("#Date").show();
            $("#Date_Given").show();
        }
  });

   $("#brand").change(function(){
    $.ajax({
      type: "POST",
      data: {'brand': $(this).val()},
      url: '<?=site_url()?>/Test/getFamilyInfo',
      success: function(data){
          if(data){
          var parsed= JSON.parse(data);
          $("#tbl_beneficaries tbody > tr").remove();
          $.each(parsed,function(index,value)
          {
            var row = '<tr><td> ' + value[2] + "" + value[1] + ' </td> <td> ' + value[3] + '</td></tr>'
            $("#tbl_beneficaries tbody").append(row); 
          });
          }
        else
        {

        }
    }
  });
  });
});
</script>

</head>

<body>  

<div class ="navbar navbar-default">
  <div class= "container">
    <h1>Med Rec Tracking System</h1>
  </div>
</div>

<div class = "container">
  <h3>Add New Patient</h3>
  <form action="<?php echo base_url('Test/submit') ?>" method="post" class=form-horizontal">
      Take Picture :
      <input type="file" name="file" id="file">
      <br/><br/>
 <div class="form-group">
      <label class="control-label" for="Type">ID</label>
      <br/>

      <input type="text" name="ID" id="ID" required="">
    </div>

<div class="form-group">
      <label class="control-label" for="Status">Status</label>
      <br/>

      <div class="cold-md-10">
             <input type="hidden" name="hide" id="hide"/>
         <select name="Status" id="Status" style="width: 11.5em">
        <option>ONGOING</option>
        <option>ACTIVE</option>
        <option>NOT ACTIVE</option>
      </select>
     <fieldset disabled="">
      <br/>
           <label class="control-label" for="Type">Type</label>
     <input id="Type" name="Type" type="text" placeholder="Set Birthdate" disabled="">
          <label class="control-label" for="Type">Age</label>
     <input id="Age" name="Age" type="text" placeholder="Set Birthdate" disabled="">
      </fieldset>
    </div>

  <div class="form-group">
      <label for="title" class="col-md-2">First Name</label>
      <label for="title" class="col-md-2">Middle Name</label>
      <label for="title" class="col-md-2">Last Name</label>
      <div class="cold-md-10">
        <input type="text" name="txt_FN" style="text-transform:uppercase" required="">
        <input type="text" name="txt_MN" style="text-transform:uppercase">
        <input type="text" name="txt_LN" style="text-transform:uppercase" required="">
      </div>

      <div class="form-group">
      <label for="title" class="col-md-2">Address :</label>
      <br/>
      <label for="title" class="col-md-2">BRGY</label> 
      <label for="title" class="col-md-2">ST</label> 
      <label for="title" class="col-md-2">CITY</label> 
      <div class="cold-md-10">
        <select name="BRGY" id="BRGY" style="width: 11.5em">  
        <?php foreach ($brgyinfo as $test) { ?>
        <option><?php echo $test->BRGYID; ?>
        <?php }?>
        </select> 
        <input type="hidden" name="txt_HCID" value="<?php echo $brgyinfo[0] ->HCID; ?>">
        <input type="text" name="ST"  id="ST" style="text-transform:uppercase">
        <input type="text" name="CITY" id="CITY" style="text-transform:uppercase">
      </div>
    </div>

    <div class="form-group">
      <label for="title" class="col-md-2">Patients Info:</label>
      <br/>
      <label for="title" class="col-md-2">Birth Date</label> 
      <label for="title" class="col-md-2">CivilStatus</label> 
      <label for="title" name="lblPhilhealth" id="lblPhilhealth" class="col-md-2">Phil Health No:</label> 
      <div class="cold-md-10">
        <input type="date" id= "BDAY" name="BDAY" required="">
        <select name="cs" id="cs" style="width: 11.5em">
        <option>SINGLE</option>
        <option>MARRIED</option>
        <option>WIDOWED</option>
        </select>
              <input type="text" name="Philhealth" id="Philhealth">
            </div>

    <div class="form-group">
      <br/>
      <label for="exampleSelect1" class="col-md-2">Family Code</label> 
      <label for="title" name="FamilyRelation" id="FamilyRelation"  class="col-md-2">FamilyRelation:</label> 
      <br/>
      <div class="cold-md-10">
        <select name="brand" id="brand" style="width: 11.5em">  
        <option value="">Select Family</option>  
        <?php foreach ($familyinfo as $test) { ?>
        <option><?php echo $test->Code; ?>
        <?php      }?>
        </select> 
        <input type="text" name="txtFamilyRelation" id="txtFamilyRelation" required="">
        <br/><br/>
        Family Members
        <table class="table table-hover" id="tbl_beneficaries" style="width: 12em">
        <thead>
        <tr>
        <th scope="col">Name</th>
        <th scope="col">Relation</th>
        </tr> 
    </thead>
    <tbody>
      
    </tbody>
  </table>
      </div>
    </div>

    </div>
    <div class="form-group">
      <label for="exampleTextarea">Remarks</label>
      <textarea class="form-control" name="Remarks" id="Remarks" rows="3"></textarea>
    </div>

      <div class="form-group">
      <label class="col-md-2 text-right"></label>
      <div class="cold-md-10">
        <input type="submit" name="btnSave" class="btn btn-primary " value ="Save">
      </div>
    </div>
          <a href="<?php echo base_url('Test/logged'); ?>" class="btn btn-default">Back</a>
  </form>
</body>
</html>
