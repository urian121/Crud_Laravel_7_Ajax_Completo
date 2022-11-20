<div class="left-sidebar-pro">
            <nav id="sidebar">
                <div class="sidebar-header">
                        <img src="{{ asset('img/urian.png') }}" alt="Mi-Perfil" style="width: 100%; max-width:100px;"/>
                    <h3><?php //echo ucwords($nameUser); ?></h3>
                    <strong>P</strong>
                </div>
                <div class="left-custom-menu-adp-wrap">
                    <ul class="nav navbar-nav left-sidebar-menu-pro">
                        <li class="nav-item">
                            <a href="{{ URL::previous() }}" role="button" class="nav-link dropdown-toggle">
                                <i class="fa big-icon fa-home"></i> <span class="mini-dn">Inicio</span> 
                                <span class="indicator-right-menu mini-dn"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('vistaRegistrar') }}" role="button" class="nav-link dropdown-toggle">
                                <i class="fa big-icon fa-home"></i> <span class="mini-dn">Profesor</span> 
                                <span class="indicator-right-menu mini-dn"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                            <i class="fa big-icon fa-bar-chart-o"></i> <span class="mini-dn">Profesores</span>
                             <span class="indicator-right-menu mini-dn">
                                 <i class="fa indicator-mn fa-angle-left"></i>
                                </span>
                            </a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                <a href="{{ route('Profesores') }}" class="dropdown-item">Profesores</a>
                                <a href="data-table.html" class="dropdown-item">Data Table</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                <i class="fa big-icon fa-pie-chart"></i> <span class="mini-dn">Chicos</span>
                                <span class="indicator-right-menu mini-dn">
                                    <i class="fa indicator-mn fa-angle-left"></i>
                                </span>
                            </a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                <a href="{{ route('saveBoy') }}" class="dropdown-item" title="Nuevas Ofertas">Nuevo Chico</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                <i class="fa big-icon fa-flask"></i> <span class="mini-dn">Ofertas</span> 
                                <span class="indicator-right-menu mini-dn">
                                    <i class="fa indicator-mn fa-angle-left"></i>
                                </span>
                            </a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                <a href="OfertasNuevas.php" class="dropdown-item" title="Nuevas Ofertas">Nuevas</a>
                                <a href="profile.html" class="dropdown-item">En Proceso</a>
                            </div>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                            <i class="fa big-icon fa-desktop"></i> <span class="mini-dn">Tablero</span>
                             <span class="indicator-right-menu mini-dn">
                                 <i class="fa indicator-mn fa-angle-left"></i>
                                </span>
                            </a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                <a href="static-table.html" class="dropdown-item">Static Table</a>
                                <a href="data-table.html" class="dropdown-item">Data Table</a>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </div>