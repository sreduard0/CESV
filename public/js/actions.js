//================================[ADICIONAR militar]================================//
function add_adido() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });


    //Conferindo dados obrigatórios em todas as situações
    if (
        image_profile.value == "" ||
        condition_id.value == "" ||
        speciality_id.value == "" ||
        company_id.value == "" ||
        rank.value == "" ||
        professionalName.value == "" ||
        fullName.value == "" ||
        idt_mil.value == "" ||
        cpf.value == "" ||
        phone.value == ""

    ) {

        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Todos os campos com * devem estar preenchidos.'
        });

        return false;
    }

    //Conferindo dados da idt mil
    if (idt_mil.value.replace(/\D+/g, "").length > 1) {
        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Número de Idt Mil incorreto.'
        });
        return false;
    }
    //conferindo cpf
    if (cpf.value.replace(/\D+/g, "").length < 11) {
        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Número de CPF incorreto.'
        });
        return false;
    }
    //conferindo telefone
    if (phone.value.replace(/\D+/g, "").length < 11) {
        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Número de telefone incorreto.'
        });
        return false;
    }
    //se estiver preenchido conferindo telefone 2
    if (phone2.value && phone2.value.replace(/\D+/g, "").length < 11) {
        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Número de telefone 2 incorreto.'
        });
        return false;
    }


    var condition = condition_id.value;
    switch (condition) {
        case '1':
            var data = {
                image_profile: image_profile.value,
                condition_id: condition_id.value,
                speciality_id: speciality_id.value,
                type: type.value,
                company_id: company_id.value,
                rank: rank.value,
                professionalName: professionalName.value,
                fullName: fullName.value,
                idt_mil: idt_mil.value,
                cpf: cpf.value,
                phone: phone.value,
                phone2: phone2.value,
                startDate: startDate.value,
                endDate: endDate.value,
                seem: seem.value,
                reason: reason.value,
            };
            break;
        case '5':
        case '6':
            var data = {
                image_profile: image_profile.value,
                condition_id: condition_id.value,
                speciality_id: speciality_id.value,
                company_id: company_id.value,
                rank: rank.value,
                professionalName: professionalName.value,
                fullName: fullName.value,
                idt_mil: idt_mil.value,
                cpf: cpf.value,
                type: type.value,
                phone: phone.value,
                phone2: phone2.value,
                preccp: preccp.value,
                pis: pis.value,
                godfather_id: godfather_id.value,
                godfather2_id: godfather2_id.value,
                joinedArmy: joinedArmy.value,
                licensing: licensing.value,
                reinstated: reinstated.value,
                reason: reason.value,
                dateReformOrdinace: dateReformOrdinace.value,
                dateDOUReform: dateDOUReform.value,
                birthDate: birthDate.value,
                address: address.value,
            };
            break;
        default:
            var data = {
                image_profile: image_profile.value,
                condition_id: condition_id.value,
                type: type.value,
                speciality_id: speciality_id.value,
                company_id: company_id.value,
                rank: rank.value,
                professionalName: professionalName.value,
                fullName: fullName.value,
                idt_mil: idt_mil.value,
                cpf: cpf.value,
                phone: phone.value,
                phone2: phone2.value,
                preccp: preccp.value,
                pis: pis.value,
                godfather_id: godfather_id.value,
                godfather2_id: godfather2_id.value,
                joinedArmy: joinedArmy.value,
                licensing: licensing.value,
                reinstated: reinstated.value,
                reason: reason.value,
            };
            break;
    }

    var _Type = type.value;
    if (_Type == 1) {
        data.proceduraldata = {
            process1: process1.value,
            process2: process2.value,
            key1: key1.value,
            key2: key2.value,
            attorney: attorney.value,
            nameLawyerOffice: nameLawyerOffice.value,
            court_judge: court_judge.value,
            class_judge: class_judge.value,
            doctorResponsible: doctorResponsible.value,
            thresholdDecision: thresholdDecision.value,
            judicialExpertise: judicialExpertise.value,
            verdict: verdict.value,
            appeal: appeal.value,
            responsibleMenu: responsibleMenu.value,
            specialResource: specialResource.value,
            extraordinaryResource: extraordinaryResource.value,
            comment: comment.value,
            legalGuidance: legalGuidance.value,
            guardianship: guardianship.value,
            unusual: unusual.value,
            judgment: judgment.value,
            situation: situation.value,
        };
    }

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: '/add_adido',
        type: 'POST',
        data: data,
        dataType: 'text',
        success: function(data) {

            if (data == "error") {

                Toast.fire({
                    icon: 'error',
                    title: '&nbsp&nbsp Os campos com * são obrigatórios.'
                });
            } else if (data == 'errorcheckMil') {
                Toast.fire({
                    icon: 'error',
                    title: '&nbsp&nbsp Esse (Ex)Militar já está cadastrado.'
                });
            } else if (data == 'godfather') {
                Toast.fire({
                    icon: 'error',
                    title: '&nbsp&nbsp Já existe um militar com este padrinho.'
                });
            } else if (data == 'godfather2') {
                Toast.fire({
                    icon: 'error',
                    title: '&nbsp&nbsp Já existe um militar com este substituto do padrinho.'
                });
            } else {
                $("#register").modal('hide');
                $("#table").DataTable().clear().draw(6);
                Toast.fire({
                    icon: 'success',
                    title: '&nbsp&nbsp (Ex) Militar cadastrado(a) com sucesso.'
                });

                $('#form-adido')[0].reset();
                $(".new_menu").summernote('code', '');
            }

        },

        error: function(data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao cadastrar.'
            });
        }
    });
}
//================================[ Editar militar ]================================//
function edit_adido() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });



    if (
        image_profile.value == "" ||
        condition_id.value == "" ||
        speciality_id.value == "" ||
        company_id.value == ""
    ) {

        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Todos os campos com * devem estar preenchidos.'
        });

        return false;
    }
    if (idt_mil.value.replace(/\D+/g, "").length > 1) {
        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Número de Idt Mil incorreto.'
        });
        return false;
    }
    if (cpf.value.replace(/\D+/g, "").length < 11) {
        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Número de CPF incorreto.'
        });
        return false;
    }
    if (phone.value.replace(/\D+/g, "").length < 11) {
        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Número de telefone incorreto.'
        });
        return false;
    }
    if (phone2.value && phone2.value.replace(/\D+/g, "").length < 11) {
        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Número de telefone 2 incorreto.'
        });
        return false;
    }


    var condition = condition_id.value;
    switch (condition) {
        case '1':
            var data = {
                id_adido: id_adido.value,
                image_profile: image_profile.value,
                condition_id: condition_id.value,
                speciality_id: speciality_id.value,
                type: type.value,
                company_id: company_id.value,
                rank: rank.value,
                professionalName: professionalName.value,
                fullName: fullName.value,
                idt_mil: idt_mil.value,
                cpf: cpf.value,
                phone: phone.value,
                phone2: phone2.value,
                startDate: startDate.value,
                endDate: endDate.value,
                seem: seem.value,
                reason: reason.value,
            };
            break;
        case '5':
        case '6':
            var data = {
                id_adido: id_adido.value,
                image_profile: image_profile.value,
                condition_id: condition_id.value,
                speciality_id: speciality_id.value,
                company_id: company_id.value,
                rank: rank.value,
                professionalName: professionalName.value,
                fullName: fullName.value,
                idt_mil: idt_mil.value,
                cpf: cpf.value,
                type: type.value,
                phone: phone.value,
                phone2: phone2.value,
                preccp: preccp.value,
                pis: pis.value,
                godfather_id: godfather_id.value,
                godfather2_id: godfather2_id.value,
                joinedArmy: joinedArmy.value,
                licensing: licensing.value,
                reinstated: reinstated.value,
                reason: reason.value,
                dateReformOrdinace: dateReformOrdinace.value,
                dateDOUReform: dateDOUReform.value,
                birthDate: birthDate.value,
                address: address.value,
            };
            break;
        default:
            var data = {
                id_adido: id_adido.value,
                image_profile: image_profile.value,
                condition_id: condition_id.value,
                type: type.value,
                speciality_id: speciality_id.value,
                company_id: company_id.value,
                rank: rank.value,
                professionalName: professionalName.value,
                fullName: fullName.value,
                idt_mil: idt_mil.value,
                cpf: cpf.value,
                phone: phone.value,
                phone2: phone2.value,
                preccp: preccp.value,
                pis: pis.value,
                godfather_id: godfather_id.value,
                godfather2_id: godfather2_id.value,
                joinedArmy: joinedArmy.value,
                licensing: licensing.value,
                reinstated: reinstated.value,
                reason: reason.value,
            };
            break;
    }

    var _Type = type.value;
    if (_Type == 1) {
        data.proceduraldata = {
            process1: process1.value,
            process2: process2.value,
            key1: key1.value,
            key2: key2.value,
            attorney: attorney.value,
            nameLawyerOffice: nameLawyerOffice.value,
            court_judge: court_judge.value,
            class_judge: class_judge.value,
            doctorResponsible: doctorResponsible.value,
            thresholdDecision: thresholdDecision.value,
            judicialExpertise: judicialExpertise.value,
            verdict: verdict.value,
            appeal: appeal.value,
            responsibleMenu: responsibleMenu.value,
            specialResource: specialResource.value,
            extraordinaryResource: extraordinaryResource.value,
            comment: comment.value,
            legalGuidance: legalGuidance.value,
            guardianship: guardianship.value,
            unusual: unusual.value,
            judgment: judgment.value,
            situation: situation.value,
        };
    }

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: '/edit_profile_adido',
        type: 'POST',
        data: data,
        dataType: 'text',
        success: function(data) {

            if (data == "error") {

                Toast.fire({
                    icon: 'error',
                    title: '&nbsp&nbsp Os campos com * são obrigatórios.'
                });
            } else if (data == 'godfather') {
                Toast.fire({
                    icon: 'error',
                    title: '&nbsp&nbsp Já existe um militar com este padrinho.'
                });
            } else if (data == 'godfather2') {
                Toast.fire({
                    icon: 'error',
                    title: '&nbsp&nbsp Já existe um militar com este substituto do padrinho.'
                });
            } else {

                Toast.fire({
                    icon: 'success',
                    title: '&nbsp&nbsp (Ex) Militar cadastrado(a) com sucesso.'
                });
                window.location.href = '/profile/' + id_adido.value;
            }

        },

        error: function(data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao cadastrar.'
            });
        }
    });
}
//================================[DELETAR Militar]================================//
function delete_adido(id) {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });

    bootbox.confirm({
        title: ' Deseja excluir este (Ex)Militar?',
        message: '<strong>Essa operação não pode ser desfeita e apagará todos os dados deste (Ex)Militar</strong>',
        callback: function(confirmacao) {

            if (confirmacao)
                $.ajax({
                    url: "/adido/delete/" + id,
                    type: "GET",
                    success: function(data) {
                        $("#table").DataTable().clear().draw(6);
                        Toast.fire({
                            icon: 'success',
                            title: '&nbsp&nbsp (Ex)Militar excluido com sucesso.'
                        });

                    },
                    error: function(data) {
                        Toast.fire({
                            icon: 'error',
                            title: '&nbsp&nbsp Erro excluir.'
                        });

                    }
                });
        },
        buttons: {
            cancel: {
                label: 'Cancelar',
                className: 'btn-default'
            },
            confirm: {
                label: 'Excluir',
                className: 'btn-danger'
            }

        }
    });
}




//================================[ADICIONAR historico do adido]================================//
function add_ocurrence() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });

    if (
        comment.value == ""
    ) {

        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Todos os campos com * devem estar preenchidos.'
        });

        return false;
    }

    if (type.value == "" && typenextevent.value == "") {

        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Escolha um tipo de evento.'
        });

        return false;
    }
    if (type.value && dateOcurrence.value == "") {

        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Selecione uma data para o evento.'
        });

        return false;
    }
    if (typenextevent.value && dateNextOcurrence.value == "") {

        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Selecione uma data para o proximo evento.'
        });

        return false;
    }


    var data = {
        adido_id: adido_id.value,
        comment: comment.value,
        dateNextOcurrence: dateNextOcurrence.value,
        typeNextEvent: typenextevent.value,
        dateOcurrence: dateOcurrence.value,
        type: type.value,
    };
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: '/add_ocurrence',
        type: 'POST',
        data: data,
        dataType: 'text',
        success: function(data) {

            if (data == "error") {

                Toast.fire({
                    icon: 'error',
                    title: '&nbsp&nbsp Os campos com * são obrigatórios.'
                });
            } else {
                $("#registerocurrence").modal('hide');
                $("#table").DataTable().clear().draw(6);
                Toast.fire({
                    icon: 'success',
                    title: '&nbsp&nbsp Ocorrencia adicionada com sucesso.'
                });

                $('#form-ocurrence')[0].reset();
                $(".new_menu").summernote('code', '');
            }

        },

        error: function(data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao adicionadar.'
            });
        }
    });
}
//================================[ADICIONAR historico do adido]================================//
function edit_ocurrence() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });



    if (
        e_comment.value == ""
    ) {

        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Todos os campos com * devem estar preenchidos.'
        });

        return false;
    }


    if (e_type.value == "" && e_typenextevent.value == "") {

        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Escolha um tipo de evento.'
        });

        return false;
    }
    if (e_type.value && e_dateOcurrence.value == "") {

        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Selecione uma data para o evento.'
        });

        return false;
    }
    if (e_typenextevent.value && e_dateNextOcurrence.value == "") {

        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Selecione uma data para o proximo evento.'
        });

        return false;
    }


    var data = {
        ocurrence_id: ocurrence_id.value,
        comment: e_comment.value,
        dateNextOcurrence: e_dateNextOcurrence.value,
        dateOcurrence: e_dateOcurrence.value,
        type: e_type.value,
        typeNextEvent: e_typenextevent.value,
    };
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: '/edit_ocurrence',
        type: 'POST',
        data: data,
        dataType: 'text',
        success: function(data) {

            if (data == "error") {

                Toast.fire({
                    icon: 'error',
                    title: '&nbsp&nbsp Os campos com * são obrigatórios.'
                });
            } else {
                $("#editocurrence").modal('hide');
                $("#table").DataTable().clear().draw(6);
                Toast.fire({
                    icon: 'success',
                    title: '&nbsp&nbsp Ocorrencia adicionada com sucesso.'
                });

                $('#form-ocurrence')[0].reset();
                $(".new_menu").summernote('code', '');
            }

        },

        error: function(data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao adicionadar.'
            });
        }
    });
}
//================================[DELETAR HISTORICO]================================//
function delete_history(id) {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });

    bootbox.confirm({
        title: ' Deseja excluir esta ocorrencia?',
        message: '<strong>Essa operação não pode ser desfeita e apagará esta informação.</strong>',
        callback: function(confirmacao) {

            if (confirmacao)
                $.ajax({
                    url: "/history/delete/" + id,
                    type: "GET",
                    success: function(data) {
                        $("#table").DataTable().clear().draw(6);
                        Toast.fire({
                            icon: 'success',
                            title: '&nbsp&nbsp Excluido com sucesso.'
                        });

                    },
                    error: function(data) {
                        Toast.fire({
                            icon: 'error',
                            title: '&nbsp&nbsp Erro excluir.'
                        });

                    }
                });
        },
        buttons: {
            cancel: {
                label: 'Cancelar',
                className: 'btn-default'
            },
            confirm: {
                label: 'Excluir',
                className: 'btn-danger'
            }

        }
    });
}





function showproceduraldate() {
    var divID = $('#showdiv');
    var datadiv = $('#datadiv');
    divID[0].style.display = 'none';
    datadiv[0].style.display = 'block';

    $('#buttonHide').html('<button type="button" class="btn btn-primary" id="privateproceduraldate" onclick="return privateproceduraldate()">Ocultar dados</button>');
}

function privateproceduraldate() {
    var divID = $('#showdiv');
    var datadiv = $('#datadiv');
    datadiv[0].style.display = 'none';
    divID[0].style.display = 'block';
    $("#privateproceduraldate").detach();
}



//================================[ADICIONAR militar]================================//
function add_report() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });

    var data = {
        adido_id: adido_id.value,
        condition: condition_id.value,
        report: descreport.value,
    }

    if (descreport.value == '') {

        Toast.fire({
            icon: 'success',
            title: '&nbsp&nbsp Preencher o campo descrição.'
        });

        return false;
    }



    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: '/add_report',
        type: 'POST',
        data: data,
        dataType: 'text',
        success: function(data) {

            if (data == "error") {

                Toast.fire({
                    icon: 'error',
                    title: '&nbsp&nbsp Os campos com * são obrigatórios.'
                });
            } else {
                $("#report").modal('hide');
                $("#reportgodfather").DataTable().clear().draw(6);
                Toast.fire({
                    icon: 'success',
                    title: '&nbsp&nbsp Relatório adicionado com sucesso.'
                });

                $('#form-report')[0].reset();
                $(".new_menu").summernote('code', '');
            }

        },

        error: function(data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao adicionar.'
            });
        }
    });
}
//================================[ Editar militar ]================================//
function edit_report() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });

    var data = {
        report_id: e_report_id.value,
        report: e_descreport.value,
    }

    if (e_descreport.value == '') {

        Toast.fire({
            icon: 'success',
            title: '&nbsp&nbsp Preencher o campo descrição.'
        });

        return false;
    }



    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: '/edit_report',
        type: 'POST',
        data: data,
        dataType: 'text',
        success: function(data) {

            if (data == "error") {

                Toast.fire({
                    icon: 'error',
                    title: '&nbsp&nbsp Os campos com * são obrigatórios.'
                });
            } else {
                $("#editreport").modal('hide');
                $("#reportgodfather").DataTable().clear().draw(6);
                Toast.fire({
                    icon: 'success',
                    title: '&nbsp&nbsp Relatório editado com sucesso.'
                });

                $('#form-editreport')[0].reset();
                $(".new_menu").summernote('code', '');
            }

        },

        error: function(data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao adicionar.'
            });
        }
    });
}
//================================[DELETAR Militar]================================//
function delete_report(id) {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });

    bootbox.confirm({
        title: ' Deseja excluir este relatório?',
        message: '<strong>Essa operação não pode ser desfeita e apagará todos os dados deste relatório</strong>',
        callback: function(confirmacao) {

            if (confirmacao)
                $.ajax({
                    url: "/report/delete/" + id,
                    type: "GET",
                    success: function(data) {
                        $("#reportgodfather").DataTable().clear().draw(6);
                        Toast.fire({
                            icon: 'success',
                            title: '&nbsp&nbsp Relatório excluído com sucesso.'
                        });

                    },
                    error: function(data) {
                        Toast.fire({
                            icon: 'error',
                            title: '&nbsp&nbsp Erro excluir.'
                        });

                    }
                });
        },
        buttons: {
            cancel: {
                label: 'Cancelar',
                className: 'btn-default'
            },
            confirm: {
                label: 'Excluir',
                className: 'btn-danger'
            }

        }
    });
}

$(document).ready(function() {
    $("#days").keyup(function() {
        var date = moment(startDate.value, "DD-MM-YYYY").format('YYYY-MM-DD');
        var days = $(this).val();

        var dateres = moment(date).add(days, 'days').toDate();
        $("#dateres").val(moment(dateres).format('DD-MM-YYYY'));
        $("#endDate").val(moment(dateres).format('DD-MM-YYYY'));

    });
});


//Filtrando por Situaçao//
function search_condition() {
    var condition = condition_filter.value;
    $('#table').DataTable().column(3).search(condition).draw();
}