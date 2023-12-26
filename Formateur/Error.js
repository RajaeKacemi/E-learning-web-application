
let form = document.getElementById('FormAj');

form.addEventListener('submit', function(e){

    let title = document.getElementById('inputText');
    let Domaine = document.getElementById('inputDomaine');
    let ControlTextarea = document.getElementById('FormControlTextarea');
    let image = document.getElementById('image');
    let File = document.getElementById('formFile');
    let video = document.getElementById('formVideo'); 

     if(title.value == ''){
      let error = document.getElementById('sp1');
       error.innerHTML = "Le champs titre est requis !!";
       error.style.color='red';
       e.preventDefault(); 
     }else if (Domaine.value == ''){
      let error = document.getElementById('sp2');
      error.innerHTML = "Le champs domaine est requis !!";
      error.style.color='red';
      e.preventDefault(); 
     }else if(ControlTextarea.value == ''){
 
      let error = document.getElementById('sp3');
      error.innerHTML = "Le description titre est requis !!";
      error.style.color='red';
         e.preventDefault(); 
     }else if(image.value == ''){

      let error = document.getElementById('sp4');
      error.innerHTML = "Le champs image est requis !!";
      error.style.color='red';
             e.preventDefault(); 
     }else if(File.value == ''){

      let error = document.getElementById('sp5');
      error.innerHTML = "Le champs file est requis !!";
      error.style.color ='red';
             e.preventDefault(); 
     }else if (video.value == ''){

      let error = document.getElementById('sp6');
      error.innerHTML = "Le champs video est requis !!";
      error.style.color='red';
             e.preventDefault(); 
     }
     
    });


