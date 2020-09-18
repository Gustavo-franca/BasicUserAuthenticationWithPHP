<style>
  body{
       height: 95vh;
       width: 99vw;
       background-color: #8257E5;
   }
   
    .error{
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
       
    }
    .error h1{
        text-align: center;
        font-weight: 600;
        font-size: 36px;
        line-height: 36px;
        color: #fdfdfd;
    }
    .error h2{
        text-align: center;
        font-weight: 600;
        font-size: 36px;
        line-height: 36px;
        color: #fdfdfd;
        font-weight: 900;

    }
    .error div {
        display:flex;
        flex-direction: row;
        justify-content:center;
        align-items:center;
    }
    a{
        width: 150px;
        height:50px;

        margin-right:50px;
        text-align:center;
        line-height: 50px;

        text-decoration:none;
        font-size:20px;
        font-weight: 800;
       
        margin-top: 25px;
        background: #04D361;
        border-radius: 8px;
        font-size: 18px;
        color: white;
        cursor: pointer;
        box-shadow: 0;
        border: 0;
    }
    .blue{
        background-color: blue;
    }
</style>


<div class="error">
    <h1>Opa você não tem Permissão para acessar essa página! 😢</h1>
    <h2> Tente fazer o login ou se cadastrar para poder acessar 😃</h2>
    <div>
        <a href="<?php echo APP_HOST ?>/user/login  ">Login</a>
        <a class="blue"href="<?php echo APP_HOST ?>/user">Cadastre-se</a>
    </div>


</div>