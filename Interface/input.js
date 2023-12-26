let Signe = document.getElementById('formS');

Signe.addEventListener('signup', function(e){
 let nom = document.getElementById('nm');
 let len = nom.length;
    if(nom.value.length < 6){
       nom.style.color = red;
       nom.innerHTML = 'Weak name,at least 8 characters';
       e.preventDefault();
    }
});