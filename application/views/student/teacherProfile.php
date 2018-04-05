<div class="row">
<div class="offset-md-4 col-md-4">
	<div class="card">
	<?php if(empty($teacher[0]['avatar'])): ?>
		<img class="card-img-top" src="http://via.placeholder.com/350x150?text=Profile+Image" alt="Card image cap">
	<?php else: ?>
		<img class="card-img-top" src="<?php echo base_url();?>assets/uploads/teacher/<?php echo $teacher[0]['avatar'];?>" alt="Card image cap">
	<?php endif; ?>
		<div class="card-body">
			<h5 class="card-title"><?php echo $teacher[0]['name']; ?></h5>
			<h6 class="card-title">Depertment: <?php echo $this->db->get_where('ums_dept_list',['id'=>$teacher[0]['dept_id']])->row()->name; ?></h6>
			<h6 class="card-title">Email: <?php echo $teacher[0]['email']; ?></h6>
			<h6 class="card-title">Phone: <?php echo $teacher[0]['phone']; ?></h6>
			
		</div>
		</div>
	</div>
</div>