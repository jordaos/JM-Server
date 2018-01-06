<!DOCTYPE html>
<html>

<head>
	<link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ secure_asset('css/styles.min.css') }}" rel="stylesheet">
</head>

<body>
	<div class="container">
		<h1>Adicionar uma imagem a um projeto</h1>
		<div class="col-md-5">
			<form action="/api/images" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleSelect1">Projeto</label>
					<select class="form-control" id="exampleSelect1" name="project_id">
						<option>Selecione</option>
						@foreach ($projects as $project)
						<option value="{{ $project->id }}">{{ $project->title }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="portugueseDescription">Descrição em
						<b>português</b>
					</label>
					<textarea name="pt_description" class="form-control" id="portugueseDescription" rows="3"></textarea>
				</div>
				<div class="form-group">
					<label for="inglishDescription">Descrição em
						<b>inglês</b>
					</label>
					<textarea name="en_description" class="form-control" id="inglishDescription" rows="3"></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputFile">Imagem</label>
					<input type="file" name="filefield" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
				</div>
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
			</form>
		</div>
	</div>
</body>

</html>