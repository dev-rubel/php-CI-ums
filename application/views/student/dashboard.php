<div class="row">
	
<div class="col-md-9">
	<div class="alert alert-success" role="alert">
		<h4 class="alert-heading">University Management System (UMS)</h4>
		<p>
			University Management System (UMS) is a large database system which can be used to manage, maintain and secure universitys day to day business.
			<br> 
			<br> In 21st century, with the latest technology the world is moving towards multidirectional force in order to achieve, to give the best solutions to the people in a short period of time, user firiendly, flexible and important securable application. Considering the need to achieve the desired application.
		</p>
	</div>
</div>

<div class="col-md-3">
	<div class="card">
	<?php if(empty($_SESSION['user']['avatar'])): ?>
		<img class="card-img-top" src="http://via.placeholder.com/350x150?text=Profile+Image" alt="Card image cap">
	<?php else: ?>
		<img class="card-img-top" src="assets/uploads/student/<?php echo $_SESSION['user']['avatar'];?>" alt="Card image cap">
	<?php endif; ?>
		<div class="card-body">
			<h5 class="card-title"><?php echo $_SESSION['user']['name']; ?></h5>
			<h6 class="card-title">Shift: <?php echo $this->db->get_where('ums_shift',['id'=>$_SESSION['user']['shift_id']])->row()->name; ?></h6>
			<h6 class="card-title">Depertment: <?php echo $this->db->get_where('ums_dept_list',['id'=>$_SESSION['user']['dept_id']])->row()->name; ?></h6>
			<h6 class="card-title">Batch: <?php echo $this->db->get_where('ums_batch',['id'=>$_SESSION['user']['batch_id']])->row()->name; ?></h6>
			<h6 class="card-title">Roll: <?php echo $_SESSION['user']['roll']; ?></h6>
			<h6 class="card-title">Registration: <?php echo $_SESSION['user']['registration_no']; ?></h6>
			
		</div>
		</div>
	</div>
</div>



		