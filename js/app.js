function checkPwd() {
    var x = document.getElementById("pwd");
    var y = document.getElementById("confirmPwd");
    if (x.type === "password") {
      x.type = "text";
      y.type = "text";
    } else {
      x.type = "password";
      y.type = "password";

    }
  } 

  var check = function() {
    if (document.getElementById('pwd').value == document.getElementById('confirmPwd').value) {
    
      document.getElementById('message').innerHTML = '';
      document.getElementById('register-button').disabled = false;
    } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'Passwords must match.';
      document.getElementById('register-button').disabled = true;
    }
  }