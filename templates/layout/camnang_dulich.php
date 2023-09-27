<?php 
$d->reset();
$sql_camnang = "select id,ten$lang as ten,tenkhongdau,thumb,photo,mota$lang as mota,ngaytao FROM #_news where type='camnangdulich' and hienthi=1 order by stt desc";		
$d->query($sql_camnang);
$camnang = $d->result_array();
?>
<div id="camnang__dulich">
	<h3 class="title"><?=_camnangdl?></h3>
	<ul class="slick__news">
		<?php foreach ($camnang as $key => $value) { ?>
			<li class="hover_sang1">
				<a class="image" href="cam-nang-du-lich/<?=$value['tenkhongdau']?>.html"><img  src="thumb/500x500/1/<?=_upload_tintuc_l.$value['photo']?>" alt="<?=$value['ten']?>"></a>
				<div class="content">
					<a class="news--name" href="cam-nang-du-lich/<?=$value['tenkhongdau']?>.html"><?=$value['ten']?></a>
					<div class="mota"><?=catchuoi($value['mota'],150)?></div>
				</div>
				
			</li>
		<?php } ?>	
	</ul>
</div>