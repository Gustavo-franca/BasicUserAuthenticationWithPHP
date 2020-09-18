<style>
    body{
       height: 95vh;
       width: 99vw;
       background-color: #8257E5;
   }
   
   .register{
       height: 100%;
       width: 100%;

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
       
    }
    form h1{
        text-align: center;
        font-weight: 600;
        font-size: 36px;
        line-height: 36px;
    }
    form{
    display: flex;
    flex-direction: column;
     width: 350px;

     padding-top: 15px;
     padding-bottom: 10px;
     padding-left: 50px;
     padding-right: 50px;
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
    form .input-group textarea{
      resize: vertical;
      max-height: 125px;
      height: 75px;
      padding-top: 20px;
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
        margin-bottom: 10px;
        text-align: center;
        font-size: 16px;
        font-family: 'Times New Roman', Times, serif;
        color: red;
    }
    form p{
        margin-bottom: 0;
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

input[type="date"] {

    appearance: none;
    -webkit-appearance: none;
    color:transparent;
    font-family: "Helvetica", arial, sans-serif;
    font-size: 18px;
    visibility:visible !important;
}

input[type="date"]:focus {
    color: #95a5a6;
    box-shadow: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
}
</style>
<div class="register">


<form action="" method="POST">
    <h1>Cadastre-se agora </h1>
    <div class="error">
     <?php echo $viewVar["message"]?>
    </div>
        <div class="input-group">
            <label for="iFistName"
            >
             Nome
            </label>
            <input type="text"
            required
            id="iFistName"
            name="fistName"
            value="<?php echo $viewVar["fistName"]?>"
              >
        </div>
        <div class="input-group">
            <label for="iLastName">Sobrenome</label>
            <input 
            required
            type="text"
            id="iLastName"
            name="lastName"
            value="<?php echo $viewVar["lastName"]?>"
            >
        </div>

        <div class="input-group">
            <label for="iEmail">Email</label>
            <input 
                required
                type="email"
                id="iEmail"
                name="email"
                value="<?php echo $viewVar["email"]?>"

              >
        </div>

        <div class="input-group">
            <label for="iPassword">Senha</label>
            <input type="password"
            required
            id="iPassword"
            name="password"
            value="<?php echo $viewVar["password"]?>"
            
            >
        </div>

        <div class="input-group">
            <label for="iBirthday">Data de Nascimento</label>
            <input type="date"
            required
                id="iBirthday"
                name="birthday"
                value="<?php echo $viewVar["birthday"]?>"
            >
        </div>
        <div class="input-group">
            <label for="iBio">Biografia</label>
            <textarea id="iBio"
                name="bio"
                rows="4" 
                cols="50"
                
              ><?php echo trim($viewVar["bio"])?></textarea>
        </div>
        <button type="submit">Cadastar</button>
        <p>Já è cadastrado?<br/>
                <a href="<?php echo APP_HOST ?>/user/login">Faça o login</a>
        
            </p>
 </form>
 </div>

<script>
    const inputs = document.querySelectorAll('.input-group input');
    const textarea = document.querySelectorAll('.input-group textarea');
    inputs.forEach((input)=>{
        input.addEventListener('blur',handleBlur);
        input.addEventListener('focus',handleFocus);
        handleInitialFocus(input);
    });
    textarea.forEach((textarea)=>{
        textarea.addEventListener('blur',handleBlur);
        textarea.addEventListener('focus',handleFocus);
        handleInitialFocus(textarea);
    });
  

    function handleInitialFocus(input){
        if(input.value.length > 0){   
       
        target = document.querySelector('#' + input.id);
        const inputGroup = target.closest('.input-group');
        const label = inputGroup.querySelector('label');
        label.classList.remove('in-focus');
        label.classList.add('in-focus');
        }
      
      

    }
    function handleFocus(event){
        const {target} = event;
        if(target.type == "date"){
            target.style.color = '#95a5a6';
        }
        const inputGroup = target.closest('.input-group');
        const label = inputGroup.querySelector('label');
        label.classList.remove('in-focus');
        label.classList.add('in-focus');
    }

    function handleBlur(event){
        const {target} = event;

        const inputGroup = target.closest('.input-group');
        const label = inputGroup.querySelector('label');
        if(target.value.length > 0){   
            if(target.type == "date"){
                target.style.color = '#000';
            }
            return;
        }
        if(target.type == "date"){
                target.style.color = 'transparent';
            }
        label.classList.remove('in-focus');
    }


</script>  