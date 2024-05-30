//First Icon
let toggle = document.querySelector('.toggle-password');
let password = document.querySelector('.password');
toggle.addEventListener("click", () => {
    if(password.type === "password"){
        password.type = "text";
        toggle.classList.replace("bx-low-vision","bx-show-alt");
    }else{
        password.type = "password";
        toggle.classList.replace("bx-show-alt","bx-low-vision");
    }
});

//Second Icon
const rtToggle = document.querySelector('.togglePassword');
const rtPassword = document.querySelector('.rtPassword');

rtToggle.addEventListener("click", () => {
    if(rtPassword.type === "password"){
        rtPassword.type = "text";
        rtToggle.classList.replace("bx-low-vision","bx-show-alt");
    }else{
        rtPassword.type = "password";
        rtToggle.classList.replace("bx-show-alt","bx-low-vision");
    }
});

//Toggle Password
const check = document.querySelector('.check');
const oldPassword = document.querySelector('#oldPassword');
check.addEventListener("click", () => {
    if(oldPassword.type === "password"){
        oldPassword.type = "text";
    }else{
        oldPassword.type = "password";
    }
});