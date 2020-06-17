<div class="col-md-4 col-lg-2 sidebar-offcanvas bg-light p-2 mt-3 mr-3"
	 id="sidebar" role="navigation">
	<ul class="nav flex-column sticky-top pt-5 mr-3 mt-3 list-group ">
		<li class="nav-item">
			<a class="nav-link" href="dasboard.php">
				<i class="fa fa-home fa-2x"> Dashboard</i><hr>
			</a>
		</li>
				<!-- ADD LIST-->	
		<li class="nav-item">
            <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">
			    <i class="fa fa-plus font-weight-bold"> ADD </i></a><hr>
            <ul class="list-unstyled flex-column collapse" id="submenu1" aria-expanded="false">
                <li class="nav-item ">
				    <a class="nav-link " href="#add_event.php">
				         <i class="fa fa-plus font-weight-bold"> 
						 Add Events</i><hr>
					</a>
				</li>
				  <li class="nav-item ">
				    <a class="nav-link " href="#add_event.php">
				         <i class="fa fa-plus font-weight-bold"> 
						 Add Footer containt</i><hr>
					</a>
				</li>
				  <li class="nav-item ">
				    <a class="nav-link " href="#add_event.php">
				         <i class="fa fa-plus font-weight-bold"> 
						 Add images</i><hr>
					</a>
				</li>
				  <li class="nav-item ">
				    <a class="nav-link " href="#add_event.php">
				         <i class="fa fa-plus font-weight-bold"> 
						 Add FAQ</i><hr>
					</a>
				</li>
	</ul>
</li>
				
	<li class="nav-item ">
		<a class="nav-link " href="view_users.php">
		<i class="fa fa-gift font-weight-bold"> View User list</i><hr>
		</a>
	</li>
	
	<li class="nav-item ">
		<a class="nav-link btn btn-outline-light bg-danger  m-3 p-1 border"
			href="logout.php"> Logout</a><hr>
	</li>
</ul>
</div>
<!--/col-->


<!--scripts loaded here-->

<script>
  $(document).ready(function() {
    
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });
  
});
  </script>