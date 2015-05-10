var modCategory = (function ( $, adPlus ) {
	var _config = {
			modal: null // refference to the Modal module
		},

		sCategoryTreeSelector        = '.category-tree',
		sCategoryFormWrapperSelector = '#categoryFormWrapper',
		sCategoryFormSelector        = '#frmCategory',
		sAddCategoryButton           = '.add-category-btn',
		sAddSubCategoryButton        = '.add-sub-category-btn',
		oCategoryTreeInstance        = null,		
		aCategories                  = {},
		_sCategoryRootId             = null,
		aNestedNodes                 = [], // to handle the nested objects
		App                          = adPlus.getInstance();
	
	/**
	 * Update Category wrapper with HTML and delegate the events for the elements 
	 *
	 * @author Sergey Donchenko, <sergey.donchenko@gmail.com>
	 * @param <string> sHtml - form content, can be empty and it means we should not touch the wrapper content
	 *
	*/
	function updateCategoryForm( sHtml ) {
		
		if ( $(sCategoryFormWrapperSelector).length > 0 ) {
			
			if ( sHtml ){			
				$(sCategoryFormWrapperSelector).html( sHtml );

				// Set focused for the elements
				$( "input[focused=1]" ).each(function(){
					if ( $(this).is(':visible') ) {
						$(this).focus();
					}
				});
			}			

			// Handle the change event for the form
			// CHANGE EVENT
			$(sCategoryFormSelector).change(function( e ) {
				var target = e.target,
					val = target.value || '0';					

				if ( target.name === "category_is_active" )	 {					
					var statusBlock = $(sCategoryFormSelector).find('.display-status span');					

					if ( val === '0') {
						$(statusBlock).removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
					} else {
						$(statusBlock).removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
					}
				}
			});

			// SUBMIT
			$(sCategoryFormSelector).on('submit', function( e ) {
				// console.log('Submit Form!!!!');

				// location.search =  $.param({'someValue': {'a': 12, 'b':34}}); 

				return true;
			});
		}
	}

	/**
	 * Do a request to the server to get / render the Category Edit Form
	 *
	 * @param <mixed> id - string OR integer identifier for the form
	 * @param <function> callback - function OR null that is going to be executed once the Ajax responce will be completed
	 *
	*/
	function retrieveCategoryForm( id, callback ) {

		var key = id;

		if ( id === null || id === undefined || id === 'empty' ) {
			key = 'empty'			
			id  = '';
		}

		if ( aCategories.hasOwnProperty( key ) ) {
			if ( typeof( callback ) === "function" ) {
				callback( aCategories[ key ] );
			}
		} else {
			$.get( "/admin/category-form/" + id, function( data ) {
				if ( data && data.html ) {
					aCategories[ key ] = data;

					if ( typeof( callback ) === "function" ) {
						callback( data );
					}				
				}								    	
			});
		}	
	}

	function getActiveTreeNode( sel ) {
		return $( sel || sCategoryTreeSelector ).find('.easytree-active');
	}


	// Public Interface
	return {
		treeInstance: null,

		getTreeInstance: function(){
			return this.treeInstance;
		},

		setTreeInstance: function( ins ){
			this.treeInstance = ins;

			return this;
		},

		/**
		 * Show the Choose Popup
		 *
		*/
		selectDialog: function( params ) {
			if ( _config.modal === null ) {
				_config.modal = adPlus.getInstance().Module.get('modModal');
			}

			_config.modal.init( $.extend( { url: '/category/chooser' }, params ) ).show();

		},

		/**
		 * Init the module
		*/
		init: function( params ) {
			if ( params ) {
            	_config = $.extend( _config, params );
			}

			return this;
		},

		initTree: function( selector ) {
			var sel = selector || sCategoryTreeSelector,
				me = this;

			// Clear the nested objects
			aNestedNodes = [];

			// Check if plugin exists
			if ( $.fn.easytree ) {
				me.treeInstance = $( sel ).easytree({
					enableDnd: true,

					opened: function( event, nodes, node ) {						

						if ( aNestedNodes.length > 0 ) {
							var sNodeId = aNestedNodes.pop();

							if ( sNodeId === "" ) {
								sNodeId = aNestedNodes.pop();
							}

							if ( sNodeId > 0 ) {
								me.getTreeInstance().toggleNode( sNodeId );
							}

							if ( aNestedNodes.length === 0 ) {
								me.getTreeInstance().activateNode( sNodeId );
							}							
						}

					},

					built: function( nodes ) {						
						if ( nodes && nodes.length > 0 ) {
							_sCategoryRootId = nodes[0].id;							
						}
					},

					openLazyNode: function(event, nodes, node, hasChildren) {
						if ( hasChildren ) { 
		                    return false;
		                }

		                node.lazyUrl     = '/admin/get-categories';
		                node.lazyUrlJson = JSON.stringify({ 
		                	'parent' : $.isNumeric( node.id ) ? node.id : 0,
		                	'_token' : $( 'input[name=_token]' ).val()
		                }); 
					},

					stateChanged: function ( nodes, nodesJson ) {				
						var activeNode = getActiveTreeNode( sel );

						if ( activeNode ) {
							var id = activeNode.attr('id');

							if ( id && $.isNumeric(id) ) {
								App.History.replace( '/admin/category/' + id, 'Edit Category #' + id );

								if ( aCategories[id] ) {
									updateCategoryForm( aCategories[id].html );
								} else {
									retrieveCategoryForm( id, function( response ) {
										if ( response ) {
											updateCategoryForm( response.html );	
										}										
									});									
								}
							}							
						}				
					}
				});
					
				/**
				 * Save an empty form	
				 *
				 */
				if ( $(sCategoryFormWrapperSelector).length > 0 ) {
					var iCategoryId = $('input[name="category_id"]').val(),
						key = iCategoryId && iCategoryId > 0 ? iCategoryId : 'empty';					

					// Retrieving the Category form
					retrieveCategoryForm( key, function( response ) {
						// Init the nested structure
						aNestedNodes = [];

						// Init the nested nodes
						if ( response.data && response.data.path ) {
							aNestedNodes = response.data.path.split('/');
						} 

						if ( iCategoryId > 0 ) {
							aNestedNodes.push( iCategoryId )
							aNestedNodes.reverse();						
						}	
						
						// Toggling the root category
						me.getTreeInstance().toggleNode( _sCategoryRootId );

						if ( iCategoryId === 0 ) {
							me.getTreeInstance().activateNode( _sCategoryRootId );
						}
					}); 
					
					/**
					 * Handle the buttons "Add Category" and "Add Sub Category"
					 *
					 */
					$(sAddCategoryButton + ',' + sAddSubCategoryButton).click( function( e ) {
						// Check if empty form was retrived successfully
						retrieveCategoryForm( 'empty', function( responce ) {
							// Clear the pre-set value for the hidden field "parent_id"
							$('input[name="parent_id"]').val( '0' );

							// Update the URL
							App.History.replace( '/admin/category/', 'Add New Category' );

							// Set the HTML
							updateCategoryForm( aCategories['empty']['html'] );

							// Check what exactly button was pressed
							if ( $(e.target).hasClass('add-sub-category-btn') ) {
								var activeNode = getActiveTreeNode( sel ),
									id = '';

								if ( activeNode ) {
									id = activeNode.attr('id');

									$('input[name="parent_id"]').val( id );
								}
									
							}
						});						
					});

					/**
					 * Handle the deletion procedure for the Category
					 *
					 * 
					*/
					$('.delete-active-category-btn').click( function(){
						var activeNode = getActiveTreeNode( sel );

						if ( activeNode.length === 0 ) {
							alert('Please select a Category you wanted to delete.');						
							return false;
						}

						if ( confirm('Are you sure you want to delete selected category?') ) {
							var id = activeNode.attr('id');

							if ( id ) {
								var node = me.getTreeInstance().getNode( id );	

								if ( node && node.children && node.children.length > 0 ) {
									if ( !confirm('Selected category has nested items (' + node.children.length + '), please confirm you still want to delete it?') ) {
										return false;
									}	
								}

								console.log( node );

								$.ajax({
								    type: 'DELETE',
								    url: '/admin/category',
								    data: { 
								    	'id': id,
								    	'_token' : $( 'input[name=_token]' ).val()
								    },
									    
								    success: function() {
								    	retrieveCategoryForm( 'empty', function( responce ) {

								        	me.getTreeInstance().removeNode( id );
								        	me.getTreeInstance().rebuildTree();

								        	// Update the URL
											App.History.replace( '/admin/category/', 'Add New Category' );

											// Set the HTML
											updateCategoryForm( aCategories['empty']['html'] );

								        });	
									}
								});
							}
						}
					});
				} else {
					// Hide the add category buttons in form is absent
					$(sAddCategoryButton + ',' + sAddSubCategoryButton).hide();
				}	

				// Show the Category Tree
				$( sel ).show();

				// Delegate the events for the Component
				updateCategoryForm();	
			} else {
				console.log('EasyTree is required jQuery plugin.');
			}	

		}
	}	
})( jQuery, adPlusExchange );

