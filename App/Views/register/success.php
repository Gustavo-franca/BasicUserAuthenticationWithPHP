<style>
  body{
       height: 95vh;
       width: 99vw;
       background-color: #8257E5;
   }
   
    .success{
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
       
    }
    .success h1{
        text-align: center;
        font-weight: 600;
        font-size: 36px;
        line-height: 36px;
        color: #fafafa;
    }
    .success h1 span{

        font-weight: 900;
        color: #04D361;
        text-transform: capitalize;
    }
    a{
        font-size:20px;
        font-weight: 800;
        
    }
</style>


<div class="success">
    <h1>Parabéns <span> <?php echo $viewVar["fistName"]." ".$viewVar["lastName"]?></span> Você foi cadastrado com sucesso!</h1>

    <a href="<?php echo APP_HOST ?>/user/login">Click Aqui para Entrar</a>

</div>