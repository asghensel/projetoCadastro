<style>
#previewImagemInfos {
    width: 150px;
    position: relative;
    left: 20%;
}
</style>
<div class="modal fade" id="modalInfos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Informações Ativo</h1>
                <button type="button" onclick="fechar_modal()" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Descrição do Ativo</label>
                        <input type="text" class="form-control" id="descricaoInfos" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Quantidade</label>
                        <input type="number" class="form-control" id="quantidadeInfos" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Quantidade Minima</label>
                        <input type="number" class="form-control" id="quantidadeMinInfos" readonly>
                    </div>


                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Tipo</label>
                        <input type="text" class="form-control" id="tipoInfos" readonly>
                    </div>


                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Marca</label>
                        <input type="text" class="form-control" id="marcaInfos" readonly>
                    </div>



                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Observação Ativo</label>
                        <input type="text" class="form-control" id="observacaoInfos" readonly>
                    </div>

                    
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Data Cadastro</label>
                        <input type="datetime" class="form-control" id="dataInfos" readonly>
                    </div>

                    
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Usuario</label>
                        <input type="text" class="form-control" id="usuarioInfos" readonly>
                    </div>

                   
                    <div class="mb-3 div_previer" style="display:none;">
                        <label for="formFile" class="form-label">Preview imagem</label>
                        <img alt="" id="previewImagemInfos">
                    </div>

            </div>
           
          
        </div>
    </div>
</div>