<div class="header-top-area">
<div class="fixed-header-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="admin-logo logo-wrap-pro">
                    <a href="#"><img src="{{ asset('img/codeTwho.webp') }}" alt="" />
                    </a>
                </div>
            </div>

            <!--no borrar--> <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12"> </div>

            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                <div class="header-right-info">
                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                <span class="admin-name"><?php //echo ucwords($nameUser); ?></span>
                                <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                            </a>
                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                <li><a href="MisDatos.php"><span class="adminpro-icon adminpro-home-admin author-log-ic"></span>Mi Cuenta</a>
                                </li>
                                <li><a href="cerrar.php"><span class="adminpro-icon adminpro-locked author-log-ic"></span>Salir</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>