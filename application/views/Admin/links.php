<div class="art_list">
<div class="layui-tab layui-tab-card admin_bg">
  <ul class="layui-tab-title">
    <li class="layui-this">链接详情</li>
  </ul>
  <div class="layui-tab-content" >
    <div class="layui-tab-item layui-show">
		<!--栏目列表-->
		<div style="display: inline-block;">
		  <div class="layui-form" style="padding-left: 20px;" >
			  <a class="layui-btn layui-btn-primary">链接列表</a>
			  <a href = "<?php echo site_url('Links/addlink'); ?>" role = "button" class="layui-btn">添加链接</a>
		    <table class="layui-table">
				<colgroup>
					<col width="60">
					<col width="200">
					<col width="120">
					<col width="300">
					<col width="120">
				</colgroup>
				<thead>
				<tr>
				  <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose">序号</th>
				  <th>链接名称</th>
				  <th>所属分类</th>
				  <th>链接地址</th>
				  <th>操作选项</th>
				</tr> 
				</thead>

			    <tbody>
			     	<?php 
					  $var = 1;
					  foreach($links as $val){
					?>
			        <tr>
				        <td><?php echo $var++; ?>.</td>
							<td><?php echo $val['name']; ?></td>
							<td><?php echo $val['aid']; ?></td>
							<td><?php echo $val['link']; ?></td>
							<td><a href = "<?php echo site_url('Links/dellink')?>/<?php echo $val['id']; ?>" onclick = "javascript:return del()">删除</a>
						</td>
			        </tr>
			        <?php } ?>
			    </tbody>
		    </table>
		  </div>
		<!--分页开始-->
		<div  style="margin-left: 20px;"><?php echo $fenlinks; ?></div>
		<!--分页结束-->
		</div>
    </div>
  </div>
</div>
</div>

<!--文章分页字体色-->
<style type="text/css">
.layui-btn a{color: #fff;}
.layui-btn-primary a{color: #000;}
</style>


