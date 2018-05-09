window.onload = Ready;

function Ready(){
    Toggle_nav();
    //setProjectsWidth();
    HideRegister();
    ShowRegister();
    AddSkill();
    delSkill();

    $('#register input[name="password2"]').keyup(function(){
        let register_pass2 = $('#register input[name="password2"]').val();
        let register_pass = $('#register input[name="password"]').val();
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

function HideRegister(){
    $('#register').css('display', 'none');
}

function ShowRegister(){
    $('#show_register').click(function(event){
        event.preventDefault();
        if(!($('#login').css('display') == "none")){
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


function AddSkill(){
    $('#add_skill').click(function(event){
        event.preventDefault();
        $('#add_project_form fieldset div:first-of-type').clone().insertBefore(this);
        delSkill();
    })
}

function delSkill(){
    $('#add_project_form span').click(function(event){
        event.preventDefault();
        if($('#add_project_form fieldset > div').length > 1){
            $(this).parent().remove();
        }
    })
}