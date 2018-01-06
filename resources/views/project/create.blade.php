<!DOCTYPE html>
<html>

<head>
	<link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ secure_asset('css/styles.min.css') }}" rel="stylesheet">
</head>

<body>
	<div class="container">
		<h1>Adicionar um projeto</h1>
		<div class="col-md-5">
			<form action="/api/projects" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="projectTitle">Nome do projeto</label>
					<input type="text" name="title" class="form-control" id="projectTitle">
				</div>
				<div class="form-group">
					<label for="technologies">Tecnologias utilizadas</label>
					<textarea name="technologies" class="form-control" id="technologies" rows="3"></textarea>
					<small class="form-text text-muted">Separar com vírgula.</small>
				</div>
				<div class="form-group">
					<label for="description">Descrição</label>
					<textarea name="description" class="form-control" id="description" rows="3"></textarea>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
			</form>
		</div>
	</div>
</body>

</html>