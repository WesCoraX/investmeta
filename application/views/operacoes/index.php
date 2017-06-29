<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Operacoes Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('operacoes/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Ope Id</th>
						<th>Ope Campanha</th>
						<th>Ope Saldo</th>
						<th>Ope Dia</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($operacoes as $o){ ?>
                    <tr>
						<td><?php echo $o['ope_id']; ?></td>
						<td><?php echo $o['ope_campanha']; ?></td>
						<td><?php echo $o['ope_saldo']; ?></td>
						<td><?php echo data_linda($o['ope_dia']); ?></td>
						<td>
                            <a href="<?php echo site_url('operacoes/edit/'.$o['ope_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('operacoes/remove/'.$o['ope_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
