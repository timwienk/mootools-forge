<div class="row">	
	<h3 class="blue"><span>Recently added (<?php echo link_to('all', '@browse') ?>) <?php echo link_to(image_tag('/images/feed.gif'), 'recentfeed', array('format' => 'rss201')) ?></span></h3>	
	<?php if ($hot->count()): ?>	
	<ul class="thumbnails">
		<?php foreach ($recent as $i => $plugin): ?>
		<?php include_partial('plugin/bit', array('plugin' => $plugin, 'i' => $i)) ?>
		<?php endforeach ?>
	</ul>
	<?php else: ?>
	<p>No plugins to show</p>
	<?php endif ?>
</div>

<hr />

<div class="row">	
	<h3 class="blue"><span>Official (<?php echo link_to('all', '@browse') ?>) <?php echo link_to(image_tag('/images/feed.gif'), 'recentfeed', array('format' => 'rss201')) ?></span></h3>	
	<ul class="thumbnails">
		<?php foreach ($official as $i => $plugin): ?>
		<?php include_partial('plugin/bit', array('plugin' => $plugin, 'i' => $i)) ?>
		<?php endforeach ?>
	</ul>
</div>

<hr />

<div class="row">
	<h3 class="blue"><span>Most downloaded (<?php echo link_to('all', '@browse?sort=downloads_count') ?>)</span></h3>
	
	<?php if ($hot->count()): ?>
	<ul class="thumbnails">
		<?php foreach ($hot as $i => $plugin): ?>
		<?php include_partial('plugin/bit', array('plugin' => $plugin, 'i' => $i)) ?>
		<?php endforeach ?>
	</ul>	
	<?php else: ?>
	<p>No plugins to show</p>
	<?php endif ?>
</div>

<hr />

<div class="row">
	<div class="span6">
		<h3 class="blue"><span>Recently active</span></h3>
		<div class="meta">
			<?php echo link_to('View all', '@developers') ?>
		</div>
		<?php if ($authors->count()): ?>
		<ul class="authors thumbnails">
			<?php foreach ($authors as $author): ?>
			<li class="span2">
				<a href="<?php echo url_for('user', array('username' => $author->getUsername())) ?>">
					<span class="avatar"><?php echo avatar_for($author) ?></span>
					<span class="name"><?php echo $author->getFullName() ?></span>
					<?php if ($author->getPluginsCount()): ?><span class="badge"><?php echo $author->getPluginsCount() ?></span><?php endif ?>
				</a>
			</li>	
			<?php endforeach ?>
		</ul>
		<?php else: ?>
		<p>No recently active users</p>
		<?php endif ?>
	</div>
	<div class="span3">
		<h3 class="blue"><span>Popular tags</span></h3>
		<?php if ($terms->count()): ?>
		<ul class="tags-list">
			<?php foreach ($terms as $term): ?>
			<li><?php echo link_to($term, 'browse', array('tag' => $term->getSlug())) ?></li>
			<?php endforeach ?>
		</ul>
		<?php else: ?>
		<p>No tags to show</p>
		<?php endif; ?>
	</div>
</div>
