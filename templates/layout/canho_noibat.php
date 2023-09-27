<?php 
$d->reset();
$sql="select ten$lang as ten,tenkhongdau,id,thumb from #_product_danhmuc where  type='location' and hienthi=1 order by stt asc,id desc limit 0,6";
$d->query($sql);
$danhmuc_nb=$d->result_array();
?>
<div id="canho__noibat">
	<h3 class="title"><?=_canhonoibat?></h3>
	<div id="tabs">   
		<ul id="ultabs" class="clearfix">                
			<li data-vitri="0" class="active"><?=_tatca?></li>
			<?php for($i=0;$i<count($danhmuc_nb);$i++){ ?>
				<li data-id="<?=$danhmuc_nb[$i]['id']?>"><?=$danhmuc_nb[$i]['ten']?></li>
			<?php } ?>
			<div style="clear:both"></div>   
		</ul>
		<div style="clear:both"></div>

		<div id="content_tabs">               
			
		</div><!---END #tabs--> 


	</div>
</div>
