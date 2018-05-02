window.onload = Ready;

function Ready(){
    Toggle_nav();
    //setProjectsWidth();
    HideRegister();
    ShowRegister();

$('#register input[name="password2"]').keypress(function(){
    let register_pass = $('#register input[name="password"]').val();
    let register_pass2 = $('#register input[name="password2"]').val();
    if (register_pass != register_pass2) $('#register input[name="password2"]').addClass('invalid_pass');
    else $('#register input[name="password2"]').removeClass('invalid_pass');
})
}

function Toggle_nav(){
    let ele = document.getElementById('nav_toggler');
    ele.onclick = actually_toggle_nav;
}

function actually_toggle_nav(){
    let navigation = document.querySelector('header nav');
    navigation.classList.toggle('visible_nav');
    document.getElementById('burger_icon').classList.toggle('twisted_burger');
    document.getElementById('logo_title').classList.toggle('black_header');
}

function setProjectsWidth(){ // not quite working yet
    let listElements = document.querySelectorAll('main ul li');
    for (let index = 0; index < listElements.length; index = index + 2) {

        let random = 100 * (0.3 + (Math.random() / 4.0));
        let aTag = listElements[index].childNodes[1];
        aTag.style.width = random + "vw";

        listElements[index+1].style.width = (window.innerWidth - random / 100 * window.innerWidth) - 10 + "px";
    }
}


function HideRegister(){
    $('#register').css('display', 'none');
}

function ShowRegister(){
    $('#show_register').click(function(){
        if($('#login').css('display') == "grid"){
            $('#register').css('display', 'grid');
            $('#login').css('display', 'none');
            $('#show_register').html('Du willst dich doch nur einloggen?');    
        } else {
            $('#register').css('display', 'none');
            $('#login').css('display', 'grid');
            $('#show_register').html('Eigentlich doch eher registrieren.');
        }
    })
}
