<?php require VIEW_ROOT .'/templates/header.php'; ?>

	<?php if ($pages = false): ?>
		<p>No data found</p>
	<?php else: ?>
		<h2><?php echo e($page['title']);?> </h2>

		<?php echo e($page['body']); ?>
		<p class="faded">Created on <?php echo $page['created']->format('d M Y'); ?> 
			<?php if ($page['updated']): ?>

			Last updated <?php echo $page['updated']->format('d M Y'); ?>
		
			<?php endif; ?>
		</p>
		
	<?php endif; ?>
	
<?php require VIEW_ROOT .'/templates/footer.php'; ?>
