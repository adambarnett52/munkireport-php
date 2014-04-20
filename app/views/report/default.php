<?$this->view('partials/head', array(
	"scripts" => array(
		"clients/client_list.js"
	)
))?>

<div class="container">

<div class="row">
	<?$this->view('widgets/os_widget')?>
</div> <!-- /row -->

<div class="row">
	<?$this->view('widgets/hardware_widget')?>
</div>

<div class="row"
	<?$this->view('widgets/memory_widget')?>
</div> <!-- /row -->


<div class="row">
	<?$this->view('widgets/extended_hardware_widget')?>
	<?$this->view('widgets/pending_munki_widget')?>
	<?$this->view('widgets/manifests_widget')?>
</div> <!-- /row -->

<div class="row">
	<?$this->view('widgets/modified_computernames_widget')?>
	<?$this->view('widgets/warranty_graph_widget')?>
	<?$this->view('widgets/smart_status_widget')?>
</div>
</div>  <!-- /container -->


<?$this->view('partials/foot')?>
