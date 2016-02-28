<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Adicionar &Aacute;rea</h5>
            </div>
            <div class="widget-content nopadding">
                <?php
                if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                }
                ?>
                <form action="<?php echo current_url(); ?>" id="formArea" method="post" class="form-horizontal" >
                    <div class="control-group">
                        <label for="nomeArea" class="control-label">&Aacute;rea<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nomeArea" type="text" name="nomeArea" value=""  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="email" class="control-label">Email<span class="required">*</span></label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value=""  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="abertura" class="control-label">Perfil de abertura de chamados:<span class="required">*</span></label>
                        <div class="controls">
                            <select name="screen_name" id="idScreen">
                                <option value="-1">Selecione o Perfil</option>
                                <?php
                                foreach ($perfil as $p) {
                                        echo "<option value= " . $p->conf_cod . " >" . $p->conf_name . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="status" class="control-label">Status<span class="required">*</span></label>
                        <div class="controls">
                            <select id="idStatus" class="select" name="status">
                                <option value="-1">Selecione o Perfil</option>
                                <option value="1" >ATIVO</option>
                                <option value="0" selected >INATIVO</option>
                            </select>
                            <div class="control-group">
                                <div class="checkbox">
                                   <input type="checkbox" name="areaatende" /> Atende Chamados
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Alterar</button>
                                <a href="<?php echo base_url() ?>index.php/atendimento/areas" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="<?php echo base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#formArea').validate({
            rules: {
                nomeArea: {required: true},
                email: {required: true},
            },
            messages: {
                nomeArea: {required: 'Campo Requerido.'},
                email: {required: 'Campo Requerido.'},
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });
    });
</script>

