var modCategory = (function ( $, adPlus ) {
	var _config = {
			modal: null // refference to the Modal module
		},

		sCategoryTreeSelector        = '.category-tree',
		sCategoryFormWrapperSelector = '#categoryFormWrapper',
		sCategoryFormSelector        = '#frmCategory',
		sAddCategoryButton           = '.add-category-btn',
		sAddSubCategoryButton        = '.add-sub-category-btn',
		sCategorySelectorBreadcrumb  = '#categoryBreadcrumb',
		oCategoryTreeInstance        = null,		
		aCategories                  = {},
		aCategoryForms               = {},
		_sCategoryRootId             = null,
		aNestedNodes                 = [], // to handle the nested objects
		App                          = adPlus.getInstance();
	
	/**
	 * Returns the jQuery object for the Chooser body
	 *
	*/
	function getChooserDialogBody()
	{
		return jQuery('.category-container').first();
	}

	/**
	 * update the dialog body with content
	*/
	function setChooserDialogBody( categoryId ) 
	{
		var setDialogContent = function( content, timeout ) {
				var breadcrumb = jQuery(sCategorySelectorBreadcrumb),
					dialogBody = getChooserDialogBody(),
					dfd = jQuery.Deferred();

				if ( !(timeout > 0) ) {
					timeout = 5;
				}

				dialogBody.html( 'Loading...' );
				breadcrumb.find('li').not('#home,.home').each( function(){
					jQuery(this).remove();
				});

				setTimeout(function(){
					dialogBody.html( content );
					
					breadcrumb.find('span.loading-icon').remove();

					if ( categoryId > 0 && aCategoryForms[ categoryId ] ) {
						var data = aCategoryForms[ categoryId ]['data'],
							parents = data['parents'] || {};					

						for( var i in parents ) {											
							breadcrumb.append('<li><span><a href="" class="hasChildren" attr-id="' + parents[i]['id'] + '">' +  parents[i]['name'] + '</a></span></li>');
						}

						breadcrumb.append('<li><span class="current-category">' +  data['name'] + '</span></li>');
					}

					dfd.resolve( dialogBody, breadcrumb);
				}, timeout);				

				return dfd.promise();
			},		

			getFormContent = function() {
				dfd = jQuery.Deferred();

				if ( categoryId && categoryId > 0 ) {
					if ( jQuery.isEmptyObject(aCategoryForms.hasOwnProperty(categoryId)) ) {
						App.Ajax.get('/category/category-list-items/' + categoryId).then( function( request ){
							if ( request && request.status ) {
								aCategoryForms[ categoryId ] = {
									data: request.data,
									html: request.html
								};

								dfd.resolve( aCategoryForms[ categoryId ] );
							} else {
								dfd.reject( request );
							}
						});	
					} else {
						dfd.resolve( aCategoryForms[ categoryId ] );
					}
				} else {					
					dfd.resolve( aCategoryForms[ 'init' ] );
				}		

				return dfd.promise();
			};
		
		// Draw the Category form
		getFormContent().then( function( oContent ) {
			setDialogContent( oContent['html'], 30 ).then(function( dialogBody, breadcrumb ) {});
		});	
		
	}

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
			$( sCategoryFormSelector ).change(function( e ) {
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
		 * Show the Category Popup
		 *
		*/
		selectDialog: function( params, parentObject ) {
			if ( _config.modal === null ) {
				_config.modal = adPlus.getInstance().Module.get('modModal');
			}

			_config.modal.init( $.extend( { 
				title: 'Select a Category', 
				url: '/category/chooser',

				onclick: function( e ) {
					var target = e.target,
						selectedCategory = $('#selectedCategory'),
						breadcrumb = $(sCategorySelectorBreadcrumb);

					e.preventDefault();

					if ( target.classList.contains('loadInitialList') || target.classList.contains('hasChildren')) {
						var initId = jQuery(target).attr('attr-id') || 0;
						
						// console.log(initId);

						setChooserDialogBody( initId );
					} else if ( target.classList.contains('selectable') ) {
																			
						if( jQuery(selectedCategory).length > 0 ) {
							jQuery(selectedCategory).html(
								'<input type="hidden" name="category_id" value="' + jQuery(e.target).attr('attr-id') + '" />' + 
								jQuery(e.target).attr('title')
							);
						}

						//Close the dialog
						_config.modal.close();
					}

					return false;
				},
					
				oninitialload: function( data, status, e) {
					setTimeout( function(){
						var content = getChooserDialogBody(),
							selectedCategory = $('#selectedCategory');

						if ( content ) { 
							aCategoryForms['init'] = {
								data: null,
								html: jQuery(content).html()
							};
						}

						// jQuery(selectedCategory).find('input[name="category_id"]').each(function(){
						// 	var initId = jQuery(this).val();

						// 	console.log( initId );

						// 	setChooserDialogBody( initId );
						// });						

					}, 10);
				}
			}, params ) ).show();
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

