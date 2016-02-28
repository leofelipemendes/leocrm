
<a href="<?php echo base_url(); ?>index.php/areas/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar &Aacute;rea</a>    


<?php if (!$results) { ?>

    <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-user"></i>
            </span>
            <h5>Administração de Áreas de Atendimento</h5>

        </div>

        <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>&Aacute;rea</th>
                        <th>Atende Chamados</th>
                        <th>E-mail</th>
                        <th>Tela para abetura de chamados</th>
                        <th>Status</th>
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
                        <th>&Aacute;rea</th>
                        <th>Atende Chamados</th>
                        <th>E-mail</th>
                        <th>Tela para abetura de chamados</th>
                        <th>Status</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($results as $r) {
                        echo '<tr>';
                        echo '<td>' . $r->sis_id . '</td>';
                        echo '<td>' . $r->sistema . '</td>';
                        if ($r->sis_atende == 1) {
                            echo '<td> Sim </td>';
                        } else {
                            echo '<td> N&atilde;o </td>';
                        }
                        echo '<td>' . $r->sis_email . '</td>';
                        echo '<td>' . $r->conf_name . '</td>';
                        if ($r->sis_status == 0) {
                            echo '<td>INATIVO</td>';
                        } else {
                            echo '<td>ATIVO</td>';
                        }

                        echo '<td>';

                        echo '<a href="' . base_url() . 'index.php/areas/editar/' . $r->sis_id . '" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Area"><i class="icon-pencil icon-white"></i></a>';
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


