<!-- Modal Cadastrar -->
<div class="modal fade" id="cadastrarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalcadastrarUsuarioLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalcadastrarUsuarioLabel"> Cadastro do Cliente </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <form method="post" href="#">
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome" class="form-label">Nome do Cliente*</label>
                                <input type="text" class="form-control" name="nome" id="nome">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cpf" class="form-label">CPF:*</label>
                                <input type="text" class="form-control" name="cpf" id="cpf">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="cep" class="form-label">CEP*</label>
                                <input type="text" class="form-control" name="cep" id="cep">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="logradouro" class="form-label">Logradouro*</label>
                                <input type="text" class="form-control" name="logradouro" id="logradouro">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bairro" class="form-label">Bairro*</label>
                                <input type="text" class="form-control" name="bairro" id="bairro">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="estado" class="form-label">Estado*</label>
                                <input type="text" class="form-control" name="estado" id="estado">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="cidade" class="form-label">Cidade*</label>
                                <input type="text" class="form-control" name="cidade" id="cidade">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="pais" class="form-label">País*</label>
                                <input type="text" class="form-control" name="pais" id="pais">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="numero" class="form-label">Número*</label>
                                <input type="text" class="form-control" name="numero" id="numero">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary btn-submit ajaxusuario-add">Salvar Cliente
                </button>
            </div>
        </div>
    </div>
</div>
<!-- / Modal Cadastrar -->