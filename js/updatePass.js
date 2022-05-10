function checkPwd() {
    var x = document.getElementById("newPassword");
    var y = document.getElementById("confirmNewPassword");
    var z = document.getElementById("currentPassword");
    if (x.type === "password") {
      x.type = "text";
      y.type = "text";
      z.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
      z.type = "password";

    }
  } 

  var check = function() {
    if (document.getElementById('newPassword').value == document.getElementById('confirmNewPassword').value) {
    
      document.getElementById('message').innerHTML = '';
      document.getElementById('updatePasswordBtn').disabled = false;
    } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'Passwords must match.';
      document.getElementById('updatePasswordBtn').disabled = true;
    }
  }