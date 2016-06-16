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
        	.msg{position:absolute;top:0;right:0;left:0;padding:10px;text-align:center;background:#808080;color:#fff;display:none;z-index: 2;}
        	.content-wrap{display: flex;align-items: center;justify-content: center;}
        	.btnCustomer{background-color:#ffa500;border:none;color:#fff;padding:5px 50px;text-align:center;text-decoration:none;display:inline-block;font-size:16px;box-shadow:0 8px 16px 0 rgba(0,0,0,.2),0 6px 20px 0 rgba(0,0,0,.19);cursor:pointer;}
            .content{text-align: center;width: 100%;}
            .content h2{color:#fff;font-stretch: ultra-condensed;font-size: 50px;}
            .content h3{color: #fff;font-size: 30px;font-weight: normal;}
            .header{position: absolute;top: 0;left: 0;right: 0;background: #fff;}
            .header-content{min-height: 100px;position: relative;text-align: center;}
            .header-content h1{color: #0082c8;text-align: center;font-size: 50px;line-height: 110px;margin: 0;display: inline-block;vertical-align: top;}
            .header-content img{display: inline-block;width: 120px;}
            .footer{position: absolute;bottom: 20px;right: 20px;}
            .footer-content{color: #fff;text-align: center;}
            .timing{border-bottom: solid 1px;font-size: 40px;padding-bottom: 5px;margin-bottom: 10px;font-weight: bold;}

            @media only screen and (max-width: 500px) {
                .header-content{min-height: 50px;}
                .header-content img{width: 50px;}
                .header-content h1{font-size: 14px;line-height: 46px;}
                .content{width: 80%;}
                .content h2{font-size: 20px;}
                .content img{width: 235px;}
                .content h3{font-size: 16px;}
                .footer{left: 50%;right: initial;margin-left: -80px;}
            }
        </style>
    </head>
    <body onload="startTime()">
    	<div class="msg">Insert tiket berhasil!</div>
        <div class="header">
            <div class="header-content">
                <h1>SELAMAT DATANG DI</h1>
                <img src="<?php echo base_url();?>images/bolt.png">
            </div>
        </div>
        <div class="footer">
            <div class="footer-content">
                <div id="timing" class="timing">00:00:00</div>
                <div id="dating" class="dating"></div>
            </div>
        </div>
    	<div class="content-wrap">
            <div class="content">
                <h2>SILAHKAN TEKAN TOMBOL UNTUK NOMOR ANTRIAN</h1>
                <?php if(!empty($layanan)): ?>
                    <?php foreach($layanan as $value): ?>
                    <a class="lnkCustomer" href="#" data-id="<?php echo $value['id_layanan']; ?>">
                        <img src="<?php echo base_url();?>images/button_bolt.png">
                    </a>
                    <?php endforeach; ?>
                <?php endif; ?>
                <h3>Nomor antrian: 0</h3>
            </div>
    	</div>
    	<script type="text/javascript" src="<?php echo base_url();?>assets/easyui/jquery.min.js"></script>
        <script type="text/javascript">
            function startTime() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('timing').innerHTML =
                h + ":" + m + ":" + s;
                var t = setTimeout(startTime, 500);
            }
            function checkTime(i) {
                if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                return i;
            }
        </script>
        <script type="text/javascript">
            var d = new Date();
            var days = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
            var months = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
            var dt = d.getDate() + " " + months[d.getMonth()] + " " + d.getFullYear();
            document.getElementById("dating").innerHTML = days[d.getDay()] + ', ' + dt;
        </script>
    	<script type="text/javascript">
    		$(function(){
                var insert_status_click = true;
    			$('.lnkCustomer').click(function(e){
    				e.preventDefault();
                    if(!insert_status_click) return false;
                    insert_status_click = false;
    				var me = $(this);
    				var id_layanan = me.data('id');
    				$('.msg').hide();
    				$.ajax({
						url : '<?php echo site_url("md_tiket/md_tiket/do_tiket"); ?>',
						type: 'POST',
						dataType : 'json',
						data: {id_layanan: id_layanan},
						success : function(data){
							$('.msg').show();
							setTimeout(function(){ $('.msg').hide(); }, 2000);
                            insert_status_click = true;
						}
					});
    			});
    		});
    	</script>
    </body>
</html>