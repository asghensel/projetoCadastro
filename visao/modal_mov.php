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
          <div id="ativos" class="form-control bg-light"></div>
        </div>

        <div class="mb-3">
          <label class="col-form-label">Quantidade</label>
          <div id="tipo" class="form-control bg-light"></div>
        </div>

        <div class="mb-3">
          <label class="col-form-label">Quantidade Uso</label>
          <div id="uso" class="form-control bg-light"></div>
        </div>

        <div class="mb-3">
          <label class="col-form-label">Quantidade Antiga</label>
          <div id="antigo" class="form-control bg-light"></div>
        </div>

        <div class="mb-3">
          <label class="col-form-label">Quantidade Total</label>
          <div id="total" class="form-control bg-light"></div>
        </div>

        <div class="mb-3">
          <label class="col-form-label">Local de Origem</label>
          <div id="origems" class="form-control bg-light"></div>
        </div>

        <div class="mb-3">
          <label class="col-form-label">Local de Destino</label>
          <div id="destinos" class="form-control bg-light"></div>
        </div>

        <div class="mb-3">
          <label class="col-form-label">Data da Movimentação</label>
          <div id="data" class="form-control bg-light"></div>
        </div>

        <div class="mb-3">
          <label class="col-form-label">Usuário</label>
          <div id="usuarioInfos" class="form-control bg-light"></div>
        </div>

        <div class="mb-3">
          <label class="col-form-label">Descrição</label>
          <div id="obs" class="form-control bg-light"></div>
        </div>

      </div>
    </div>
  </div>
</div>
