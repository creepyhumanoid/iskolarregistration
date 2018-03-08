<?php 
	include 'session.php';
	include 'header.html';
	include 'sidebar.php';
?>
<div class="card" style="width: 100rem; margin-left:20em; border: none; margin-top: 2%;">
	<div class="card-block">
		<h3>Registered Iskolars</h3><br>

		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>School ID</th>
					<th>First Name</th>
					<th>MI</th>
					<th>Last Name</th>
					<th>School</th>
					<th>Year/Level</th>
					<th>Course</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');
		            $pets = "SELECT * FROM tbliskolars WHERE `status_id`=2";
		            $petsquery = mysqli_query($con,$pets);
		            while ($con=mysqli_fetch_assoc($petsquery)) {
						$conx = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');

						$sid = $con['school_name_id'];
						$sels = "SELECT * FROM tblschool WHERE `ID`='$sid'";
						$squery = mysqli_query($conx,$sels);
						$fetchs = mysqli_fetch_assoc($squery);
						$school = $fetchs['school'];

						$yid = $con['year_id'];
						$sely = "SELECT * FROM tblyear WHERE `ID`='$yid'";
						$yquery = mysqli_query($conx,$sely);
						$fetchy = mysqli_fetch_assoc($yquery);
						$year = $fetchy['year'];

						$cid = $con['course_id'];
						$selc = "SELECT * FROM tblcourse WHERE `ID`='$cid'";
						$cquery = mysqli_query($conx,$selc);
						$fetchc = mysqli_fetch_assoc($cquery);
						$course = $fetchc['course'];

						$statusid = $con['status_id'];
						$selstatus = "SELECT * FROM tblstatus WHERE `ID`='$statusid'";
						$statusquery = mysqli_query($conx,$selstatus);
						$fetchstatus = mysqli_fetch_assoc($statusquery);
						$status = $fetchstatus['status'];

						echo "<tr>";
						echo "<td>".$con['school_id']."</td>";
						echo "<td>".$con['firstname']."</td>";
						echo "<td>".$con['mi']."</td>";
						echo "<td>".$con['lastname']."</td>";
						echo "<td>".$school."</td>";
						echo "<td>".$year."</td>";
						echo "<td>".$course."</td>";
						echo "<td>".$status."</td>";
						echo "<td>"."<button type='button' class='btn btn-info' data-target='#edit-".$con['ID']."' data-toggle='modal'><span class='fa fa-pencil' aria-hidden='true'></span></button><button type='button' class='btn btn-danger' data-target='#archive-".$con['ID']."' data-toggle='modal'>DELETE</button>"."</td>";
						echo "</tr>";
				?>
			<!--Archive modal-->
			<div class="modal fade" id="archive-<?php echo $con['ID']; ?>">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h4 class="modal-title">ARCHIVE</h4>
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>
			      <div class="modal-body" style="margin-top: 5%;">
			         <form role="form" id="contact-form" method="POST" action="iskolararchive.php">
			            <p>Do you really want to delete this iskolar?</p>
			      <div class="modal-footer">
			        <input type="hidden" name="id" id="id" value="<?php echo $con['ID']; ?>">
			        <button type="submit" class="btn btn-success">YES</button>
			        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
			      	</form>
			     </div>
			    </div>
			   </div>
		      </div>
	         </div>
			<div class="modal fade" id="edit-<?php echo $con['ID']; ?>">
  			 <div class="modal-dialog">
    		  <div class="modal-content">
      			<div class="modal-header">
        			<h4 class="modal-title">EDIT</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
      			</div>
      			<div class="modal-body">
         			<form role="form" id="contact-form" method="POST" action="iskolaredit.php">
                	<div class="form-group">
                		<label for="firstname">First Name</label>
                   		<div class="input-group">
                        	<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        		<input type="hidden" class="form-control" id="id"  name="id" value="<?php echo $con['ID']; ?>">
                        		<input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname" value="<?php echo $con['firstname']; ?>">
                    		</div>
                		</div>

                	<div class="form-group">
                		<label for="firstname">Middle Initial</label>
                    	<div class="input-group">
                        	<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        		<input type="text" class="form-control" id="mi" value="<?php echo $con['mi']; ?>" placeholder="Middle Initial" name="mi">
                    		</div>
                		</div>
                		<div class="form-group">
                		<label for="lastname">Last Name</label>
                    	<div class="input-group">
                        	<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        		<input type="text" class="form-control" id="lastname" value="<?php echo $con['lastname']; ?>" placeholder="Middle Initial" name="lastname">
                    		</div>
                		</div>
	                <div class="form-group">
	                	<label for="school_id">School ID</label>
	                    <div class="input-group">
	                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
	                        <input type="text" class="form-control" id="school_id" value="<?php echo $con['school_id']; ?>" placeholder="Last Name" name="school_id">
	                    </div>
	                </div>  
	                <div class="form-group">
	                  <label for="sel1">Select School:</label>
	                  <select class="form-control" id="school" name="school" style="height: 10%;">
	                    <?php
	                      $con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');
	                      $selschool = "SELECT * FROM tblschool";
	                      $schoolquery = mysqli_query($con,$selschool);
	                      while ($con=mysqli_fetch_assoc($schoolquery)){
	                        if ($school == $con['school']) {
	                          echo "<option selected='selected' value='".$con['ID']."'>".$con['school']."</option>";
	                        }
	                        else{
	                          echo "<option value='".$con['ID']."'>".$con['school']."</option>";
	                        }
	                      }
	                    ?>
                  </select>
	                </div>  
	                <div class="form-group">
	                  <label for="sel1">Select Year/Level:</label>
	                  <select class="form-control" id="year" name="year" style="height: 10%;">
	                    <?php
	                      $con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');
	                      $selyear = "SELECT * FROM tblyear";
	                      $yearquery = mysqli_query($con,$selyear);
	                      while ($con=mysqli_fetch_assoc($yearquery)){
	                        if ($year == $con['year']) {
	                          echo "<option selected='selected' value='".$con['ID']."'>".$con['year']."</option>";
	                        }
	                        else{
	                          echo "<option value='".$con['ID']."'>".$con['year']."</option>";
	                        }
	                      }
	                    ?>
                  </select>
	                </div>
	                <div class="form-group">
	                  <label for="sel1">Select Course:</label>
	                  <select class="form-control" id="course" name="course" style="height: 10%;">
	                    <?php
	                      $con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');
	                      $selcourse = "SELECT * FROM tblcourse";
	                      $coursequery = mysqli_query($con,$selcourse);
	                      while ($con=mysqli_fetch_assoc($coursequery)){
	                        if ($course == $con['course']) {
	                          echo "<option selected='selected' value='".$con['ID']."'>".$con['course']."</option>";
	                        }
	                        else{
	                          echo "<option value='".$con['ID']."'>".$con['course']."</option>";
	                        }
	                      }
	                    ?>
                  </select>
	                </div>
	            	 <button type="submit" class="btn btn-default">Submit</button>
	         		 </form>   
	      			</div>
				    <div class="modal-footer">
				    	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      			</div>
    		  	</div>
  			  </div>
			</div>


		</div>
			
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php include 'footer.html'; ?>