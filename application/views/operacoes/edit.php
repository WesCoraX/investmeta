<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Operation edit</h3>
			</div>
			<?php echo form_open('operacoes/edit/'.$operacoes['ope_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="ope_campanha" class="control-label"><span class="text-danger">*</span> Campaign</label>
						<div class="form-group">
							<select name="ope_campanha" class="form-control">
								<option value="">Select one campaign</option>
								<?php 
								foreach($all_campanhas as $key => $campanha) {
									if ($campanha['cam_id'] == $operacoes['ope_campanha']) {
										$id 	= $key;
									}
									$selected = ($campanha['cam_id'] == $operacoes['ope_campanha']) ? ' selected="selected"' : "";
									
									echo '<option value="'.$campanha['cam_id'].'" '.$selected.'>'.$campanha['cam_nome'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('ope_campanha');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="ope_saldo" class="control-label"><span class="text-danger">*</span> New Balance</label>
						<div class="form-group">
							<input type="text" name="ope_saldo" value="<?php echo ($this->input->post('ope_saldo') ? $this->input->post('ope_saldo') : $operacoes['ope_saldo']); ?>" class="form-control" id="ope_saldo" />
							<span class="text-danger"><?php echo form_error('ope_saldo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="ope_dia" class="control-label"><span class="text-danger">*</span> Day</label>
						<div class="form-group">
							<input type="text" name="ope_dia" value="<?php echo ($this->input->post('ope_dia') ? $this->input->post('ope_dia') : data_port($operacoes['ope_dia'])); ?>" class="has-datepicker form-control" id="ope_dia" />
							<span class="text-danger"><?php echo form_error('ope_dia');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>

			</div>
			<div class="box box-info">
				<p class="text-danger">OBS.: The campaign <strong><?=$all_campanhas[$id]['cam_nome']; ?></strong> start in <strong><?=data_port($all_campanhas[$id]['cam_inicio']); ?></strong> and finish in<strong> <?=data_port($all_campanhas[$id]['cam_fim']); ?></strong></p>
			</div>
					
			<?php echo form_close(); ?>
		</div>
	</div>
</div>