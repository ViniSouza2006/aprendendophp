function formhash(form, password){
    //crie um novo elemento de input, o qual será o campo para a senha com hash.
    
    var p = document.createElement("input");

    //adicione um novo elemento ao nosso formúlario.
    form.appendChild(p);
    p.name="p";
    p.type="hidden";
    p.value=hex_sha512(password.value);

    //cuidado para não deixar que a senha em texto simples não seja enviada.
    password.value="";

    //finalmente envie o formúlario.
    form.submit();
}

function regformhash(form, uid, email, password, conf){
    //confira se cada campo tem um valor
    if(uid.value =='' ||
        email.value =='' ||
        password.value =='' ||
        conf.value ==''){

            alert('you must provide all the resquested details. please try again');
            return false;
        }

        //verifique o nome de úsuario 
        re = /^\w+$/;
        if(!re.test(form.username.value)){
            alert("usrname must contain only letters, numbers and undercores. Please try again");
            form.username.focus();
            return false;
        }

        //confira se a senha é comprida o suficiente(no mínimo, 6 caracteres)
        //A verificação é duplicada abaixo, mas o cuidado extra é para dar mais
        //orientções específicas ao usuário
        if(password.value.leght<6){
            alert('passwords must be at least 6 characters long. Please Try again');
            form.password.focus();
            return false;
        }

        //pelo memos um número, uma letra minúscula e uma letra maiúscula
        //pelo menos 6 caractres 
        var re =/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
        if(!re.test(password.value)){
            alert('passwords must contain at least one number, one lowercase and uppercase letter. Please try again');
            return false;
        }

        //verificar se a senha e a confirmação são as mesmas
        if (password.value !=conf.value){
            alert('your password and confirmaton do not match. Please try again');
            form.password.focus();
            return false;
        }
        //crie um novo elemento de input, o qual será o campo para a senha hash.
        var p=document.createElement("input");
        
        //adicione o novo elemento ao nosso formúlario.
        form.appendChild(p);
        p.name="p";
        p.type="hidden";
        p.value=hex_sha512(password.value);

        //cuidado para não deixar que a senha em texto simples seja enviada.
        password.value="";
        conf.value="";

        //finalizando, envie o formúlario.
        form.submit();
        return true;
}
