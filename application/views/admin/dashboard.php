
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
			<h1 class="m-b-20 text-white counter"><?php echo $this->db->get('ums_teacher')->num_rows(); ?></h1>
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
			<h6 class="text-white text-uppercase m-b-20">Depertments</h6>
			<h1 class="m-b-20 text-white counter"><?php echo $this->db->get('ums_dept_list')->num_rows(); ?></h1>
			<span class="text-white">|</span>
		</div>
	</div>
</div>
		