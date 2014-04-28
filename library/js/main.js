/***********************************************************

FUNCTIONS

1 - vertCenterNav
2 - keepSquare
3 - mobileMenu
4 - photoGallery

***********************************************************/

(function ($) {

	// 1 - centerLogo
	$.fn.vertCenterNav = function(){

		var logo = this.find('#logo_wrap');
		var logoHeight = logo.height();

		var nav = this.find('#header_nav');
		var navHeight = nav.height();
		var yPos = null;

		if( navHeight > logoHeight ){
			var yPos = Math.round(( navHeight - logoHeight )/2);
			logo.css( 'padding-top', yPos );
			nav.css( 'padding-top', 0);
		} else if( logoHeight > navHeight ) {
			var yPos = Math.round(( logoHeight - navHeight )/2);
			nav.css( 'padding-top', yPos );
			logo.css( 'padding-top', 0);
		}

		return this;
	};

	// 2 - keepSquare
	$.fn.keepSquare = function(){
		var elementWidth = this.width();
		this.height(elementWidth);
		return this;
	};

	// 3 - mobileMenu
	$.fn.mobileMenu = function(){
		var menu = this.html();
		$('body').prepend('<div id="mobile_menu">'+menu+'</div>');
		return this;
	};

	// 4 - photoGallery
	$.fn.photoGallery = function(){

	};

	// 5 - Placeholder fix
	// @todo Document this.
	  $.extend($,{ placeholder: {
	      browser_supported: function() {
	        return this._supported !== undefined ?
	          this._supported :
	          ( this._supported = !!('placeholder' in $('<input type="text">')[0]) );
	      },
	      shim: function(opts) {
	        var config = {
	          color: '#888',
	          cls: 'placeholder',
	          selector: 'input[placeholder], textarea[placeholder]'
	        };
	        $.extend(config,opts);
	        return !this.browser_supported() && $(config.selector)._placeholder_shim(config);
	      }
	  }});

	  $.extend($.fn,{
	    _placeholder_shim: function(config) {
	      function calcPositionCss(target)
	      {
	        var op = $(target).offsetParent().offset();
	        var ot = $(target).offset();

	        return {
	          top: ot.top - op.top,
	          left: ot.left - op.left,
	          width: $(target).width()
	        };
	      }
	      function adjustToResizing(label) {
	      	var $target = label.data('target');
	      	if(typeof $target !== "undefined") {
	          label.css(calcPositionCss($target));
	          $(window).one("resize", function () { adjustToResizing(label); });
	        }
	      }
	      return this.each(function() {
	        var $this = $(this);

	        if( $this.is(':visible') ) {

	          if( $this.data('placeholder') ) {
	            var $ol = $this.data('placeholder');
	            $ol.css(calcPositionCss($this));
	            return true;
	          }

	          var possible_line_height = {};
	          if( !$this.is('textarea') && $this.css('height') != 'auto') {
	            possible_line_height = { lineHeight: $this.css('height'), whiteSpace: 'nowrap' };
	          }

	          var isBorderBox = ($this.css('box-sizing') === 'border-box');

	          var ol = $('<label />')
	            .text($this.attr('placeholder'))
	            .addClass(config.cls)
	            .css($.extend({
	              position:'absolute',
	              display: 'inline',
	              'float':'none',
	              overflow:'hidden',
	              textAlign: 'left',
	              color: config.color,
	              cursor: 'text',
	              paddingTop: isBorderBox ? '0' : $this.css('padding-top'),
	              paddingRight: $this.css('padding-right'),
	              paddingBottom: isBorderBox ? '0' : $this.css('padding-bottom'),
	              paddingLeft: $this.css('padding-left'),
	              fontSize: $this.css('font-size'),
	              fontFamily: $this.css('font-family'),
	              fontStyle: $this.css('font-style'),
	              fontWeight: $this.css('font-weight'),
	              textTransform: $this.css('text-transform'),
	              backgroundColor: 'transparent',
	              zIndex: 99
	            }, possible_line_height))
	            .css(calcPositionCss(this))
	            .attr('for', this.id)
	            .data('target',$this)
	            .click(function(){
	              $(this).data('target').focus();
	            })
	            .insertBefore(this);
	          $this
	            .data('placeholder',ol)
							.keydown(function(){
								ol.hide();
							})
							.blur(function() {
	              ol[$this.val().length ? 'hide' : 'show']();
	            }).triggerHandler('blur');
	          $(window).one("resize", function () { adjustToResizing(ol); });
	        }
	      });
	    }
	  });

}(jQuery));



jQuery(document).ready(function($) {

	var windowWidth = $(window).width();

	/****************************************************************
	Vertically center logo relative to navigation...and vice versa
	****************************************************************/
	$(window).load(function(){
		if(windowWidth > 768){
			$('body.interior_page #main_header').vertCenterNav();
		}
	});
	$(window).resize(function(){
		var windowWidth = $(window).width();
		if(windowWidth > 768){
			$('body.interior_page #main_header').vertCenterNav();
		}
	});

	/****************************************************************
	Build mobile menu
	****************************************************************/
	$('#header_nav').mobileMenu();

	/****************************************************************
	Animate the menu stuff
	****************************************************************/
	$('#mobile_menu_toggle').click(function(){

		var windowWidth = $(window).width();
		var rightOffset = windowWidth - 60;
		
		if( $('#mobile_menu_toggle').hasClass('expanded') ) {
			
			$('#site_wrap, #mobile_header').animate({
				right: 0
			}, {
				duration: 120,
				specialEasing: "swing"
			});

			$('#mobile_menu_toggle').removeClass('expanded');
			
		} else {
			
			$('#site_wrap, #mobile_header').animate({
				right: -rightOffset
			}, {
				duration: 120,
				specialEasing: "swing"
			});

			$('#mobile_menu_toggle').addClass('expanded');
			
		}
		
		return false;

	});

	/*************************************************************************
	Keep Album dimensions equal no matter what
	*************************************************************************/
	$('.soundcloud_embed').keepSquare();
	if( windowWidth > 768 ){
		$('.album_info_wrapper').keepSquare();
	}
	$(window).resize(function(){
		var windowWidth = $(window).width();
		$('.soundcloud_embed').keepSquare();
		if( windowWidth > 768 ){
			$('.album_info_wrapper').keepSquare();
		} else {
			$('.album_info_wrapper').height('auto');
		}
	});

	/*************************************************************************
	Make video embeds responsive - Youtube, vimeo
	*************************************************************************/
	$(".video_embed").fitVids();


	/*************************************************************************
	LIGHTBOX FOR PHOTOS
	*************************************************************************/
	if( windowWidth < 768 ) {
		$('a.lightbox').swipebox();
	} else {
		$('a.lightbox').nivoLightbox();
	}

	/****************************************************************
	Social Link Tooltips
	****************************************************************/
	$('.tooltip.tweet').tooltipster({
		trigger: 'hover',
		delay: 80,
		speed: 100,
		animation: 'fade',
		content: $('<div class="fill tweet">Tweet This</div>'),
		arrowColor: '#00aced'
	});
	$('.tooltip.like').tooltipster({
		trigger: 'hover',
		delay: 80,
		speed: 100,
		animation: 'fade',
		content: $('<div class="fill like">Share on Facebook</div>'),
		arrowColor: '#3b5998'
	});

	/****************************************************************
	Fix IE placeholder issues
	****************************************************************/
	if (jQuery.placeholder) {
    jQuery.placeholder.shim();
  }

});