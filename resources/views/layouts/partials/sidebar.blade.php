<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Estudiantes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href=" {{ url('admin/DatosBasicos')        }} ">Lista</a></li>
                    <li><a href=" {{ url('admin/DatosBasicos/create') }} ">Inscribir</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Representantes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href=" {{ url('admin/representantes')        }} ">Lista</a></li>
                    
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Configuraciones</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href=" {{ url('admin/cursos')        }} ">Cursos</a></li>
                    <li><a href=" {{ url('admin/secciones')     }} ">Secciones</a></li>
                    <li><a href=" {{ url('admin/asignaturas')   }} ">Asignaturas</a></li>
                    <li><a href=" {{ url('admin/periodos')      }} ">Periodos</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Administración</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href=" {{ url('admin/personal')         }} ">Personal</li>
                    <li><a href=" {{ url('admin/tipo_pago')        }} ">Tipos de pagos</a></li>
                    <li><a href=" {{ url('admin/deducciones')      }}">Deducciones</a></li>
                    <li><a href=" {{ url('admin/pago_x_cestat')    }}">Pago por Cesta ticket</a></li>
                </ul>
            </li>

            
        
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
