<script type="text/javascript" language="javascript">
	function nhantin(){
		if(isEmpty($('#email_nhantin').val(), "<?=_nhapemailcuaban?>"))
			{
				$('#email_nhantin').focus();
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
			$sql = "INSERT INTO  table_newsletter (email) VALUES ('$email_nhantin')";	
			if($d->query($sql)== true)
				alert(_guiemailthanhcong);
			else
				alert(_guiemailthatbai);
		}		
	}
?>
<div id="div_dangkynhantin">


    <div id="dknt">
    	<div class="title_dknt">Đăng ký ngay để nhận những thông tin khuyến mãi từ chúng tôi</div>
    
        <form name="frm_dknt" id="frm_dknt" method="post" action="" >
           
            <input class="txt_input" type="text" name="email_nhantin" id="email_nhantin" placeholder="Email" />
            <input type="button" name="submit_nhantin" id="submit_nhantin" onclick="nhantin()" value="<?=_gui?>" />
        </form>
    </div>

	<div class="clear"></div>


</div>





