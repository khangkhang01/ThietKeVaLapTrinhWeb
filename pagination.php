
	<ul class="pagination">
<?php if($current_page > 3){$first_page=1; ?>
	<li><a href="?per_page=<?=$item_per_page?>&page=<?=$first_page?>">Đầu tiên</a></li>
<?php } ?>

<?php if($current_page > 1){$prev_page=$current_page - 1; ?>
	<li><a href="?per_page=<?=$item_per_page?>&page=<?=$prev_page?>">Trước</a></li>
<?php } ?>

<?php for($num=1;$num<=$totalPages;$num++){ ?>
	<?php if($num != $current_page){ ?>
	<?php if($num > $current_page - 3 && $num < $current_page + 3){ ?>
	  <li><a href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
	<?php } ?>
	<?php }else{ ?>
		<li class="active"><a><?=$num?></a></li>
	<?php } ?>
<?php } ?>

<?php if($current_page < $totalPages - 1){$next_page=$current_page + 1; ?>
	<li><a href="?per_page=<?=$item_per_page?>&page=<?=$next_page?>">Tiếp theo</a></li>
<?php } ?>

<?php if($current_page < $totalPages - 3){$end_page=$totalPages; ?>
	<li><a href="?per_page=<?=$item_per_page?>&page=<?=$end_page?>">Cuối cùng</a></li>
<?php } ?>
	</ul>