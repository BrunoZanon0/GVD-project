<?php 
    include_once __DIR__. "/../layouts/style.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - GVD</title>
</head>
<body>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
            <h1 class="text-center display-1">GVD</h1>
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form>
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                    <h1>Cadastramento</h1>
                </div>

                <div class="divider d-flex align-items-center my-4">
                </div>

                <div class="form-outline mb-4">
                    <input type="text" id="nome" class="form-control form-control-lg"
                    placeholder="Nome completo" />
                    <label class="form-label" for="nome">Nome</label>
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

                <div class="form-outline mb-3">
                    <input type="password" id="senha2" class="form-control form-control-lg"
                    placeholder="Confirmar senha" />
                    <label class="form-label" for="senha2">Confirmar Senha</label>
                </div>

                <div class="form-outline mb-3">
                    <input type="number" id="idade" class="form-control form-control-lg"
                    placeholder="Sua idade" />
                    <label class="form-label" for="idade">Idade</label>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                    <button  type="button" class="btn btn-success btn-lg btn_cadastrar"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Cadastrar</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Já possui conta? <a href="../../index.php"
                        class="link-danger">Voltar</a></p>
                </div>
            </form>
        </div>
        </div>
    </div>
</section>
</body>
<script>
    let btn_logar   = $('.btn_cadastrar');

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
        let nome  = $('#nome').val();
        let senha2 = $('#senha2').val();
        let idade = $('#idade').val();

        if(idade <= 0){
            Swal.fire("Erro",'Idade inválida','error');
            return;
        }

        if(senha != senha2){
            Swal.fire("Erro",'Senhas não compativeis','error');
            return;
        }

        $.ajax({
            url:"../action/cadastrar_user_Action.php",
            data:{
                'email' : email,
                'senha' : senha,
                'nome' : nome,
                'idade' : idade
            },
            method: "POST",
            success:function(response){
                Swal.fire("Sucesso",response,'success');
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