const hamburger = document.querySelector('#toggle-btn');

hamburger.addEventListener('click', function(){
    document.querySelector("#sidebar").classList.toggle("expand");
})

/* Dark mode toggle */
const icon = document.querySelector("#icon");
icon.onclick = function(){
    document.body.classList.toggle("dark-theme");
    if(document.body.classList.contains("dark-theme")){
        icon.src = "./asset/images/icon/sun-24.png";
    }else{
        icon.src = "./asset/images/icon/moon-solid.png";
    }
}

//Toggle Password
const toggle = document.querySelector('.toggle-password');
const password = document.querySelector('#password');
toggle.addEventListener("click", () => {
    if(password.type === "password"){
        password.type = "text";
    }else{
        password.type = "password";
    }
});

//Toggle Icon Publish & Unpublished
function toggleIcon(x){
    x.classList.toggle("bxs-toggle-right");
}

//Trigger Profile Image change
function triggerProfileClick(){
    document.querySelector('#profileImage').click();
};

function displayProfileImage(e){
    if(e.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
};

//Trigger Feature Image Change
function triggerPostClick(){
    document.querySelector('#featureImage').click();
};

function displayPostImage(e){
    if(e.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#featureImgDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
};
