<html>

<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../../css/avatar_screen.css">
</head>

<script>

$(document).ready(function(){
	// $("#removeBg").click(function(){
	// 	if(checkVisibility("#imgAvatar-background")) {
	// 		$("#imgAvatar-background").hide();
	// 	} 
	// });
	// $("#removeFeet").click(function(){
	// 	$("#imgAvatar-feet").hide();
	// });
	// $("#removeLegs").click(function(){
	// 	$("#imgAvatar-legs").hide();
	// });
	// $("#removeTorso").click(function(){
	// 	$("#imgAvatar-torso").hide();
	// });
	// $("#removeHair").click(function(){
	// 	$("#imgAvatar-hair").hide();
	// });
	// $("#removeHeadgear").click(function(){
	// 	$("#imgAvatar-headgear").hide();
	// });
	// $("#removeAccessories").click(function(){
	// 	$("#imgAvatar-accessories").hide();
	// });

	$(".box").click(function(){
		debugger;
		var typeOfRequest = 1;
		var removeId = this.id.substr(2);
		var idItem = this.id.substr(2,10);
		var tipoItem = this.id.substr(0,1);
		var caminhoItem = this.id.substr(13);
		var idAvatar =$(".divAvatar").attr("id");
		if($(this).hasClass("remove")) {
			typeOfRequest = 2;
			idItem = removeId;
			debugger;
		}
		debugger;

		$.ajax({
          url : "avatar_screen_ajax.php",
          type : 'post',
          data : {
                 id : idItem,
                 tipo : tipoItem,
				 caminho : caminhoItem,
				 idAvatar : idAvatar,
				 requestType: typeOfRequest
            },
        })
        .done(function(msg){
			debugger;
			tipoItem = parseInt(tipoItem);
			slot = ".slot" + tipoItem;
			if(msg != "erro") {
				if(msg == "removeItem") {
					$(slot).fadeOut("slow");
  					$(slot).fadeOut(4000);
				} else {
					$(slot).attr('src', msg);
				
					$(slot).fadeIn("slow");
  					$(slot).fadeIn(4000);
				}
			}
			debugger;
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
						<div class="divAvatar" id="<?php echo $equipedItens[0]['avatarid']; ?>">
							<img id="imgAvatar-background" class="imgAvatar-background slot0" src="<?php echo $equipedItens[0]['caminho']?>">
							<img id="imgAvatar-body" class="imgAvatar-body slot1" src="<?php echo $equipedItens[1]['caminho']?>">
							<img id="imgAvatar-feet" class="imgAvatar-feet slot2" src="<?php echo $equipedItens[2]['caminho']?>">
							<img id="imgAvatar-legs" class="imgAvatar-legs slot3" src="<?php echo $equipedItens[3]['caminho']?>">
							<img id="imgAvatar-torso" class="imgAvatar-torso slot4" src="<?php echo $equipedItens[4]['caminho']?>">
							<img id="imgAvatar-hair" class="imgAvatar-hair slot5" src="<?php echo $equipedItens[5]['caminho']?>">
							<img id="imgAvatar-headgear" class="imgAvatar-headgear slot6" src="<?php echo $equipedItens[6]['caminho']?>">
							<img id="imgAvatar-accessories" class="imgAvatar-accessories slot7" src="<?php echo $equipedItens[7]['caminho']?>">
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
										<div class="wrapperInventory" id="hair">
											<div class="box remove" id="5_removeHair">
												<img class="imgItems" src="../../images/items/noimage.png">
											</div>
											<?php foreach($itens as $key=>$item) {?>
												<?php if($item['slot'] == 5) {?>
													<div class="box" id="<?php echo $item['slot'] . "_" . $item['id'] . "_" . $item['caminho'];?>">
														<img class="imgItems" src="<?php echo $item['caminho']?>">
													</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<div class="tab-pane fade" id="torso" role="tabpanel" aria-labelledby="torso-tab">
										<div class="wrapperInventory" id="torso">
											<div class="box remove" id="4_removeTorso">
												<img class="imgItems" src="../../images/items/noimage.png">
											</div>
											<?php foreach($itens as $item) {?>
												<?php if($item['slot'] == 4) {?>
													<div class="box" id="<?php echo $item['slot'] . "_" . $item['id'] . "_" . $item['caminho'];?>">
														<img class="imgItems" src="<?php echo $item['caminho']?>">
													</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<div class="tab-pane fade" id="legs" role="tabpanel" aria-labelledby="legs-tab">
										<div class="wrapperInventory" id="legs">
											<div class="box remove" id="3_removeLegs">
												<img class="imgItems" src="../../images/items/noimage.png">
											</div>
											<?php foreach($itens as $item) {?>
												<?php if($item['slot'] == 3) {?>
													<div class="box" id="<?php echo $item['slot'] . "_" . $item['id'] . "_" . $item['caminho'];?>">
														<img class="imgItems" src="<?php echo $item['caminho']?>">
													</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<div class="tab-pane fade" id="feet" role="tabpanel" aria-labelledby="feet-tab">
										<div class="wrapperInventory" id="feet">
											<div class="box remove" id="2_removeFeet">
												<img class="imgItems" src="../../images/items/noimage.png">
											</div>
											<?php foreach($itens as $item) {?>
												<?php if($item['slot'] == 2) {?>
													<div class="box" id="<?php echo $item['slot'] . "_" . $item['id'] . "_" . $item['caminho'];?>">
														<img class="imgItems" src="<?php echo $item['caminho']?>">
													</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<div class="tab-pane fade" id="headgear" role="tabpanel" aria-labelledby="headgear-tab">
										<div class="wrapperInventory" id="headgear">
											<div class="box remove" id="6_removeHeadgear">
												<img class="imgItems" src="../../images/items/noimage.png">
											</div>
											<?php foreach($itens as $item) {?>
												<?php if($item['slot'] == 6) {?>
													<div class="box" id="<?php echo $item['slot'] . "_" . $item['id'] . "_" . $item['caminho'];?>">
														<img class="imgItems" src="<?php echo $item['caminho']?>">
													</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<div class="tab-pane fade" id="accessories" role="tabpanel" aria-labelledby="accessories-tab">
										<div class="wrapperInventory" id="accessories">
											<div class="box remove" id="7_removeAccessories">
												<img class="imgItems" src="../../images/items/noimage.png">
											</div>
											<?php foreach($itens as $item) {?>
												<?php if($item['slot'] == 7) {?>
													<div class="box" id="<?php echo $item['slot'] . "_" . $item['id'] . "_" . $item['caminho'];?>">
														<img class="imgItems" src="<?php echo $item['caminho']?>">
													</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<div class="tab-pane fade" id="background" role="tabpanel" aria-labelledby="background-tab">
										<div class="wrapperInventory" id="background">
											<div class="box remove" id="0_removeBg">
												<img class="imgItems" src="../../images/items/noimage.png">
											</div>
											<?php foreach($itens as $item) {?>
												<?php if($item['slot'] == 0) {?>
													<div class="box" id="<?php echo $item['slot'] . "_" . $item['id'] . "_" . $item['caminho'];?>">
														<img class="imgItems" src="<?php echo $item['caminho']?>">
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