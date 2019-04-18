<html>

<head>
	<meta charset="utf-8">
	<title>Home</title>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	 crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
	 crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
	 crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	 crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../css/avatar_screen.css">
</head>

<body>
	<?php include_once("navbar_usuario.php"); ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-12">
				<div class="row">
					<div class="col-5">
						<div class="divAvatar">
							<img class="imgAvatar-background" src="../../images/items/bg.png">
							<img class="imgAvatar-body" src="../../images/items/body.png">
							<img class="imgAvatar-feet" src="../../images/items/shoes.png">
							<img class="imgAvatar-legs" src="../../images/items/shoes.png">
							<img class="imgAvatar-torso" src="../../images/items/bg.png">
							<img class="imgAvatar-hair" src="../../images/items/body.png">
							<img class="imgAvatar-headgear" src="../../images/items/shoes.png">
							<img class="imgAvatar-accessories" src="../../images/items/shoes.png">
						</div>
					</div>
					<div class="col-7">
						<div class="row">
							<div class="col-12">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="hair-tab" data-toggle="tab" href="#hair" role="tab" aria-controls="hair" aria-selected="true">Cabelos</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="torso-tab" data-toggle="tab" href="#torso" role="tab" aria-controls="torso" aria-selected="false">Torso</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="legs-tab" data-toggle="tab" href="#legs" role="tab" aria-controls="legs" aria-selected="false">Pernas</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="feet-tab" data-toggle="tab" href="#feet" role="tab" aria-controls="feet" aria-selected="false">Pés</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="headgear-tab" data-toggle="tab" href="#headgear" role="tab" aria-controls="headgear" aria-selected="false">Acessórios cabeça</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="accessories-tab" data-toggle="tab" href="#accessories" role="tab" aria-controls="accessories" aria-selected="false">Acessórios gerais</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="background-tab" data-toggle="tab" href="#background" role="tab" aria-controls="background" aria-selected="false">Fundos</a>
									</li>
								</ul>
							</div>
							<div class="col-12">
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="hair" role="tabpanel" aria-labelledby="hair-tab">
										<div class="wrapperInventory" id="head">
											<div class="box">
												<img class="imgItems" src="https://abrilsuperinteressante.files.wordpress.com/2017/02/capa-gatos.png">
											</div>
											<div class="box">
												<img class="imgItems" src="data:image/jpeg;base64,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">
											</div>
											<div class="box">
												<img class="imgItems" src="../../images/items/body.png">
											</div>
											<div class="box">
												<img class="imgItems" src="../../images/items/test.png">
											</div>
											<div class="box">Item 5</div>
											<div class="box">Item 6</div>
											<div class="box">Item 7</div>
											<div class="box">Item 8</div>
											<div class="box">Item 9</div>
										</div>
									</div>
									<div class="tab-pane fade" id="torso" role="tabpanel" aria-labelledby="torso-tab">
										<div class="wrapperInventory" id="head">
											<div class="box">Item 1</div>
											<div class="box">Item 2</div>
											<div class="box">Item 3</div>
											<div class="box">Item 4</div>
											<div class="box">Item 5</div>
											<div class="box">Item 6</div>
											<div class="box">Item 7</div>
											<div class="box">Item 8</div>
											<div class="box">Item 9</div>
										</div>
									</div>
									<div class="tab-pane fade" id="legs" role="tabpanel" aria-labelledby="legs-tab">
										<div class="wrapperInventory" id="head">
											<div class="box">Item 1</div>
											<div class="box">Item 2</div>
											<div class="box">Item 3</div>
											<div class="box">Item 4</div>
											<div class="box">Item 5</div>
											<div class="box">Item 6</div>
											<div class="box">Item 7</div>
											<div class="box">Item 8</div>
											<div class="box">Item 9</div>
										</div>
									</div>
									<div class="tab-pane fade" id="feet" role="tabpanel" aria-labelledby="feet-tab">
										<div class="wrapperInventory" id="head">
											<div class="box">Item 1</div>
											<div class="box">Item 2</div>
											<div class="box">Item 3</div>
											<div class="box">Item 4</div>
											<div class="box">Item 5</div>
											<div class="box">Item 6</div>
											<div class="box">Item 7</div>
											<div class="box">Item 8</div>
											<div class="box">Item 9</div>
										</div>
									</div>
									<div class="tab-pane fade" id="headgear" role="tabpanel" aria-labelledby="headgear-tab">
										<div class="wrapperInventory" id="head">
											<div class="box">Item 1</div>
											<div class="box">Item 2</div>
											<div class="box">Item 3</div>
											<div class="box">Item 4</div>
											<div class="box">Item 5</div>
											<div class="box">Item 6</div>
											<div class="box">Item 7</div>
											<div class="box">Item 8</div>
											<div class="box">Item 9</div>
										</div>
									</div>
									<div class="tab-pane fade" id="accessories" role="tabpanel" aria-labelledby="accessories-tab">
										<div class="wrapperInventory" id="head">
											<div class="box">Item 1</div>
											<div class="box">Item 2</div>
											<div class="box">Item 3</div>
											<div class="box">Item 4</div>
											<div class="box">Item 5</div>
											<div class="box">Item 6</div>
											<div class="box">Item 7</div>
											<div class="box">Item 8</div>
											<div class="box">Item 9</div>
										</div>
									</div>
									<div class="tab-pane fade" id="background" role="tabpanel" aria-labelledby="background-tab">
										<div class="wrapperInventory" id="head">
											<div class="box">Item 1</div>
											<div class="box">Item 2</div>
											<div class="box">Item 3</div>
											<div class="box">Item 4</div>
											<div class="box">Item 5</div>
											<div class="box">Item 6</div>
											<div class="box">Item 7</div>
											<div class="box">Item 8</div>
											<div class="box">Item 9</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-12">
				Rank
				<div class="rank">

				</div>
			</div>
		</div>
	</div>
</body>

</html>