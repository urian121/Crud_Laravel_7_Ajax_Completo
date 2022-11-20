@extends('home.home')
@section('title', 'Detalles')
@section('cuerpo')

<!-- Breadcome End-->
<div class="user-profile-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
                <div class="sparkline13-hd"  >
                    <a href="{{ url('/Profesores') }}" title="Volver" title="Volver">
                        <i class="zmdi zmdi-mail-reply" ></i> <!---boton volver-->
                    </a>
                </div>
                
                <div class="user-profile-wrap shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="user-profile-img">
                                        <img src="/fotos/FotoProfesores/{{ $Profe->foto }}" alt="Foto-Perfil">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="user-profile-content">
                                        <h2>Nombre: {{ ($Profe->nombre) }}</h2>
                                        <p class="profile-founder">
                                            <strong>Profesión: </strong> {{ ($Profe->profesion) }}
                                        </p>
                                        <p class="profile-des">
                                          <strong>Direccion:</strong>
                                            {{ ($Profe->direccion) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="user-profile-social-list">
                                <table class="table small m-b-xs">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong>Edad</strong> {{ ($Profe->edad) }}
                                            </td>
                                            <td>
                                                <strong>Teléfono</strong> {{ ($Profe->telefono) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="analytics-sparkle-line user-profile-sparkline">
                                <div class="analytics-content">
                                    <h5>Telefono</h5>
                                    <h2 class="counter">{{ ($Profe->telefono) }}</h2>
                                    <div id="sparkline22"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection