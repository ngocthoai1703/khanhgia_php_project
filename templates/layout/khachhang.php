<?php 
$d->reset();
$sql_khachhang = "select id,ten$lang as ten,tenkhongdau,thumb,photo,mota$lang as mota,ngaytao FROM #_news where type='khachhang' and hienthi=1 order by stt desc";		
$d->query($sql_khachhang);
$khachhang = $d->result_array();
?>
<div id="camnang__dulich">
	<h3 class="title"><?=_cauchuyendancu?></h3>
	<ul class="slick__news khachhang">
		<?php foreach ($khachhang as $key => $value) { ?>
			<li >
				<div class="content" style="background: url(<?=_upload_tintuc_l.$value['photo']?>); ">
					<div class="heart"><span><svg xmlns="http://www.w3.org/2000/svg"  x="0px" y="0px"
			            width="70" height="70"
			            style=" fill:#545454; margin-top: 20px ;" viewBox="0 0 448 512"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#545454"><path d="M0 216C0 149.7 53.7 96 120 96h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V320 288 216zm256 0c0-66.3 53.7-120 120-120h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H320c-35.3 0-64-28.7-64-64V320 288 216z"/></svg></span></div>
					
					<!-- <div class="star"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div> -->
					<div class="mota"><?=catchuoi($value['mota'],150)?></div>
					<a class="news--name"><?=$value['ten']?></a>
				</div>
				
			</li>
		<?php } ?>	
	</ul>
</div>