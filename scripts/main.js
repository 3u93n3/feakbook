
var signBtn = document.getElementById('signup');

if(signBtn != null){
    signBtn.addEventListener('click', function(e){
        var name = document.getElementById('signName').value;
        var pass1 = document.getElementById('signPass').value;
        var pass2 = document.getElementById('confPass').value;
        var patt1 = /^[a-z0-9]{4,15}$/ig;
        var patt2 = /^[a-z0-9]{6,18}$/ig;
        if(!(patt1.test(name))){
            e.preventDefault();
            document.getElementById('nameErr').style.visibility = "visible";
        }
        if(!(patt2.test(pass1))){
            e.preventDefault();
            document.getElementById('passErr').style.visibility = "visible";
        }
        if(pass1 !== pass2){
            e.preventDefault();
            document.getElementById('passConfErr').style.visibility = "visible";
        }else{
            document.getElementById('passConfErr').style.visibility = "hidden";
        }
    });
}


