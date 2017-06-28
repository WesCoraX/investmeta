<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Campanhas Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('campanhas/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Cam Investimento</th>
						<th>Cam Objetivo</th>
						<th>Cam Nome</th>
						<th>Cam Inicio</th>
						<th>Cam Fim</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($campanhas as $c){ ?>
                    <tr>
                        <td><?php echo $c['cam_nome']; ?></td>
						<td><?php echo $c['cam_investimento']; ?></td>
						<td><?php echo $c['cam_objetivo']; ?></td>
						<td><?php echo $c['cam_inicio']; ?></td>
						<td><?php echo $c['cam_fim']; ?></td>

						<td>
                            <a href="<?php echo site_url('campanhas/edit/'.$c['cam_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('campanhas/remove/'.$c['cam_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
