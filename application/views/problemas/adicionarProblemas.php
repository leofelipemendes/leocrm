<?php
echo form_open('problemas/adicionarProblemas',array('id'=>'fmProblemas'));
$data = array(
        'name'          => 'problema',
        'id'            => 'problema',
        'placeholder'   => 'johndoe',
);
echo form_label('Problema: ','problema');
echo form_input($data);
$optArea = '';
foreach ($areas as $area) {
    $optArea .= "<option value='$area->sis_id'>$area->sistema</option>";
}
echo form_label('Area: ','area');
?>

<select name="area">
<?php echo $optArea?>    
</select>
<?php
$optSla = '';
foreach ($slas as $sla) {
    $optSla .= "<option value='$sla->slas_cod'> $sla->slas_desc</option>";
}
echo form_label('SLA: ','sla');
?>

<select name="sla">
<?php echo $optSla?>    
</select>




