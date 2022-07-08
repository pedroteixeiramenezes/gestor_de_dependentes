"use strict"

$(document).ready(function() {

    $('#cpf').mask('000.000.000-00');
    $('#cep').mask('00000-000');
    $('#edit_cpf').mask('000.000.000-00');
    $('#edit_cep').mask('00000-000');

    $(document).on('click', '.ajaxusuario-add', function(e) {
        e.preventDefault();

        var nome = $('#nome').val();
        var cpf = $('#cpf').val();
        var logradouro = $('#logradouro').val();
        var numero = $('#numero').val();
        var bairro = $('#bairro').val();
        var cidade = $('#cidade').val();
        var estado = $('#estado').val();
        var pais = $('#pais').val();
        var cep = $('#cep').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                    .attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: 'cliente',
            data: { nome: nome, cpf: cpf, logradouro: logradouro, numero: numero, bairro: bairro, cidade: cidade, estado: estado, pais: pais, cep: cep },
            dataType: 'json',
            success: function(data) {
                if ($.isEmptyObject(data.errors)) {
                    swal({
                            title: "Cliente Adicionado com Sucesso!",
                            icon: "success",
                            text: 'Fechando em 3 segundos',
                            timer: 3000,
                            buttons: false,
                            showConfirmButton: false, //hide OK button
                            showConfirmButton: false //optional, disable outside click for close the modal
                        })
                        .then((dismiss) => {
                            location.reload();
                            $('#cadastrarUsuario').modal('hide');
                        });
                } else {
                    printErrorMsg(data.errors);

                }
            }
        });

        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function(key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }
    });

    $(document).on('click', '.edit_usuario', function(e) {
        e.preventDefault();
        var usuario_id = $(this).attr('id');
        $('#modalEditarUsuario').modal("show");
        $.ajax({
            type: "GET",
            url: "cliente/edit-cliente/" + usuario_id,
            success: function(response) {
                console.log(response);
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#modalEditarUsuario').modal('hide');
                } else {

                    $('#edit_nome').val(response.cliente.nome);
                    $('#edit_cpf').val(response.cliente.cpf);
                    $('#edit_cep').val(response.cliente.cep);
                    $('#edit_logradouro').val(response.cliente.logradouro);
                    $('#edit_bairro').val(response.cliente.bairro);
                    $('#edit_estado').val(response.cliente.estado);
                    $('#edit_cidade').val(response.cliente.cidade);
                    $('#edit_pais').val(response.cliente.pais);
                    $('#edit_numero').val(response.cliente.numero);
                    $('#edit_usuario_id').val(usuario_id);
                }
            }
        });
    });

    $(document).on('click', '.ajaxusuario-update', function(e) {
        e.preventDefault();
        var usuario_id = $('#edit_usuario_id').val();
        console.log(usuario_id);

        var data = {
            'nome': $('#edit_nome').val(),
            'ano': $('#edit_ano').val(),
            'cpf': $('#edit_cpf').val(),
            'logradouro': $('#edit_logradouro').val(),
            'numero': $('#edit_numero').val(),
            'bairro': $('#edit_bairro').val(),
            'cidade': $('#edit_cidade').val(),
            'estado': $('#edit_estado').val(),
            'pais': $('#edit_pais').val(),
            'cep': $('#edit_cep').val(),
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                    .attr('content')
            }
        });

        $.ajax({
            type: "PUT",
            url: "cliente/update-cliente/" + usuario_id,
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status == 400) {
                    $('#update_msgList').html("");
                    $('#update_msgList').addClass(
                        'alert alert-danger');
                    $.each(response.errors, function(
                        key,
                        err_value) {
                        $('#update_msgList')
                            .append('<li>' +
                                err_value +
                                '</li>');
                    });


                } else if (response.status == 404) {

                    $('#update_msgList').html("");
                    $('#success_message').addClass(
                        'alert alert-success');
                    $('#success_message').text(response
                        .message);

                } else {
                    swal({
                            title: "Cliente Atualizado com Sucesso!",
                            icon: "success",
                            text: 'Fechando em 3 segundos',
                            timer: 3000,
                            buttons: false,
                            showConfirmButton: false, //hide OK button
                            showConfirmButton: false //optional, disable outside click for close the modal
                        })
                        .then((dismiss) => {

                            location.reload();
                            $('#modalEditarUsuario').modal('hide');
                            

                        });
                }
            }
        });

    });

    $(document).on('click', '.del_usuario', function(e) {
        e.preventDefault();
        var usuario_id = $(this).attr('id');
        $('#deleteing_id').val(usuario_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                    .attr(
                        'content')
            }
        });

        swal({
                title: "Tem certeza?",
                text: "Uma vez excluído, você não poderá recuperar este arquivo!",
                icon: "info",
                buttons: true,
                timer: 3000,
                showConfirmButton: false, //hide OK button
                showConfirmButton: false //optional, disable outside click for close the modal
            })
            .then((willDelete) => {
                if (willDelete) {

                    var data = {
                        "_token": $('input[name=token]').val(),
                        "id": usuario_id,
                    }

                    $.ajax({
                        type: "DELETE",
                        url: "cliente/delete-cliente/" + usuario_id,
                        data: data,
                        success: function(response) {
                            location.reload();

                        }
                    });
                }
            });
    });

    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var usuario_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'cliente/modificarStatus',
                data: {
                    'status': status,
                    'usuario_id': usuario_id
                },
                success: function(data) {}
            });
        })
    });

    $(function() {
        $('.toggle-class-servicos').change(function() {
            var servicos = $(this).prop('checked') == true ? 1 : 0;
            var usuario_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'cliente/modificarStatusPagamento',
                data: {
                    'servicos': servicos,
                    'usuario_id': usuario_id
                },
                success: function(data) {}
            });
        })
    });



    $(document).on('blur', '#cep', function() {
        const cep = $(this).val();

        $.ajax({
            url: 'https://viacep.com.br/ws/' + cep + '/json/',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.erro) {
                    alert('Endereço Não Encontrado');
                }

                $('#estado').val(data.uf);
                $('#cidade').val(data.localidade);
                $('#logradouro').val(data.logradouro);
                $('#bairro').val(data.bairro);
            }
        });
    });

    $(document).on('blur', '#edit_cep', function() {
        const edit_cep = $(this).val();

        $.ajax({
            url: 'https://viacep.com.br/ws/' + edit_cep + '/json/',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.erro) {
                    alert('Endereço Não Encontrado');
                }

                $('#edit_estado').val(data.uf);
                $('#edit_cidade').val(data.localidade);
                $('#edit_logradouro').val(data.logradouro);
                $('#edit_bairro').val(data.bairro);
            }
        });
    });

    $('#tabela_usuario').DataTable({
        searching: false,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json'
        }
    });
});