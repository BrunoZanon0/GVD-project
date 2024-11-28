<?php 
    include_once __DIR__. "/assets/layouts/style.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GVD</title>
</head>
<body>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form>
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                    <h1>Login</h1>
                </div>

                <div class="divider d-flex align-items-center my-4">
                </div>

                <div class="form-outline mb-4">
                    <input type="email" id="email" class="form-control form-control-lg"
                    placeholder="Email completo" />
                    <label class="form-label" for="email">Email</label>
                </div>

                <div class="form-outline mb-3">
                    <input type="password" id="senha" class="form-control form-control-lg"
                    placeholder="Senha de acesso" />
                    <label class="form-label" for="senha">Senha</label>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                    <button  type="button" class="btn btn-success btn-lg btn_entrar"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Entrar</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Não possui conta? <a href="./assets/pages/cadastro_new_user.php"
                        class="link-danger">Criar</a></p>
                </div>
            </form>
        </div>
        <div class="col-md-9 col-lg-6 col-xl-5">
            <h1 class="text-center display-1">GVD</h1>
        </div>
        </div>
    </div>
</section>
</body>
<script>
    let btn_logar   = $('.btn_entrar');

    btn_logar.on('click', async function(){
        
        let valida = true;

        $('form input').each(function() {
            if ($(this).val() == '') {
                $(this).css('border', '1px solid red');
                valida = false;
            } else {
                $(this).css('border', '');
            }
        });

        if(!valida) return;

        let email = $('#email').val();
        let senha = $('#senha').val();

        $.ajax({
            url:"assets/controller/loginController.php",
            data:{
                'email' : email,
                'senha' : senha,
            },
            method: "POST",
            success:function(response){
                window.location.href = "./assets/pages/view_dashboard.php";
            },
            error:function(error){
                if(error.status == 400){
                    Swal.fire('Erro',error.responseText,'error');
                    return;
                }
            }
        })    

    })
</script>
</html>