<!-- 文件名：分类栏目页 时间：2017年8月 作者：HXC -->
<div class="cate_box">
  <div class="layui-tab layui-tab-card admin_bg">
    <ul class="layui-tab-title">
      <li class="layui-this">分类栏目</li>
    </ul>
    <div class="layui-tab-content" >
      <div class="layui-tab-item layui-show">
      
      <!--新增与修改-->
      <div class="cate_nav">
          <form class="layui-form layui-form-pane" method="post" action="<?php echo site_url('Category/addcate');?>" id = "form_cate">
          <div class="layui-form-item" style="display: inline-block;">
              <label class="layui-form-label">栏目名称：</label>
              <div class="layui-input-inline">
                <input type="text" id="inputCate1"  name = "category" lay-verify="required" placeholder="文档标题" autocomplete="off" class="layui-input">
              </div>
              <div style="display: inline-block;">
                 <button class="layui-btn layui-btn-danger" type = "submit" id = "changecate">修改</button>
                 <button class="layui-btn" type = "submit" id = "addcate">添加</button>
              </div>
          </div>
          </form>
        </div>
      </div>
      <!--end-->

        <!--栏目列表-->
        <div style="display: inline-block;">
          <div class="layui-form" style="padding-left: 20px;" >
            <table class="layui-table">
              <colgroup>
                <col width="60">
                <col width="400">
                <col width="80">
                <col width="150">
                <col width="150">
              </colgroup>

              <thead>
                <tr>
                  <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose">序号</th>
                  <th>文档名称</th>
                  <th>数量</th>
                  <th>时间</th>
                  <th>选项</th>
                </tr> 
              </thead>

              <tbody>
              <?php
              $var = 1;
              foreach($info as $val){
               ?>
                <tr>
                  <td><?php echo $var++; ?></td>
                  <td class = "<?php echo $val['cid']; ?>" name = "catename"><?php echo $val['catename'];?></td>
                  <td><?php echo $val['articlenum'];?></td>
                  <td class = "<?php echo $val['cid']; ?>" name = "createtime"><?php echo $val['createtime']; ?></td>
                  <td><a href = "#" class = "changecate" id = "<?php echo $val['cid'];?>">修改</a> | <a href = "<?php echo site_url("Category/delcate")?>/<?php echo $val['cid'];?>" onclick = "javascript:return del()" >删除</a></td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
      <!--end-->

      </div>
    </div>
  </div>
</div>







