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

                    if (Object.keys(res).length != 0){

                    }else{
                        
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
