window.onload = ready;

function ready(){
    toggle_nav();
    //setProjectsWidth();
}

function toggle_nav(){
    let ele = document.getElementById('nav_toggler');
    ele.onclick = actually_toggle_nav;
}

function actually_toggle_nav(){
    let navigation = document.querySelector('header nav');
    navigation.classList.toggle('visible_nav');
    document.getElementById('burger_icon').classList.toggle('twisted_burger');
    document.getElementById('logo_title').classList.toggle('black_header');
}

function setRandomWidth(ele){
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