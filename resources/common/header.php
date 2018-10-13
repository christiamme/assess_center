      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="../../index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">AES</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Assessment Center</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
			  <!-- Notifications: style can be found in dropdown.less -->
			  <li id="notifications-menu" class="dropdown notifications-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				  <i class="fa fa-bell-o"></i>
				  <span class="label label-warning" style="display:none" >0</span>
				</a>
				<ul class="dropdown-menu">
				  <li class="header">Tienes 0 notificaciones</li>
				  <li>
					<!-- inner menu: contains the actual data -->
					<ul id="noti_stack" class="menu">
					  <li class="noti" style="display:none; margin: ">
						<a href="#">
						  <i class="fa "></i>
						  <p style="margin: auto auto 0px 21px; font-size:11px"> 2016-05-04 12:00:00 </p>
						</a>
					  </li>
					</ul>
				  </li>
				  <li class="footer"><a href="../noti/noti-lista.php">Ver Todas</a></li>
				</ul>
			  </li>
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="../../vendors/theme/img/avatar2.png" class="user-image" alt="User Image" id="userimage">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs" id="username"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="../../vendors/theme/img/avatar2.png" class="img-circle" alt="User Image" id="avatar_header">
                    <p id="nombre_header">
                      Nombre<br /><small>Correo</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!--<li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <!-- div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div -->
                    <div class="pull-right">
                      <button class="btn btn-danger" id="signOut"><i class="fa fa-sign-out"></i> Salir</button>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
