﻿	<!-- 2.加载jQuery库，同时加载该库必须在加载bootstrap.min.js之前 -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <!-- 3.加载bootstrap的核心js库 -->
    <script src="<?php echo base_url();?>public/theme/bootstrap/js/bootstrap.min.js"></script>
	<script type = "text/javascript">
		$(document).ready(function(){
			/*相关鼠标样式*/
			$("#logout").mouseover(function(){
				$("#logout").css("color","gray");
			});
			$("#logout").mouseout(function(){
				$("#logout").css("color","white");
			});
			$(".categoryitem").mouseover(function(){
				$(this).css({"color":"gray","text-decoration":"none"});
			});
			$(".categoryitem").mouseout(function(){
				$(this).css({"color":"white","text-decoration":"none"});
			});
	
		

			/*修改栏目分类*/
			$(".changecate").click(function(){
				var id = $(this).attr("id");
				var url = "<?php echo site_url("Category/changecate");?>/"+id;
				$("#form_cate").attr("action",url);
				
				var content1 = $("."+id+"[name='catename']").text();
				var content2 = $("."+id+"[name='createtime']").text();
				
				$("#inputCate1").attr("value",content1);
				$("#inputTime3").attr("value",content2);
			});

			/*添加栏目分类*/
			$("#addcate").click(function(){
				$("#form_cate").attr("action","<?php echo site_url('Category/addcate');?>")
			});

			/*添加链接分类*/
			$("#addlinkcate").click(function(){
				$("#form_link_cate").attr("action","<?php echo site_url('Linkcate/addcate');?>")
			});

			/*修改链接分类*/
			$(".changelinkcate").click(function(){
				var id = $(this).attr("id");
				var url = "<?php echo site_url("Linkcate/changecate");?>/"+id;
				$("#form_link_cate").attr("action",url);
				
				var content1 = $("."+id+"[name='catename']").text();
				$("#inputCate1").attr("value",content1);
			});
			
		});
	</script>
  </body>
</html>
