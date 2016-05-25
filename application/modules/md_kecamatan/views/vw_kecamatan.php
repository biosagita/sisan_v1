<div id="73_tlbkecamatan" style="padding:5px;">
	<div style="float:left;" id="crud_73">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddkecamatan_73()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditkecamatan_73()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletekecamatan_73()">Delete</a> 
			<a href="javascript:void(0)" class="easyui-linkbutton"  data-options="iconCls:'icon-up',plain:'true'" onclick="fnImportkecamatan_73()">Import Excel</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="73_txtkecamatan" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_73()">Find</a>
	</div>
</div>
<table id="73_dtgkecamatan" class="easyui-datagrid" data-options="title:'Data kecamatan',url:'<?php echo base_url(); ?>index.php/md_kecamatan/fnkecamatanData/',toolbar:'#73_tlbkecamatan',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'f_kec_id',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_kec_name',title:'<b>Nama Kecamatan</b>',width:200,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_city_id',title:'<b>City / Kabupaten<b>',width:200,sortable:true" halign="center"></th>
           	
   </tr>
</thead>
</table>
<div id="73_dlgkecamatan" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_73(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="73_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/etnisys/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="73_frakecamatan" id="73_frakecamatan" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
$(function() {
	$.ajax({
		type: 'POST',
		url: '<?php echo base_url()?>index.php/md_role_access/fnRoleAccessCrud/73/',
		dataType: 'json',
		data: {},
		success: function(data) {
			if(data.crud_73 != 1){
			$('#crud_73').hide();
			
			}	
		}
	});
});

function fnSearch_73() {
	$('#73_dtgkecamatan').datagrid('load',{
		kecamatanKeyword: $('#73_txtkecamatan').val()
	});
}
function fnResize_73(width,height) {
	$('#73_frakecamatan').width(width-14);
	$('#73_frakecamatan').height(height-40);
}
function fnResize_73(width,height) {
	$('#73_frakecamatan').width(width-14);
	$('#73_frakecamatan').height(height-40);
}
function fnAddkecamatan_73() {
	$('#73_dlgkecamatan').dialog({
		title: 'Input Data kecamatan',
		width: 510,
		height: 250
	});
	$('#73_divWait').show();
	$('#73_frakecamatan').hide();
	$('#73_frakecamatan').attr('src','<?php echo base_url(); ?>index.php/md_kecamatan/fnkecamatanAdd');
	$('#73_dlgkecamatan').window('open');
}
function fnEditkecamatan_73() {
	var singleRow = $('#73_dtgkecamatan').datagrid('getSelected');
	if(singleRow) {
		$('#73_dlgkecamatan').dialog({
			title: 'Edit Data kecamatan',
			width: 510,
			height: 250
		});
		$('#73_divWait').show();
		$('#73_frakecamatan').hide();
						
		$('#73_frakecamatan').attr('src','<?php echo base_url(); ?>index.php/md_kecamatan/fnkecamatanEdit/'+singleRow.f_kec_id);
				

		$('#73_dlgkecamatan').window('open');
	} else {
		alert('Select which kecamatan data you want to edit.');
	}
}
function fnSelectkecamatan_73() {
	var singleRow = $('#73_dtgkecamatan').datagrid('getSelected');
	if(singleRow) {
		var vkecamatanId = singleRow.kecamatan_uid;
		var vkecamatanLogin = singleRow.kecamatan_ulogin;
		$('#73_dlgkecamatan').dialog({
			title: 'Select kecamatan for '+vkecamatanLogin,
			width: 365,
			height: 290
		});
		$('#73_divWait').show();
		$('#73_frakecamatan').hide();
				
		$('#73_frakecamatan').attr('src','<?php echo base_url(); ?>index.php/md_kecamatan/fnkecamatanChoose/'+vf_kec_id);
				
		$('#73_dlgkecamatan').window('open');
	} else {
		alert('Select kecamatan Datagrid row first.');
	}
}
function fnDeletekecamatan_73() {
	var singleRow = $('#73_dtgkecamatan').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_kecamatan/fnkecamatanDelete/',{Id:singleRow.f_kec_id},function(result) {
				
					if (result.success) {
						$('#73_dtgkecamatan').datagrid('reload');
					} else {
						$.messager.show({title:'Error',msg:result.msg});
					}
				},'json');
			}
		});
	} else {
		alert('Select the data that you want to Delete');
	}
}
function fnImportkecamatan_73() {
	$('#73_dlgkecamatan').dialog({
		title: 'Import Data kecamatan',
		width: 470,
		height: 180
	});
	$('#73_divWait').show();
	$('#73_frakecamatan').hide();
	$('#73_frakecamatan').attr('src','<?php echo base_url(); ?>index.php/md_kecamatan/fnkecamatanImport');	
	$('#73_dlgkecamatan').window('open');
}

</script>