function selectedata(value) {
     var civil = $(".civil");
     var op = $(".op");
     var adm = $(".adm");
    var oom = $(".oom");


    switch (value) {
        case '1':

            op[0].style.display = 'block';
            adm[0].style.display = 'none';
            oom[0].style.display = 'none';

            break;
        case '2':
            op[0].style.display = 'none';
            oom[0].style.display = 'none';
            adm[0].style.display = 'block';
            break;
        case '3':
            op[0].style.display = 'none';
            adm[0].style.display = 'none';
            oom[0].style.display = 'block';
            break;
        case '4':
            op[0].style.display = 'none';
            adm[0].style.display = 'none';
            oom[0].style.display = 'none';
            break;
        default:
            op[0].style.display = 'none';
            adm[0].style.display = 'none';
            oom[0].style.display = 'none';
            break;
    }
 }
