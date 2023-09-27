<?php 

$d->reset();

$sql_slider_banner = "select * from #_background where  type='watermark' and hienthi=1 order by stt,id desc";

$d->query($sql_slider_banner);

$watermark=$d->fetch_array();

$d->reset();
$sql_tienich = "select id,ten$lang as ten,tenkhongdau,thumb,photo,mota$lang as mota,ngaytao FROM #_news_danhmuc where type='loaitienich' and hienthi=1 and noibat = 1 order by stt desc";		
$d->query($sql_tienich);
$loaitienich = $d->result_array();
?>

		<div class="watermark" style="background-image: url(<?=_upload_hinhanh_l.$watermark['photo']?>); ">
			<h1><?=_nangtamtrainghiem?></h1>
			<p><?=_noidungblog?></p>
			<ul>
			<?php foreach ($loaitienich as $key => $value) { ?>

				<li>

			         <img src="<?=_upload_tintuc_l.$value['photo']?>" alt="<?=$value['ten']?>">

			         <p><?=$value['ten']?></p>

			       </li>
			<?php } ?>
		</ul>	
			
        </div>
