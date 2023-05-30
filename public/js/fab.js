const uploadButton = document.getElementById('upload-fab');
const topButton = document.getElementById('top-fab');
const breakpoint = document.getElementById('breakpoint');

function isScrolledIntoView(elem)
{
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

document.addEventListener('scroll', function(){
    if(!isScrolledIntoView(breakpoint)){
        uploadButton.classList.remove('bottom-10');
        uploadButton.classList.add('bottom-32');
        topButton.classList.remove('hidden');
    }
    else{
        uploadButton.classList.remove('bottom-32');
        uploadButton.classList.add('bottom-10');
        topButton.classList.add('hidden');
    }
});