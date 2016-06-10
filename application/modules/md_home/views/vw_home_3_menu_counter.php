<link href="css/dropdown/dropdown.vertical.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/dropdown/themes/default/default.ultimate.css" media="all" rel="stylesheet" type="text/css" />

<style type="text/css">
	ul.dropdown-verticalx {
		width: 200px;
		font-size: 16px;
		font-family: Arial Black, serif;
		text-decoration: none;
		vertical-align: middle;
	}

	ul.dropdown-verticalx li { 
		padding: 0;
		border: none;
		border-style: solid;
		border-width: 1px 1px 1px 0;
		border-color: #fff #d9d9d9 #d9d9d9;
		background-color: #f6f6f6;
		color: #000;
		float: none;
		line-height: 1.3em;
		vertical-align: middle;
		zoom: 1;
		list-style: none;
		margin: 0;
	}

	ul.dropdown-verticalx li a, ul.dropdown-verticalx li.xxx {
		border-style: solid;
		border-width: 1px 1px 1px 0;
		border-color: #fff #d9d9d9 #d9d9d9;
		display: block;
		padding: 7px 10px;
		color: #000;
	}

	ul.dropdown-verticalx li:hover {
		background: url(http://localhost/antrian/css/dropdown/themes/default/images/grad2.png) 0 100% repeat-x;
		color: #000;
		position: relative;
		z-index: 599;
		cursor: default;
	}
</style>

<style type="text/css">
	button:disabled {opacity: 0.65;cursor: not-allowed;}
</style>

	<div data-options="region:'west',split:true,border:true,title:'Modules'" style="width:210px;padding:5px; font-size:24px;">


<div>
	<div style="margin:auto;width:165px;height:165px;">
		<img id="transaksi_image" style="width:160px;height:160px;" src="http://localhost/sisan/assets/blank_user.jpg" />
	</div>
</div>

<div id="menu" style="margin-top:10px;">
<ul id="nav" class="dropdown dropdown-vertical">
	<li><?php echo"<a href='javascript:void(0)'  id='btnnext' onclick='fnNext()'><img src='images/next.png' width=20 height=20 >&nbsp;&nbsp;Next</a>"; ?> 
	<li><?php echo"<a href='javascript:void(0)' id='btnrecall' onclick='fnRecall()' ><img src='images/undo.png' width=20 height=20 >&nbsp;&nbsp;Recall</a>"; ?>
	<li><?php echo"<a href='javascript:void(0)'  id='btnskip' onclick='fnSkip()' ><img src='images/skip.png' width=20 height=20 >&nbsp;&nbsp;Skip</a>";  ?> 
	<li><?php echo"<a href='javascript:void(0)'  id='btngotonext' onclick='fnGotonext()' ><img src='images/gotonext.png' width=20 height=20 >&nbsp;&nbsp;Go To Next</a>";  ?>
	<li><?php echo"<a href='javascript:void(0)'  id='btnfinish' onclick='fnFinish()' ><img src='images/finish.png' width=20 height=20 >&nbsp;&nbsp;Finish</a>";  ?>
</ul>
</div>

<div style="margin-top:10px;">
<ul class="dropdown-verticalx">
	<!--<li><a href="javascript:void(0)" onclick='fnForward(<?php echo $defaultforward['id_layanan']; ?>, <?php echo $defaultforward['id_layanan_forward']; ?>)'><img src='images/forward.png' width=20 height=20 >&nbsp;&nbsp;Forward</a></</li>-->
	<li class="xxx"><img src='images/forward.png' width=20 height=20 >&nbsp;&nbsp;Forward</li>
	<li>
		<ul class="dropdown-verticalx">
			<?php foreach($layanan AS $key => $val) : ?>
				<li><a href="javascript:void(0)" onclick='fnForward(<?php echo $val['id_layanan']; ?>, <?php echo $val['id_group_layanan']; ?>)'><?php echo $val['nama_layanan']; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</li>
</ul>
</div>

<div style="margin-top:10px;">
<ul class="dropdown-verticalx">
	<li><?php echo"<a href='javascript:void(0)' id='additionalType' ><img src='images/request.png' width=20 height=20 >&nbsp;&nbsp;Additional Type</a>"; ?>
	<li><?php echo"<a href='javascript:void(0)' onclick='specialFeature()' ><img src='images/logout.png' width=20 height=20 >&nbsp;&nbsp;Logout (".$this->session->userdata['sName'].")</a>"; ?>
</ul>
</div>
		
	</div>

<div id="mdl_type" style="position:fixed;top:0;bottom:0;left:0;right:0;background-color:rgba(0,0,0,0.75);display:none;z-index:999;">
	<div style="width:600px;height:400px;background:#fff;position: absolute;top: 50%;left: 50%;margin-top: -200px;margin-left: -300px;">
		<div style="display:block;text-align:center;background:cornflowerblue;position:relative;padding:10px;">
			<div style="position:absolute;right:0;top:10px;"><a id="cls_mdl" href="#" style="padding:10px;">X</a></div>
			<span>ADDITIONAL TYPE</span>
		</div>
		<div class="form_wrap" style="display:block;padding:10px;text-align:center;">
			<form id="frm_addType">
				<input type="hidden" name="id_transaksix" id="id_transaksix">
				<div style="margin-bottom:5px;">
					<select name="type_1" id="type_1" style="width: 98%;padding: 5px;">
					</select>
				</div>
				<div style="margin-bottom:5px;">
					<select name="type_2" id="type_2" style="width: 98%;padding: 5px;display:none;">
					</select>
				</div>
				<div style="margin-bottom:5px;">
					<select name="type_3" id="type_3" style="width: 98%;padding: 5px;display:none;">
					</select>
				</div>
				<div style="margin-bottom:5px;">
					<textarea name="notes" id="notes" style="width: 98%;padding: 5px;display:none;" placeholder="notes"></textarea>
				</div>
				<div style="margin-bottom:5px;">
					<button id="btnAddType" style="width: 98%;padding: 5px;" disabled>Add</button>
				</div>
			</form>
		</div>
		<div style="display:block;padding:10px;text-align:center;">
			<div style="height:140px;width:98%;margin:auto;overflow-y: scroll;overflow-x: hidden;">
				<table id="tbl_addType" border="1" style="width:100%;" cellspacing="0" cellpadding="15">
					<thead>
						<tr>
							<th style="padding:5px;">NO</th>
							<th>Nama</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>	
	</div>
</div>
	
<script>



	$('#treeMenu').tree({
		onClick: function(node){
			if(node.attributes)
			{
				var vStr = node.attributes.split("||");
				loadNewModule(vStr[0],vStr[1]);
			}
			
			if (node.state == 'closed')
				$('#treeMenu').tree('expand', node.target);
			else
				$('#treeMenu').tree('collapse', node.target);
		}
	});
	
</script>

<script type="text/javascript">
	$(function(){
		$('#additionalType').click(function(e){
			e.preventDefault();

			$('#type_1').val('');
			$('#type_2').val('');
			$('#type_3').val('');
			$('#notes').val('');
			$('#type_2').hide();
			$('#type_3').hide();
			$('#notes').hide();

			$('#mdl_type').show();
		});

		$('#cls_mdl').click(function(e){
			e.preventDefault();
			$('#mdl_type').hide();
		});

		var datasource_1 = {};
		var datasource_2 = {};
		var datasource_3 = {};

		var base_url = '<?php echo site_url("assets/json"); ?>';
		base_url = base_url.replace('index.php/', '');

		$.ajax({
			url : base_url+'/datasource_1.json',
			dataType : 'json',
			async : false,
			success : function(data){
				datasource_1 = data;
			}
		});

		$.ajax({
			url : base_url+'/datasource_2.json',
			dataType : 'json',
			async : false,
			success : function(data){
				datasource_2 = data;
			}
		});

		$.ajax({
			url : base_url+'/datasource_3.json',
			dataType : 'json',
			async : false,
			success : function(data){
				datasource_3 = data;
			}
		});

		var tmp = '<option value="">------Pilih Tipe 1-------</option>';
		$.each(datasource_1, function(idx,val){
			tmp += '<option value="'+idx+'">'+val+'</option>';
		});

		$('#type_1').empty().append(tmp);

		$('#type_1').change(function(){
			$('#type_3').val('');
			$('#notes').val('');
			$('#type_3').hide();
			$('#notes').hide();
			$('#btnAddType').attr('disabled', true);

			var nilai = $(this).val();

			if(nilai == '') {
				$('#type_2').val('');
				$('#type_2').hide();
				return;
			}

			var tmp = '<option value="">------Pilih Tipe 2-------</option>';
			$.each(datasource_2[nilai], function(idx,val){
				tmp += '<option value="'+idx+'">'+val+'</option>';
			});
			$('#type_2').empty().append(tmp);
			$('#type_2').show();
		});

		$('#type_2').change(function(){
			$('#type_3').val('');
			$('#notes').val('');
			$('#btnAddType').attr('disabled', true);

			var nilai = $(this).val();

			if(nilai == '') {
				$('#type_3').val('');
				$('#notes').val('');
				$('#type_3').hide();
				$('#notes').hide();
				return;
			}

			var arr = datasource_3[nilai] || '';

			if(arr == '') {
				$('#type_3').val('');
				$('#type_3').hide();
				$('#notes').show();
				$('#btnAddType').attr('disabled', false);
				return;
			}

			var tmp = '<option value="">------Pilih Tipe 3-------</option>';
			$.each(arr, function(idx,val){
				tmp += '<option value="'+idx+'">'+val+'</option>';
			});
			$('#type_3').empty().append(tmp);
			$('#type_3').show();
			$('#notes').show();
		});

		$('#type_3').change(function(){
			var nilai = $(this).val();

			if(nilai == '') {
				$('#btnAddType').attr('disabled', true);
				return;
			}

			$('#btnAddType').attr('disabled', false);
		});

		$('#btnAddType').click(function(e){
			e.preventDefault();

			var txt = '';
			var nilai_type_1 = $('#type_1').val() || '';
			var nilai_type_2 = $('#type_2').val() || '';
			var nilai_type_3 = $('#type_3').val() || '';
			if(nilai_type_1 != '') {
				txt += $('#type_1 option[value="'+nilai_type_1+'"]').text();
			}
			if(nilai_type_2 != '') {
				txt += ' > ' + $('#type_2 option[value="'+nilai_type_2+'"]').text();
			}
			if(nilai_type_3 != '') {
				txt += ' > ' + $('#type_3 option[value="'+nilai_type_3+'"]').text();
			}

			var data_insert = {
				adty_trans_id : $('#id_transaksix').val(),
				adty_type_id : (nilai_type_3 != '' ? nilai_type_3 : nilai_type_2),
				adty_type_info : txt,
				adty_note : $('#notes').val(),
			};

			$.post('<?php echo site_url("md_home/md_home/do_insert_addtype"); ?>', data_insert, function(data){
				var nourut = $('#tbl_addType tbody').children().length || 0;

				var tmp = '<tr>';
				tmp += '<td style="padding:5px;text-align:center;">'+(parseInt(nourut)+1)+'</td>';
				tmp += '<td style="padding:5px;">'+txt+'</td>';
				tmp += '<td style="padding:5px;text-align:center;"><a data-id="'+data.adty_id+'" class="lnk_del" href="#" style="color:red;">DELETE</a></td>';
				tmp += '</tr>';
				$('#tbl_addType tbody').append(tmp);

				$('#type_1').val('');
				$('#type_2').val('');
				$('#type_3').val('');
				$('#notes').val('');
				$('#type_2').hide();
				$('#type_3').hide();
				$('#notes').hide();
				$('#btnAddType').attr('disabled', true);
			}, 'json');
		});

		$( "body" ).delegate( "a.lnk_del", "click", function(e) {
			e.preventDefault();
			var me = $(this);
			var id = me.data('id');
			var data_delete = {
				adty_id : id
			}
			$.post('<?php echo site_url("md_home/md_home/do_delete_addtype"); ?>', data_delete, function(data){
				me.closest('tr').remove();
				reorder();
			}, 'json');
		});

		function reorder(){
			var cld = $('#tbl_addType tbody').children();
			var cnt = 1;
			$.each(cld, function(idx, val){
				$(this).find('td:eq(0)').text(cnt);
				cnt++;
			})
		}
	});
</script>