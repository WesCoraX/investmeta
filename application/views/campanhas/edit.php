<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Campanha Edit</h3>
			</div>
			<?php echo form_open('campanhas/edit/'.$campanha['cam_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="cam_nome" class="control-label"><span class="text-danger">*</span> Campaign name</label>
						<div class="form-group">
							<input type="text" name="cam_nome" value="<?php echo ($this->input->post('cam_nome') ? $this->input->post('cam_nome') : $campanha['cam_nome']); ?>" class="form-control" id="cam_nome" />
							<span class="text-danger"><?php echo form_error('cam_nome');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cam_investimento" class="control-label"><span class="text-danger">*</span> Initial application</label>
						<div class="form-group">
							<input type="text" name="cam_investimento" value="<?php echo ($this->input->post('cam_investimento') ? $this->input->post('cam_investimento') : $campanha['cam_investimento']); ?>" class="form-control" id="cam_investimento" />
							<span class="text-danger"><?php echo form_error('cam_investimento');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cam_objetivo" class="control-label"><span class="text-danger">*</span> Goal</label>
						<div class="form-group">
							<input type="text" name="cam_objetivo" value="<?php echo ($this->input->post('cam_objetivo') ? $this->input->post('cam_objetivo') : $campanha['cam_objetivo']); ?>" class="form-control" id="cam_objetivo" />
							<span class="text-danger"><?php echo form_error('cam_objetivo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cam_inicio" class="control-label"><span class="text-danger">*</span> Start</label>
						<div class="form-group">
							<input type="text" name="cam_inicio" value="<?php echo ($this->input->post('cam_inicio') ? $this->input->post('cam_inicio') : data_port($campanha['cam_inicio'])); ?>" class="has-datepicker form-control" id="cam_inicio" />
							<span class="text-danger"><?php echo form_error('cam_inicio');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cam_fim" class="control-label"><span class="text-danger">*</span> End</label>
						<div class="form-group">
							<input onblur="campaign_brief()" type="text" name="cam_fim" value="<?php echo ($this->input->post('cam_fim') ? $this->input->post('cam_fim') : data_port($campanha['cam_fim'])); ?>" class="has-datepicker form-control" id="cam_fim" />
							<span class="text-danger"><?php echo form_error('cam_fim');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<table class="table">
							<tr>
								<th class="col-md-4">Campaign duration</th>
								<td id="time" class="col-md-8"></td>
							</tr>
							<tr>
								<th class="col-md-4">Interest rate per day</th>
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
<script type="text/javascript">
	window.onload = function() {
		campaign_brief();
	};
</script>