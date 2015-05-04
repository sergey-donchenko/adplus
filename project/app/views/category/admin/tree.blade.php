<div class="sidebar-account">		
	<div class="row category-tree-sidebar">	
		<h1 class="head-categories icon-head"><?php echo Lang::get('category.title.category'); ?></h1>				
		<div class="button-panel">
			<button type="button" class="btn btn-default btn-sm add-category-btn"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <?php echo Lang::get('category.component.add_category'); ?></button>
			<button type="button" class="btn btn-default btn-sm add-sub-category-btn"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> <?php echo Lang::get('category.component.add_sub_category'); ?></button>
			<button type="button" class="btn btn-default btn-sm delete-active-category-btn"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> <?php echo Lang::get('category.component.delete_active_category'); ?></button>
		</div>
		<div class="easy-tree category-tree" style="display:none;">
			<ul>
		        <li class="isLazy isFolder"><?php echo Lang::get('category.component.default_category'); ?></li>
		    </ul>
		</div>
	</div>
</div>	