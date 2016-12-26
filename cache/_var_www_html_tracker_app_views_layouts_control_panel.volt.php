

<div id="page-wrapper">
	<div id="headerbar">
		<div id="header-nav-left" class="pull-left">
			<h3>Jracker</h3>
		</div>
		<div id="header-nav-right" class="pull-right">
			<div class="dropdown cloud">
				<div class="rect rect-lg hollow">
					<span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> 
				</div>
			</div>
			<div class="dropdown user-account">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<div class="round round-lg">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
				</div>
				</a>
				<ul class="dropdown-menu dropdown-menu-right">
				    <li><a href="#"> Edit</a></li>
				    <li><a href="#"> Delete</a></li>
				    <li><a href="#"> Ban</a></li>
				    <li class="divider"></li>
				    <li><a href="#"> Make admin</a></li>
			  	</ul>
			</div>
		</div>
	</div>

	<div id="sidebar">
		<div class="sidebar-menu">
			<ul class="sidebar-nav">
				<li class="header"><span>Overview</span></li>
				<li><a>Home</a></li>
				<li><a>Transactions</a></li>
				<li><a>Income</a></li>
				<li><a>Expense</a></li>
			</ul>
		</div>
	</div>

	<div id="content">
	<?= $this->getContent() ?>
	</div>
</div>