
<form action="" method="POST">

    <div class="error">
        <?php echo $viewVar["message"]?>
    </div>
        <div class="input-group">
            <label for="iEmail">Email</label>
            <input 
                type="text"
                id="iEmail"
                name="email"
                value="<?php echo $viewVar["email"]?>"

              >
        </div>

        <div class="input-group">
            <label for="iPassword">Senha</label>
            <input type="password"
            id="iPassword"
            name="password"
            value="<?php echo $viewVar["password"]?>" 
            >
        </div>
        <button type="submit">Enviar</button>
        <a href="<?php echo APP_HOST ?>/user">Cadastre-se</a>
 </form>
