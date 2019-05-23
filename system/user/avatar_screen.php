<html>

<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../../css/avatar_screen.css">
</head>

<script>

$(document).ready(function(){
	$("#removeBg").click(function(){
		if(checkVisibility("#imgAvatar-background")) {
			$("#imgAvatar-background").hide();
		} 
	});
	$("#removeFeet").click(function(){
		$("#imgAvatar-feet").hide();
	});
	$("#removeLegs").click(function(){
		$("#imgAvatar-legs").hide();
	});
	$("#removeTorso").click(function(){
		$("#imgAvatar-torso").hide();
	});
	$("#removeHair").click(function(){
		$("#imgAvatar-hair").hide();
	});
	$("#removeHeadgear").click(function(){
		$("#imgAvatar-headgear").hide();
	});
	$("#removeAccessories").click(function(){
		$("#imgAvatar-accessories").hide();
	});

	$(".box").click(function(){
		debugger;
		var idItem = this.id.substr(2);
		var tipoItem = this.id.substr(0,1);





		$.ajax({
          url : "avatar_screen_ajax.php",
          type : 'post',
          data : {
                 id : idItem,
                 tipo : tipoItem
            },
        })
        .done(function(msg){
        })
        .fail(function(jqXHR, textStatus, msg){
            alert(msg);
        }); 
	});
})

function checkVisibility($param) {
   return $($param).is(':visible');
}
</script>

<body>
	<?php include_once("avatar_screen_database.php");?>
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-12">
				<div class="row">
					<div class="col-5">
						<div class="divAvatar">
							<img id="imgAvatar-background" class="imgAvatar-background" src="../../<?php echo $equipedItens[0]['caminho']?>">
							<img id="imgAvatar-body" class="imgAvatar-body" src="../../<?php echo $equipedItens[1]['caminho']?>">
							<img id="imgAvatar-feet" class="imgAvatar-feet" src="../../<?php echo $equipedItens[2]['caminho']?>">
							<img id="imgAvatar-legs" class="imgAvatar-legs" src="../../<?php echo $equipedItens[3]['caminho']?>">
							<img id="imgAvatar-torso" class="imgAvatar-torso" src="../../<?php echo $equipedItens[4]['caminho']?>">
							<img id="imgAvatar-hair" class="imgAvatar-hair" src="../../<?php echo $equipedItens[5]['caminho']?>">
							<img id="imgAvatar-headgear" class="imgAvatar-headgear" src="../../<?php echo $equipedItens[6]['caminho']?>">
							<img id="imgAvatar-accessories" class="imgAvatar-accessories" src="../../<?php echo $equipedItens[7]['caminho']?>">
						</div>
						<!-- <button type="button" class="btn btn-primary saveAvatar">Salvar avatar</button> -->
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
										<div class="wrapperInventory" id="hair">
											<div class="box" id="removeHair">
												<img class="imgItems" src="../../images/items/noimage.png">
											</div>
											<?php foreach($itens as $key=>$item) {?>
												<?php if($item['slot'] == 5) {?>
													<div class="box" id="<?php echo $item['slot'] . "_" . $item["id"];?>">
														<img class="imgItems" src="../../<?php echo $item['caminho']?>">
													</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<div class="tab-pane fade" id="torso" role="tabpanel" aria-labelledby="torso-tab">
										<div class="wrapperInventory" id="torso">
											<div class="box" id="removeTorso">
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
										<div class="wrapperInventory" id="legs">
											<div class="box" id="removeLegs">
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
										<div class="wrapperInventory" id="feet">
											<div class="box" id="removeFeet">
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
										<div class="wrapperInventory" id="headgear">
											<div class="box" id="removeHeadgear">
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
										<div class="wrapperInventory" id="accessories">
											<div class="box" id="removeAccessories">
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
										<div class="wrapperInventory" id="background">
											<div class="box" id="removeBg">
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