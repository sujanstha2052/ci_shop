<div style="background-color: #ddd; border-radius: 7px;">
	<table class="table">
		<tr>
			<td colspan="2">Item ID: <?= $store_item_id ?></td>
		</tr>
		<?php if(!empty($store_item_colours)): ?>
			<?php 
			$colour_options = array();
			$colour_options[''] = 'Select Colour';
			foreach($store_item_colours as $row) {
				$colour_options[$row->id] = $row->colour;
			}
			?>
			<tr>
				<td>Colour:</td>
				<td>
					<?= form_dropdown('colour', $colour_options, '', array('class' => 'form-control')) ?>
				</td>
			</tr>
		<?php endif; ?>

		<?php if(!empty($store_item_sizes)): ?>
			<?php 
			$size_options = array();
			$size_options[''] = 'Select Size';
			foreach($store_item_sizes as $row) {
				$size_options[$row->id] = $row->size;
			}
			?>
			<tr>
				<td>Size:</td>
				<td>
					<?= form_dropdown('size', $size_options, '', array('class' => 'form-control')) ?>
				</td>
			</tr>
		<?php endif; ?>
		<tr>
			<td>Qty:</td>
			<td>
				<div class="col-sm-4" style="padding-left: 0;">
					<input type="text" class="form-control" name="qty">
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<button class="btn btn-primary">
					<i class="fa fa-shopping-cart"></i> &nbsp; Add to Basket
				</button>
			</td>
		</tr>
	</table>
</div>
