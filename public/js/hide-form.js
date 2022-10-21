function selectedata(value) {
     var civil = $("#f-civil");
    //  var op = $(".op");
    //  var adm = $(".adm");
    var oom = $("#f-oom");


    switch (value) {
        case '1':

            civil[0].style.display = 'block';
            // op[0].style.display = 'none';
            oom[0].style.display = 'none';
            // adm[0].style.display = 'none';

            break;
        case '2':
            oom[0].style.display = 'block';
            civil[0].style.display = 'none';
            // op[0].style.display = 'none';
            // adm[0].style.display = 'none';
            break;
        case '3':
           civil[0].style.display = 'none';
            // op[0].style.display = 'none';
            oom[0].style.display = 'none';
            // adm[0].style.display = 'none';
            break;
        case '4':
            civil[0].style.display = 'none';
            // op[0].style.display = 'none';
            oom[0].style.display = 'none';
            // adm[0].style.display = 'none';
            break;
        default:


            break;
    }
 }
