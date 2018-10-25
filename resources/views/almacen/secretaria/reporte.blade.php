<!DOCTYPE html>
<html>
	<title>Reporte de Anuncios</title>

<head>

<style>
	table 
	{
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}
	td, th
	{
		border: 1px solid $dddddd;
		text-align: left;
		padding: 8px;
	}
	tr:nth-chield(even) 
	{
		background-color: $dddddd
	}

</style>
</head>
<body>
	<h2>Reporte de Anuncios</h2>
	<table>
		<tr>
					<th>Id</th>
					<th>Titulo</th>
					<th>Region</th>
					<th>Categoria</th>
					<th>Descripcion</th>
					<th>Estado</th>
					<th>Id usuario</th>
					<th>Precio</th>
					<th>Tipo de Anuncio</th>
		</tr>
		@foreach($anuncios as $anun)
		<tr>
			<th>{{$anun->idanuncio}}</th>
			<th>{{$anun->titulo}}</th>
			<th>{{$anun->region}}</th>
			<th>{{$anun->idcategoria}}</th>
			<th>{{$anun->descripcion}}</th>
			<th>{{$anun->estado}}</th>
			<th>{{$anun->idusuario}}</th>
			<th>{{$anun->precio}}</th>
			<th>{{$anun->tipo_anuncio}}</th>
		</tr>
		@endforeach
	</table>
</body>
</html>