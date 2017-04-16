<div class="different_filters_divbox">                                            
	<ul>
		<?php		
		$genrearray = $db->getGenre();		
		foreach($genrearray as $genre) {
			$genre1 = $genre['category_id'];
			$sql = "SELECT * FROM `categories` where `id` = $genre1";
			$ans=mysql_query($sql);
			$row=mysql_fetch_assoc($ans);
			$genree=$row['name'];
			
		?>		
		<li>
			<input type="checkbox" id="genre-<?php echo strtolower($genree);?>" name="genrecheck" class="genrecheck" value="<?php echo $genre1 ?>"/>
			<label for="genre-<?php echo strtolower($genree);?>"><?php echo $genree ;?></label>
		</li>
		
		<?php
		}
		?>
	</ul>
</div>