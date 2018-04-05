
<div class="alert alert-success" role="alert">
	<h4 class="alert-heading">University Management System (UMS)</h4>
	<p>
		University Management System (UMS) is a large database system which can be used to manage, maintain and secure universitys day to day business.
		<br>
		<br> In 21st century, with the latest technology the world is moving towards multidirectional force in order to achieve, to give the best solutions to the people in a short period of time, user firiendly, flexible and important securable application. Considering the need to achieve the desired application.
	</p>
</div>
<div class="row">
	<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
		<div class="card-box noradius noborder bg-default">
			<i class="fa fa-user-o float-right text-white"></i>
			<h6 class="text-white text-uppercase m-b-20">Teachers</h6>
			<h1 class="m-b-20 text-white counter"><?php echo $this->db->get('ums_teacher')->num_rows(); ?></h1>
			<span class="text-white">|</span>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
		<div class="card-box noradius noborder bg-warning">
			<i class="fa fa-university float-right text-white"></i>
			<h6 class="text-white text-uppercase m-b-20">Students</h6>
			<h1 class="m-b-20 text-white counter"><?php echo $this->db->get('ums_student')->num_rows(); ?></h1>
			<span class="text-white">|</span>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
		<div class="card-box noradius noborder bg-info">
			<i class="fa fa-book float-right text-white"></i>
			<h6 class="text-white text-uppercase m-b-20">Subjects</h6>
			<h1 class="m-b-20 text-white counter"><?php echo $this->db->get('ums_subject')->num_rows(); ?></h1>
			<span class="text-white">|</span>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
		<div class="card-box noradius noborder bg-danger">
			<i class="fa fa-database float-right text-white"></i>
			<h6 class="text-white text-uppercase m-b-20">Batchs</h6>
			<h1 class="m-b-20 text-white counter"><?php echo $this->db->get('ums_batch')->num_rows(); ?></h1>
			<span class="text-white">|</span>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">						
		<div class="card mb-3">	
			<div class="card-body">
				<canvas id="chartTeacher"></canvas>
			</div>
		</div><!-- end card-->					
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">						
		<div class="card mb-3">		
			<div class="card-body">
				<canvas id="chartStudent"></canvas>
			</div>
		</div><!-- end card-->					
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">						
		<div class="card mb-3">			
			<div class="card-body">
				<canvas id="chartSubject"></canvas>
			</div>
		</div><!-- end card-->					
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">						
		<div class="card mb-3">							
			<div class="card-body">
				<canvas id="chartBatch"></canvas>
			</div>
		</div><!-- end card-->					
	</div>



</div>
<?php 
	$dept_lists = $this->db->get('ums_dept_list')->result_array(); 
	foreach($dept_lists as $k=>$dept){
		$teacher[] = $this->db->get_where('ums_teacher',['dept_id'=>$dept['id']])->num_rows();							
		$student[] = $this->db->get_where('ums_student',['dept_id'=>$dept['id']])->num_rows();							
		$subject[] = $this->db->get_where('ums_subject',['dept_id'=>$dept['id']])->num_rows();							
		$batch[] = $this->db->get_where('ums_batch',['dept_id'=>$dept['id']])->num_rows();							
		$color[] = '"rgba('.rand(0,255).','.rand(0,255).','.rand(0,255).','.rand(0,255).')"';	
		$dept_list[] = '"'.$dept['name'].'"';	
	}
	$dataCountTeacher = implode(',',$teacher);
	$dataCountStudent = implode(',',$student);
	$dataCountSubject = implode(',',$subject);
	$dataCountBatch = implode(',',$batch);
	$dataColor = implode(',',$color);
	$dataLevel = implode(',',$dept_list);
?>
<!-- BEGIN Chart -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
// chartTeacher
var ctx3 = document.getElementById("chartTeacher").getContext('2d');
var ctx2 = document.getElementById("chartStudent").getContext('2d');
var ctx1 = document.getElementById("chartSubject").getContext('2d');
var ctx0 = document.getElementById("chartBatch").getContext('2d');
	var chartTeacher = new Chart(ctx3, {
		type: 'pie',
		data: {
				datasets: [{
					data: [<?php echo $dataCountTeacher; ?>],
					backgroundColor: [<?php echo $dataColor; ?>]
				}],
				labels: [<?php echo $dataLevel; ?>]
			},
			options: {
				responsive: true
			}
	 
	});
	var chartStudent = new Chart(ctx2, {
		type: 'pie',
		data: {
			datasets: [{
					data: [<?php echo $dataCountStudent; ?>],
					backgroundColor: [<?php echo $dataColor; ?>]
				}],
				labels: [<?php echo $dataLevel; ?>]
			},
			options: {
				responsive: true
			}
	 
	});
	var chartSubject = new Chart(ctx1, {
		type: 'pie',
		data: {
			datasets: [{
					data: [<?php echo $dataCountSubject; ?>],
					backgroundColor: [<?php echo $dataColor; ?>]
				}],
				labels: [<?php echo $dataLevel; ?>]
			},
			options: {
				responsive: true
			}
	 
	});
	var chartBatch = new Chart(ctx0, {
		type: 'pie',
		data: {
			datasets: [{
					data: [<?php echo $dataCountBatch; ?>],
					backgroundColor: [<?php echo $dataColor; ?>]
				}],
				labels: [<?php echo $dataLevel; ?>]
			},
			options: {
				responsive: true
			}
	 
	});
</script>
		