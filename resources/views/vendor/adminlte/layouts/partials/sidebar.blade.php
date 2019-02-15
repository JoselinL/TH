<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="img/perfil.png" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->nombres }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i>En linea</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <!-- <li class="treeview">
                <a href="#"><i class='fa fa-tachometer'></i> <span>DASHBOARD</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class='fa fa-bar-chart-o'></i>Dashboard HelpDesk</a></li>
                    <li><a href="#">Dashboard Peticiones</a></li>
                    <li><a href="#">Dashboard SLA</a></li>
                    <li><a href="#">Dashboard Prioridad</a></li>

                </ul>
            </li> -->
            
            <!-- <li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-list-alt'></i> <span>INVENTARIO</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/dispositivos') }}">Dispositivos</a></li>
                    <li><a href="#">Asignar Dispositivos</a></li>
                </ul> 
            </li> -->
  
  

                @if(Auth::user()->tipoUsuario_id=='1' || Auth::user()->tipoUsuario_id=='3' || Auth::user()->tipoUsuario_id=='4')
            <li class="treeview">
                <a href="#"><i class='fa  fa-folder-open'></i> <span>REGISTRO USUARIO</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">

                    <li><a href="{{ url('/usuario') }}"><i class='fa fa-user-plus'></i>Usuario</a></li>

                    <li><a href="{{ url('/tipousuario') }}"><i class='fa fa-user'></i>Tipo de Usuario</a></li>
                   
                </ul>
                 @endif
            </li>



            <li class="treeview">
                <a href="#"><i class='fa fa-file-text'></i> <span>HOJA DE VIDA</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
               
                    <li><a href="{{ url('/historial') }}"><i class='fa fa-file-text'></i>Historial</a></li>

                </ul>
            </li>


            <li class="treeview">
                <a href="#"><i class='fa fa-folder-open'></i> <span>REGISTRO</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Gestiones</a></li>

                    @if(Auth::user()->tipoUsuario_id=='1' || Auth::user()->tipoUsuario_id=='3' || Auth::user()->tipoUsuario_id=='4')


                    <li><a href="{{ url('/periodo') }}"><i class='fa fa-calendar '></i>Periodo</a></li>

                    <li><a href="{{ url('/marcacion') }}"><i class='fa fa-clock-o '></i>Marcación</a></li>


                    <li><a href="{{ url('/periodopersona') }}"><i class='fa fa-briefcase'></i>Periodo Persona</a></li>


                    <li><a href="{{ url('/vacacionperiodo') }}"><i class='fa fa-briefcase'></i>Periodo de Vacaciones</a></li>

                    <li><a href="{{ url('/tipocapacitacion') }}"><i class='fa fa-file-text'></i>Tipo Capacitación</a></li>

                     @endif
                     
                    <li><a href="{{ url('/capacitacion') }}"><i class='fa fa-file-text'></i>Capacitación</a></li>

                    <li><a href="{{ url('/permiso') }}"><i class='fa fa-pencil-square'></i>Permiso</a></li>

                    <li><a href="{{ url('/vacaciones') }}"><i class='fa fa-briefcase'></i>Vacaciones</a></li>
                </ul>
            </li>



            <li class="treeview">

                <a href="#"><i class='fa fa-clipboard'></i> <span>PERMISOS</span> <i class="fa fa-angle-left pull-right"></i></a>
               
                <ul class="treeview-menu">

                    @if(Auth::user()->tipoUsuario_id=='1' || Auth::user()->tipoUsuario_id=='3' || Auth::user()->tipoUsuario_id=='4')

                    <li><a href="{{ url('/permisosgenerales') }}"><i class='fa fa-pencil-square'></i>Permisos Generales</a></li>

                     @endif

                    <li><a href="{{ url('/mispermisos') }}"><i class='fa fa-pencil-square'></i>Mis Permisos</a></li>
                </ul>
            </li>




            <li class="treeview">

                <a href="#"><i class='fa fa-clipboard'></i> <span>VACACIONES</span> <i class="fa fa-angle-left pull-right"></i></a>
               
                <ul class="treeview-menu">

                    @if(Auth::user()->tipoUsuario_id=='1' || Auth::user()->tipoUsuario_id=='3' || Auth::user()->tipoUsuario_id=='4')

                    <li><a href="{{ url('/vacacionesgenerales') }}"><i class='fa fa-pencil-square'></i>Vacaciones Generales</a></li>

                     @endif

                    <li><a href="{{ url('/misvacaciones') }}"><i class='fa fa-pencil-square'></i>Mis Vacaciones</a></li>
                </ul>
            </li>


            @if(Auth::user()->tipoUsuario_id=='1' || Auth::user()->tipoUsuario_id=='3' || Auth::user()->tipoUsuario_id=='4')
            <li class="treeview">
                <a href="#"><i class='fa fa-file-text'></i> <span>INFORME USUARIOS</span> <i class="fa fa-angle-left pull-right"></i></a>

                <ul class="treeview-menu">
                    <li><a href="{{ url('/listarUsuarios') }}"><i class="fa fa-eye"></i>Ver Informe</a></li>

                    <li><a href="{{ url('/listadousuarios') }}"><i class="fa fa-download"></i> Descargar Informe</a></li>
                </ul>
            @endif
            </li>



            <li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-list-alt'></i> <span>INFORME DE NOMINAS</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    
                    <li><a href="{{ url('/nomina') }}"><i class='fa fa-eye'></i>Ver Informe</a></li>


                </ul>
            </li>




            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
