function animate(){
    const mainLogo = document.querySelector('header');
    animationIn();
    animationOut();

    mainLogo.addEventListener('mouseenter', function(){
        animationIn();
    })
    mainLogo.addEventListener('mouseleave', function(){
        animationOut();
    })
}
function animationIn(){
    TweenMax.to("[data-name='1_left']", .75, { x: 26, y: -7.5, ease: Bounce.easeOut });

    TweenMax.to("[data-name='3_left']", .75, { x: 26, y: -7.5, ease: Bounce.easeOut });
    
    TweenMax.to("[data-name='2_right']", .75, { x: -26, y: 7.5, ease: Bounce.easeOut });
    
    TweenMax.to("[data-name='4_right']", .75, { x: -26, y: 7.5, ease: Bounce.easeOut });
}
function animationOut(){
    TweenMax.to("[data-name='1_left']", .75, { x: 0, y: 0, ease: Elastic.easeOut.config( 1, 0.3)});

    TweenMax.to("[data-name='3_left']", .75, { x: 0, y: 0, ease: Elastic.easeOut.config( 1, 0.3)});
    
    TweenMax.to("[data-name='2_right']", .75, { x: 0, y: 0, ease: Elastic.easeOut.config( 1, 0.3)});
    
    TweenMax.to("[data-name='4_right']", .75, { x: 0, y: 0, ease: Elastic.easeOut.config( 1, 0.3)});
}