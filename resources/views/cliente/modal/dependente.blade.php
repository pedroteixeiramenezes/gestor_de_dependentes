<!-- Modal -->
<div class="modal fade" id="ModalDependenteCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cadastro dos Dependentes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="alert alert-danger d-none" id="saveform_errList_dependente"></ul>
                <ul id="update_msgList_dependente_id_edit"></ul>

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <form id="formulario_dependente" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6 d-none">
                                        <label type="hidden" for="">ID - Cliente </label>
                                        <input type="hidden" id="cliente_id" name="cliente_id"
                                            class="form-control">
                                        <span class="text-danger error-text"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Nome: </label>
                                        <input type="text" id="nome_dependente" name="nome_dependente" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Email: </label>
                                        <input type="text" id="email_dependente" name="email_dependente" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">CPF: </label>
                                        <input type="text" id="cpf_dependente" name="cpf_dependente" class="form-control">
                                    </div>
                                </div>
                                <div class="button-dependente justify-content-center"></div>
                                <button class="btn btn-primary ajaxdependente-add text-align:center" type="submit" id="submit">Salvar Dependente </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">Listagem dos Dependente</div>
                        <div class="card-body" id="AllExtracoes">
                            <table id="tabela_dependente" class="table display">
                                <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> Nome </th>
                                        <th> Email </th>
                                        <th> CPF </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>