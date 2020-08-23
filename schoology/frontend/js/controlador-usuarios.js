function login(){
    axios({
        url: "../backend/api/login.php",  //en el controlador solo es ../ dado que al incluirlo en el html esta a nivel del index.
        method: "post",
        responseType: "json", 
        data: {
            email: document.getElementById('email').value,
            password: document.getElementById('password').value
        }
    }).then(res=>{
        if (res.data.codigoResultado ==1) {  //si el data al ingresar email y correo da codigoResultado = 1 nos redirecciona a otra pagina
             window.location.href = "home.php";
        } else{
             //sino, enviamos el mensaje qe viene desde el servidor.
             document.getElementById('error').style.display= 'block';
            document.getElementById('error').innerHTML = res.data.mensaje;  
        }
        console.log(res);
    }).catch(err=>{
        console.log(err);
    });


}

function publicaciones(){
    axios({
        url: '../backend/api/publicaciones.php',
        method: 'post',
        responseType: 'json',
        data: {
            // usuario: "pedro",
            publicacion: document.getElementById('publicacionGuardada').value
        }
    }).then(res=>{
        console.log(res);
            document.getElementById('registroPublicacion').innerHTML+=
            `<span>Publicacion: ${document.getElementById('publicacionGuardada').value}</span><br>`
    }).catch(error=>{
        console.log(error);
    })
}



function guardarUsuario(){
    axios({
        url: '../backend/api/usuarios.php',
        method: 'post',
        responseType: 'json',
        data: {
            firstName: document.getElementById('nombre').value,
            lastName: document.getElementById('apellido').value,
            email: document.getElementById('email').value,
            password: document.getElementById('contraseña').value,
            gender: document.getElementById('genero').value,
            birthdate: document.getElementById('cumpleaños').value,
            cursos: document.getElementById('cursos').value

        }
    }).then(res=>{
        console.log(res);
        if (res.data.codigoResultado ==1) {  //si el data al ingresar email y correo da codigoResultado = 1 nos redirecciona a otra pagina
            window.location.href = "inicio-sesion.html";
        };    
    }).catch(error=>{
        console.log(error);
    })
}

function verCurso(){
    console.log('curso-actual');
    axios({
        url: '../backend/api/usuarios.php',
        method: 'get',
        responseType: 'json'
    }).then(res=>{
        console.log(res);
        document.getElementById('curso-actual').innerHTML= null;
        for (let i = 0; i < res.data.length; i++) {
           document.getElementById('curso-actual').innerHTML+=
             ` <button id="irCurso()" type="button" style="margin-left:13vw;border:none;margin-bottom:1vw"><img style="width: 15vw;height:12vw;" src="img/PORTADA-PROGRAMACIÓN-ORIENTADA-978x652.png" alt="" onclick="miCurso()"></button><br>
             <div style="padding-left:19vw;">
                 <span>${res.data[i].cursos}</span>
             </div>`;
            
        }
                  
    }).catch(error=>{
        console.log(error);
    })
}

function miCurso(){
    console.log('irCurso');
    axios({
        url: '../backend/api/usuarios.php',
        method: 'get',
        responseType: 'json'
    }).then(res=>{
        console.log(res);
        document.getElementById('curso').innerHTML=null;
        for (let i = 0; i < res.data.length; i++) {
            document.getElementById('curso').innerHTML+=
            `<span style="padding-left:3vw;"><i class="far fa-folder"></i> Documentos</span><br>
             <span style="padding-left:3vw;"><i class="far fa-folder"></i> Enunciado Examenes</span><br>
             <span style="padding-left:3vw;"><i class="far fa-folder"></i> Entregas</span><br>
             <span style="padding-left:3vw;"><i class="far fa-folder"></i> Tareas</span><br>
             <a style="color:black;" href="https://github.com/UNAH-IS/IS410-I2020"><span style="padding-left:3vw;"><i class="fas fa-link"></i> Repositorio de ejercicios de clase</span></a><br>
             <a style="color:black;" href="https://docs.google.com/spreadsheets/d/1ByesTg7OIQYj64GgldKnZLMFCpJO6ZRVO6t_eiHSU68/edit#gid=0"><span style="padding-left:3vw;"><i class="fas fa-link"></i> Videos</span></a><br>
             <a style="color:black;" href="https://docs.google.com/spreadsheets/d/1TuySmJcRuc19rXaLKRdSwnZ3qQXvna8bthc0mEg_uQA/edit#gid=463873635"><span style="padding-left:3vw;"><i class="fas fa-link"></i> Nota exámenes prácticos</span></a>`;
             
        }
    }).catch(error=>{
        console.log(error);
    })
}

