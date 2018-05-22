window.onload = Ready;

let iterate_concept = {i: 1, max: 1};

function Ready(){
    let liked = {isit: false};
    

    Toggle_nav();
    HideRegister();
    ShowRegister();
    AddSkill();
    DelSkill();
    AddFile()
    DelFile();
    Like(liked);
    SendFeedback();
    CheckValidUsername();
    DeleteConcept();
    ConceptChanger();


    $('#register input[name="password2"]').keyup(function(){
        let register_pass2 = $('#register input[name="password2"]').val();
        let register_pass = $('#register input[name="password"]').val();
        if (register_pass != register_pass2) {
            $('#register input[name="password2"]').addClass('invalid_pass');
            $('#submitButton').attr('disabled', 'disabled');
        } else{
            $('#register input[name="password2"]').removeClass('invalid_pass');
            $('#submitButton').removeAttr('disabled');
        }
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

function DeleteConcept(){
    $('#delete_button').click(function(){
        let concept = GetFirstParameter();
        if(confirm("Willst du wirklich das Konzept löschen?")){
            if(confirm("Sicher? Es war so cool.")){
                $.post("assets/ajax/deleteconcept_ajax.php", {id: GetFirstParameter()}).done(function(data){
                    console.log(data);
                    window.location = "index.php";
                })
            }
        }
    });
}

function ConceptChanger(){
    $(document).keypress(function(e){
        if(e.keyCode == 39) GetNewConcept();
        else if(e.keyCode == 37) GetOldConcept();
    })

    $('#arrow_right').click(GetNewConcept);
    $('#arrow_left').click(GetOldConcept);


}

function GetNewConcept(){
    iterate_concept.i++;

    $('.curr_concept').addClass('hidden_concept_left');
    $('.curr_concept').removeClass('curr_concept');

    console.log(iterate_concept.i);

    if(iterate_concept.i < iterate_concept.max){
        console.log(iterate_concept.i+" < "+iterate_concept.max);
        let selector = "#stoeber_list > li:nth-child("+(iterate_concept.i)+")";
        $(selector).addClass('curr_concept');
        $(selector).removeClass('hidden_concept_right');
    }else{
        console.log(iterate_concept.i+" >= "+iterate_concept.max);
        iterate_concept.max = iterate_concept.i;
        $.get("assets/ajax/getconcept_ajax.php", {i: iterate_concept.max - 1 }).done(function(data){
            $('#stoeber_list').append(data);
            let selector = "#stoeber_list > li:nth-child("+(iterate_concept.i)+")";
            setTimeout(() => {
                $(selector).addClass('curr_concept');
                $(selector).removeClass('hidden_concept_right');
            }, 50);
        })
    }
}

function GetOldConcept(){
    
    if(iterate_concept.i > 1){
        iterate_concept.i--;
        $('.curr_concept').addClass('hidden_concept_right');
        $('.curr_concept').removeClass('curr_concept');
        console.log(iterate_concept.i);
        
        
        let selector = "#stoeber_list > li:nth-child("+(iterate_concept.i)+")";
        setTimeout(() => {
            $(selector).addClass('curr_concept');
            $(selector).removeClass('hidden_concept_left');
        }, 50);
    }
}