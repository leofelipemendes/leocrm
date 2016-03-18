
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
<?php
echo form_open('problemas/adicionar', array('id' => 'fmProblemas'));
$data = array(
    'name' => 'problema',
    'id' => 'problema',
    'placeholder' => 'johndoe',
    'class' => 'controls'
);
$style = array(
    'class' => 'inline',
    'style' => 'display:inline-block'
);
?>
<p>
    <?php
    echo form_label('Problema: ', 'problema', $style);
    echo form_input($data);
    ?>

</p>

<?php
$optArea = '';
foreach ($areas as $area) {
    $optArea .= "<option value='$area->sis_id'>$area->sistema</option>";
}?>
<p>
    <?php
     echo form_label('Area: ', 'area', $style);
     ?>
    <select name="area">
    <?php
    echo $optArea 
    ?>    
</select>
<p>
     


<?php
$optSla = '';
foreach ($slas as $sla) {
    $optSla .= "<option value='$sla->slas_cod'> $sla->slas_desc</option>";
}

?>
<p>
    <?php
        echo form_label('SLA: ', 'sla', $style); ?>
        <select name="sla">
        <?php echo $optSla ?>
</select>
</p>
<p>
    
    <?php
    echo form_label( utf8_decode('Descricao :') ,'descricao',$style);
    $data = array(
        'rows'=>'4',
        'cols'=>'4',
        'name'=>'descricao'
            );
        echo form_textarea($data);
    ?>
</p>


<p><?php echo form_submit('Submit', 'Submit'); ?></p>
</div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#fmProblemas').validate({
            rules: {
                problema: {required: true}
                
            },
            messages: {
                problema: {required: 'Campo Requerido.'}
                
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