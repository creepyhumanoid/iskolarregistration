<?php 
	include 'session.php';
	include 'header.html';
	include 'sidebar.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
 <div class="card col-md-2" style="margin-left: 300px; margin-top: 10px; background-color: white; border-color: white;">
  <div class="card-block">
    <h3 class="card-title" style="text-align: center;">Schools</h3>
    <?php  
    	$con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');
    	$result = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tblschool`");
		$row = mysqli_fetch_array($result);
		$count = $row['count'];
		echo "<h1 class='card-subtitle mb-2 text-muted' style='text-align: center;'>".$count."</h1>";
    ?>
  </div>
</div>
<div class="card col-md-2" style="margin-left: 20px; margin-top: 10px; background-color: white; border-color: white;">
  <div class="card-block">
    <h3 class="card-title" style="text-align: center;">All</h3>
    <?php  
    	$con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');
    	$result = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars`");
		$row = mysqli_fetch_array($result);
		$count = $row['count'];
		echo "<h1 class='card-subtitle mb-2 text-muted' style='text-align: center;'>".$count."</h1>";
    ?>
  </div>
</div>
<div class="card col-md-2" style="margin-left: 20px; margin-top: 10px; background-color: white; border-color: white;">
  <div class="card-block">
    <h3 class="card-title" style="text-align: center;">Registered</h3>
    <?php  
    	$con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');
    	$result = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `status_id`=2");
		$row = mysqli_fetch_array($result);
		$count = $row['count'];
		echo "<h1 class='card-subtitle mb-2 text-muted' style='text-align: center;'>".$count."</h1>";
    ?>
  </div>
</div>
<div class="card col-md-2" style="margin-left: 20px; margin-top: 10px; background-color: white; border-color: white;">
  <div class="card-block">
    <h3 class="card-title" style="text-align: center;">Archived</h3>
    <?php  
    	$con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');
    	$result = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `status_id`=1");
		$row = mysqli_fetch_array($result);
		$count = $row['count'];
		echo "<h1 class='card-subtitle mb-2 text-muted' style='text-align: center;'>".$count."</h1>";
    ?>
  </div>
</div>
<div class="card col-md-4" style="width: 60em; margin-left: 300px; margin-top: 10px; background-color: white; height: 341px; border-color: white;">
  <div class="card-block">
    <h3 class="card-title" style="text-align: center;">Iskolar Status</h3>
    <canvas id="pie-chart" width="400" height="250"></canvas>
    <?php
    	$con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');
    	$aresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `status_id`=1");
		$arow = mysqli_fetch_array($aresult);
		$acount = $arow['count'];

		$rresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `status_id`=2");
		$rrow = mysqli_fetch_array($rresult);
		$rcount = $rrow['count'];
    ?>
	<script>
		var ar = "<?php echo $acount; ?>";
		var reg = "<?php echo $rcount; ?>";
		new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["Registered", "Archived"],
      datasets: [{
        backgroundColor: ["#8e5ea2","#3cba9f"],
        data: [reg,ar]
      }]
    },
    options: {
      title: {
        display: true
      }
    }
});
	</script>
  </div>
</div>
<div class="card col-md-5" style="width: 35em; margin-left: 1px; margin-top: 10px; background-color: white; border-color: white;">
  <div class="card-block">
    <h3 class="card-title" style="text-align: center;"">Year / Level</h3>
    <canvas id="pie-charta" width="400" height="250"></canvas>
    <?php
    	$con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');

    	$firstresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `year_id`=1");
		$firstrow = mysqli_fetch_array($firstresult);
		$firstcount = $firstrow['count'];

		$secondresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `year_id`=2");
		$secondrow = mysqli_fetch_array($secondresult);
		$secondcount = $secondrow['count'];

		$thirdresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `year_id`=3");
		$thirdrow = mysqli_fetch_array($thirdresult);
		$thirdcount = $thirdrow['count'];

		$fourthresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `year_id`=4");
		$fourthrow = mysqli_fetch_array($fourthresult);
		$fourthcount = $fourthrow['count'];

		$fifthresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `year_id`=5");
		$fifthrow = mysqli_fetch_array($fifthresult);
		$fifthcount = $fifthrow['count'];
    ?>
	<script>
	var first = "<?php echo $firstcount; ?>";
	var second = "<?php echo $secondcount; ?>";
	var third = "<?php echo $thirdcount; ?>";
	var fourth = "<?php echo $fourthcount; ?>";
	var fifth = "<?php echo $fifthcount; ?>";
	new Chart(document.getElementById("pie-charta"), {
    type: 'pie',
    data: {
      labels: ["First","Second", "Third", "Fourth", "Fifth"],
      datasets: [{
        backgroundColor: ["#c45850","#3e95cd","#ffff33","#33cc33","#ff6600"],
        data: [first,second,third,fourth,fifth]
      }]
    },
    options: {
      title: {
        display: true,
      }
    }
});
	</script>
  </div>
</div>
<div class="card col-md-9" style="width: 65.5em; margin-left: 300px; margin-top: 10px; background-color: white; border-color: white;">
  <div class="card-block">
    <h3 class="card-title">Courses</h3>
    <canvas id="bar" width="400" height="100"></canvas>
    <?php
    	$con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');

    	$accresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `course_id`=1");
		$accrow = mysqli_fetch_array($accresult);
		$acccount = $accrow['count'];

		$bmresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `course_id`=2");
		$bmrow = mysqli_fetch_array($bmresult);
		$bmcount = $bmrow['count'];

		$ceresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `course_id`=3");
		$cerow = mysqli_fetch_array($ceresult);
		$cecount = $cerow['count'];

		$coeresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `course_id`=4");
		$coerow = mysqli_fetch_array($coeresult);
		$coecount = $coerow['count'];

		$itresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `course_id`=5");
		$itrow = mysqli_fetch_array($itresult);
		$itcount = $itrow['count'];

		$hrmresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `course_id`=6");
		$hrmrow = mysqli_fetch_array($hrmresult);
		$hrmcount = $hrmrow['count'];
    ?>
	<script>
	var ctx = document.getElementById("bar").getContext('2d');
	var acc = "<?php echo $acccount; ?>";
	var bm = "<?php echo $bmcount; ?>";
	var ce = "<?php echo $cecount; ?>";
	var coe = "<?php echo $coecount; ?>";
	var it = "<?php echo $itcount; ?>";
	var hrm = "<?php echo $hrmcount; ?>";
	var line = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: ["Accountancy", "Business Management", "Civil Engineer", "Computer Engineer", "Info Technology", "Hotel & Restaurant Management"],
	        datasets: [{
	            data: [acc, bm, ce, coe, it, hrm],
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)',
	                'rgba(75, 192, 192, 0.2)',
	                'rgba(153, 102, 255, 0.2)',
	                'rgba(255, 159, 64, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)',
	                'rgba(75, 192, 192, 1)',
	                'rgba(153, 102, 255, 1)',
	                'rgba(255, 159, 64, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	    	legend: {
            display: false
         },
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});
	</script>
  </div>
</div>
<div class="card col-md-9" style="width: 65.5em; margin-left: 300px; margin-top: 10px; background-color: white; border-color: white;">
  <div class="card-block">
    <h3 class="card-title">Schools</h3>
    <canvas id="line" width="400" height="100"></canvas>
    <?php
    	$con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');

    	$accresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `course_id`=1");
		$accrow = mysqli_fetch_array($accresult);
		$acccount = $accrow['count'];

		$bmresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `course_id`=2");
		$bmrow = mysqli_fetch_array($bmresult);
		$bmcount = $bmrow['count'];

		$ceresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `course_id`=3");
		$cerow = mysqli_fetch_array($ceresult);
		$cecount = $cerow['count'];

		$coeresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `course_id`=4");
		$coerow = mysqli_fetch_array($coeresult);
		$coecount = $coerow['count'];

		$itresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `course_id`=5");
		$itrow = mysqli_fetch_array($itresult);
		$itcount = $itrow['count'];

		$hrmresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbliskolars` WHERE `course_id`=6");
		$hrmrow = mysqli_fetch_array($hrmresult);
		$hrmcount = $hrmrow['count'];
    ?>
    <script type="text/javascript">
    	var ctz = document.getElementById('line').getContext('2d');
		var acc = "<?php echo $acccount; ?>";
		var bm = "<?php echo $bmcount; ?>";
		var ce = "<?php echo $cecount; ?>";
		var coe = "<?php echo $coecount; ?>";
		var it = "<?php echo $itcount; ?>";
		var hrm = "<?php echo $hrmcount; ?>";
		var myLineChart = new Chart(ctz, {
		    type: 'line',
		    data: {
		       labels: ['acccount', 'bm'],
		      datasets: [{
		         data: [acc, bm],
		         backgroundColor: [
		            'rgb(255, 26, 26)',
		            'rgb(179, 89, 0)'
		         ]
		      }]
		   },
		   options: {
		         legend: {
		            display: false
		         },
		         tooltips: {
		            enabled: false
		         }
		    }
		});
    </script>
   </div>
</div>
<?php include 'footer.html'; ?>