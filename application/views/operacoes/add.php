<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">New operation</h3>
			</div>
			<?php echo form_open('operacoes/add'); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="ope_campanha" class="control-label"><span class="text-danger">*</span> Campaign</label>
						<div class="form-group">
							<select id="ope_campanha" name="ope_campanha" class="form-control" onchange="camp_details()">
								<option value="">Select one campaign</option>
								<?php 
								foreach($all_campanhas as $campanha) {
									$selected = ($campanha['cam_id'] == $this->input->post('ope_campanha')) ? ' selected="selected"' : "";

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
							<input id="ope_saldo" type="text" name="ope_saldo" value="<?php echo $this->input->post('ope_saldo'); ?>" class="form-control" id="ope_saldo" />
							<span class="text-danger"><?php echo form_error('ope_saldo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="ope_dia" class="control-label"><span class="text-danger">*</span> Day</label>
						<div class="form-group">
							<input type="text" name="ope_dia" value="<?php echo $this->input->post('ope_dia'); ?>" class="has-datepicker form-control" id="ope_dia" />
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
			<div id="box_info" class="box box-info" hidden>
				<p id="camp_info" class="text-danger text-center"></p>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>