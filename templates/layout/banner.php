

<?php 	

$d->reset();

$sql_slider_banner = "select ten$lang as ten,link,photo from #_slider where  type='banner' and hienthi=1 order by stt,id desc";

$d->query($sql_slider_banner);

$slider_banner=$d->result_array();

$d->reset();

$sql_slider_banner = "select ten$lang as ten,link,photo from #_slider where  type='slider' and hienthi=1 order by stt,id desc";

$d->query($sql_slider_banner);

$slider_banner2=$d->result_array();

?>
<div class="banner">
		<p><?=_khonggiancua?> <b><?=_khanhgiaapart?></b></p>
		<div class="zoom_slick">
	    <div class="img_banner">
			<?php  for($i=0;$i<count($slider_banner);$i++){ ?>	
				<a data-zoom-id="Zoom-detail" id="Zoom-detail" class="MagicZoom" href="<?php if($slider_banner[$i]['photo'] != NULL)echo _upload_hinhanh_l.$slider_banner[$i]['photo'];else echo 'images/noimage.gif';?>" title="<?=$slider_banner[$i]['ten']?>"><img class='cloudzoom' src="<?php if($slider_banner[$i]['photo'] != NULL)echo _upload_hinhanh_l.$slider_banner[$i]['photo'];else echo 'images/noimage.gif';?>" /></a>
			<?php } ?> 
		</div>
	</div>
</div>

 


