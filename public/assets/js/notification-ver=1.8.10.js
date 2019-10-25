(function($, Models, Collections, Views) {
	$(document).ready(function() {
		$('.hamburger-menu').on('click', function(event) {
			event.preventDefault();
			$('.gre-header-wrapper').removeClass('notify-active').toggleClass('active');
			$(this).find('.hamburger').toggleClass('is-active');
		});

		$('.notification-tablet').on('click', function(event) {
			event.preventDefault();
			$('.gre-header-wrapper').removeClass('active').toggleClass('notify-active');
			$('.hamburger').removeClass('is-active');
			var data = JSON.parse($('.gre-account-wrap').find('.postdata').html()),
        		IDs = [];
        	$.each(data, function(key, value){
        		if(value.seen == ''){
        			IDs.push(value.ID);
        		}
        	});
        	// update seen notify
        	$.ajax({
        		url : ae_globals.ajaxURL,
        		type: 'post',
        		data:{
        			action : 'gre-user-seen-notify',
        			IDs : IDs
        		},
        		beforeSend: function() {
                },
                success: function(res) {
                	// remove dot notification
        			$('.gre-notification').find('.dot-noti').remove();
                }
        	});
		});

		$('.owl-carousel-stories').owlCarousel({
            // loop: true,
            margin: 50,
            responsiveClass: true,
            navText: ["<span></span>","<span></span>"],
            dots: false,
            responsive: {
              	0: {
	                items: 1,
	                nav: true
              	},
              	600: {
	                items: 1,
	                nav: false
              	},
              	1000: {
	                items: 1,
	                nav: true,
	                loop: false,
	                margin: 50
              	}
            }
        });

        $(document).on('click', '.dropdown-menu', function(e) {
		    if ($(this).hasClass('dropdown-keep-open')) {
		    	e.stopPropagation();
		    }
		});
        $('.gre-account-wrap').on('shown.bs.dropdown', function () {
        	var data = JSON.parse($(this).find('.postdata').html()),
        		IDs = [];
        	$.each(data, function(key, value){
        		if(value.seen == ''){
        			IDs.push(value.ID);
        		}
        	});
        	// update seen notify
        	$.ajax({
        		url : ae_globals.ajaxURL,
        		type: 'post',
        		data:{
        			action : 'gre-user-seen-notify',
        			IDs : IDs
        		},
        		beforeSend: function() {
                },
                success: function(res) {
                	// remove dot notification
        			$('.gre-notification').find('.dot-noti').remove();
                }
        	});
		});
		$('.gre-account-wrap').on('hidden.bs.dropdown', function(e){
			$(this).find('ul.list_notify li').removeClass('gre-notify-new');
		});
		// Form Search
		$('.gre-search-dropdown li').on("click", function(){
			var action = $(this).find('a').data('action'),
				placeholder = $(this).find('a').html();

			$('.gre-form-search').attr('action',action);
			$('.gre-form-search input[name="keyword"]').attr('placeholder', placeholder).val('');
			// add class
			$('.gre-search-dropdown li a').removeClass('active');
			$(this).find('a').addClass('active');
		});

		/**
		 * list view control notification list
		 * @since 1.2
		 * @author ThanhTu
		 */
		ListNotify = Views.ListPost.extend({
			tagName: 'li',
			itemView: NotifyItem,
			itemClass: 'notify-item',
			onAfterItemAdded: function(view){
				// add class
				if(view.model){
					var classID = 'item-' + view.model.get('ID');
					view.$el.addClass(classID).attr('data-id', view.model.get('ID'));
				}
			}
		});

		// notification list control
		if( $('#fre_notification_container').length > 0 ){

			if( $('#fre_notification_container').find('.postdata').length > 0 ){
				var postsdata = JSON.parse($('#fre_notification_container').find('.postdata').html()),
					posts = new Collections.Notify(postsdata);
			} else {
				var posts = new Collections.Notify();
			}
			/**
			 * init list blog view
			 */
			new ListNotify({
				itemView: NotifyItem,
				collection: posts,
				el: $('#fre_notification_container').find('.gre-notification-list'),

			});
			new Views.BlockControl({
				collection: posts,
				el: $('#fre_notification_container')
			});
		}
		var template_undo = _.template($('#ae-notify-undo-template').html()),
				blockUi    = new Views.BlockUi();
		// Remove Notify
		$('.list_notify').on('click', 'a.notify-remove', function(event) {
			event.preventDefault();
        	var view = this,
        		$target = $(event.currentTarget);
        		itemID = $target.data('id'),
        		classItem = '.notify-item.item-'+itemID,
        		$notifyItem = $(classItem);
			$.ajax({
        		url : ae_globals.ajaxURL,
        		type: 'post',
        		data:{
        			action : 'gre-notify-remove',
        			ID : itemID,
        			type : 'delete'
        		},
        		beforeSend: function() {
                	blockUi.block($(view).parents('.notify-item'));
                },
                success: function(res) {
                    if (res.success) {
						$notifyItem.prepend(template_undo);
						$notifyItem.find('.gre-notify-archive span').attr('data-id', itemID);
                    }
                    blockUi.unblock();
                }
        	})
		});
		// Undo Notify
		$('.list_notify').on('click', '.gre-notify-archive span', function(event) {
			event.preventDefault();
        	var view = this,
        		$target = $(event.currentTarget);
        		itemID = $target.data('id'),
        		classItem = '.notify-item.item-'+itemID,
        		$notifyItem = $(classItem);
        	$.ajax({
        		url : ae_globals.ajaxURL,
        		type: 'post',
        		data:{
        			action : 'gre-notify-remove',
        			ID : itemID,
        			type : 'undo'
        		},
        		beforeSend: function() {
                	blockUi.block($(view).parents('.notify-item'));
                },
                success: function(res) {
                    if (res.success) {
						$notifyItem.find('.gre-notify-archive').remove();
                    }
                    blockUi.unblock();
                }
        	})
		});

	});

})(jQuery, window.AE.Models, window.AE.Collections, window.AE.Views);