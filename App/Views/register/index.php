
<form action="" method="POST">
        <div class="input-group">
            <label for="iFistName"
              >
             Nome
            </label>
            <input type="text"
            id="iFistName"
            name="fistName"
            value="<?php echo $viewVar["fistName"]?>"
              >
        </div>
        <div class="input-group">
            <label for="iLastName">Sobrenome</label>
            <input 
            type="text"
            id="iLastName"
            name="lastName"
            value="<?php echo $viewVar["lastName"]?>"
            >
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

        <div class="input-group">
            <label for="iBirthday">Dia de Nascimento</label>
            <input type="date"
                id="iBirthday"
                name="birthday"
                value="<?php echo $viewVar["birthday"]?>"
            >
        </div>
        <div class="input-group">
            <label for="iBio">Nome</label>
            <textarea id="iBio"
                name="bio"
                rows="4" 
                cols="50"
                
              ><?php echo $viewVar["bio"]?>
            </textarea>
        </div>
        <button type="submit">Enviar</button>
 </form>
