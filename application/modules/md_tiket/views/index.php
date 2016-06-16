<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tiket</title>
        <style type="text/css">
            html,body,.content-wrap{height: 100%;}
        	body{font-family: sans-serif;background:#f78f1e;margin: 0;}
        	.msg{position:absolute;top:0;right:0;left:0;padding:10px;text-align:center;background:#808080;color:#fff;display:none;}
        	.content-wrap{display: flex;align-items: center;justify-content: center;}
        	.btnCustomer{background-color:#ffa500;border:none;color:#fff;padding:5px 50px;text-align:center;text-decoration:none;display:inline-block;font-size:16px;box-shadow:0 8px 16px 0 rgba(0,0,0,.2),0 6px 20px 0 rgba(0,0,0,.19);cursor:pointer;}
            .content{text-align: center;}
            .content h2{color:#fff;font-stretch: ultra-condensed;font-size: 50px;}
            .content h3{color: #fff;font-size: 30px;font-weight: normal;}
            .header{position: absolute;top: 0;left: 0;right: 0;background: #fff;}
            .header-content{min-height: 100px;position: relative;text-align: center;}
            .header-content h1{color: #0082c8;text-align: center;font-size: 50px;line-height: 110px;margin: 0;display: inline-block;vertical-align: top;}
            .header-content img{display: inline-block;width: 120px;}
            .footer{position: absolute;bottom: 20px;right: 20px;}
            .footer-content{color: #fff;text-align: center;}
            .timing{border-bottom: solid 1px;font-size: 40px;padding-bottom: 5px;margin-bottom: 10px;font-weight: bold;}
        </style>
    </head>
    <body>
    	<div class="msg">Insert tiket berhasil!</div>
        <div class="header">
            <div class="header-content">
                <h1>SELAMAT DATANG DI</h1>
                <img src="<?php echo base_url();?>images/bolt.png">
            </div>
        </div>
        <div class="footer">
            <div class="footer-content">
                <div class="timing"><span>21</span>:<span>07</span>:<span>20</span></div>
                <div class="dating">Kamis, 16 Juni 2016</div>
            </div>
        </div>
    	<div class="content-wrap">
            <div class="content">
                <h2>SILAHKAN TEKAN TOMBOL UNTUK NOMOR ANTRIAN</h1>
                <?php if(!empty($layanan)): ?>
                    <?php foreach($layanan as $value): ?>
                    <a class="lnkCustomer" href="#">
                        <img src="<?php echo base_url();?>images/button_bolt.png">
                    </a>
                    <?php endforeach; ?>
                <?php endif; ?>
                <h3>Nomor antrian: 0</h3>
            </div>
    	</div>
    	<script type="text/javascript" src="<?php echo base_url();?>assets/easyui/jquery.min.js"></script>
    	<script type="text/javascript">
    		$(function(){
    			$('.lnkCustomer').click(function(e){
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