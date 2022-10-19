function print() {
    var url = '/get_reportgodfather/' + id_report.value;
    var a = window.open();
    moment.locale('pt-br');
    $.get(url, function(result) {
        var name = result.godfather.name.toUpperCase();
        var professionalName = result.godfather.professionalName.toUpperCase();
        var fullname = name.replace(professionalName, professionalName.bold());

        a.document.write('<html><body><style>@media print {@page {margin-top: 0; margin-bottom: 0;}body {padding-top: 72px;padding-bottom: 72px ;}</style>');
        a.document.write('<table align="center" cellpadding="0" cellspacing="0" class="cabecalho" id="cabecalho" style="font-family:times new roman; font-size:16pt; margin-bottom:2cm; margin-top:0cm; width:100%"><tbody><tr><td style="text-align:center"><img src="/img/republica.png" style="width:200px" /></td></tr><tr><td style="text-align:center">&nbsp;</td></tr><tr><td style="text-align:center"><span style="font-size:16px"><strong>MINIST&Eacute;RIO DA DEFESA</strong></span></td></tr><tr><td style="text-align:center"><span style="font-size:16px"><strong>EX&Eacute;RCITO BRASILEIRO</strong></span></td></tr><tr><td style="text-align:center"><span style="font-size:16px"><strong>3&ordm; BATALH&Atilde;O DE SUPRIMENTO</strong></span></td></tr><tr><td style="text-align:center"><span style="font-size:16px"><strong>(BATALH&Atilde;O MARECHAL BITENCOURT)</strong></span></td></tr><tr><td style="text-align:center">&nbsp;</td></tr><tr><td style="text-align:center">&nbsp;</td></tr><tr><td style="text-align:center"><p><span style="font-size:12px"><strong>RELATÓRIO DO MÊS DE ' + moment(result.data).format('MMMM').toUpperCase() + '/' + moment(result.data).format('YYYY') + '</strong></span></p></td></tr><tr><td style="text-align:center">&nbsp;</td></tr><tr><td>');
        a.document.write(result.report);
        a.document.write('</td></tr><tr><td style="text-align:center">&nbsp;</td></tr><tr><td style="text-align:center">&nbsp;</td></tr><tr><td style="text-align:center ;font-size:12pt;"><p>Quartel em Nova Santa Rita-RS,' + moment().format('DD') + ' de ' + moment().format('MMMM') + ' de ' + moment().format('YYYY') + '.</p></td></tr><tr><td style="text-align:center">&nbsp;</td></tr><tr><td style="text-align:center">&nbsp;</td></tr><tr><td style="text-align:center ;font-size:12pt;"><p>_______________________________________</p><p>' + fullname + ' - ' + result.godfather.rank.rankAbbreviation + '</p><p>Padrinho</p></td></tr></tbody></table>');
        a.document.write('</body></html>');
        a.document.close();
        a.print();
        a.print();
    });

}