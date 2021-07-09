window.onload = () => {
    sendMail();
}

function sendMail(){
    if (document.getElementById("contact")){
        document.querySelector("form button[type='button']").addEventListener('click', () => {
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4 && xhr.status == 200){
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
