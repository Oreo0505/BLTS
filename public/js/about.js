const container = document.getElementById('container');
const testElement = document.getElementById('breakpoint');
const arrowHead = document.getElementById('arrow-head');
const scrollButton = document.getElementById('scroll-button');

function isScrolledIntoView(elem)
{
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

document.addEventListener('scroll', function(){
    console.log(isScrolledIntoView(testElement));
    if(!isScrolledIntoView(testElement)){
        arrowHead.classList.add('rotate-180');
        scrollButton.href = '#info';
    }
    else{
        arrowHead.classList.remove('rotate-180');
        scrollButton.href = '#authors';
    }
});