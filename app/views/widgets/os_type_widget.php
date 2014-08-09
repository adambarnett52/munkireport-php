		<div class="col-lg-12 col-md-5">

			<div class="panel panel-default">

			  <div class="panel-heading">

			    <h3 class="panel-title"><i class="icon-map-marker"></i> OS </h3>

			  </div>

			  <div class="panel-body text-center">
			  	<?php
			  	$queryobj = new directory_service_model();
				$sql = "SELECT COUNT(*) as total ,
						COUNT(CASE WHEN os_version  is '10.9' THEN 1 END) AS notbound
						FROM machine;";
				$obj = current($queryobj->query($sql));

                $sql1 = "SELECT COUNT(*) as total ,
                        COUNT(CASE WHEN os_version  is '10.9.2' THEN 1 END) AS notbound
                        FROM machine;";
                $obj1 = current($queryobj->query($sql1));
				?>
				<?if($obj):?>
				<a href="<?=url('show/listing/directoryservice')?>" class="btn btn-success">
					<span class="bigger-250"> <?=$obj->notbound?> </span><br>
					10.9
				</a>
				<?endif?>
<?if($obj1):?>
                <a href="<?=url('show/listing/directoryservice')?>" class="btn btn-warning">
                    <span class="bigger-150"> <?=$obj1->notbound?> </span><br>
                    10.9.2
                </a>
                <?endif?>


			  </div>

			</div><!-- /panel -->

		</div><!-- /col -->
