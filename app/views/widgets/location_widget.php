		<div class="col-lg-4 col-md-5">

			<div class="panel panel-default">

			  <div class="panel-heading">

			    <h3 class="panel-title"><i class="icon-map-marker"></i> Mac on each site</h3>

			  </div>

			  <div class="panel-body text-center">
			  	<?php
			  	$queryobj = new directory_service_model();
				$sql = "SELECT COUNT(*) as total ,
						COUNT(CASE WHEN ipv4ip  LIKE '10.21%' THEN 1 END) AS notbound
						FROM network;";
				$obj = current($queryobj->query($sql));

                $sql1 = "SELECT COUNT(*) as total ,
                        COUNT(CASE WHEN ipv4ip  LIKE '10.20%' THEN 1 END) AS notbound
                        FROM network;";
                $obj1 = current($queryobj->query($sql1));
				?>
				<?if($obj):?>
				<a href="<?=url('show/listing/directoryservice')?>" class="btn btn-success">
					<span class="bigger-150"> <?=$obj->notbound?> </span><br>
					LND
				</a>
				<?endif?>
<?if($obj1):?>
                <a href="<?=url('show/listing/directoryservice')?>" class="btn btn-warning">
                    <span class="bigger-150"> <?=$obj1->notbound?> </span><br>
                    SG
                </a>
                <?endif?>


			  </div>

			</div><!-- /panel -->

		</div><!-- /col -->
