<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../css/modalImagem.css">
</head>

<style>
.modal_imagem {
    max-width: 1000px !important;
    --bs-modal-width: 1000px !important;
    margin-left: 35em !important;
    text-align: center !important;

}


.fs-5 {
    font-size: 2.0em !important;
    font: 1000 !important;
}


#previewGrande {
    width: 700px;
    margin: auto;
    border: solid 2px black;
    border-radius: 5px;
}
</style>
<div class="modal fade modal_imagem" id="modalImagens" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Imagem do Ativo</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="mb-3 div_previer">
                    <img alt="Imagem do Ativo" id="previewGrande">
                </div>
            </div>
        </div>
    </div>
</div>