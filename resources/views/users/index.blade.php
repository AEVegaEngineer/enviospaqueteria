@extends('layouts.dashboardLayout')

@section('content')

<!-- ======= Alertas ======= -->
@include('alerts.alerts')

<!-- ======= Cta Section ======= -->
  
<section id="listaUsuarios">
  <div class="row mt-3">
    <div class="col-md-10 offset-md-1 col-sm-12">
      <h2 class="form-signin-heading text-center" style="display: inline-block; margin-right: 50px;">Lista de Usuarios</h2>
      <table class="table table-responsive-md" style="font-size: 14px;">
        <thead>
          <th>Email</th>
          <th>Nombre</th>
          <th>CUIT / DNI</th>
          <th>Privilegio</th> 
          <th>Telefono</th>
          <th>Direccion</th>            
          
          <th width="150px">Operaciones</th>
        </thead>

        @foreach($usuarios as $usuario)        
        <tr>
          <td>{{$usuario->email}}</td>
          <!-- Nombre de Usuario -->
          @if($usuario->privilegio == 1)
          	<td>{{$usuario->perNombres}} {{$usuario->perApellidos}}</td>          
          @elseif($usuario->privilegio == 2)
          	<td>{{$usuario->comNombre}}</td>
          @elseif($usuario->privilegio == 3)
          	<td>{{$usuario->shopNombre}}</td>
          @elseif($usuario->privilegio == 4)
          	<td></td>
          @elseif($usuario->privilegio == 5)
          	<td></td>
          @endif
          <!-- CUIT o DNI -->
          @if($usuario->privilegio == 1)
          	<td>{{$usuario->perDni}}</td>          
          @elseif($usuario->privilegio == 2)
          	<td>{{$usuario->comCuit}}</td>
          @elseif($usuario->privilegio == 3)
          	<td>{{$usuario->shopCuit}}</td>
          @elseif($usuario->privilegio == 4)
          	<td></td>
          @elseif($usuario->privilegio == 5)
          	<td></td>
          @endif
          <!-- Privilegio de Usuario -->
          @if($usuario->privilegio == 1)
          	<td>Persona</td>          
          @elseif($usuario->privilegio == 2)
          	<td>Comercio</td>
          @elseif($usuario->privilegio == 3)
          	<td>Shopping</td>
          @elseif($usuario->privilegio == 4)
          	<td>Empleado</td>
          @elseif($usuario->privilegio == 5)
          	<td>Administrador</td>
          @endif
          <td>{{$usuario->usuTelefono}}</td>
          <td>{{$usuario->usuDireccion}}</td>
          
          <td>
          	<div class="btn-group" role="group" aria-label="Operaciones de Usuarios">
						  <button type="button" class="btn btn-info btn-sm">Detalles</button>
						  <button type="button" class="btn btn-primary btn-sm">Editar</button>
						  <button type="button" class="btn btn-danger btn-sm">Eliminar</button>
						</div>   
          	@if($usuario->privilegio != 4 && $usuario->privilegio != 5)
          		<!--<a href="usuario/{{$usuario->id}}" class="btn btn-info btn-sm">Detalles</a>-->
          		<!--<button class="btn btn-info btn-sm" id="detalleUsuario{{$usuario->id}}">Detalles</button>-->
          	@endif
          </td>
        </tr>
        @endforeach
      </table>
      {!!$usuarios->render()!!} 
    </div>
  </div>  
</section>

<!-- End Cta Section -->


</main><!-- End #main -->

<!-- Modal -->
<div id="modalDetalleUsuario" class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detalles del usuario </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>        
      </div>
      <div class="modal-body">
      	<div class="row" id="shoppingRow">
      		<div class="col-12 col-md-6">
      			<b><span>CUIT:</span></b> <span id="shopCuit">asdasd</span>
      		</div>
      		<div class="col-12 col-md-6">
      			<b><span>Nombre de Shopping:</span></b> <span>asdasd</span>
      		</div>

      	</div>
      	<div class="row" id="comercioRow">
      		<div class="col-12 col-md-6">
      			<b><span>CUIT:</span></b> <span id="comCuit">asdasd</span>
      		</div>
      		<div class="col-12 col-md-6">
      			<b><span>Nombre de Comercio:</span></b> <span>asdasd</span>
      		</div>
      		<div class="col-12 col-md-6">
      			<b><span>Afiliado a Shopping:</span></b> <span>No</span>
      		</div>
      	</div>
      	<div class="row" id="personaRow">
      	</div>
      	<div class="row" id="adminRow">
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  

@endsection