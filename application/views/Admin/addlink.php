<div style="width:70%;display: inline-block;margin: 5px;margin-top:35px;  position: absolute;">
<div class="layui-tab layui-tab-card" style="background: #fff;">
  <ul class="layui-tab-title">
    <li class="layui-this">新增链接</li>
  </ul>
  <div class="layui-tab-content" >
    <div class="layui-tab-item layui-show">
		<!--内容开始-->
		<form class="form-horizontal" method = "post" action = "<?php echo site_url('Links/insertlink');?>">
		<div class="form-group">
			<label for="exampleInputTitle" class="control-label col-sm-2">所属分类：</label>
			<div class="col-sm-4">
				<select name="linkcate" class="layui-input layui-unselect" >
					<?php foreach($linkcate as $val){?>
					<option value="<?php echo $val['aid']?>"><?php echo $val['linkcate'];?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputTitle" class="control-label col-sm-2">名称：</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="exampleInputTitle" name = "name">
			</div>
		</div>

		<div class="form-group">
			<label for="exampleInputContent" class="control-label col-sm-2">链接：</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="container"  name="link">
			
			</div>
		</div>

	<div class="col-sm-offset-6">
	<button class="layui-btn layui-btn-normal" type = "submit"><i class="layui-icon" style="font-size: 16px; color: #eee;">&#xe609;</i>   发布</button>
	</div>
	</form>
		<!--内容结束-->
    </div>
  </div>
</div>
</div>



	












