<?php  
	$line = PropertyList();
	foreach($line as $row)
	{
?>
		<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12" style="margin-bottom: 30px">
			<div class="offer">
				<div class="offer__icon">
					<img src="uploads/property/<?php echo $row['Images']; ?>" alt="icon images">
				</div>
				<div class="offer__details">
					<h2><a href="javascript:void(0)"><?php echo $row['Name']; ?></a></h2>
					<p><?php echo $row['Content']; ?></p>
				</div>
			</div>
		</div>
	<?php
	}
?>