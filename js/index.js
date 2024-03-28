//Show login form
function login() {
    var l = document.getElementById("login");
    var s = document.getElementById("sign-up");

    if (l.style.display === "none") {
        l.style.display = "block";
        s.style.display = "none";
    } 

    return false;
}
//show sign up form
function signUp() {

    var l = document.getElementById("login");
    var s = document.getElementById("sign-up");

    if (s.style.display === "none") {
        s.style.display = "block";
        l.style.display = "none";
    } 

    return false;
}
//register users
$(document).ready(function() {
    $('#registerform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'register.php',
            data: $(this).serialize(),
            success: function(response)
            {
                console.log(response);
                var jsonData = JSON.parse(response);
 
                // user is logged in successfully in the back-end 
                // let's redirect 
                if (jsonData.success == "1")
                {
                    login();
                }
                else
                {
                     alert(jsonData.message);
                }
           }
       });
     });
     
         $('#loginform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'login.php',
            data: $(this).serialize(),
            success: function(response)
            {
                console.log(response);
                var jsonData = JSON.parse(response);
 
                // user is logged in successfully in the back-end 
                // let's redirect 
                if (jsonData.success == "1")
                {
                   
                    location.href = '/home.php';
                }
                else
                {
                    alert(jsonData.message);
                }
           }
       });
     });
});