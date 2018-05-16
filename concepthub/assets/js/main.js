window.onload = Ready;

function Ready(){
    Toggle_nav();
    //setProjectsWidth();
    HideRegister();
    ShowRegister();
    AddSkill();
    DelSkill();
    AddFile()
    DelFile();
    let liked = {isit: false};
    Like(liked);
    SendFeedback();
    CheckValidUsername();


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
        $('#add_project_form #skills div:first-of-type').clone().insertBefore(this);
        DelSkill();
    })
}
function AddFile(){
    $('#add_file').click(function(event){
        event.preventDefault();
        $('#add_project_form fieldset div[title="Bilderformular"]:first-of-type').clone().insertBefore(this);
        DelFile();
        console.log('Added new input-thingy');
    })
}

function DelSkill(){
    $('#add_project_form #skills span').click(function(event){
        event.preventDefault();
        if($('#add_project_form #skills > div').length > 1){
            $(this).parent().remove();
        }
    })
}
function DelFile(){
    $('#add_project_form div[title="Bilderformular"] span').click(function(event){
        event.preventDefault();
        console.log($('#add_project_form div[title="Bilderformular"]').length);
        if($('#add_project_form div[title="Bilderformular"]').length > 1){
            $(this).parent().remove();
        }
    })
}

function Like(liked){
    $('#clap.likeable').click(function(event){
        if(!(liked.isit)){
            event.preventDefault();
            console.log(GetFirstParameter());
            $.post( "assets/ajax/like_ajax.php", { id: GetFirstParameter() } ).done(function(){
                console.log("Clap! Clap! Clap!");
            }).fail(function(){
                console.log("Broke my hands or something!");
            });
            let likes = parseInt($('#clap p').text());
            $('#clap p').html(likes + 1);
            console.log(liked.isit);
            liked.isit = true;
            $('#clap').addClass('liked');
        }
    });
}

function SendFeedback(){
    $('#submit_feedback').click(function(event){
        event.preventDefault();
        $.post("assets/ajax/feedback_ajax.php", {id: GetFirstParameter(), data: $('#feedback').val(), stars: $('#stars').val() }).done(function(data){
            console.log("Feedbacked." + data);
        });
        $(this).parent().addClass('invisible');
    });
}

function GetFirstParameter(){
    return window.location.search.substr(1).split('=')[1];
}

function CheckValidUsername(){
    $('#usernameInput').keyup(function(){
        let curr_val = $(this).val();
        console.log(GetFirstParameter());
        $.post("assets/ajax/checkuser_ajax.php", {val: curr_val, name: GetFirstParameter()}).done(function(data){
            if(data == "true" || RegExp(/\s/).test(curr_val)) {
                $('#submitButton').attr('disabled', 'disabled');
                $('#usernameInput').addClass('user_taken');
            } else {
                $('#submitButton').removeAttr('disabled');
                $('#usernameInput').removeClass('user_taken');
            }
        })
    });
}