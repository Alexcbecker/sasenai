<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




    <link rel="stylesheet" href="../../../css/style_base_cadastro_editar.css">



    <script>

        $(document).ready(function () {
            $('.custom-file-input').on('change', function () {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });

        });

    </script>

</head>

<body>

    <?php include_once("../navbar.php"); ?>
    <div class="container">

        <div class="borda" style=" margin-top:3%;">
            <form action="upload_imagem.php" method="post" enctype="multipart/form-data">
                <h1>Cadastro de Itens</h1>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nome do item</label>
                    <input type="text" class="form-control" name="nomeItemDigital" id="nomeItemDigital">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Valor do item</label>
                    <input type="number" class="form-control" name="valorItemDigital" id="valorItemDigital">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Adicionar imagem</label>
                    <div class="custom-file" id="customFile" lang="es">
                        <input type="file" accept="image/x-png,image/jpeg" name="imagemItemDigital" class="custom-file-input" id="validatedCustomFile" required>
                        <label class="custom-file-label text-truncate"  for="validatedCustomFile">Adicionar imagem...</label>

                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-md">Cadastrar item</button>
                    <button type="button" class="btn btn-primary btn-md">Cancelar</button>

                </div>

            </form>
        </div>

    </div>




</body>

</html>
