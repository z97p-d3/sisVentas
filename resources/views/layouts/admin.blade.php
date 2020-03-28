<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Go Trade Ventas </title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('css/estilos.css')}}">
	<link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/AdminLTE.css')}}">
	<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
	

</head>

<body class="hold-transition  sidebar-mini">
	<div class="wrapper">

		<header class="main-header">

			<!-- Logo -->
			<a href="{{asset('almacen/indice')}}" class="logo bg-warning">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>G</b>T</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Go Trade</b></span>
			</a>

			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top bg-warning" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
			
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
					
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-green">Online</small>
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
						
							<ul class="dropdown-menu">
								
								<li class="user-header">

									<p>

										<small id="empresa">Go Trade Solutions</small>
									</p>
								</li>



								<!-- Menu Footer-->
								<li class="user-footer">

									<div class="pull-right">
										<a href="{{route('logout')}}" class="btn btn-default btn-flat">Cerrar</a>
									</div>
								</li>
							</ul>
						</li>

					</ul>
				</div>

			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar ">
				<!-- Sidebar user panel -->

				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header"></li>

					<li class="treeview">
						<a href="#">
                <i class="fa fa-laptop"></i>
                <span class="bg-light">Almacén</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
					
						<ul class="treeview-menu bg-light">
							<li><a href="{{url('almacen/articulo')}}"><i class="fa fa-circle-o"></i> Artículos</a>
							</li>
							<li><a href="{{url('almacen/categoria')}}"><i class="fa fa-circle-o"></i> Categorías</a>
							</li>
						</ul>
					</li>

					<li class="treeview bg-light">
						<a href="#">
                <i class="fa fa-th"></i>
                <span class="bg-light">Compras</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
					
						<ul class="treeview-menu bg-light">
							<li><a href="{{url('compras/ingresos')}}"><i class="fa fa-circle-o"></i> Ingresos</a>
							</li>
							<li><a href="{{url('compras/proveedor')}}"><i class="fa fa-circle-o"></i> Proveedores</a>
							</li>
						</ul>
					</li>
					<li class="treeview bg-light">
						<a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span class="bg-light">Ventas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
					
						<ul class="treeview-menu bg-light">
							<li><a href="ventas/venta"><i class="fa fa-circle-o"></i> Ventas</a>
							</li>
							<li><a href="{{url('ventas/cliente')}}"><i class="fa fa-circle-o"></i> Clientes</a>
							</li>
						</ul>
					</li>

					<li class="treeview bg-light">
						<a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span class="bg-light">Reportes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
					
						<ul class="treeview-menu bg-light">
							<li><a href="{{url('almacen/reporte')}}"><i class="fa fa-circle-o"></i> Ventas</a>
							</li>

						</ul>
					</li>




				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>





		<!--Contenido-->
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">

			<!-- Main content -->
			<section class="content">

				<div class="row">
					<div class="col-md-12">
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title h3">Sistema de Ventas</h3>
								<div class="box-tools pull-right">
									<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

									<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
								</div>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="row">
									<div class="col-md-12">
										<!--Contenido-->
										@yield('contenido')
										<!--Fin Contenido-->
									</div>
								</div>

							</div>
						</div>
						<!-- /.row -->
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	</section>
	<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<!--Fin-Contenido-->
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Version</b> 1.0.0
		</div>
		<strong>Copyright &copy; 2019 <a href="">Go Trade</a>.</strong> Derechos Reservados.
	</footer>


	<!-- jQuery 3.3.1 -->
	<script src="{{asset('js/jquery-3.3.1.js')}}"></script>
@stack('script');

	<!-- Bootstrap 3.3.5 -->
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	
	
	
	

	<!-- AdminLTE App -->
	
	
	<script src="{{asset('js/app.min.js')}}"></script>
	<script src="{{asset('js/estilos.js')}}"></script>

	



	<script src="{{asset('js/chart.js')}}"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	
		
</body>
</html>