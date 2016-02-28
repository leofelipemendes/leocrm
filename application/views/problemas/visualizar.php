<a href="<?php echo base_url(); ?>index.php/problemas/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Problema</a>    
<?php 

if (!$results) { ?>

    <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-user"></i>
            </span>
            <h5>Administração de Tipos de Problemas</h5>

        </div>

        <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Problema</th>
                        <th>Descrição</th>
                        <th>Alimenta Base de Conhecimento</th>
                        <th>Área</th>
                        <th>SLA</th>
<!--                        <th>Categoria 1</th>
                        <th>Categoria 2</th>
                        <th>Categoria 3</th>-->
                        <th>Alterar</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="8">Nenhum &Aacute;rea Cadastrado</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php } else {
    ?>
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-user"></i>
            </span>
            <h5>&Aacute;rea</h5>

        </div>

        <div class="widget-content nopadding">


            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Problema</th>
                        <th><?php echo utf8_encode('Descrição')?></th>
                        <th>Alimenta Base de Conhecimento</th>
                        <th><?php echo utf8_encode('Área')?></th>
                        <th>SLA</th>
<!--                        <th>Categoria 1</th>
                        <th>Categoria 2</th>
                        <th>Categoria 3</th>-->
                        <th>Alterar</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($results as $r) {
                        echo '<tr>';
                        echo '<td>' . $r->prob_id . '</td>';
                        echo '<td>' . strtoupper(utf8_decode($r->problema)). '</td>';
                        echo '<td>' . $r->prob_descricao . '</td>';
                        echo ($r->prob_alimenta_banco_solucao == 1 )? '<td>SIM</td>':'<td> N&Atilde;O </td>';
                        echo '<td>' . $r->sistema. '</td>';
                        echo ($r->slas_desc == '') ? '<td>&nbsp;</td>':'<td>'.$r->slas_desc."</td>";
                        //echo ($r->probt1_desc == '') ? '<td>&nbsp;</td>':'<td>'.$r->probt1_desc."</td>";
                        //echo ($r->probt2_desc == '') ? '<td>&nbsp;</td>':'<td>'.$r->probt2_desc."</td>";
			//echo ($r->probt3_desc == '') ? '<td>&nbsp;</td>':'<td>'.$r->probt3_desc."</td>";
                        echo '<td>';

                        echo '<a href="' . base_url() . 'index.php/problemas/editar/' . $r->prob_id . '" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Area"><i class="icon-pencil icon-white"></i></a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php echo $this->pagination->create_links();
}
?>
<!-- Modal 
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="index.php/clientes/excluir" method="post" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã—</button>
            <h5 id="myModalLabel">Excluir Cliente</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idArea" name="id" value="" />
            <h5 style="text-align: center">Deseja realmente excluir esta area e os dados associados a ela ?</h5>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button class="btn btn-danger">Excluir</button>
        </div>
    </form>
</div>-->


