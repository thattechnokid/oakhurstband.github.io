function login(){
  var passwordPossibility = document.getElementById('passwordInput').value;
  var correct = "veritas2";
  if (passwordPossibility == correct){
    alert("CORRECT!! ... You Are Now Being Logged In");
    window.open("cmFiles2017/protected.html/");
  } else{
    alert("Incorrect Password... Please Try Again");
  }
}
