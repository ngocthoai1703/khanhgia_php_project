<?php 
$d->reset();
$sql_product_so="select *,ten$lang as ten from #_product where type='sanpham' and soldout=1 and hienthi=1 order by stt asc,id desc";
$d->query($sql_product_so);
$product_so=$d->result_array();
?>
<div id="canho__dathue">
	<h3 class="title"><?=_canhodathue?></h3>
	<ul class="list_room">
		<?php foreach($product_so as $k => $value){	?>
			<li>
				<div class="image zoom_hinh">
					<a href="san-pham/<?=$value['tenkhongdau']?>.html"><img src="<?=_upload_sanpham_l.$value['thumb']?>" alt="<?=$value['ten']?>"></a>
				</div>
				<div class="content">
				<a href="san-pham/<?=$value['tenkhongdau']?>.html" class="room--name"><?=$value['ten']?></a>
				<p class="diachi"><?=$value['diachi']?></p>
				<div class="info">
					<span><i class="fa fa-th-large"></i><?=$value['dientich']?> m2</span>
					<span><i class="fa fa-bed"></i><?=$value['sophongngu']?> <?=_phongngu?></span>
				</div>
				<p class="price">Giá: <?=$value['gia']?> <?=_trieuthang?> - <?=$value['giangay']?> <?=_nganngay?></p>
				<a href="san-pham/<?=$value['tenkhongdau']?>.html" class="see__detail"><?=_xemchitiet?></a>
				<span class="sold__out">Sold</span>
				</div>
			</li>
		<?php } ?>
	</ul>
</div>
