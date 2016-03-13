<?php
echo form_open('problemas/adicionarProblemas',array('id'=>'fmProblemas'));
$data = array(
        'name'          => 'problema',
        'id'            => 'problema',
        'placeholder'   => 'johndoe',
);
echo form_label('Problema: ','problema');
echo form_input($data);
//foreach ($areas as $areas) {
//    $optioins[] =  array($areas->sis_id,$areas->sistema);
//}
var_dump($areas);


//foreach ($slas as $sla) {
//    echo $sla->slas_desc;
//}
