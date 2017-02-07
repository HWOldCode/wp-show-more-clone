/*jQuery('.wpsm-content').addClass('wpsm-content-hide');
jQuery('.wpsm-show, .wpsm-hide').removeClass('wpsm-content-hide');
jQuery('.wpsm-show').on('click', function(e) {
  jQuery(this).next('.wpsm-content').removeClass('wpsm-content-hide');
  jQuery(this).addClass('wpsm-content-hide');
  e.preventDefault();
});

jQuery('.wpsm-hide').on('click', function(e) {
  var wpsm = jQuery(this).parent('.wpsm-content');
  wpsm.addClass('wpsm-content-hide');
  wpsm.prev('.wpsm-show').removeClass('wpsm-content-hide');
  e.preventDefault();
});
*/
/* -------------------------------------------------------------------------- */

jQuery('.wpsmc-content').addClass('wpsmc-content-hide');
jQuery('.wpsmc-show, .wpsmc-hide').removeClass('wpsmc-content-hide');
jQuery('.wpsmc-show').on('click', function(e) {
  var id = jQuery(this).attr('id');

  if( typeof id !== 'undefined' ) {
	  id = id + '_content';

	  jQuery('#' + id).removeClass('wpsmc-content-hide');
  }


  jQuery(this).addClass('wpsmc-content-hide');
  e.preventDefault();
});

jQuery('.wpsmc-hide').on('click', function(e) {
  var wpsm = jQuery(this).parent('.wpsmc-content');

	wpsm.addClass('wpsmc-content-hide');

	var id = jQuery(wpsm).attr('id');

	if( typeof id !== 'undefined' ) {
		var newid = id.replace(/_content/gi, '');

		jQuery('#' + newid).removeClass('wpsmc-content-hide');
	}

	e.preventDefault();
});