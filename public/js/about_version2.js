$('#toggleVersion').click(function() {
  
    var buttonText = ($(this).text() === 'Version 1') ? 'Version 2' : 'Version 1';
    $(this).text(buttonText);

    $('#authors_version_1').toggleClass('hidden');
    $('#authors-version_2').toggleClass('hidden');

    if ($('#authors_version_1').hasClass('hidden')) {
        $(this).text('Version 2');
    } else {
        $(this).text('Version 1');
    }
});