
<div class="dataTables_paginate">

		<?php if ($this->Paginator->param('count')): ?>
		<div>
			<?php echo $this->Paginator->counter(array(
							'format' => __('{:count} '.__('Records').' ({:page} / {:pages})'
							)
						)); 
			?>
		</div>
		<?php endif; ?>
		<div class="pagination">

				<?php

					echo $this->Paginator->prev('<< Prev', array(
						'tag' => 'li',
						'currentClass' => 'paginate_button'
						),
						null,
						array(
							'tag' 					=> 'li',
							'disabledTag' 	=> 'a',
							'class' 				=> 'paginate_button',
							'aria-controls'	=> 'DataTables_Table_0',
							'data-dt-idx'		=> '1',
							'tabindex'			=> '0',
							'id'						=> 'DataTables_Table_0_previous'
						)
					); 

					echo $this->Paginator->numbers(array(
						'separator' => '',
						'currentTag' => 'a',
						'currentClass' => 'paginate_button current',
						'tag' => 'li'
						)
					); 

					echo $this->Paginator->next('Next >>', array(
						'tag' => 'li',
						'currentClass' => 'paginate_button'
						),
						null,
						array(
							'tag' 					=> 'li',
							'disabledTag' 	=> 'a',
							'class' 				=> 'paginate_button',
							'aria-controls'	=> 'DataTables_Table_0',
							'data-dt-idx'		=> '1',
							'tabindex'			=> '0',
							'id'						=> 'DataTables_Table_0_next'
						)
					); 
					
			?>

		</div>

</div>