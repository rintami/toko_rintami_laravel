const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const wrapper = document.querySelector(".wrapper");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");


wrapper.style.height = "445px";

signupBtn.onclick = (()=>{
  loginForm.style.marginLeft = "-50%";
  loginText.style.marginLeft = "-50%";
  wrapper.style.removeProperty('height');
});

loginBtn.onclick = (()=>{
  loginForm.style.marginLeft = "0%";
  loginText.style.marginLeft = "0%";
  wrapper.style.height = "445px";

});

signupLink.onclick = (()=>{
  signupBtn.click();
  return false;
});