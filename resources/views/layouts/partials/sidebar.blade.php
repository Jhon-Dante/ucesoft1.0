<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/escudo.png')}}" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                     <a href="#"><i class="fa fa-circle text-success"></i>{{ Auth::user()->tipo_user }}</a>
                     <!-- {{ trans('adminlte_lang::message.online') }} -->
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
            @if(Auth::user()->tipo_user != 'Representante')
                @if(Auth::user()->pre_re == 'Si')
                    <li><a href=" {{ url('admin/DatosBasicos/create') }} "><i class="fa fa-link"></i>Prenscribir / Inscribir</a></li>
                @endif

                @if(Auth::user()->list_estu == 'Si' || Auth::user()->pre_re == 'Si')
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Estudiantes</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            @if(Auth::user()->list_estu == 'Si')
                                <li><a href=" {{ url('admin/DatosBasicos')        }} ">Lista</a></li>
                            @endif

                            @if(Auth::user()->pre_re == 'Si')
                                <li><a href=" {{ url('admin/DatosBasicos/create') }} ">Inscribir</a></li>
                            @endif

                            @if(Auth::user()->const_estu == 'Si')
                                <li><a href=" {{ url('admin/constancia')          }} ">
                                Constancia de estudios</a></li>
                            @endif

                            @if(Auth::user()->cer_estu == 'Si')
                                <li><a href=" {{ url('admin/constanciaC')         }} ">Certificado de calificaciones</a></li>
                            @endif

                            @if(Auth::user()->titulob_estu == 'Si')
                                <li><a href=" {{ url('admin/tituloB')             }} ">Generar Título de Bachiller</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if(Auth::user()->list_repre == 'Si')
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Representantes</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            @if(Auth::user()->pre_re == 'Si')
                                <li><a href=" {{ url('admin/representantes')        }} ">Lista          </a></li>
                            @endif

                            @if(Auth::user()->pag_mensu == 'Si')
                                <li><a href=" {{ url('admin/mensualidades')         }} ">Mensualidades  </a></li>
                            @endif
                            
                        </ul>
                    </li>
                @endif

                @if(Auth::user()->pag_mensu == 'Si')
                    <li class="treeview">


                        <a href="#"><i class="fa fa-link"></i> <span>Mensualidades</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            @if(Auth::user()->pag_mensu == 'Si')
                                <li><a href="{{ url('admin/mensualidades') }}">Pagar</a></li>
                            @endif

                            @if(Auth::user()->edit_montos == 'Si')
                                <li><a href="{{ url('admin/pagos_monto/create') }}">Crear montos</a></li>
                            @endif

                            @if(Auth::user()->edit_monto_m == 'Si')
                                <li><a href="{{ url('admin/pagos_monto') }}">Montos Matrícula</a></li>
                            @endif
                            
                        </ul>
                        
                    </li>
                @endif

                @if(Auth::user()->tipo_user == 'Administrador(a)')
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Calificaciones</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <!-- <li><a href="{{ url('admin/notas2') }}">Notas</a></li> -->
                            @if(Auth::user()->edit_cali_pre == 'Si')
                                <li><a href="{{ url('admin/calificacionesadmin/1') }}">Educación Preescolar</a></li>
                            @endif

                            @if(Auth::user()->edit_cali_basic == 'Si')
                                <li><a href="{{ url('admin/calificacionesadmin/2') }}">Educación Básica</a></li>
                            @endif

                            @if(Auth::user()->edit_cali_media == 'Si')
                                <li><a href="{{ url('admin/calificacionesadmin/3') }}">Educación Media General</a></li>
                            @endif

                            @if(Auth::user()->edit_notas_final == 'Si')
                                <li><a href="{{ url('admin/notas_finales') }}">Notas finales</a></li>
                            @endif
                                <!-- <li><a href="{{ url('admin/personal_asignatura/buscar_rectificar') }}">Rectificación de Calificación</a></li> -->
                                <!-- flash('MENSUALIDAD COLOCADA COMO SIN PAGAR CON ÉXITO!! Y CORREO DE CONFIRMACIÓN ENVIADO!','success'); -->
                        </ul>
                    </li>
                @endif

                @if(Auth::user()->gen_horario == 'Si')
                    <li class="treeview"><a href=" {{ url('admin/horarios')        }} "><i class="fa fa-link"></i><span>Horarios</span></a> </li>
                @endif
               
               
                @if(Auth::user()->list_perso == 'Si')
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i><span>Personal</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">

                            @if(Auth::user()->list_perso == 'Si')
                                <li><a href=" {{ url('admin/personal')            }} ">Listado de Personal</a></li>
                            @endif

                            @if(Auth::user()->edit_cali_pre == 'Si')
                                <li><a href=" {{ url('admin/personal_asignatura/create') }} ">Asignar Carga Académica</a></li>
                            @endif
                                <!-- <li><a href=" {{ url('admin/personalasignatura/docente_preescolar') }}">Carga Académica de Preescolar</a></li> -->
                            @if(Auth::user()->edit_cali_pre == 'Si')
                                <li><a href=" {{ url('admin/personalasignatura/listado')       }}">Carga Académica de Básica</a></li>
                                <li><a href=" {{ url('admin/personal_asignatura')       }}">Carga Académica de Media G.</a></li>
                            @endif

                            @if(Auth::user()->asig_guia == 'Si')
                                <li><a href=" {{ url('admin/guias') }}">Asignar Docente Guía</a></li>
                            @endif

                            @if(Auth::user()->list_guia == 'Si')
                                <li><a href=" {{ url('admin/personal_asignatura/guias') }}">Listar Guías</a></li>
                            @endif

                        </ul>
                    </li>
                @endif


                </li>
                @if(Auth::user()->list_auditoria == 'Si' || Auth::user()->list_user == 'Si' || Auth::user()->list_asig == 'Si')
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Configuraciones</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <!-- <li><a href=" {{ url('admin/cursos')        }} ">Cursos         </a></li> -->
                            @if(Auth::user()->list_user == 'Si')
                                <li><a href=" {{ url('admin/usuarios')      }} ">Usuarios       </a></li>
                            @endif

                            @if(Auth::user()->list_asig == 'Si')
                                <li><a href=" {{ url('admin/asignaturas')   }} ">Asignaturas    </a></li>
                            @endif

                            @if(Auth::user()->list_auditoria == 'Si')
                                <li><a href=" {{ url('admin/auditoria')     }} ">Auditoría      </a></li>
                            @endif

                            @if(Auth::user()->list_aula == 'Si')
                                <li><a href=" {{ url('admin/aulas')         }} ">Aulas          </a></li>
                            @endif

                            @if(Auth::user()->list_cargo == 'Si')
                                <li><a href=" {{ url('admin/cargos')        }} ">Cargos         </a></li>
                            @endif

                            <!-- @if(Auth::user()->edit_cali_pre == 'Si')
                                <li><a href=" {{ url('admin/remediales')    }} ">Pendientes y remediales</a></li>
                            @endif -->

                            @if(Auth::user()->list_periodo == 'Si')
                                <li><a href=" {{ url('admin/periodos')      }} ">Periodos       </a></li>
                            @endif

                            @if(Auth::user()->res_BD == 'Si')
                                <li><a href=" {{ url('admin/respaldos')      }} ">Respaldar BD   </a></li>
                            @endif

                            @if(Auth::user()->list_seccion == 'Si')
                                <li><a href=" {{ url('admin/secciones')     }} ">Secciones      </a></li>
                            @endif

                            
                            
                        </ul>
                    </li>
                @endif
            @endif
        @if(Auth::user()->tipo_user == 'Docente Preescolar')
        <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Calificaciones</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <!-- <li><a href=" {{ url('admin/calificaciones') }} ">Calificaciones por Período</a></li> -->
                    <li><a href="{{ url('admin/preescolar') }}">Educación Preescolar</a></li>
                    
                </ul>
                
            </li>

            <!-- <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Horarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href=" {{ url('admin/horarios')        }} ">Horario Mañana         </a></li>
                            <li><a href=" {{ url('admin/horario_tarde')        }} ">Horario Tarde          </a></li>
                        </ul>
            </li> -->
           

            
            

        @elseif(Auth::user()->tipo_user == 'Docente Básica')

            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Calificaciones</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <!-- <li><a href=" {{ url('admin/calificaciones') }} ">Calificaciones por Período</a></li> -->
                    <li><a href="{{ url('admin/educacion_basica') }}">Educación Básica</a></li>
                    
                </ul>
                
            </li>

           <!--  <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Horarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href=" {{ url('admin/horarios')        }} ">Horario Mañana         </a></li>
                            <li><a href=" {{ url('admin/horario_tarde')        }} ">Horario Tarde          </a></li>
                        </ul>
            </li> -->
           
    
        @elseif(Auth::user()->tipo_user == 'Docente Media General')

            
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Calificaciones</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href=" {{ url('admin/personal_asignatura/guias') }} ">Secciones Guía</a></li> 
                    <li><a href="{{ url('admin/educacion_media') }}">Educación Media General</a></li>
                    
                </ul>
                
            </li>

           <!--  <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Horarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href=" {{ url('admin/horarios')        }} ">Horario Mañana         </a></li>
                            <li><a href=" {{ url('admin/horario_tarde')        }} ">Horario Tarde          </a></li>
                        </ul>
            </li> -->
        @elseif(Auth::user()->tipo_user == 'Representante')

            <li class="treeview">
                <a href="{{ url('admin/mensualidades') }}"><i class="fa fa-link"></i> <span>Mensualidades</span></a>
            </li>

            <li class="treeview">
                <a href="{{ url('admin/notas')}}"><i class="fa fa-link"></i> <span>Calificaciones</span></a>
            </li>
            <li class="treeview">
                <a href=" {{ url('admin/horarios')        }} "><i class="fa fa-link"></i><span>Horarios</span></a>
            </li>

        @endif
        



        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
