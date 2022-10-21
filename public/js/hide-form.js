function selectedata(value) {

    var today = new Date();
    var dmy = today.toLocaleDateString()
    var h = today.getHours();
    var m = today.getMinutes();
    m = checkTime(m);

    // alert(d.toLocaleString());
    // Mostrando data no campo
    $('#_hora').val(dmy+' '+h+':'+m)



    switch (value) {
        case 'civil':

            $("#f-civil").css("display", "block")
            $("#f-oom").css("display", "none")
            $("#f-vtr-om").css("display", "none")
            break;
        case 'oom':
            $("#f-oom").css("display", "block")
            $("#f-civil").css("display", "none")
            $("#f-vtr-om").css("display", "none")
            break;
        case 'adm':
            $("#f-civil").css("display", "none")
            $("#f-oom").css("display", "none")
            $("#f-vtr-om").css("display", "block")
            break;
        case 'op':
            $("#f-civil").css("display", "none")
            $("#f-oom").css("display", "none")
            $("#f-vtr-om").css("display", "block")
            break;
        default:
            $("#f-civil").css("display", "none")
            $("#f-oom").css("display", "none")
            $("#f-vtr-om").css("display", "none")

            break;
    }
}

