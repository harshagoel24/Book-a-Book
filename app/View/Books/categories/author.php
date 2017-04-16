<div class="different_filters_divbox">                                            
	<ul>
		<?php		
		$authorarray = $db->getAuthor();		
		foreach($authorarray as $author) {
			$authorr = $author['author'];		
		?>		
		<li>
			<input type="checkbox" id="author-<?php echo strtolower($authorr);?>" name="authorcheck" class="authorcheck" value="<?php echo $author['author']?>"/>
			<label for="author-<?php echo strtolower($authorr);?>"><?php echo $authorr;?></label>
		</li>
		<?php
		}
		?>
	</ul>
</div>