<?php 
	include 'session.php';
	include 'header.html';
	include 'sidebar.php';
?>
<h3 style="margin-left: 10em;">ADD NEW ISKOLAR</h3><br>
<div class="col-md-5" style="margin-left: 15em;">
<form role="form" id="contact-form" method="POST" action="newiskolarprocess.php">
                	<div class="form-group">
                		<label for="firstname">First Name</label>
                   		<div class="input-group">
                        	<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        		<input type="hidden" class="form-control" id="id"  name="id" value="<?php echo $con['ID']; ?>">
                        		<input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname">
                    		</div>
                		</div>

                	<div class="form-group">
                		<label for="firstname">Middle Initial</label>
                    	<div class="input-group">
                        	<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        		<input type="text" class="form-control" id="mi" placeholder="Middle Initial" name="mi">
                    		</div>
                		</div>
	                <div class="form-group">
	                	<label for="firstname">Last Name</label>
	                    <div class="input-group">
	                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
	                        <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname">
	                    </div>
	                </div>  
	                <div class="form-group">
	                	<label for="school_id">School ID</label>
	                    <div class="input-group">
	                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
	                        <input type="text" class="form-control" id="school_id" placeholder="School ID" name="school_id">
	                    </div>
	                </div>
	      			</div>
	      			<div class="col-md-3" style="margin-left: 1em;">
	      				<div class="form-group">
	                  <label for="school">Select School:</label>
	                  <select class="form-control" id="school" name="school" style="height: 10%;">
	                    <?php
	                      $con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');
	                      $selschool = "SELECT * FROM tblschool";
	                      $schoolquery = mysqli_query($con,$selschool);
	                      while ($con=mysqli_fetch_assoc($schoolquery)){
	                        echo "<option  value='".$con['ID']."'>".$con['school']."</option>";
	                      }
	                    ?>
	                  </select>
	                </div>  
	                <div class="form-group">
	                  <label for="year">Select Year/Level:</label>
	                  <select class="form-control" id="year" name="year" style="height: 10%;">
	                    <?php
	                      $con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');
	                      $selyear = "SELECT * FROM tblyear";
	                      $yearquery = mysqli_query($con,$selyear);
	                      while ($con=mysqli_fetch_assoc($yearquery)){
	                        echo "<option  value='".$con['ID']."'>".$con['year']."</option>";
	                      }
	                    ?>
	                  </select>
	                </div>
	         	 		<div class="form-group">
	                  <label for="course">Select Course:</label>
	                  <select class="form-control" id="course" name="course" style="height: 10%;">
	                    <?php
	                      $con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');
	                      $selcourse = "SELECT * FROM tblcourse";
	                      $coursequery = mysqli_query($con,$selcourse);
	                      while ($con=mysqli_fetch_assoc($coursequery)){
	                        echo "<option  value='".$con['ID']."'>".$con['course']."</option>";
	                      }
	                    ?>
	                  </select>
	                </div><br><br><br><br><br><br>
	                <button type="submit" class="btn btn-default" style="margin-left: 16em;">Submit</button>
	         	 	</div>
	         	 </form>
  			  <?php include 'footer.html'; ?>