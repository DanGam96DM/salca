<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Personas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::action('PersonaController@index')}}"><i class="fa fa-user-circle"></i> Personas</a></li>
                <li><a href="{{URL::action('RolController@index')}}"><i class="fa fa-address-card"></i> Roles</a></li>
              </ul>
            </li>
            <li>
              <a href="{{URL::action('BotonController@index')}}">
                <i class="fa fa-microchip"></i> 
                <span>Alarmas</span>
              </a>
            </li>    
            <li>
              <a href="{{URL::action('EmergenciaController@index')}}">
                <i class="fa fa-plus-square"></i> 
                <span>Emergencias</span>
              </a>
            </li>
            <li>
              <a href="{{URL::action('BitacoraController@index')}}">
                <i class="fa fa-database"></i> 
                <span>Bitácoras</span>
              </a>
            </li>
            <li>
              <a href="{{URL::action('MensajeController@index')}}">
                <i class="fa fa-envelope"></i> 
                <span>Mensajes</span>
              </a>
            </li>
            <li>
              <a href="{{URL::action('RadioController@index')}}">
                <i class="fa fa-wifi"></i> 
                <span>Radios</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-address-book"></i> <span>Privilegios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li class="treeview"><a href="{{URL::action('UserController@index')}}"><i class="fa fa-users"></i> Usuarios</a></li>
              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-book"></i> <span>Manual</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="{{URL::action('CreditosController@index')}}">
                <i class="fa fa-info-circle"></i> <span>Creditos</span>
                <small class="label pull-right bg-yellow">NICOTEAM</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->