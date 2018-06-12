function animate(){
    const mainLogo = document.querySelector('header');
    animation();

    mainLogo.addEventListener('mouseenter', function(){
        animation();
    })
}
function animation(){
    TweenMax.to("[data-name='1_left']", .75, { x: 26, y: -7.5, yoyo: true, repeat: 1, easing: Power3.easeInOut });
    TweenMax.to("[data-name='1_left']", .5, { x: 0, y: 0, delay: 1, easing: Elastic.easeInOut});

    TweenMax.to("[data-name='3_left']", .75, { x: 26, y: -7.5, yoyo: true, repeat: 1, easing: Power3.easeInOut });
    TweenMax.to("[data-name='3_left']", .5, { x: 0, y: 0, delay: 1, easing: Elastic.easeInOut});
    
    TweenMax.to("[data-name='2_right']", .75, { x: -26, y: 7.5, yoyo: true, repeat: 1, easing: Power3.easeInOut });
    TweenMax.to("[data-name='2_right']", .5, { x: 0, y: 0, delay: 1, easing: Elastic.easeInOut});
    
    TweenMax.to("[data-name='4_right']", .75, { x: -26, y: 7.5, yoyo: true, repeat: 1, easing: Power3.easeInOut });
    TweenMax.to("[data-name='4_right']", .5, { x: 0, y: 0, delay: 1, easing: Elastic.easeInOut});
}