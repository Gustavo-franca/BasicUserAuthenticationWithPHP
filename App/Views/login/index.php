


<style>
   body{
       height: 100vh;
       width: 100vw;
       background-color: #8257E5;
   }
   
   .login{
      height: 100vh;
       width: 100vw;

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
       
    }
    form h1{
        font-weight: 600;
        font-size: 36px;
        line-height: 36px;
    }
    form{
    display: flex;
    flex-direction: column;
     width: 350px;
     padding: 50px;
     background-color: #E5E5E5;
    }

       
    form .input-group{
        display: flex;
        flex-direction: column;
        padding: 0px;
        margin: 0px;
        margin-top: -18px;
       
    }
    form .input-group label{
        position: relative;
        bottom: -40px;
        left: 10px;
        color: #9C98A6;
       font-size: 18px;
       font-family: 'Times New Roman', Times, serif;
    }

    .in-focus{
        margin-top: 6px !important;
        font-size: 12px !important;
        bottom: -20px !important;
    }
    form .input-group input{
      
        height: 45px;
        padding-top: 5px;
        padding-bottom: 3px;
        padding-left: 10px;
        outline: 0;

        font-size: 18px;
       font-family: 'Times New Roman', Times, serif;

        
        box-shadow: 0;
        border: 0;
    }
 
    form  button{
        height: 56px;
        
        margin-top: 25px;


        background: #04D361;
        border-radius: 8px;

        font-size: 18px;
        color: white;
        cursor: pointer;



        box-shadow: 0;
        border: 0;

    }
    .error{
        margin-top: 25px;
        text-align: center;
        font-size: 16px;
        font-family: 'Times New Roman', Times, serif;
        color: red;
    }
    form p a {
        align-self: flex-end;
        margin-bottom: 0;
        flex: 1;
        font-style: normal;
        font-weight: bold;
        font-size: 16px;
        line-height: 26px;
        color: #554b6e;
    }
    form p a:hover {
        color: #3b3055;
    }
    
</style>
<div class="login">
    <form action="" method="POST">
        <h1>Login</h1>
     
            <div class="input-group">
                <label 
                for="iEmail">Email</label>
                <input
                    type="text"
                    id="iEmail"
                    name="email"
                    value="<?php echo $viewVar["email"]?>"

                >
            </div>

            <div class="input-group">
                <label for="iPassword">Senha</label>
                <input 
                type="password"
                id="iPassword"
                name="password"
                value="<?php echo $viewVar["password"]?>" 
                >
            </div>
            <button type="submit">Enviar</button>
            <div class="error">
                <?php echo $viewVar["message"]?>
            </div>

            <p>Ainda não se cadastrou?<br/>
                <a href="<?php echo APP_HOST ?>/user">Cadastre-se</a>
        
            </p>
    </form>
</div>

<script>
    const inputs = document.querySelectorAll('.input-group input');

    inputs.forEach((input)=>{
        input.addEventListener('blur',handleBlurInput);
        input.addEventListener('focus',handleFocusInput);
    })

    function handleFocusInput(event){
        const {target} = event;
        const inputGroup = target.closest('.input-group');
        const label = inputGroup.querySelector('label');
        label.classList.remove('in-focus');
        label.classList.add('in-focus');
    }

    function handleBlurInput(event){
        const {target} = event;
        console.log(target);
        const inputGroup = target.closest('.input-group');
        const label = inputGroup.querySelector('label');
        if(target.value.length > 0){   
            return;
        }
        label.classList.remove('in-focus');
    }
</script>  