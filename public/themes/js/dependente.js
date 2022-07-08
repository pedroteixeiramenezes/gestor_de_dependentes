"use strict"

$(document).ready(function() {

    $('#cpf_dependente').mask('000.000.000-00');

    $(this).on('click', '.add_dependente', function(e) {
        e.preventDefault();
        var cliente_id = $(this).attr('id');
        $('#ModalDependenteCliente').modal("show");
        $('#cliente_id').val(cliente_id);
        console.log(cliente_id);

        $.ajax({
            type: "GET",
            url: "dependente/fetch-dependente/" + cliente_id,
            dataType: "json",
            success: function(response) {
                var tabela = $('#tabela_dependente');
                tabela.find('tbody').html("");
                $.each(response.dependente, function(key, dep) {
                    tabela.find('tbody').append('<tr>\
                    <td>' + dep.id + '</td>\
                    <td>' + dep.nome + '</td>\
                    <td>' + dep.email + '</td>\
                    <td>' + dep.cpf + '</td>\
                    <td>\
                        <a type="button" id=' + dep.id + '\
                            class="edit_dependente btn btn-emergency btn-sm">\
                        <i class="fas fa-pencil-alt"></i>\
                        </a>\
                        <a type="button" id=' + dep.id + '\
                            class="del_dependente btn btn-emergency btn-sm">\
                        <i class="fas fa-trash"></i>\
                    </a>\
                    </td>\
                    </tr>');
                });
            }
        });
    });

    $(this).on('click', '.edit_dependente', function(e) {
        e.preventDefault();
        $(".ajaxdependente-add")[0].style.visibility = 'hidden';
        var dependente_id = $(this).attr('id');
        $(".button-dependente").html('');
        $(".button-dependente").append('<button class="btn btn-primary ajaxdependente-update" id=' + dependente_id + ' type="button">Atualizar Dependente </button>');
        $.ajax({
            type: "GET",
            url: "dependente/edit-dependente/" + dependente_id,
            success: function(response) {
                console.log(response);
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                } else {
                    $('#cliente_id').val(response.Dependente.cliente_id);
                    $('#nome_dependente').val(response.Dependente.nome);
                    $('#cpf_dependente').mask('000.000.000-00');
                    $('#cpf_dependente').val(response.Dependente.cpf);
                    $('#email_dependente').val(response.Dependente.email);
                }
            }
        });
    });

    $(this).on('click', '.ajaxdependente-update', function(e) {
        e.preventDefault();
        var dependente_id = $(this).attr('id');

        var data = {
            'cliente_id': $('#cliente_id').val(),
            'nome_dependente': $('#nome_dependente').val(),
            'cpf_dependente': $('#cpf_dependente').val(),
            'email_dependente': $('#email_dependente').val(),
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                    .attr('content')
            }
        });

        $.ajax({
            type: "PUT",
            url: "dependente/update-dependente/" + dependente_id,
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status == 400) {
                    $('#update_msgList_dependente_id_edit').html("");
                    $('#update_msgList_dependente_id_edit').addClass('alert alert-danger');
                    $.each(response.errors, function(
                        key,
                        err_value) {
                        $('#update_msgList_dependente_id_edit')
                            .append('<li>' +
                                err_value +
                                '</li>');
                    });


                } else if (response.status == 404) {

                    $('#update_msgList_dependente_id_edit').html("");
                    $('#success_message').addClass(
                        'alert alert-success');
                    $('#success_message').text(response
                        .message);

                } else {
                    swal({
                            title: "Dependente Atualizado com Sucesso!",
                            icon: "success",
                            text: 'Fechando em 3 segundos',
                            buttons: false,
                            timer: 3000,
                            showConfirmButton: false, //hide OK button
                            showConfirmButton: false //optional, disable outside click for close the modal
                        })
                        .then((dismiss) => {

                            location.reload();
                            $('#ModalDependenteCliente').modal('hide');
                            document.getElementById("nome_dependente").value = '';
                            document.getElementById("email_dependente").value = '';
                            document.getElementById("cpf_dependente").value = '';
                        });
                }
            }
        });

    });

    $(this).on('click', '.del_dependente', function(e) {
        e.preventDefault();
        var dependente_id = $(this).attr('id');
        $('#deleteing_id').val(dependente_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                    .attr('content')
            }
        });

        swal({
                title: "Tem certeza?",
                text: "Uma vez excluído, você não poderá recuperar este arquivo!",
                icon: "info",
                buttons: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    var data = {
                        "_token": $('input[name=token]').val(),
                        "id": dependente_id,
                    }

                    $.ajax({
                        type: "DELETE",
                        url: "dependente/delete-dependente/" + dependente_id,
                        data: data,
                        success: function(response) {
                            location.reload();
                        }
                    });
                }
            });
    });

    $(document).on('submit', '#formulario_dependente', function(e) {
        e.preventDefault();

        let formData = new FormData($('#formulario_dependente')[0]);

        $.ajax({
            type: "POST",
            url: "dependente",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 400) {
                    $('#saveform_errList_dependente').html("");
                    $('#saveform_errList_dependente').removeClass('d-none');
                    $.each(response.errors, function(key, err_value) {
                        $('#saveform_errList_dependente').append('<li>' + err_value + '</li>');
                    });
                } else if (response.status == 200) {
                    swal({
                            title: "Dependente Adicionado com Sucesso!",
                            icon: "success",
                            text: 'Fechando em 3 segundos',
                            buttons: false,
                            timer: 3000,
                            showConfirmButton: false, //hide OK button
                            showConfirmButton: false //optional, disable outside click for close the modal
                        })
                        .then((dismiss) => {

                            location.reload();
                            $('#ModalDependenteCliente').modal('hide');
                            document.getElementById("nome_dependente").value = '';
                            document.getElementById("email_dependente").value = '';
                            document.getElementById("cpf_dependente").value = '';

                        });
                }
            }
        });

    });

    $('#tabela_dependente').DataTable({
        "info": false, 
        searching: false,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json'
        }
    });
});