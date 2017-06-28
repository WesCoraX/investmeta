<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Operaco Edit</h3>
            </div>
			<?php echo form_open('operacoes/edit/'.$operaco['ope_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="ope_campanha" class="control-label">Campanha</label>
						<div class="form-group">
							<select name="ope_campanha" class="form-control">
								<option value="">select campanha</option>
								<?php 
								foreach($all_campanhas as $campanha)
								{
									$selected = ($campanha['cam_id'] == $operaco['ope_campanha']) ? ' selected="selected"' : "";

									echo '<option value="'.$campanha['cam_id'].'" '.$selected.'>'.$campanha['cam_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="ope_saldo" class="control-label">Ope Saldo</label>
						<div class="form-group">
							<input type="text" name="ope_saldo" value="<?php echo ($this->input->post('ope_saldo') ? $this->input->post('ope_saldo') : $operaco['ope_saldo']); ?>" class="form-control" id="ope_saldo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="ope_dia" class="control-label">Ope Dia</label>
						<div class="form-group">
							<input type="text" name="ope_dia" value="<?php echo ($this->input->post('ope_dia') ? $this->input->post('ope_dia') : $operaco['ope_dia']); ?>" class="has-datepicker form-control" id="ope_dia" />
						</div>
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