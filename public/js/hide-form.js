function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
function selectedata(value) {

    var today = new Date();
    var dmy = today.toLocaleDateString()
    var h = today.getHours();
    var m = today.getMinutes();
    h = checkTime(h);
    m = checkTime(m);

    // alert(d.toLocaleString());
    // Mostrando data no campo
    $('#_hora').val(dmy+' '+h+':'+m)



    switch (value) {
        case 'civil':

            $("#f-civil").css("display", "block")
            $("#f-oom").css("display", "none")
            $("#f-adm-op").css("display", "none")
            break;
        case 'oom':
            $("#f-oom").css("display", "block")
            $("#f-civil").css("display", "none")
            $("#f-adm-op").css("display", "none")
            break;
        case 'adm':
        case 'op':
            $("#f-adm-op").css("display", "block")
            $("#f-civil").css("display","none")
            $("#f-oom").css("display", "none")
            break;
        default:
            $("#f-civil").css("display", "none")
            $("#f-oom").css("display", "none")
            $("##f-adm-op").css("display", "none")

            break;
    }
}

