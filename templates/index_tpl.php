<?php 
$sql = "select ten$lang as ten,gia, id_loaitienich,giangay,diachi,dientich,sophongngu,tenkhongdau,thumb from #_product where type='sanpham' and hienthi=1 order by ngaytao desc limit 0,3";
$d->query($sql);
$room = $d->result_array();

$arr_loaitienich = explode(',',$room['id_loaitienich']);
?>
<div id="our__product">
	<h3 class="title"><b><?=_luachonphong?></b> <?=_choban?></h3>
	<ul class="list_room">
		<?php foreach ($room as $key => $value) { ?>
			<li>
				<div class="image">
					<img src="<?=_upload_sanpham_l.$value['thumb']?>" alt="<?=$value['ten']?>">
					
				</div>
				<a href="san-pham/<?=$value['tenkhongdau']?>.html" class="room--name"><?=$value['ten']?></a>
				<div class="popup__detail">
					<div class="utilities">
									<div class="utilities__item">
										<i class="fas fa-wifi"></i>
										<span><?=_wifitocdocao?></span>							
									</div>
									<div class="utilities__item">
										<i class="fas fa-tv"></i>							
										<span><?=_tvtrongphong?></span>							

									</div>
									<div class="utilities__item">
										<i class="fas fa-couch"></i>							
										<span><?=_ghesofa?></span>							
									</div>
									<div class="utilities__item">
										<i class="fas fa-building"></i>							
										<span><?=_viewtp?></span>							
									</div>


								</div>
						
						<!-- <p class="address"><i class="fas fa-map-marker-alt"></i><?=$value['diachi']?></p> -->

						<div class="addr"><b><?=_dientich?>:</b> <?=$value['dientich']?> m2</div>
						<div class="btn_dathang">
						<span class="price"><b><?=_giathue?> </b><br><i class="fa fa-dollar-sign"></i><?=$value['gia']?> <?=_trieuthang?> - <?=$value['giangay']?> <?=_nganngay?></span>

						<a href="san-pham/<?=$value['tenkhongdau']?>.html" class="see__detail"><span><?=_xemchitiet?></span></a>
						</div>
					</div>
			</li>
		<?php } ?>
	</ul>
</div>
