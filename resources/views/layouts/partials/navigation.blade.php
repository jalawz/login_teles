<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#navbar"
				aria-expanded="false">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ route('home') }}">Teles Lojas Web</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse"
			id="navbar">
			<ul class="nav navbar-nav">

			</ul>

			<ul class="nav navbar-nav navbar-right">
				@if (Auth::check())
					<li><a href="#"></a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">{{ Auth()->user()->getFirstNameOrUsername() }} <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/perfil/{{Auth()->user()->getId()}}">Editar Perfil</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="{{ route('auth.signout') }}">Logout</a></li>
						</ul></li>
				@else
					<li><a href="{{ route('auth.signup') }}">Registrar</a></li>
					<li><a href="{{ route('auth.signin') }}">Login</a></li>
				@endif
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
