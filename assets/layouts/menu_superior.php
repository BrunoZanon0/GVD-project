<nav class="navbar navbar-expand-lg navbar-light bg-light p-2 w-100">
    <a class="navbar-brand" href="../pages/view_dashboard.php">Sistema GVD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link logout" href="#">Sair</a>
            </li>
        </ul>
    </div>
</nav>

<form class="form_logout_fake" action="../action/logout_user_Action.php" method="POST">

</form>

<script>
    $('.logout').on('click',function(){
        Swal.fire({
                title: "Está certo disso?",
                text: "Você será desconectado do sistema!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sair"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('.form_logout_fake').submit();
                    }
            });
    })
</script>