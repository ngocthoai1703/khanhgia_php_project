
<div class="res block">
	<h3 class="title"><?=_dangkituvan?></h3>
	<div class="form__res">
		 <form name="frm_dknt" id="frm_dknt" method="post" action="" >
		<input type="text" id="phonenumber" name="dienthoai" placeholder="<?=_sodtcuaban?>">
		<div class="row">
			<input type="text" id="email_nhantin" name="email_nhantin" placeholder="<?=_emailcuaban?>">
		</div>
		<div class="row">
			<input type="text" id="note" name="noidung" placeholder="<?=_noidungcantuvan?>">
		</div>
		<div class="row">
			<input type="button" name="submit_nhantin" id="submit_nhantin" onclick="nhantin()"  value="<?=_dangkituvan2?>">
		</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript">
	function nhantin(){
		if(isEmpty($('#email_nhantin').val(), "<?=_nhapemailcuaban?>"))
			{
				$('#email_nhantin').focus();
				return false;
			}
		if(isEmpty($('#note').val(), "Nhập nội dung cần tư vấn"))
			{
				$('#note').focus();
				return false;
			}
			if(isEmail($('#email_nhantin').val(), "<?=_emailkhonghople?>"))
			{
				$('#email_nhantin').focus();
				return false;
			}	
		document.frm_dknt.submit();
	}
</script>
<?php
	if(isset($_POST['email_nhantin']))
	{		
		$email_nhantin = $_POST['email_nhantin'];
		$dienthoai = $_POST['dienthoai'];
		$noidung = $_POST['noidung'];
		$ngaytao = time();		
		$d->reset();
		$sql_kt_mail="SELECT email FROM table_newsletter WHERE email='".$email_nhantin."'";
		$d->query($sql_kt_mail);
		$kt_mail=$d->result_array();
		if(count($kt_mail)>0)
			alert(_emaildadangky);
		else
		{
			$email_nhantin = trim(strip_tags($email_nhantin));
			$email_nhantin = mysql_real_escape_string($email_nhantin);			
			$sql = "INSERT INTO  table_newsletter (email,dienthoai,noidung,ngaytao) VALUES ('$email_nhantin','$dienthoai','$noidung','$ngaytao')";	
			if($d->query($sql)== true)
				alert(_guiemailthanhcong);
			else
				alert(_guiemailthatbai);
		}		
	}
?>






