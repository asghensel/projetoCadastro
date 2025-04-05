<style>
    #previewImagem {
        width: 150px;
        position: relative;
        left: 20%;
    }
</style>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Ativo</h1>
                <button type="button" onclick="fechar_modal()" class="btn-close fechar" data-bs-dismiss="modal" 
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="descricao" class="col-form-label">Descrição do Ativo</label>
                        <input type="text" class="form-control" id="descricao" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantidade" class="col-form-label">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade" required>
                    </div>
                 

                
                    <div class="mb-3" id="divObsQuant" style="display: none;">
                        <label for="obsQuant" class="col-form-label">Motivo da alteração da quantidade</label>
                        <input type="text" class="form-control" id="obsQuant" required>
                    </div>

                    <div class="mb-3">
                        <label for="quantidadeMin" class="col-form-label">Quantidade Minima</label>
                        <input type="number" class="form-control" id="quantidadeMin" required>
                    </div>
                    <div class="mb-1">
                        <label for="marca" class="col-form-label">Marca</label>
                        <select class="form-select" id="marca" required>
                            <option value="">Selecione a marca</option>
                            <?php 
                            foreach($marcas as $marca){
                                echo '<option value="'.$marca['idMarca'].'">'.$marca['descricaoMarca'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="tipo" class="col-form-label">Tipo</label>
                        <select class="form-select" id="tipo" required>
                            <option value="">Selecione o tipo</option>
                            <?php 
                            foreach($tipos as $tipo){
                                echo '<option value="'.$tipo['idTipo'].'">'.$tipo['descricaoTipo'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="observacao" class="col-form-label">Observação Ativo</label>
                        <input type="text" class="form-control" id="observacao" required>
                    </div>
                    <div class="mb-3">
                        <label for="imgAtivo" class="form-label">Adicionar imagem</label>
                        <input class="form-control" accept="image/png,image/WEBP, image/jpeg, image/jpg" type="file" id="imgAtivo">
                    </div>
                    <div class="mb-3 div_previer" style="display: none;">
                        <label for="formFile" class="form-label">Preview imagem</label>
                        <img alt="" id="previewImagem">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary">Limpar</button>
                <button type="button" class="btn btn-primary" id="salvar_info">Salvar</button>
            </div>
        </div>
    </div>
</div>
