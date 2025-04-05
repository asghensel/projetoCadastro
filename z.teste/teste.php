<div class="container">
        <div class="row" style="display: grid !important;">
           
                <label for="turma" class="form-label titulo"><h1>Acesso Usuário</h1></label>
                <select name="cargo" id="cargo" onchange="busca_acesso()" class="form-control">
                    <option value="">Selecione o cargo</option>
                    <?php
                    foreach ($cargos as $value) {
                        echo '<option value="' . $value['idCargo'] . '">' . $value['descricaoCargo'] . '</option>';
                    }
                    ;
                    ?>
                </select>
           
        </div>

        <?php
        var_dump($novoArr);
        foreach ($novoArr as $idOpcao => $opcao) {
            
            ?>
            <div class="row">
                <?php
                $nivel = $opcao['NIVEL_OPCAO'];
                $padding = "";
                if ($nivel == 1) {
                    $padding = "padding-left: 0px;";
                } else if ($nivel == 2) {
                    $padding = "padding-left: 15px;";
                } else if ($nivel == 3) {
                    $padding = "padding-left: 30px;";

                }
                ?>
                <div class="linha_opcao" style="<?php echo $padding; ?>">


                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 check <?php echo $idOpcao; ?>" type="checkbox" value="<?php echo $idOpcao; ?>"
                                aria-label="Checkbox for following text input">
                        </div>
                        <?php
                        echo $opcao['DESCR_OPCAO'];
                        ?>
                    </div>
                </div>
            </div>
                <?php
        }
        ?>
            
        <button type="button" class="btn btn-primary salvarAcesso">Salvar Acesso</button>
    </div>