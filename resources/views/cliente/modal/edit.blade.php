<!-- Modal Editar -->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalEditarUsuarioLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarUsuarioLabel"> Editar Cliente
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ul id="update_msgList"></ul>

                <input type="hidden" id="edit_usuario_id">

                <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome" class="form-label">Nome do Cliente*</label>
                                <input type="text" class="form-control" name="edit_nome" id="edit_nome">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cpf" class="form-label">CPF:*</label>
                                <input type="text" class="form-control" name="edit_cpf" id="edit_cpf">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="cep" class="form-label">CEP*</label>
                                <input type="text" class="form-control" name="edit_cep" id="edit_cep">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="logradouro" class="form-label">Logradouro:*</label>
                                <input type="text" class="form-control" name="edit_logradouro" id="edit_logradouro">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bairro" class="form-label">Bairro*</label>
                                <input type="text" class="form-control" name="edit_bairro" id="edit_bairro">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="estado" class="form-label">Estado*:</label>
                                <input type="text" class="form-control" name="edit_estado" id="edit_estado">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="cidade" class="form-label">Cidade*</label>
                                <input type="text" class="form-control" name="edit_cidade" id="edit_cidade">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="pais" class="form-label">País:*</label>
                                <input type="text" class="form-control" name="edit_pais" id="edit_pais">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="numero" class="form-label">Número*</label>
                                <input type="text" class="form-control" name="edit_numero" id="edit_numero">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" aria-hidden="true" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary ajaxusuario-update">Atualizar Cliente</button>
            </div>
        </div>
    </div>
</div>
<!-- / Modal Editar -->