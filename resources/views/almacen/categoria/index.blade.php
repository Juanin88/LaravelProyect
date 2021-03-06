@extends ('layouts.admin')
@section('contenido')
	
	
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Categor&iacute;as 
				<a href="categoria/create"><button class="btn">Nuevo</button></a>
			</h3>
			@include('almacen.categoria.search')
		</div>
	</div>
	
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<div class="table-responsive">
		<table class='table table-striped'>
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Descripci&oacute;n</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($categorias as $cat)
				<tr>
					<td>{{ $cat->idcategoria }}</td>
					<td>{{ $cat->nombre }}</td>
					<td>{{ $cat->descripcion }}</td>
					<td>
						<a href="">
							<button class="btn btn-info">Editar</button>	
						</a>
						<a href="">
							<button class="btn btn-info">Eliminar</button>	
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		
		</div>
		{{ $categorias->render() }}
	</div>
</div>
	
	
@endsection