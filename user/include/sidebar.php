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
				    <a class="nav-link " href="add_event.php">
				         <i class="fa fa-plus font-weight-bold"> 
						 Add Events</i><hr>
					</a>
				</li>
				<li class="nav-item ">
				    <a class="nav-link " href="add_event_list.php">
				         <i class="fa fa-plus font-weight-bold"> 
						 Create Events list</i><hr>
					</a>
				</li>
		<li class="nav-item ">
			<a class="nav-link" href="add_guest.php">
				<i class="fa fa-users font-weight-bold"> Add Guest details</i><hr>
			</a>
		</li>
		
		<li class="nav-item ">
			<a class="nav-link " href="add_invition.php">
				<i class="fa fa-plus font-weight-bold"> 
			ADD Invition recieved</i><hr>
			</a>
		</li>
				
		<li class="nav-item ">
			<a class="nav-link" href="sent_gift.php">
			<i class="fa fa-gift font-weight-bold"> ADD Gift giving</i><hr>
			</a>
		</li>
		
		<li class="nav-item ">
			<a class="nav-link" href="#add_books.php">
			   <i class="fa fa-plus font-weight-bold"> Add person to invited in events</i><hr>
			</a>
		</li>
		
		<li class="nav-item ">
			<a class="nav-link" href="recieved_gift.php">
			<i class="fa fa-get-pocket  font-weight-bold"> ADD Recieved Gifts details  </i><hr>
			</a>
		</li>
	</ul>
</li>
               
	<li class="nav-item ">
		<a class="nav-link" href="photo_editor/" target="blank">
		<i class="fa fa-users font-weight-bold"> Design Invition Card</i><hr>
		</a>
	</li>
	           
	<li class="nav-item ">
		<a class="nav-link" href="http://training2.forprintshop.com/" target="blank">
		<i class="fa fa-users font-weight-bold"> Print Invition Card</i><hr>
		</a>
	</li>
	<li class="nav-item ">
		<a class="nav-link" href="#view_guest.php">
		<i class="fa fa-users font-weight-bold"> View Invition Card</i><hr>
		</a>
	</li>
	<li class="nav-item ">
		<a class="nav-link" href="view_guest.php">
		<i class="fa fa-users font-weight-bold"> View Guest</i><hr>
		</a>
	</li>
		
	<li class="nav-item ">
		<a class="nav-link" href="view_events.php">
		<i class="fa fa-list-alt font-weight-bold"> View Events details</i><hr>
		</a>
	</li>
	
	<li class="nav-item ">
		<a class="nav-link " href="view_invition.php">
		<i class="fa fa-list font-weight-bold"> View Invition details</i><hr>
		</a>
	</li>	
	
	<li class="nav-item ">
		<a class="nav-link " href="view_recieve_gifts.php">
		<i class="fa fa-gift font-weight-bold"> View Recieved Gift</i><hr>
		</a>
	</li>
					
	<li class="nav-item ">
		<a class="nav-link " href="view_sent_gifts.php">
		<i class="fa fa-gift font-weight-bold"> View Sent Gift</i><hr>
		</a>
	</li>
	<li class="nav-item ">
		<a class="nav-link" href="profile.php">
		<i class="fa fa-user font-weight-bold"> Profile</i><hr>
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