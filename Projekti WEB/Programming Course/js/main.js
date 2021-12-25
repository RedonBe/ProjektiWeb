function ValidateEmail(inputText){
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(inputText.value.match(mailformat)){
            document.form1.email.focus();
            return true;
        }else{
            alert("You have entered an invalid email address!");
            document.form1.email.focus();
            return false;
        }
}

function CheckPassword(inputtxt) { 
    var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
    if(inputtxt.value.match(passw)) { 
        document.form1.password.focus();
        return true;
    }else{ 
        alert('Wrong Password: Enter a password with 8 to 20 characters  which contain at least one numeric digit, one uppercase and one lowercase letter')
        return false;
    }
}

function Validate() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmpassword").value;
    if (password != confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }
    return true;
}

function allLetter(inputtxt){ 
    var letters = /^[A-Za-z]+$/;
    if(inputtxt.value.match(letters)){
        return true;
    }else{
        alert('Please input alphabet characters only');
        return false;
    }
}

let x=0;

    function next(){
        if(x==0){
            document.getElementById("homeHeader").style.backgroundImage = "url('imgs/bg.jpg')";
            x++;
        }else if(x==1){
            document.getElementById("homeHeader").style.backgroundImage = "url('imgs/research4_1920x720.jpeg')";
            x++;
        }else if(x==2){
            document.getElementById("homeHeader").style.backgroundImage = "url('imgs/Guy-at-computer-e1569232215640-1920x720.jpg')";
            x=0;
        }
    }


    function previous(){
        if(x==0){
            document.getElementById("homeHeader").style.backgroundImage = "url('imgs/research4_1920x720.jpeg')";
            x=2;
        }else if(x==1){
            document.getElementById("homeHeader").style.backgroundImage = "url('imgs/Guy-at-computer-e1569232215640-1920x720.jpg')";
            x--;
        }else if(x==2){
            document.getElementById("homeHeader").style.backgroundImage = "url('imgs/bg.jpg')";
            x--;
        }
    }


    function More(x){
        window.location.href='shop.html'+'?'+x;
    }