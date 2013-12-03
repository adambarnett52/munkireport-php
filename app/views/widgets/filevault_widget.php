		<div class="col-lg-4">

			<div class="panel panel-default">

				<div class="panel-heading">

					<h3 class="panel-title"><i class="icon-lock"></i> Encyption status</h3>
				
				</div>

				<div class="list-group">

				<?	$fv = new filevault_status_model(); 
$sql= "SELECT count(1) AS count,filevault_status FROM  filevault_status INNER join machine on filevault_status.serial_number = machine.serial_number  where machine_desc like \"MacBook%\"";
#$sql = "SELECT count(1) AS count, filevault_status FROM filevault_status GROUP BY filevault_status ORDER BY filevault_status";
					$cnt = 0;
				?>
					<?foreach($fv->query($sql) as $obj):?>
					<?//$status = array_key_exists($obj->status, $class_list) ? $class_list[$obj->status] : 'danger'?>
					<a href="<?=url('show/listing/security#'.$obj->filevault_status)?>" class="list-group-item list-group-item-<?//=$status?>">
						<span class="badge"><?=$obj->count?></span>
						<?=$obj->filevault_status?>
					<?$cnt++?>
					</a>
					<?endforeach?>

				</div>

			</div><!-- /panel -->

		</div><!-- /col -->
