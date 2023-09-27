<?php 
#gioi_thieu
$sql = "select ten$lang as ten,mota$lang as mota,title,keywords,description,photo from #_about where type='about' and hienthi=1 limit 0,1";
$d->query($sql);
$about_index = $d->fetch_array();
?>
<?php  include _template."layout/banner_timkiem.php"; ?>
<div class="box_container">
 <div class="content_contact">
		<div class="tt_lh">
			<p><?=_trangchu?> > <b><?=_chinhanh?> <?=_khanhgiaapart?></b> > <b><?=$title_cat?></b></p>
			<h3 class="title"><?=_khanhgiaapart?></h3>
			<span><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
				width="27" height="21"
				viewBox="0 0 384 512"
				style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#000000"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg><?=$company['diachi']?></span>
			<p class="description"> <?=$about_index['mota']?></p>
				
		</div>
		<div class="map">	
			<?=$company['map'];?>
		</div>
	</div>

<?php  include _template."layout/blog.php"; ?>
<div class="chose_phong">
      	<div class="district">
			<h1><?=_chinhanh?></h1>
			<div class="dm_district">
				<li><a href=""><?=_chonphong?></a></li>
				<li><a href=""><?=_khonggian?></a></li>
				<li><a href=""><?=_chinhanh?></a></li>
			</div>
		</div>
</div> 
</div>

<input type="hidden" value="1" class="soluong"  />
<div class="tieude1">
	<h1 class="tieude_giua"><span><?=count($product)?> <?=_luachon?> - <?=$title_cat?></span></h1>
	<div class="huy_phong">
						<p><?=_huyphong?></p>
						<h3><?=_noidunghuyphong?></h3>
					</div>
</div>
<?php if(count($product) > 0){ ?>

	<div class="wap_item">

		<ul class="list_room2">

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

					<div class="image ">

						<a href="san-pham/<?=$value['tenkhongdau']?>.html"><img src="<?=_upload_sanpham_l.$value['thumb']?>" alt="<?=$value['ten']?>"></a>

					</div>

					<div class="content">

						<div class="room_name_after">
							<a href="san-pham/<?=$value['tenkhongdau']?>.html" class="room--name"><?=$value['ten']?></a>

							<p class="diachi"><?=_diachi?> : </b><?=$value['diachi']?></p>
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
				</div>
				<div class="content2">
						<div class="utilities1">
									<div class="utilities__item1">
										<i class="fas fa-wifi"></i>
										<span><?=_wifitocdocao?></span>							
									</div>
									<div class="utilities__item1">
										<i class="fas fa-tv"></i>							
										<span><?=_tvtrongphong?></span>							

									</div>
									<div class="utilities__item1">
										<i class="fas fa-couch"></i>							
										<span><?=_ghesofa?></span>							
									</div>
									<div class="utilities__item1">
										<i class="fas fa-building"></i>							
										<span><?=_viewtp?></span>							
									</div>


								</div>


						<div class="info">

							<span><!-- <i class="fa fa-th-large"></i> --> <?=_dientich?> <br><b><?=$value['dientich']?> m2</b></span>

							<!-- <span><i class="fa fa-bed"></i><?php foreach($p_loaicanho as $e => $result) {
								echo $result." ";
							}?> </span> -->

							<p class="price"><?=_giathue?> <br> <b><?=$value['gia']?> <?=_trieuthang?> - <?=$value['giangay']?> <?=_nganngay?></b></p>

						<a href="san-pham/<?=$value['tenkhongdau']?>.html" class="see__detail2"><?=_xemchitiet?></a>
						<?php if($value['soldout'] > 0 ){ ?>
							<span class="sold__out"><?=_dacokhach?></span>
						<?php }else{ ?>	
							<span class="still_empty"><?=_controng?> </span>
						<?php } ?>

						<span class="room_code"><?=_maphong?> : <?=$value['id']?></span>

						</div>
					</div>

						
			</div>

		</li>

	<?php } ?>

</ul>



<div class="clear"></div>

<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>

</div><!---END .wap_item-->

<?php  include _template."layout/banner.php"; ?>

<?php }else{ ?>

	<div class="not__found">

		<p class="alert">

			<?=_khongtimthay?>!

		</p>

	</div>

<?php } ?>








