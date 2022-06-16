document.addEventListener("DOMContentLoaded", function(){
      window.addEventListener('scroll', function() {
          if (window.scrollY > 100) {
              // add padding top to show content behind navbar
            navbar_height = document.querySelector('.navbar').offsetHeight;
            document.body.style.paddingTop = navbar_height + 'px';
              // make navbar sticky
            document.getElementById('navbar_top').classList.add('navbar-fixed-top');
            
          } else {
            document.getElementById('navbar_top').classList.remove('navbar-fixed-top');
             
             // remove padding top from body
            document.body.style.paddingTop = '0';
          } 
      });
    }); 

document.addEventListener("DOMContentLoaded", function(){
      window.addEventListener('scroll', function() {
          if (window.scrollY > 100) {
            document.getElementById('profilebarid').classList.add('profilebarsticky');
            
          } else {
             document.getElementById('profilebarid').classList.remove('profilebarsticky');
              
          } 
      });
    }); 

document.addEventListener("DOMContentLoaded", function(){
      window.addEventListener('scroll', function() {
          if (window.scrollY > 100) {
            document.getElementById('phoneProfileBar').classList.add('phoneProfileBarFixed');
            
          } else {
              document.getElementById('phoneProfileBar').classList.remove('phoneProfileBarFixed');
              
          } 
      });
    }); 
