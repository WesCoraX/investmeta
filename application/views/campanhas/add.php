<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Campaign Add</h3>
			</div>
			<?php echo form_open('campanhas/add'); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="cam_nome" class="control-label"><span class="text-danger">*</span> Nome da Campanha</label>
						<div class="form-group">
							<input type="text" name="cam_nome" value="<?php echo $this->input->post('cam_nome'); ?>" class="form-control" id="cam_nome" />
							<span class="text-danger"><?php echo form_error('cam_nome');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cam_investimento" class="control-label"><span class="text-danger">*</span> Investimento Inicial</label>
						<div class="form-group">
							<input type="text" name="cam_investimento" value="<?php echo $this->input->post('cam_investimento'); ?>" class="form-control" id="cam_investimento" />
							<span class="text-danger"><?php echo form_error('cam_investimento');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cam_objetivo" class="control-label"><span class="text-danger">*</span> Objetivo Final</label>
						<div class="form-group">
							<input type="text" name="cam_objetivo" value="<?php echo $this->input->post('cam_objetivo'); ?>" class="form-control" id="cam_objetivo" />
							<span class="text-danger"><?php echo form_error('cam_objetivo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cam_inicio" class="control-label"><span class="text-danger">*</span> Data de Inicio</label>
						<div class="form-group">
							<input type="text" name="cam_inicio" value="<?php echo $this->input->post('cam_inicio'); ?>" class="has-datepicker form-control" id="cam_inicio" />
							<span class="text-danger"><?php echo form_error('cam_inicio');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cam_fim" class="control-label"><span class="text-danger">*</span> Data Final</label>
						<div class="form-group">
							<input onblur="campaign_brief()" type="text" name="cam_fim" value="<?php echo $this->input->post('cam_fim'); ?>" class="has-datepicker form-control" id="cam_fim" />
							<span class="text-danger"><?php echo form_error('cam_fim');?></span>
						</div>
					</div>
					<div class="col-md-6">
                        <table class="table">
                            <tr>
                                <th class="col-md-4">Dias Operados</th>
                                <td id="time" class="col-md-8"></td>
                            </tr>
                            <tr>
                                <th class="col-md-4">Meta Diária</th>
                                <td id="rate" class="col-md-8"></td>
                            </tr>
                        </table>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>