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
			<form>
				<div style="margin-bottom:5px;">
					<select style="width: 98%;padding: 5px;">
						<option>------Pilih Tipe 1-------</option>
					</select>
				</div>
				<div style="margin-bottom:5px;">
					<select style="width: 98%;padding: 5px;">
						<option>------Pilih Tipe 2-------</option>
					</select>
				</div>
				<div style="margin-bottom:5px;">
					<select style="width: 98%;padding: 5px;">
						<option>------Pilih Tipe 3-------</option>
					</select>
				</div>
				<div style="margin-bottom:5px;">
					<button style="width: 98%;padding: 5px;">Add</button>
				</div>
			</form>
		</div>
		<div style="display:block;padding:10px;text-align:center;">
			<div style="height:190px;width:98%;margin:auto;overflow-y: scroll;overflow-x: hidden;">
				<table border="1" style="width:100%;" cellspacing="0" cellpadding="15">
					<thead>
						<tr>
							<th style="padding:5px;">NO</th>
							<th>Nama</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="padding:5px;text-align:center;">1</td>
							<td style="padding:5px;">INQUIRY > Activation > Prepaid Product</td>
							<td style="padding:5px;text-align:center;"><a href="#" style="color:red;">DELETE</a></td>
						</tr>
					</tbody>
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
			$('#mdl_type').show();
		});

		$('#cls_mdl').click(function(e){
			e.preventDefault();
			$('#mdl_type').hide();
		});
	});
</script>