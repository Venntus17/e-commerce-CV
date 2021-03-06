window.onload = () => {
    sendMail();
    login();
    register();
    modifySettings()
}

function sendMail(){
    if (document.getElementById("contact")){
        document.querySelector("form button[type='button']").addEventListener('click', () => {
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = () => {
                if (xhr.readyState == xhr.DONE && xhr.status == 200){
                    let res = xhr.responseText;
                    res = JSON.parse(res);

                    let errors = document.getElementById("errors");
                    errors.innerHTML = "";

                    if (Object.keys(res).length != 0){
                        if (res['mail']){
                            let mail = document.createElement("p");
                            mail.classList.add("error");
                            mail.innerText = res['mail'];

                            errors.insertAdjacentElement('beforeend', mail);
                        }

                        if (res['subject']){
                            let subject = document.createElement("p");
                            subject.classList.add("error");
                            subject.innerText = res['subject'];

                            errors.insertAdjacentElement('beforeend', subject);
                        }
                        
                    }else{
                        let p = document.createElement("p");
                        p.classList.add("valide");
                        p.innerText = "Merci, votre mail à bien été envoyé !";

                        errors.insertAdjacentElement("beforeend", p);

                        setTimeout(() => {
                            errors.removeChild(p);
                        }, 10000);
                    }
                }
            }
            xhr.open("POST", "/contact");

            let form = new FormData();
            form.append("ajax", true);

            let mail = document.getElementById("mail").value;
            let subject = document.getElementById("subject").value;
            let content = document.getElementById("content").value;

            form.append("mail", mail);
            form.append("subject", subject);
            form.append("content", content);
            xhr.send(form);
        });
    }
}

function login(){
    if (document.getElementById("login")){
        let submit = document.querySelector("#signin button");
        submit.addEventListener('click', () => {
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = () => {
                if (xhr.readyState == xhr.DONE && xhr.status == 200){
                    let res = JSON.parse(xhr.responseText);
                    let form = document.getElementById("signin");
                    form.style.height = 258+'px';

                    let errs = document.querySelector("#signin .errors");
                    errs.innerHTML = "";

                    if (Object.keys(res).length != 0){
                        if (res['mail']){
                            let p = document.createElement("p");
                            p.classList.add("error");
                            p.innerText = res['mail'];

                            errs.insertAdjacentElement("beforeend", p);

                            form.style.height = (form.clientHeight-40)+21+'px';
                        }

                        if (res['password']){
                            let p = document.createElement("p");
                            p.classList.add("error");
                            p.innerText = res['password'];

                            errs.insertAdjacentElement("beforeend", p);

                            form.style.height = (form.clientHeight-40)+21+'px';
                        }

                        if (res['error']){
                            let p = document.createElement("p");
                            p.classList.add("error");
                            p.innerText = res['error'];

                            errs.insertAdjacentElement("beforeend", p);

                            form.style.height = (form.clientHeight-40)+21+'px';
                        }
                    }else{
                        window.location.replace("/myaccount");
                    }
                }
            }

            let form = new FormData();
            form.append("ajax", true);
            form.append("type", "signin");
            form.append("mail", document.getElementById("signin_mail").value);
            form.append("password", document.getElementById("signin_password").value);

            xhr.open("POST", "/login");
            xhr.send(form);
        });
    }
}

function register(){
    if (document.getElementById("login")){
        let submit = document.querySelector("#signup button");
        submit.addEventListener('click', () => {
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = () => {
                if (xhr.readyState == xhr.DONE && xhr.status == 200){
                    let res = JSON.parse(xhr.responseText);
                    let form = document.getElementById("signup");
                    form.style.height = 258+'px';

                    let errs = document.querySelector("#signup .errors");
                    errs.innerHTML = "";

                    if (Object.keys(res).length != 0){
                        if (res['mail']){
                            let p = document.createElement("p");
                            p.classList.add("error");
                            p.innerText = res['mail'];
                            
                            errs.insertAdjacentElement("beforeend", p);

                            form.style.height = (form.clientHeight-40)+21+'px';
                        }

                        if (res['username']){
                            let p = document.createElement("p");
                            p.classList.add("error");
                            p.innerText = res['username'];

                            errs.insertAdjacentElement("beforeend", p);

                            form.style.height = (form.clientHeight-40)+21+'px';
                        }

                        if (res['password']){
                            let p = document.createElement("p");
                            p.classList.add("error");
                            p.innerText = res['password'];

                            errs.insertAdjacentElement("beforeend", p);

                            form.style.height = (form.clientHeight-40)+21+'px';
                        }

                        if (res['conf_password']){
                            let p = document.createElement("p");
                            p.classList.add("error");
                            p.innerText = res['conf_password'];

                            errs.insertAdjacentElement("beforeend", p);

                            form.style.height = (form.clientHeight-40)+21+'px';
                        }

                        if (res['error']){
                            let p = document.createElement("p");
                            p.classList.add("error");
                            p.innerText = res['error'];

                            errs.insertAdjacentElement("beforeend", p);

                            form.style.height = (form.clientHeight-40)+21+'px';
                        }
                    }else{
                        window.location.replace("/myaccount");
                    }
                }
            }

            let form = new FormData();
            form.append("ajax", true);
            form.append("type", "signup");
            form.append("mail", document.getElementById("signup_mail").value);
            form.append("password", document.getElementById("signup_password").value);
            form.append("conf_password", document.getElementById("signup_conf_password").value);
            form.append("username", document.getElementById("signup_username").value);

            xhr.open("POST", "/login");
            xhr.send(form);
        });
    }
}

function modifySettings(){
    if (document.querySelector("#myaccount #myaccount__settings")){
        document.querySelector("#myaccount__settings form button[type='button']").addEventListener('click', () => {
            let xhr = new XMLHttpRequest();

            xhr.onreadystatechange = () => {
                if (xhr.readyState == xhr.DONE && xhr.status == 200){
                    let res = JSON.parse(xhr.responseText);
                    console.log(res);

                    let errors = document.getElementById("errors");
                        errors.innerHTML = null;

                    if (Object.keys(res).length != 0){
                        if (res['username']){
                            let p = document.createElement("p");
                            p.classList.add("error");
                            p.innerText = res['username'];
                            errors.insertAdjacentElement("beforeend", p);
                        }

                        if (res['mail']){
                            let p = document.createElement("p");
                            p.classList.add("error");
                            p.innerText = res['mail'];
                            errors.insertAdjacentElement("beforeend", p);
                        }
                    }else{
                        let p = document.createElement("p");
                        p.classList.add("valide");
                        p.innerText = "Vos données on bien été modifiés !";
                        errors.insertAdjacentElement("beforeend", p);
                    }
                }
            };

            let form = new FormData();

            form.append("ajax", true);
            form.append("type", "usrmail");

            let username = document.getElementById("username").value;
            let mail = document.getElementById("mail").value;

            form.append("username", username);
            form.append("mail", mail);

            xhr.open("POST", "/myaccount/settings");
            xhr.send(form);
        });
    }
}
