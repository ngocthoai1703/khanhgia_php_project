<?php	

$d->reset();
$sql_contact = "select noidung$lang as noidung from #_about where type='footer' limit 0,1";
$d->query($sql_contact);
$company_contact = $d->fetch_array();
?>
<div class="inner"> 
	<div class="banner__info">

	<p>
	<?=$company_contact['noidung']?></p>
		<button><?=_khampha?></button>
	</div>
	<?php include _template."layout/filter.php";?>
	<!-- <?php //include _template."layout/res.php";?> -->
</div>