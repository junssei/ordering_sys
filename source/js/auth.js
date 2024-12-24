// Input Length Limits
var pwlength = document.getElementsByClassName("mypassword");
var charlength = document.getElementsByClassName("charlength");

for(var p=0; p<pwlength.length; p++){
    pwlength[p].setAttribute("minlength", "8");
    pwlength[p].setAttribute("maxlength", "25");
}
for(var l=0; l<charlength.length; l++){
    charlength[l].setAttribute("minlength", "3");
    charlength[l].setAttribute("maxlength", "25");
}

// Check Email If Exist or Not
// document.getElementById("email").addEventListener('input', function() {
//   var xmlhttp = new XMLHttpRequest();
// });


// Password Visibility
function passwordVisibility() {
    var x = document.getElementsByClassName("password_visibility");
    var y = document.getElementById("eyepassword_icon");
    for(var i = 0; i < x.length; i++){
        if (x[i].type === "password") {
            x[i].type = "text";
            y.src = "../source/images/icon/svg/eye-visibility.svg";
        } else {
            x[i].type = "password";
            y.src ="../source/images/icon/svg/eye-invisibility.svg"; 
        }
    }
}

document.getElementById("password").addEventListener('focus', function(){
  document.getElementById("message").style.display = "flex";
  passwordValidation();
});

document.getElementById("password").addEventListener('blur', function(){
  document.getElementById("message").style.display = "none";
});

// Validation
function passwordValidation(){
    var myInput = document.getElementById("password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var specialchar = document.getElementById("specialchar");
    var length = document.getElementById("length");

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if(myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }
    
      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if(myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }
    
      // Validate numbers
      var numbers = /[0-9]/g;
      if(myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }
    
      // Validate special characters
      var specialchars = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/g;
      if(myInput.value.match(specialchars)) {
        specialchar.classList.remove("invalid");
        specialchar.classList.add("valid");
      } else {
        specialchar.classList.remove("valid");
        specialchar.classList.add("invalid");
      }
    
      // Validate length
      if(myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
}

// Confirm Password
var allpw = document.getElementsByClassName('mypassword');
for(var i = 0; i < allpw.length; i++){
    allpw[i].addEventListener('input', function() {
        confirmPassword();
    });
}

function confirmPassword(){
    const errormsg = document.getElementById('errormsg');
    const regbtn = document.getElementById('registerbtn');
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;

    let isValid = true;

    if(password == "" || null){
      errormsg.style.display = "none";
      isValid = false;
    } else if(confirmPassword == "" || null){
      errormsg.style.display = "none";
      isValid = false;
    } else if (password !== confirmPassword) {
      errormsg.textContent = 'Passwords do not match';
      errormsg.classList.remove('success');
      errormsg.style.display = "block";
      errormsg.classList.add('error');
      isValid = false;
    } else {
      errormsg.textContent = 'Passwords match';
      errormsg.classList.remove('error');
      errormsg.classList.add('success');
    }

    if (isValid) {
        regbtn.classList.add('enabledbtn');
        regbtn.disabled = false;
    } else {
        regbtn.classList.remove('enabledbtn');
        regbtn.disabled = true;
    }
}