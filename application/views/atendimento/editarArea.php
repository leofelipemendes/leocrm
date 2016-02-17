<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Editar &Aacute;rea</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formArea" method="post" class="form-horizontal" >
                    <div class="control-group">
                        <?php echo form_hidden('sis_id',$result->sis_id) ?>
                        <label for="nomeArea" class="control-label">&Aacute;rea<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nomeArea" type="text" name="nomeArea" value="<?php echo $result->sistema; ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="email" class="control-label">Email<span class="required">*</span></label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value="<?php echo $result->sis_email; ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="abertura" class="control-label">Perfil de abertura de chamados:<span class="required">*</span></label>
                        <div class="controls">
                            <input id="abertura" type="text" name="abertura" value="<?php  ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="status" class="control-label">Status<span class="required">*</span></label>
                        <div class="controls">
                            <input id="status" type="text" name="status" value="<?php echo $result->sis_status; ?>"  />
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



<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
           $('#formArea').validate({
            rules :{
                  nomeArea:{ required: true},
                  email:{ required: true},
            },
            messages:{
                  nomeArea :{ required: 'Campo Requerido.'},
                  email:{ required: 'Campo Requerido.'},
            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight:function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
           });
      });
</script>

