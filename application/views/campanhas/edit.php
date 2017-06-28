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
						<label for="cam_investimento" class="control-label">Cam Investimento</label>
						<div class="form-group">
							<input type="text" name="cam_investimento" value="<?php echo ($this->input->post('cam_investimento') ? $this->input->post('cam_investimento') : $campanha['cam_investimento']); ?>" class="form-control" id="cam_investimento" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cam_objetivo" class="control-label">Cam Objetivo</label>
						<div class="form-group">
							<input type="text" name="cam_objetivo" value="<?php echo ($this->input->post('cam_objetivo') ? $this->input->post('cam_objetivo') : $campanha['cam_objetivo']); ?>" class="form-control" id="cam_objetivo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cam_nome" class="control-label">Cam Nome</label>
						<div class="form-group">
							<input type="text" name="cam_nome" value="<?php echo ($this->input->post('cam_nome') ? $this->input->post('cam_nome') : $campanha['cam_nome']); ?>" class="form-control" id="cam_nome" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cam_inicio" class="control-label">Cam Inicio</label>
						<div class="form-group">
							<input type="text" name="cam_inicio" value="<?php echo ($this->input->post('cam_inicio') ? $this->input->post('cam_inicio') : $campanha['cam_inicio']); ?>" class="has-datepicker form-control" id="cam_inicio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cam_fim" class="control-label">Cam Fim</label>
						<div class="form-group">
							<input type="text" name="cam_fim" value="<?php echo ($this->input->post('cam_fim') ? $this->input->post('cam_fim') : $campanha['cam_fim']); ?>" class="has-datepicker form-control" id="cam_fim" />
						</div>
					</div>
                    <div class="col-md-6">
                        <label for="cam_user" class="control-label">Cam User</label>
                        <div class="form-group">
                            <input type="text" name="cam_fim" value="<?php echo $this->input->post('cam_user') ? $this->input->post('cam_fim') : $campanha['cam_fim']) ; ?>" class="has-datepicker form-control" id="cam_user" />
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