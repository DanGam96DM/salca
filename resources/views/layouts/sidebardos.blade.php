<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li> 
            <li>
              <a href="{{URL::action('BotonController@index')}}">
                <i class="fa fa-microchip"></i> 
                <span>Alarmas</span>
              </a>
            </li>        
            <li>
              <a href="{{URL::action('MensajeController@index')}}">
                <i class="fa fa-envelope"></i> 
                <span>Mensajes</span>
              </a>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-book"></i> <span>Manual</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Creditos</span>
                <small class="label pull-right bg-yellow">NICOTEAM</small>
              </a>
            </li>
                        
          </ul>
</section>
        <!-- /.sidebar -->