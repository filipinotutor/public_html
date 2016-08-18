<div id="ConversionSettings" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 id="myModalLabel">Conversion Settings:</h4>
			</div>
		<div class="modal-body">
		<div id="conv"><br> One (1) success class = 
			<?php
			echo'<a href="#" id="conv" data-type="text" data-pk="" title="Click to change conversions value" data-value="'.number_format($page_protect->convalue,2).'"></a>'; 
				?>
			<br/><br/>
		</div> 
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		</div>
	</div>
	</div>
</div>			