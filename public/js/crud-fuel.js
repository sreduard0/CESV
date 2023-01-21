function selectFichaRel(value) {
    var url = 'get_info_ficha/' + value
    $('#nrFichaRel').val(value)
    $.get(url, function (result) {
        $('#driver').val(result.motinfo.pg + ' ' + result.motinfo.name)
        $('#in_order').val(result.in_order)
        if (result.missioninfo) {
            $('#mission').val(result.missioninfo.mission_name)
        } else {
            $('#mission').val(result.nat_of_serv)
        }
        $('#vtr').val(result.vtrinfo.ebplaca + '|' + result.vtrinfo.mod_vtr)
        if (result.missioninfo) {
            $('#destiny').val(result.missioninfo.destiny)
        }
    })
}
