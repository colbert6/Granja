<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>FISI-UNSM</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?= base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?= base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?= base_url(); ?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?= base_url(); ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?= base_url(); ?>index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                FISI
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url();?>img/avatar04.png" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li><!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url();?>img/avatar04.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url();?>img/avatar04.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url();?>img/avatar04.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url();?>img/avatar04.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Jane Doe <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?= base_url();?>img/avatar04.png" class="img-circle" alt="User Image" />
                                    <p>
                                        Jane Doe - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
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
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?= base_url();?>img/avatar04.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Jane</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?= base_url(); ?>index.php">
                                <i class="fa fa-dashboard"></i> <span>Inicio</span>
                            </a>
                        </li>
                       
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-wrench"></i> <span>Mantenimiento</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url(); ?>index.php/animales/"><i class="fa fa-angle-double-right"></i> Registros</a></li>
                                <li><a href="<?= base_url(); ?>index.php/razas/"><i class="fa fa-angle-double-right"></i> Razas</a></li>
                                <li><a href="<?= base_url(); ?>index.php/tipo_registro/"><i class="fa fa-angle-double-right"></i> Tipos de Registros</a></li>   
                                <li><a href="<?= base_url(); ?>index.php/tipo_evento/"><i class="fa fa-angle-double-right"></i> Medicacion</a></li>
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Medicamentos</a></li> 
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Medicina Genital</a></li> 
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Medicina Cuarto Mamarios</a></li>
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Personal</a></li>  
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Reproductor</a></li> 
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Tipo Analisis</a></li>
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Tipo Enfermedad</a></li> 
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Tipo Parto</a></li>  
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Tipo Servicio</a></li> 
                                                               
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-building-o"></i> <span>Evento</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Aborto</a></li>
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Analisis</a></li>
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Causa Aborto</a></li>   
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Causa no Inseminal</a></li>
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Causa Rechazo</a></li> 
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Celo</a></li>  
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Diagnostico Utero</a></li> 
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Enfermedad</a></li> 
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Enfermedad Ovario</a></li>
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Enfermedad Utero</a></li> 
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Especificacion Muerte</a></li>   
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Especificacion Venta</a></li> 
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Estado Cria</a></li> 
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Indicaciones Especiales</a></li> 
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Medicacion</a></li> 
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Muerte</a></li> 
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Parto</a></li> 
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Resultado  Analisis</a></li>
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> servicio</a></li>  
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Tacto Rectal</a></li>
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Venta</a></li> 
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Via Aplicacion</a></li>  
                                <li><a href="<?= base_url(); ?>index/"><i class="fa fa-angle-double-right"></i> Secado</a></li> 
                            </ul>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>index.php/calendario">
                                <i class="fa fa-calendar"></i> <span>Calendario</span>
                                <small class="badge pull-right bg-red"><!--3--></small>
                            </a>
                        </li>
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?=@ $titulo ?>
                        <small> </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                