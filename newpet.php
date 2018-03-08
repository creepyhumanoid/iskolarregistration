<?php 
	include 'session.php';
	include 'header.html';
	include 'sidebar.php';
?>
<style type="text/css">
html,body{
	height: 100%;
}
#success_message{ display: none;}
</style>
<style type="text/css">
  @import "compass/css3";
body {
  background-color: white;
}
.form-box {
  width: 50%;
  margin: auto;
  padding-top: 20px;
}
.form-box h1 {
  text-align: center;
  font-weight: bold;
  text-transform: uppercase;
  color: tomato;
}
.form-box h1 span {
  font-weight: lighter;
}

</style>
  <div class="container">
  <div class="row">
    <div class="form-box">
        <h2 style="color: gray; text-align: center;">Pet Registration Form</h2>
          <form role="form" id="contact-form" method="POST" action="addnewpet.php">
            <!-- name field -->
            <label>Pet Owner's Information</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input type="text" class="form-control" id="firstname" value="" placeholder="First Name" name="firstname">
                    </div>
                </div>
            <!-- email field -->
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input type="text" class="form-control" id="mi" value="" placeholder="Middle Initial" name="mi">
                    </div>
                </div>
            <!-- phone field -->
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input type="text" class="form-control" id="lastname" value="" placeholder="Last Name" name="lastname">
                    </div>
                </div>
                <label>Pet's Information</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="fa fa-paw "></span></div>
                        <input type="text" class="form-control" id="petname" value="" placeholder="Pet's Name" name="petname">
                    </div>
                </div>
                <div class="form-group">
                  <label for="sel1">Select Pet's Gender:</label>
                  <select class="form-control" id="gender" name="gender" style="height: 10%;">
                     <?php
                        $con = mysqli_connect("localhost","root","","petregistration") or die('Error connecting to MySQL server.');
                        $selgender = "SELECT * FROM tblpetgender";
                        $genderquery = mysqli_query($con,$selgender);
                        while ($con=mysqli_fetch_assoc($genderquery)){
                          echo "<option  value='".$con['ID']."'>".$con['gender']."</option>";
                        }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="sel1">Select Pet Type:</label>
                  <select class="form-control" id="type" name="type" style="height: 10%;">
                     <?php
                        $con = mysqli_connect("localhost","root","","petregistration") or die('Error connecting to MySQL server.');
                        $seltypes = "SELECT * FROM tblpettype";
                        $typesquery = mysqli_query($con,$seltypes);
                        while ($con=mysqli_fetch_assoc($typesquery)){
                          echo "<option  value='".$con['ID']."'>".$con['type']."</option>";
                        }
                    ?>
                  </select>
                </div>   
            <button type="submit" class="btn btn-default">Submit</button>
            <div style="margin-top: 1em;"></div>
          </form>   
    </div>
  </div>
</div>
   

<?php include 'footer.html'; ?>