<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Marca</h1>
                <button type="button" onclick="fechar_modal()" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Descrição Opção</label>
                        <input type="text" class="form-control" id="descricao" required>
                    </div>


                    <div class="mb-1">
                        <label for="nivel" class="col-form-label">Nível</label>
                        <select class="form-select" id="nivel" onchange="mudaNivel()">
                            <option value="" selected>Selecione o Nível</option>
                            <?php 
                                foreach($niveis as $nivel){
                                    echo '<option value="'.$nivel['idNivel'].'">'.$nivel['descricaoNivel'].'</option>';
                                }
                            ?>
                        </select>
                    </div>

                   
                    <div class="mb-3" id="divOpcMenu" style="display: none;">
                        <label for="superior" class="col-form-label">Opção Menu</label>
                        <select class="form-select" id="superior">
                           
                            
                        </select>
                        
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Url</label>
                        <input type="text" class="form-control" id="url" required>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary">Limpar</button>
                <button type="button" class="btn btn-primary" id="salvar_info">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>