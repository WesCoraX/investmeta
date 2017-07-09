<div class="col-md-2">
	<form class="form-inline" method="POST">
		<div class="form-group ">
			<select class="form-control" id="camp_chosen" name="camp_chosen" required>
				<option value="">Select one campaign</option>
				<?php if (isset($dballcamp) AND $dballcamp != ''): ?>
					<?php foreach ($dballcamp as $value): ?>
						<?php
						$a 		= isset($_POST['camp_chosen']) ? $_POST['camp_chosen'] : '';
						$b 		= $value['cam_id'];
						$selected 	= ($a == $b) ? 'selected' : '';
						?>
						<option value="<?=$value['cam_id']; ?>" <?=$selected; ?>><?=$value['cam_nome']; ?></option>
					<?php endforeach ?>
				<?php endif ?>
			</select>
			<span class="text-danger"><?php echo form_error('camp_chosen');?></span>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-default"><?php echo $button ?></button>
		</div>
	</form>

	<br />

	<?php if (isset($history)): ?>
		<table class="table table-striped table-hover table-responsive">
			<tr>
				<th class="text-center success" colspan="3">History of campaign <strong><?=$dbchosencamp['cam_nome']; ?></strong></th>
			</tr>
			<tr>
				<th>Start</th>
				<th>Goal</th>
				<th>Now</th>

			</tr>
			<tr>
				<td><?=$old_value = $dbchosencamp['cam_investimento']; ?></td>
				<td><?=$goal = $dbchosencamp['cam_objetivo']; $result = end($history); ?></td>
				<td class="<?php 
				if ($result >= $old_value AND $result < $goal) {
					echo 'info';
				} elseif ($result > $goal) {
					echo 'success';
				} else { echo 'danger'; } ?>"><?=$result; ?></td>
				
			</tr>
		</table>
		<table class="table table-striped table-hover table-responsive">
			<tr>
				<th>Day</th>
				<th>Balance</th>
				<th>Result</th>
			</tr>
			<?php foreach ($history as $key => $value): ?>
				<tr>
					<td><?=data_port($key); ?></td>
					<td><?=$value; $result = ($value - $old_value); $old_value = $value;?></td>
					<td class="<?=($result > 0 ) ? 'success' : 'danger' ?>"><?=$result; ?></td>
				</tr>
			<?php endforeach ?>
			
		</table>
	<?php endif ?>
</div>

<div class="col-md-10">
	<?php if (isset($path) AND $path != ''): ?>
		<?php $x = 0; ?>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);

			function drawChart() {
				var data = google.visualization.arrayToDataTable([
				                                                 ['Day',	'Goal',	'Reality'],
				                                                 <?php foreach ($path as $key => $value): ?>
				                                                 ['<?=$key; ?>',	<?=$value; ?>,	<?=$operate[$x]; ?>],
				                                                 <?php $x++; ?>
				                                         <?php endforeach ?>
				                                         ]);

				var options = {
					title: 'Analysis graph',
					curveType: 'function',
					legend: { position: 'bottom' },
					series: {
						0: { lineWidth: 5, color: '#3c8dbc', },
						1: { lineWidth: 1, color: '#FF0000',},
					},
					backgroundColor: { 
						fill:'transparent',
					}
				};

				var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

				chart.draw(data, options);
			}
		</script>
	<?php endif ?>
	
	<?php if (isset($dbchosencamp)): ?>
		<h3 class="text-center"><?=$dbchosencamp['cam_nome']; ?></h3>
		<h5 class="text-center"><?=data_port($dbchosencamp['cam_inicio']).' - '.data_port($dbchosencamp['cam_fim']); ?></h5>
	<?php endif ?>
	
	<div id="line_chart" class="chart-div">
		
	</div>
</div>