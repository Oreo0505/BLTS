const userCountCardField = document.getElementById('user-count-card');
const userCountListField = document.getElementById('user-count-list');
const bgOverlayField = document.getElementById('bg-overlay');

userCountCardField.addEventListener('click', function() {
    userCountListField.classList.toggle('hidden');
    bgOverlayField.classList.toggle('hidden');
    
    if (!userCountListField.classList.contains('hidden')) {
        userCountListField.classList.add('fadeIn');
    } else {
        userCountListField.classList.remove('fadeIn');
    }
});

bgOverlayField.addEventListener('click', function() {
    userCountListField.classList.add('hidden');
    bgOverlayField.classList.add('hidden');
});
