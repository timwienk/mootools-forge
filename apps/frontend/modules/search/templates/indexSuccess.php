<?php use_helper('Search') ?>
<?php use_helper('Text') ?>
<div class="block">
	<h3 class="red"><span>Search</span></h3>
	
	<hr class="clear" />
	<form action="<?php echo url_for('@search') ?>" method="get" accept-charset="utf-8" class="well form-search">
		<input type="text" placeholder="Search" name="search" id="q" class="input-small search-query" />
		<button type="submit" class="btn">Go</button>

		<?php if ($form->hasGlobalErrors()): ?>
		<ul class="alert alert-error">
	    <?php foreach ($form->getGlobalErrors() as $name => $error): ?>
	    <li><?php echo $error ?></li>
	    <?php endforeach; ?>
		</ul>
		<?php endif; ?>
		<div class="alert alert-error">		
		<?php echo $form['q']->renderError() ?>
		</div>	
	</form>
	<hr class="clear" />
		
  <?php $res = isset($pager) ? $pager->getResults() : false; ?>
  <?php if (!$res || !$res->count()): ?>
  No results to show
  <?php else: ?>
  <?php if ($sphinx->getLastWarning()): ?>
  Warning: <?php echo $sphinx->getLastWarning() ?>
  <?php endif ?>
  <ol start="<?php echo $pager->getFirstIndice() ?>" class="search_results">
  <?php foreach ($res as $item): ?>
    <li>
      <p class="title"><?php echo link_to(highlight_search_result($item->getTitle(), $query), '@plugin?slug=' . $item->getSlug()) ?></p>
      <p class="desc"><?php echo truncate_text($item->getDescriptionClean(), 300) ?></p>
			<p class="author">By <?php echo link_to($item->getAuthor()->getFullName(), '@user?username=' . $item->getAuthor()->getUsername()) ?></p>
    </li>
  <?php endforeach ?>
  </ol>
  <?php endif ?>

  <?php if ($res && $pager->haveToPaginate()): ?>	
	<hr />
	<ul class="numbers-paginator">	
    <li><?php echo link_to('&laquo;', '@search?q=' . $query . '&p=' . $pager->getFirstPage()) ?></li>
    <li><?php echo link_to('&lt;', '@search?q=' . $query . '&p=' . $pager->getPreviousPage()) ?></li>
    <?php $links = $pager->getLinks()?>
    <?php foreach ($links as $page): ?>
			<li>
      <?php echo ($page == $pager->getPage()) ? '<em>' . $page . '</em>' : link_to($page, '@search?q=' . $query . '&p=' . $page) ?>
			</li>
    <?php endforeach ?>
    <li><?php echo link_to('&gt;', '@search?q=' . $query . '&p=' . $pager->getNextPage()) ?></li>
    <li><?php echo link_to('&raquo;', '@search?q=' . $query . '&p=' . $pager->getLastPage()) ?></li>		
	</ul>
  <?php endif ?>
	
</div>