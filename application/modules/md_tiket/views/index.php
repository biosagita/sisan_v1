<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tiket</title>
        <style type="text/css">
        	body{font-family: sans-serif;}
        	.msg{position:absolute;top:0;right:0;left:0;padding:10px;text-align:center;background:#ffa500;color:#fff;display:none;}
        	.content-wrap{padding-top:40px;}
        </style>
    </head>
    <body>
    	<div class="msg">Insert tiket berhasil!</div>
    	<div class="content-wrap">
    		<?php if(!empty($layanan)): ?>
	    		<?php foreach($layanan as $value): ?>
	    		<button id="btnCustomer" name="btnCustomer" data-id="<?php echo $value['id_layanan']; ?>"><?php echo $value['nama_layanan']; ?></button>
	    		<?php endforeach; ?>
    		<?php endif; ?>
    	</div>
    	<script type="text/javascript" src="<?php echo base_url();?>assets/easyui/jquery.min.js"></script>
    	<script type="text/javascript">
    		$(function(){
    			$('#btnCustomer').click(function(e){
    				e.preventDefault();
    				var me = $(this);
    				var id_layanan = me.data('id');
    				me.attr('disabled', true);
    				$('.msg').hide();
    				$.ajax({
						url : '<?php echo site_url("md_tiket/md_tiket/do_tiket"); ?>',
						type: 'POST',
						dataType : 'json',
						data: {id_layanan: id_layanan},
						success : function(data){
							me.attr('disabled', false);
							$('.msg').show();
							setTimeout(function(){ $('.msg').hide(); }, 2000);
						}
					});
    			});
    		});
    	</script>
    </body>
</html>