@extends('layouts.profile')

@section('title')
<title>Tabla de usuarios</title>
@endsection

@section('extra-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="col-md-12">
	<div class="card card-stats mb-4 mb-lg-0">
		<div class="card-body">
			<div class="row">
				<div class="col-md-12 px-4 py-4">
					<div class="row d-flex justify-content-center my-2">
						<h2>Tabla de usuarios</h2>
					</div>
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table align-items-center" id="usersTable">
								<thead class="thead-light">
									<tr>
										<th scope="col">
											Nombre
										</th>
										<th scope="col">
											Correo electrónico
										</th>
										<th scope="col">
											Verificado
										</th>
										<th scope="col">
											Acciones
										</th>
									</tr>
								</thead>
								<tbody class="list">
									@foreach ($users as $user)
									<tr>
										<td scope="row" class="name">
											<div class="media align-items-center">
												<a href="#" class="avatar rounded-circle mr-3">
													<img alt="Image placeholder" src="{{ asset('images/'.$user->image) }}">
												</a>
												<div class="media-body">
													<span class="mb-0 text-sm">{{ $user->name }}</span>
												</div>
											</div>
										</td>
										<td>
											{{ $user->email }}
										</td>
										<td class="status">
											<span class="badge badge-dot mr-4">
												@if ($user->email_verified_at)
												<i class="bg-success"></i> Verificado
												@else
												<i class="bg-warning"></i> Pendiente
												@endif
											</span>
										</td>
										<td class="text-right">
											<div class="dropdown">
												<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="fas fa-ellipsis-v"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
													<a class="dropdown-item" href="#">Action</a>
													<a class="dropdown-item" href="#">Another action</a>
													<a class="dropdown-item" href="#">Something else here</a>
												</div>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('extra-js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
	$(document).ready(function() {
		$('#usersTable').DataTable({
			"language":{
				"sProcessing":     "Procesando...",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla =(",
				"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix":    "",
				"sSearch":         "Buscar:",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     ">",
					"sPrevious": "<"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				},
				"buttons": {
					"copy": "Copiar",
					"colvis": "Visibilidad"
				}
			}
		});
	} );
</script>
@endsection