(function($, Models, Collections, Views) {
	$(document).ready(function() {

		$('.gre-chosen-single, .gre-chosen-multi').chosen({
			width: '100%',
            inherit_select_classes: true
		});



		var calendar = $('.gre-calendar').datetimepicker({
			format: 'MM/DD/YYYY',
			icons: {
				previous: 'fa fa-angle-left',
    			next: 'fa fa-angle-right'
			},
		});

		$('.project-filter-title').on('click', function(ev) {
			ev.preventDefault();
			var target = ev.currentTarget;
			$('.gre-project-filter-box').toggleClass('active');
		});

		$('.profile-filter-title').on('click', function(ev) {
			ev.preventDefault();
			var target = ev.currentTarget;
			$('.gre-profile-filter-box').toggleClass('active');
		});

		$('.gre-skill-item').on('click', function(ev) {
			ev.preventDefault();
			var target = ev.currentTarget;
			$(this).toggleClass('active');
			var skill_field = [];
			$('.gre-skill-dropdown li').each(function(index, el) {
				if($(this).find('a').hasClass('active')) {
					skill_field.push($(this).find('a').text());
				}
			});
			$('.gre-skill-field').val(skill_field);
		});

		$('.gre-search-skill-dropdown').keyup(function() {
			var _this = this;
			$('.gre-skill-dropdown li').each(function(index, el) {
				if($(this).find('a').text().indexOf($(_this).val()) != -1) {
					$(this).show();
				} else {
					$(this).hide();
				}
			});
			if($(_this).val() == '') {
				$('.gre-skill-dropdown li').each(function(index, el) {
					$(this).show();
				});
			}
		});


		$(document.body).on('click', function(event) {
            if($(event.target).closest('.gre-skill-dropdown').length) {
                $('.gre-skill-dropdown').parent().addClass('keep-menu-open');
            } else {
            	$('.gre-skill-dropdown').parent().removeClass('keep-menu-open');
            }
        });

		// $('.gre-post-project-next-btn').on('click', function(ev) {
		// 	ev.preventDefault();
		// 	var target = ev.currentTarget;
		// 	$(target).closest('.gre-post-project-step').removeClass('active');
		// 	$(target).closest('.gre-post-project-step').next().addClass('active');
		// });
		// $('.gre-post-project-previous-btn').on('click', function(ev) {
		// 	ev.preventDefault();
		// 	var target = ev.currentTarget;
		// 	$(target).closest('.gre-post-project-step').removeClass('active');
		// 	$(target).closest('.gre-post-project-step').prev().addClass('active');
		// });


		$('.employer-info-edit-btn, .employer-info-save-btn, .employer-info-cancel-btn').on('click', function(ev) {
			ev.preventDefault();
			var target = ev.currentTarget;
			$(target).closest('.profile-employer-info-wrap').toggleClass('active');
		});

		$('.employer-secure-edit-btn, .employer-secure-save-btn').on('click', function(ev) {
			ev.preventDefault();
			var target = ev.currentTarget;
			$(target).closest('.profile-employer-secure-wrap').toggleClass('active');
		});

		$('.employer-info-edit-btn, .employer-info-save-btn, .employer-info-cancel-btn').on('click', function(ev) {
			ev.preventDefault();
			var target = ev.currentTarget;
			$(target).closest('.profile-employer-info-wrap').toggleClass('active');
		});

		$('.employer-secure-edit-btn, .employer-secure-save-btn').on('click', function(ev) {
			ev.preventDefault();
			var target = ev.currentTarget;
			$(target).closest('.profile-employer-secure-wrap').toggleClass('active');
		});

		$('.freelance-info-edit-btn, .freelance-info-save-btn, .freelance-info-cancel-btn').on('click', function(ev) {
			ev.preventDefault();
			var target = ev.currentTarget;
			$(target).closest('.profile-freelance-info-wrap').toggleClass('active');
		});

		$('.freelance-secure-edit-btn, .freelance-secure-save-btn, .freelance-secure-cancel-btn').on('click', function(ev) {
			ev.preventDefault();
			var target = ev.currentTarget;
			$(target).closest('.profile-freelance-secure-wrap').toggleClass('active');
		});


		$('.experience-add-btn').on('click', function(ev) {
			ev.preventDefault();
			$('.freelance-experience-new-wrap').addClass('active');
		});

		$('.gre-experience-close').on('click', function(ev) {
			ev.preventDefault();
			$('.freelance-experience-new-wrap').removeClass('active');
		});

		$('.certificate-add-btn').on('click', function(ev) {
			ev.preventDefault();
			$('.freelance-certificate-new-wrap').addClass('active');
		});

		$('.gre-certificate-close').on('click', function(ev) {
			ev.preventDefault();
			$('.freelance-certificate-new-wrap').removeClass('active');
		});

		$('.education-add-btn').on('click', function(ev) {
			ev.preventDefault();
			$('.freelance-education-new-wrap').addClass('active');
		});

		$('.gre-education-close').on('click', function(ev) {
			ev.preventDefault();
			$('.freelance-education-new-wrap').removeClass('active');
		});

		$('.gre-view-portfolio').on('click', function(ev) {
			ev.preventDefault();
			$('#modal_view_portfolio').modal('show');
		});

		$('.project-action-col .action-delete').on('click', function(ev) {
			ev.preventDefault();
			$('#modal_delete_project').modal('show');
		});

		$('.project-action-col .action-archive').on('click', function(ev) {
			ev.preventDefault();
			$('#modal_archive_project').modal('show');
		});

		$('.project-action-col .action-cancel-bid').on('click', function(ev) {
			ev.preventDefault();
			$('#modal_cancel_bid').modal('show');
		});


		$('.gre-conversation').mCustomScrollbar({
            setHeight:524,
            setTop:"-1000000px",
            callbacks:{
                onInit:function(){},
                onUpdate:function(){},
                onScroll : function(){
                    if(this.mcs.top == 0){ // Scroll to Top
                    }
                }
            }
        });

        $('.workspace-files-wrap').mCustomScrollbar({
            setHeight:672,
            callbacks:{
                onInit:function(){},
                onUpdate:function(){},
                onScroll : function(){
                    if(this.mcs.top == 0){ // Scroll to Top
                    }
                }
            }
        });

        // Submit form when press Enter
        $('.conversation-typing').find('textarea').bind('keyup', function(e) {
            if($(this).val().length == 0){
            	$(this).height(38);
                $('.conversation-send-message-btn').addClass('disabled');
                $('input#conversation-send-message').addClass('disabled').attr('disabled','disabled');
            }else{
                $('.conversation-send-message-btn').removeClass('disabled');
                $('input#conversation-send-message').removeClass('disabled').removeAttr('disabled');
            }
        });

        $('.nav-tabs-workspace>li>a').on('click', function() {
        	var group = $(this).data('group');
        	if(group == 'conversation') {
        		$('.workspace-files-wrap').hide();
        		$('.workspace-conversation').show();
        	} else {
        		$('.workspace-files-wrap').mCustomScrollbar('destroy');

        		$('.workspace-files-wrap').show();
        		$('.workspace-files-wrap').mCustomScrollbar({
		            setHeight:578,
		            callbacks:{
		                onInit:function(){},
		                onUpdate:function(){},
		                onScroll : function(){
		                }
		            }
		        });

        		$('.workspace-conversation').hide();
        	}
        });

        $('.nav-tabs-disputed>li>a').on('click', function() {
        	var group = $(this).data('group');
        	if(group == 'conversation') {
        		$('.disputed-information').hide();
        		$('.disputed-conversation').show();
        	} else {
        		$('.disputed-information').show();
        		$('.disputed-conversation').hide();
        	}
        });

        $('.transaction-filter-title').on('click', function(ev) {
			ev.preventDefault();
			var target = ev.currentTarget;
			$('.gre-credit-filter-box').toggleClass('active');
		});

        $(document).on('show.bs.tab', '.nav-tabs-workspace', function(e) {
            var $target = $(e.target);
            var $tabs = $target.closest('.nav-tabs-workspace');
            var $current = $target.closest('li');
            var $parent = $current.closest('li.dropdown');
                $current = $parent.length > 0 ? $parent : $current;
            var $next = $current.next();
            var $prev = $current.prev();

            $tabs.find('li').removeClass('next prev');
            $prev.addClass('prev');
            $next.addClass('next');

        });

        $(document).on('show.bs.tab', '.nav-tabs-disputed', function(e) {
            var $target = $(e.target);
            var $tabs = $target.closest('.nav-tabs-disputed');
            var $current = $target.closest('li');
            var $parent = $current.closest('li.dropdown');
                $current = $parent.length > 0 ? $parent : $current;
            var $next = $current.next();
            var $prev = $current.prev();

            $tabs.find('li').removeClass('next prev');
            $prev.addClass('prev');
            $next.addClass('next');

        });

		$(document).on('show.bs.tab', '.nav-tabs-my-work', function(e) {
            var $target = $(e.target);
            var $tabs = $target.closest('.nav-tabs-my-work');
            var $current = $target.closest('li');
            var $parent = $current.closest('li.dropdown');
                $current = $parent.length > 0 ? $parent : $current;
            var $next = $current.next();
            var $prev = $current.prev();

            $tabs.find('li').removeClass('next prev');
            $prev.addClass('prev');
            $next.addClass('next');

        });

	});
}(jQuery, window.AE.Models, window.AE.Collections, window.AE.Views))