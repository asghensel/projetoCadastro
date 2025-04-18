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
        <button type="button" onclick="fechar_modal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="mb-3">
          <label class="col-form-label">Descrição do Ativo</label>
          <div id="descricaoInfos" class="form-control bg-light"></div>
        </div>

        <div class="mb-3">
          <label class="col-form-label">Quantidade</label>
          <div id="quantidadeInfos" class="form-control bg-light"></div>
        </div>

        <div class="mb-3">
          <label class="col-form-label">Quantidade Mínima</label>
          <div id="quantidadeMinInfos" class="form-control bg-light"></div>
        </div>

        <div class="mb-3">
          <label class="col-form-label">Tipo</label>
          <div id="tipoInfos" class="form-control bg-light"></div>
        </div>

        <div class="mb-3">
          <label class="col-form-label">Marca</label>
          <div id="marcaInfos" class="form-control bg-light"></div>
        </div>

        <div class="mb-3">
          <label class="col-form-label">Observação Ativo</label>
          <div id="observacaoInfos" class="form-control bg-light"></div>
        </div>

        <div class="mb-3">
          <label class="col-form-label">Data Cadastro</label>
          <div id="dataInfos" class="form-control bg-light"></div>
        </div>

        <div class="mb-3">
          <label class="col-form-label">Usuário</label>
          <div id="usuarioInfos" class="form-control bg-light"></div>
        </div>

        <div class="mb-3 div_previer" style="display:none;">
          <label class="form-label">Preview imagem</label>
          <img alt="Preview" id="previewImagemInfos" class="img-fluid rounded shadow-sm">
        </div>

      </div>
    </div>
  </div>
</div>
