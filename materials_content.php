<div class="span9">
 <div class="row-fluid">
    <div class="span12">
			<div class="tabbable tabs-left">
			 <div class="tab-content">
			   <?php
            $page_protect->get_materials_info($_GET['mid']);
            echo '<b><h4>'.$page_protect->m_title.'</h4></b><br>'.$page_protect->m_content;
          ?>

  			</div>
  			</div>
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->
<br/><br/>
<br/><br/><br/><br/><br/>
      <hr>