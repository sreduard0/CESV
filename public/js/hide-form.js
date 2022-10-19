 function selected(value) {
     var select = document.getElementsByClassName('proceduraldate');
     if (value != 0) {
         select[0].style.display = 'block';
     } else {
         select[0].style.display = 'none';
     }
 }

 function selectedata(value) {
     var reform = $(".reform");
     var proceduraldate = $(".proceduraldate");
     var type = $(".type");
     var select = $(".hidediv");
     var showdiv = $(".showdiv");
     if (value != 1) {
         type[0].style.display = 'block';
         select[0].style.display = 'block';
         showdiv[0].style.display = 'none';
     } else {
         proceduraldate[0].style.display = 'none';
         type[0].style.display = 'none';
         select[0].style.display = 'none';
         showdiv[0].style.display = 'block';
     }

     if (value >= 5) {
         reform[0].style.display = 'block';

     } else {
         reform[0].style.display = 'none';

     }
 }
