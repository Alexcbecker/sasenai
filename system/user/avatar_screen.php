<html>

<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../../css/avatar_screen.css">
</head>

<body>
	<?php include_once("avatar_screen_database.php"); ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-12">
				<div class="row">
					<div class="col-5">
						<div class="divAvatar">
						<?php foreach($equipedItens as $equips) {?>
							<img class="imgItems" src="../../<?php echo $equips['caminho']?>">
						<?php } ?>
							<img id="imgAvatar-background" class="imgAvatar-background" src="../../images/items/background/bg01.png">
							<img id="imgAvatar-body" class="imgAvatar-body" src="../../images/items/body/body01.png">
							<img id="imgAvatar-feet" class="imgAvatar-feet" src="../../images/items/feet/feet01.png">
							<img id="imgAvatar-legs" class="imgAvatar-legs" src="../../images/items/legs/legs01.png">
							<img id="imgAvatar-torso" class="imgAvatar-torso" src="../../images/items/torso/torso01.png">
							<img id="imgAvatar-hair" class="imgAvatar-hair" src="../../images/items/hair/hair01.png">
							<img id="imgAvatar-headgear" class="imgAvatar-headgear" src="../../images/items/headgear/hg01.png">
							<img id="imgAvatar-accessories" class="imgAvatar-accessories" src="../../images/items/accessories/acc01.png">
						</div>
						<button type="button" class="btn btn-primary saveAvatar">Salvar avatar</button>
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
												<img class="imgItems" src="../../images/items/noimage.png">
											</div>
											<?php foreach($itens as $item) {?>
												<?php if($item['slot'] == 5) {?>
													<div class="box">
														<img class="imgItems" src="../../<?php echo $item['caminho']?>">
													</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<div class="tab-pane fade" id="torso" role="tabpanel" aria-labelledby="torso-tab">
										<div class="wrapperInventory" id="head">
											<div class="box">
												<img class="imgItems" src="../../images/items/noimage.png">
											</div>
											<?php foreach($itens as $item) {?>
												<?php if($item['slot'] == 4) {?>
													<div class="box">
														<img class="imgItems" src="../../<?php echo $item['caminho']?>">
													</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<div class="tab-pane fade" id="legs" role="tabpanel" aria-labelledby="legs-tab">
										<div class="wrapperInventory" id="head">
											<div class="box">
												<img class="imgItems" src="../../images/items/noimage.png">
											</div>
											<?php foreach($itens as $item) {?>
												<?php if($item['slot'] == 3) {?>
													<div class="box">
														<img class="imgItems" src="../../<?php echo $item['caminho']?>">
													</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<div class="tab-pane fade" id="feet" role="tabpanel" aria-labelledby="feet-tab">
										<div class="wrapperInventory" id="head">
											<div class="box">
												<img class="imgItems" src="../../images/items/noimage.png">
											</div>
											<?php foreach($itens as $item) {?>
												<?php if($item['slot'] == 2) {?>
													<div class="box">
														<img class="imgItems" src="../../<?php echo $item['caminho']?>">
													</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<div class="tab-pane fade" id="headgear" role="tabpanel" aria-labelledby="headgear-tab">
										<div class="wrapperInventory" id="head">
											<div class="box">
												<img class="imgItems" src="../../images/items/noimage.png">
											</div>
											<?php foreach($itens as $item) {?>
												<?php if($item['slot'] == 6) {?>
													<div class="box">
														<img class="imgItems" src="../../<?php echo $item['caminho']?>">
													</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<div class="tab-pane fade" id="accessories" role="tabpanel" aria-labelledby="accessories-tab">
										<div class="wrapperInventory" id="head">
											<div class="box">
												<img class="imgItems" src="../../images/items/noimage.png">
											</div>
											<?php foreach($itens as $item) {?>
												<?php if($item['slot'] == 7) {?>
													<div class="box">
														<img class="imgItems" src="../../<?php echo $item['caminho']?>">
													</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<div class="tab-pane fade" id="background" role="tabpanel" aria-labelledby="background-tab">
										<div class="wrapperInventory" id="head">
											<div class="box">
												<img class="imgItems" src="../../images/items/noimage.png">
											</div>
											<?php foreach($itens as $item) {?>
												<?php if($item['slot'] == 0) {?>
													<div class="box">
														<img class="imgItems" src="../../<?php echo $item['caminho']?>">
													</div>
												<?php } ?>
											<?php } ?>
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