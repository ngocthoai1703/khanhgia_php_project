







<script type="text/javascript" src="js/jquery.min.js"></script>



<script type="text/javascript" src="js/my_script.js"></script>



<link href="fontawesome/css/font-awesome.css" type="text/css" rel="stylesheet" />





<!--Menu mobile-->

<script type="text/javascript" src="js/jquery.mmenu.min.all.js"></script>

<script type="text/javascript">

	$(function() {

		$m = $('nav#menu').html();

		$('nav#menu_mobi').append($m);

		$('nav#menu_mobi .search').addClass('search_mobi').removeClass('search');

		$('.hien_menu').click(function(){

			$('nav#menu_mobi').css({height: "auto"});

		});

		$('.user .fa-user-plus').toggle(function(){

			$('.user ul').slideDown(300);

		},function(){

			$('.user ul').slideUp(300);

		});

		

		$('nav#menu_mobi').mmenu({

			extensions	: [ 'effect-slide-menu', 'pageshadow' ],

			searchfield	: true,

			counters	: true,

			navbar 		: {

				title		: 'Menu'

			},

			navbars		: [

			{

				position	: 'top',

				content		: [ 'searchfield' ]

			}, {

				position	: 'top',

				content		: [

				'prev',

				'title',

				'close'

				]

			}, {

				position	: 'bottom',

				content		: [

				'<a>Online : <?php $count=count_online();echo $tong_xem=$count['dangxem'];?></a>',

				]

			}

			]

		});

	});

</script>

<!--Menu mobile-->



<!--Hover menu-->

<script language="javascript" type="text/javascript">

	$(document).ready(function() { 

		//Hover vào menu xổ xuống

		$(".menu ul li").hover(function(){

			$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(300); 

		},function(){ 

			$(this).find('ul:first').css({visibility: "hidden"});

		}); 

		$(".menu ul li").hover(function(){

			$(this).find('>a').addClass('active2'); 

		},function(){ 

			$(this).find('>a').removeClass('active2'); 

		}); 

		//Hover vào danh mục xổ xuống

		/*$("#danhmuc ul li").hover(function(){

			$(this).find('ul:first').show(300); 

		},function(){ 

			$(this).find('ul:first').hide(300);

		}); */

		//Click vào danh mục xổ xuống

		$("#danhmuc > ul > li > a").click(function(){

			if($(this).parents('li').children('ul').find('li').length>0)

			{

				$("#danhmuc ul li ul").hide(300);

				

				if($(this).hasClass('active'))

				{

					$("#danhmuc ul li a").removeClass('active');

					$(this).parents('li').find('ul:first').hide(300); 

					$(this).removeClass('active');

				}

				else

				{

					$("#danhmuc ul li a").removeClass('active');

					$(this).parents('li').find('ul:first').show(300); 

					$(this).addClass('active');

				}

				return false;

			}

		});

	});  

</script>

<!--Hover menu-->



<script type="text/javascript" src="js/slick.min.js"></script>

<script src="js/fotorama.js" type="text/javascript"></script>





<!--Thêm alt cho hình ảnh-->

<script type="text/javascript">

	$(document).ready(function(e) {

		$('img').each(function(index, element) {

			if(!$(this).attr('alt') || $(this).attr('alt')=='')

			{

				$(this).attr('alt','<?=$company['ten']?>');

			}

		});

	});

</script>

<!--Thêm alt cho hình ảnh-->



<!--Tim kiem-->

<script type="text/javascript"> 

	function doEnter(evt){

		var key;

		if(evt.keyCode == 13 || evt.which == 13){

			onSearch(evt);

		}

	}

	function onSearch(evt) {			



		var keyword = document.getElementById("keyword").value;

		if(keyword=='' || keyword=='<?=_nhaptukhoatimkiem?>...')

		{

			alert('<?=_chuanhaptukhoa?>');

		}

		else{

			location.href = "tim-kiem.html&keyword="+keyword;

			loadPage(document.location);			

		}

	}		

</script>   

<!--Tim kiem-->





<?php if($template=='index') { ?>

	<script type="text/javascript">

		$(document).ready(function() {

			$('.btn_search').click(function(){
				console.log("Hello")

				var quan = $('#id_danhmuc').val();

				var  huyen= $('#id_list_huyen').val();

				var duong = $('#id_cat').val();

				var sgiamin = $('#pricemin').val();

				var sgiamax = $('#pricemax').val();

				var stype = $('#apartment').val();

				var id_room = $('#service').val();
	

					window.location ="tim-kiem.html&sdis="+quan+"&scou="+huyen+"&strs="+duong+"&smin="+sgiamin+"&smax="+sgiamax+"&stype="+stype+"&sroom="+id_room+"";
				




				return false;

			});    

		});

	</script>



<!-- <script  type="text/javascript">

	$(document).ready(function(){

		$('#title_tab li:first').addClass('active');

		var id_danhmuc = $('#title_tab li:first').attr('data-id');

		$('#content_tabs').load( "ajax/load_sanpham.php?id_danhmuc="+id_danhmuc);

		

		$('#title_tab li').click(function(){

			var id_danhmuc = $(this).attr('data-id');

			$('#title_tab li').removeClass('active');

			$(this).addClass('active');

			$('#content_tabs').load( "ajax/load_sanpham.php?id_danhmuc="+id_danhmuc);

			return false;

		});	

	});

</script> -->



<script language="javascript" type="text/javascript">

	$(document).ready(function(){

		

		$('#ultabs li:first').addClass('active');

		var id_danhmuc = $('#title_tab li:first').attr('data-id');

		$('#content_tabs').load( "ajax/load_sanpham.php?id_danhmuc="+id_danhmuc);



		$('#ultabs li').click(function(){

			var id_danhmuc = $(this).attr('data-id');

			$('#ultabs li').removeClass('active');

			$(this).addClass('active');

			$('#content_tabs').load( "ajax/load_sanpham.php?id_danhmuc="+id_danhmuc);

			

			return false;

		});

	});

</script>

<!--Tags sản phẩm-->



<script type="text/javascript">

	$(document).ready(function(){



		



		$('#canho__dathue .list_room,.slick__news').slick({

        	infinite: true,//Lặp lại

        	accessibility:false,

		  	slidesToScroll: 1, //Số item cuộn khi chạy

		  	autoplay:true,  //Tự động chạy

			autoplaySpeed:5000,  //Tốc độ chạy

			speed:1000,//Tốc độ chuyển slider

			arrows:true, //Hiển thị mũi tên

			centerMode:false,  //item nằm giữa

			dots:false,  //Hiển thị dấu chấm

			draggable:true,  //Kích hoạt tính năng kéo chuột

			mobileFirst:true,

			pauseOnHover:true,

			//variableWidth: true//Không fix kích thước

			responsive: [

			{

				breakpoint:1200,

				settings: {

					slidesToShow: 3,

				}

			},

			{

				breakpoint:920,

				settings: {

					slidesToShow: 3,

				}

			},

			{

				breakpoint:620,

				settings: {

					slidesToShow: 2,

				}

			},

			{

				breakpoint:270,

				settings: {

					slidesToShow: 1,

				}

			}

			]

		});

	});

</script>











<script type="text/javascript">

	$(document).ready(function(){

		$('#slick_tintuc_i').slick({

        	infinite: true,//Lặp lại

			vertical:true,//Chay dọc

			accessibility:true,

			slidesToShow:2,

		  	slidesToScroll: 1, //Số item cuộn khi chạy

		  	autoplay:true,  //Tự động chạy

			autoplaySpeed:4000,  //Tốc độ chạy

			speed:1000,//Tốc độ chuyển slider

			arrows:false, //Hiển thị mũi tên

			centerMode:false,  //item nằm giữa

			dots:false,  //Hiển thị dấu chấm

			draggable:true,  //Kích hoạt tính năng kéo chuột

			mobileFirst:true,

			pauseOnHover:true,

			verticalSwiping: true,

			//variableWidth: true//Không fix kích thước

			

		});

	});

</script>







<?php } ?>





<?php if($template=='product_detail') { ?>

	<!-- slick -->

	<script type="text/javascript">

		$(document).ready(function(e) {

			$('.click_send').click(function(){



				if(isEmpty($('.fullname').val(), "<?=_nhaphoten?>"))

				{

					$('.fullname').focus();

					return false;

				}



				if(isEmpty($('.phonenumber').val(), "<?=_nhapsodienthoai?>"))

				{

					$('.phonenumber').focus();

					return false;

				}



				if(isEmpty($('.email').val(), "<?=_emailkhonghople?>"))

				{

					$('.email').focus();

					return false;

				}

				if(isEmail($('.email').val(), "<?=_emailkhonghople?>"))

				{

					$('.email').focus();

					return false;

				}



				if(isEmpty($('.arrive').val(), "Chọn ngày đến"))

				{

					$('.arrive').focus();

					return false;

				}

				if(isEmpty($('.departure').val(), "Chọn ngày đi"))

				{

					$('.departure').focus();

					return false;

				}







				$.ajax({

					type:'post',

					url:$(".frm_dangkythuephong").attr('action'),

					data:$(".frm_dangkythuephong").serialize(),

					dataType:'json',



					error: function(){

						add_popup('<?=_hethongloi?>');

					},

					success:function(kq){



						$('.thongbao').html('<?=_camontinnhan?>');

						$('.thongbao').slideDown( "slow" );

						if(kq.nhaplai=='nhaplai')

						{

							$(".frm_dangkythuephong")[0].reset();

						}



					}

				});

			});    

		});

	</script>

	<script type="text/javascript">

		$(document).ready(function(){

			$('.slick2').slick({

				slidesToShow: 1,

				slidesToScroll: 1,

				arrows: false,

				fade: true,

			  autoplay:false,  //Tự động chạy

			  autoplaySpeed:5000,  //Tốc độ chạy

			  asNavFor: '.slick'			 

			});

			$('.slick').slick({

				slidesToShow: 4,

				slidesToScroll: 1,

				asNavFor: '.slick2',

				dots: false,

				centerMode: false,

				focusOnSelect: true

			});

			return false;

		});

	</script>

	<!-- slick -->



	<script src="magiczoomplus/magiczoomplus.js" type="text/javascript"></script>

	<script type="text/javascript">

		var mzOptions = {

			zoomMode:false,

			onExpandClose: function(){MagicZoom.refresh();}

		};

	</script>





	<script  type="text/javascript">

		$(document).ready(function(){

			$('#content_tabs .tab').hide();

			$('#content_tabs .tab:first').show();

			$('#ultabs li:first').addClass('active');



			$('#ultabs li').click(function(){

				var vitri = $(this).data('vitri');

				$('#ultabs li').removeClass('active');

				$(this).addClass('active');



				$('#content_tabs .tab').hide();

				$('#content_tabs .tab:eq('+vitri+')').show();

				return false;

			});	

		});

	</script>

	<!--Tags sản phẩm-->



<?php } ?>





<?php if($com=='gio-hang') { ?>

	<script type="text/javascript">

		$(document).ready(function(e) {



			$('.click_ajax2').click(function(){

				if(isEmpty($('#httt').val(), "<?=_chonhinhthucthanhtoan?>"))

				{

					$('#httt').focus();

					return false;

				}

				if(isEmpty($('#hoten').val(), "<?=_nhaphoten?>"))

				{

					$('#hoten').focus();

					return false;

				}

				if(isEmpty($('#dienthoai').val(), "<?=_nhapsodienthoai?>"))

				{

					$('#dienthoai').focus();

					return false;

				}

				if(isPhone($('#dienthoai').val(), "<?=_nhapsodienthoai?>"))

				{

					$('#dienthoai').focus();

					return false;

				}





				if(isEmpty($('#diachi').val(), "<?=_nhapdiachi?>"))

				{

					$('#diachi').focus();

					return false;

				}



				if(isEmpty($('#email_lienhe').val(), "<?=_emailkhonghople?>"))

				{

					$('#email_lienhe').focus();

					return false;

				}

				if(isEmpty($('#noidung').val(), "<?=_nhapnoidung?>"))

				{

					$('#noidung').focus();

					return false;

				}

				frm_order.submit();

			});    

		});

	</script>

<?php } ?>



<!--Code gữ thanh menu trên cùng-->

<script type="text/javascript">

	$(document).ready(function(){

		$(window).scroll(function(){

			var cach_top = $(window).scrollTop();

			var height_header = $('.wap_menu').height() + $('#header').height() + 10 ;



			if(cach_top >= height_header){

				$('div.wap_menu').addClass('fixed');



			}else{

				$('div.wap_menu').removeClass('fixed');



			}

		});

	});

</script>





<!-- <script type="text/javascript" src="js/jquery.lockfixed.min.js"></script>

<script type="text/javascript">

	$(window).load(function(e) {

		(function($) {

				var left_h=$('#col_left').height();

				var main_h=$('#col_right').height();

				if(main_h>left_h) 

				{

					$.lockfixed("#danhmuc_left",{offset: {top: 100, bottom:300}});

				}

		})(jQuery);

	});

</script> -->





<script type="text/javascript">

	$(document).ready(function(e) {

		$('.click_ajax').click(function(){

			if(isEmpty($('#ten_lienhe').val(), "<?=_nhaphoten?>"))

			{

				$('#ten_lienhe').focus();

				return false;

			}

			

			if(isEmpty($('#dienthoai_lienhe').val(), "<?=_nhapsodienthoai?>"))

			{

				$('#dienthoai_lienhe').focus();

				return false;

			}

			if(isPhone($('#dienthoai_lienhe').val(), "<?=_nhapsodienthoai?>"))

			{

				$('#dienthoai_lienhe').focus();

				return false;

			}

			if(isEmpty($('#email_lienhe').val(), "<?=_emailkhonghople?>"))

			{

				$('#email_lienhe').focus();

				return false;

			}

			if(isEmail($('#email_lienhe').val(), "<?=_emailkhonghople?>"))

			{

				$('#email_lienhe').focus();

				return false;

			}

			

			if(isEmpty($('#noidung_lienhe').val(), "<?=_nhapnoidung?>"))

			{

				$('#noidung_lienhe').focus();

				return false;

			}

			if(isEmpty($('#capcha').val(), "<?=_nhapmabaove?>"))

			{

				$('#capcha').focus();

				return false;

			}

			$.ajax({

				type:'post',

				url:$(".frm").attr('action'),

				data:$(".frm").serialize(),

				dataType:'json',

				beforeSend: function() {

					$('.thongbao').html('<p><img src="images/loader_p.gif"></p>');     

				},

				error: function(){

					add_popup('<?=_hethongloi?>');

				},

				success:function(kq){

					add_popup(kq.thongbao);

					$('#capcha').val('');

					if(kq.nhaplai=='nhaplai')

					{

						$(".frm")[0].reset();

					}

					

					

				}

			});

		});    

	});

</script>



<script type="text/javascript">

	$(document).ready(function(){

		$("#reset_capcha").click(function() {

			$("#hinh_captcha").attr("src", "sources/captcha.php?"+Math.random());

			return false;

		});

	});

</script>





