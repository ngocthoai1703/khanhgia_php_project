<?php 



include ("ajax_config.php");



$id_danhmuc =(int)$_GET['id_danhmuc'];

$d->reset();

$sql_tendanhmuc = "select tenkhongdau from #_product_danhmuc where id='".$id_danhmuc."' and type='sanpham' ";		

$d->query($sql_tendanhmuc);

$tendanhmuc = $d->fetch_array();

if($id_danhmuc == '' || $id_danhmuc == 0)

{

	$d->reset();

	$sql = "select id,ten$lang as ten,tenkhongdau,thumb,photo,masp,gia,giacu,giangay,diachi,dientich,sophongngu,soldout,id_loaicanho FROM #_product where type='sanpham' and hienthi=1 order by stt asc,id desc limit 0,12";		

	$d->query($sql);

	$product = $d->result_array();

	$tendanhmuc['tenkhongdau']='tat-ca';

}

else

{

	$d->reset();

	$sql = "select id,ten$lang as ten,tenkhongdau,thumb,photo,masp,gia,giangay,giacu,diachi,dientich,sophongngu,soldout,id_loaicanho FROM #_product where id_danhmuc=".$id_danhmuc." and type='sanpham' and hienthi=1 order by stt asc,id desc limit 0,12";		

	$d->query($sql);

	$product = $d->result_array();	

}





?>



<div class="tags">

	<ul class="list_room">

		<!-- <?php foreach($product as $k => $value){	?>

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

				<p class="price"><?=_gia?>: <?=$value['gia']?> <?=_trieuthang?> - <?=$value['giangay']?> <?=_nganngay?></p>

				<a href="san-pham/<?=$value['tenkhongdau']?>.html" class="see__detail"><?=_xemchitiet?></a>
				<?php if($value['soldout'] > 0 ){ ?>
					<span class="sold__out">Đã có khách</span>
				<?php }else{ ?>
					<span class="still_empty">Còn trống </span>
				<?php } ?>


				<span class="room_code"><?=_maphong?> : <?=$value['id']?></span>

				</div>

			</li>

			<?php } ?> -->


			<?php foreach($product as $k => $value){	?>
				<?php 
				$d->reset();

				$sql_quan = "select ten FROM #_product_danhmuc where id='".$value['id_danhmuc']. "'";       

				$d->query($sql_quan);

				$p_quan = $d->fetch_array(); 

				$d->reset();

				$sql_phuong = "select ten FROM #_product_list where id='".$value['id_list']. "'";       

				$d->query($sql_phuong);

				$p_phuong = $d->fetch_array(); 



				$d->reset();

				$sql_duong = "select ten FROM #_product_cat where id='".$value['id_cat']. "'";       

				$d->query($sql_duong);

				$p_duong = $d->fetch_array();



				$d->reset();

				$sql_loaicanho = "select ten FROM #_news_danhmuc where id='".$value['id_loaicanho']. "'";       

				$d->query($sql_loaicanho);

				$p_loaicanho = $d->fetch_array();




				?>

				<li>

					<div class="image zoom_hinh">

						<a href="san-pham/<?=$value['tenkhongdau']?>.html"><img src="<?=_upload_sanpham_l.$value['thumb']?>" alt="<?=$value['ten']?>"></a>

					</div>

					<div class="content">

						<a href="san-pham/<?=$value['tenkhongdau']?>.html" class="room--name"><?=$value['ten']?></a>

						<p class="diachi"><?=_diachi?>:</b><?=$value['diachi']?></p>
<!-- 										<p class="diachi"><?=_diachi?>:</b>đường           
							<?php
							foreach( $p_duong as $values ){
								echo "$values";
							}
						?>,phường           
						<?php foreach( $p_phuong as $values ){
							echo "$values";
						}
					?>,quận 
					<?php  foreach( $p_quan as $values ){
						echo "$values";
					} 
				?></p> -->

				<div class="info">

					<span><i class="fa fa-th-large"></i><?=$value['dientich']?> m2</span>

					<span><i class="fa fa-bed"></i><?php foreach($p_loaicanho as $e => $result) {
						echo $result." ";
					}?> </span>

				</div>

				<p class="price"><?=_gia?>: <?=$value['gia']?> <?=_trieuthang?> - <?=$value['giangay']?> <?=_nganngay?></p>

				<a href="san-pham/<?=$value['tenkhongdau']?>.html" class="see__detail"><?=_xemchitiet?></a>
				<?php if($value['soldout'] > 0 ){ ?>
					<span class="sold__out">Đã có khách</span>
				<?php }else{ ?>	
					<span class="still_empty">Còn trống </span>
				<?php } ?>

				<span class="room_code"><?=_maphong?> : <?=$value['id']?></span>
			</div>

		</li>

	<?php } ?>

</ul>

<a href="<?php if($id_danhmuc==0){ ?>can-ho-noi-bat.html<?php }else{ ?>can-ho-noi-bat/<?=$tendanhmuc['tenkhongdau']?>/<?php } ?>" class="see__more"><?=_xemthem?></a>

</div>

