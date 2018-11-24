/*****
* CONFIGURATION
*/

  //Main navigation
  
  var navigation = "jQuery('nav > ul.nav')";

  var panelIconOpened = 'icon-arrow-up';
  var panelIconClosed = 'icon-arrow-down';

  //Default colours
  var brandPrimary =  '#20a8d8';
  var brandSuccess =  '#4dbd74';
  var brandInfo =     '#63c2de';
  var brandWarning =  '#f8cb00';
  var brandDanger =   '#f86c6b';

  var grayDark =      '#2a2c36';
  var gray =          '#55595c';
  var grayLight =     '#818a91';
  var grayLighter =   '#d1d4d7';
  var grayLightest =  '#f8f9fa';
  

'use strict';

// MAIN NAVIGATION

jQuery(document).ready(function($){
  // Add class .active to current link
  jQuery('nav > ul.nav').find('a').each(function(){
    var cUrl = String(window.location).split('?')[0];
    if (cUrl.substr(cUrl.length - 1) == '#') {
      cUrl = cUrl.slice(0,-1);
    }
    if (jQuery(jQuery(this))[0].href==cUrl) {
      jQuery(this).addClass('active');

      jQuery(this).parents('ul').add(this).each(function(){
        jQuery(this).parent().addClass('open');
      });
    }
  });

  // Dropdown Menu
  jQuery('nav > ul.nav').on('click', 'a', function(e){
    if ($.ajaxLoad) {
      e.preventDefault();
    }
    if (jQuery(this).hasClass('nav-dropdown-toggle')) {
      jQuery(this).parent().toggleClass('open');
      resizeBroadcast();
    }
  });
  function resizeBroadcast() {
    var timesRun = 0;
    var interval = setInterval(function(){
      timesRun += 1;
      if(timesRun === 5){
        clearInterval(interval);
      }
      window.dispatchEvent(new Event('resize'));
    }, 62.5);
  }

  // Sidebar & Aside
  jQuery('.sidebar-toggler').click(function(){
    jQuery('body').toggleClass('sidebar-hidden');
    resizeBroadcast();
  });
  jQuery('.sidebar-minimizer').click(function(){
    jQuery('body').toggleClass('sidebar-minimized');
    resizeBroadcast();
  });
  jQuery('.brand-minimizer').click(function(){
    jQuery('body').toggleClass('brand-minimized');
  });
  jQuery('.aside-menu-toggler').click(function(){
    jQuery('body').toggleClass('aside-menu-hidden');
    jQuery('body').addClass('help-menu-hidden');
    resizeBroadcast();
  });
  jQuery('.help-toggler').click(function(){
    jQuery('body').toggleClass('help-menu-hidden');
    jQuery('body').addClass('aside-menu-hidden');
    resizeBroadcast();
  });
  jQuery('.mobile-sidebar-toggler').click(function(){
    jQuery('body').toggleClass('sidebar-mobile-show');
    resizeBroadcast();
  });
  jQuery('.sidebar-close').click(function(){
    jQuery('body').toggleClass('sidebar-opened').parent().toggleClass('sidebar-opened');
  });
  // Disable moving to top
  jQuery('a[href="#"][data-top!=true]').click(function(e){
    e.preventDefault();
  });
});

// CARDS ACTIONS

jQuery(document).on('click', '.card-actions a', function(e){
  e.preventDefault();
  if (jQuery(this).hasClass('btn-close')) {
    jQuery(this).parent().parent().parent().fadeOut();
  } else if (jQuery(this).hasClass('btn-minimize')) {
    var $target = jQuery(this).parent().parent().next('.card-block');
    if (!jQuery(this).hasClass('collapsed')) {
      jQuery('i',jQuery(this)).removeClass($.panelIconOpened).addClass($.panelIconClosed);
    } else {
      jQuery('i',jQuery(this)).removeClass($.panelIconClosed).addClass($.panelIconOpened);
    }
  } else if (jQuery(this).hasClass('btn-setting')) {
    jQuery('#myModal').modal('show');
  }
});
function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}

// Tooltip & Popover
jQuery('[rel="tooltip"],[data-rel="tooltip"]').tooltip({"placement":"bottom",delay: { show: 400, hide: 200 }});
jQuery('[rel="popover"],[data-rel="popover"],[data-toggle="popover"]').popover();

// Search Input

jQuery('#searchDropdown').on('shown.bs.dropdown', function () {
  jQuery("#search-box").focus();
})

jQuery(".usd-search").keyup(function () {
  if (jQuery(this).val()) {
     jQuery(".usd-search-results").show();
  }
  else {
     jQuery(".usd-search-results").hide();
  }
});

// Vaildate Forms

var formStandard = document.getElementById('needs-validation');
if(formStandard){
  (function() {
  'use strict';
    window.addEventListener('load', function() {
      formStandard.addEventListener('submit', function(event) {
        if (formStandard.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        formStandard.classList.add('was-validated');
      }, false);
    }, false);
  })();
};

// Show-Hide Password

jQuery(".show-hide-password").click(function() {
  var input = jQuery(jQuery(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text"); 
  } else {
    input.attr("type", "password");
  }
  jQuery(".toggle-icon").toggleClass("fa-eye fa-eye-slash");
  jQuery(".toggle-text").text(function(i, text){
    return text === "Show" ? "Hide" : "Show";
  })
});

// CAPS

jQuery(".password-field").keypress(function(e) { 
  var s = String.fromCharCode( e.which );
  if ((s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey)|| //caps is on
    (s.toUpperCase() !== s && s.toLowerCase() === s && e.shiftKey)) {
      jQuery("#CapsWarn").show();
  } else if ((s.toLowerCase() === s && s.toUpperCase() !== s && !e.shiftKey)||
    (s.toLowerCase() !== s && s.toUpperCase() === s && e.shiftKey)) { //caps is off
      jQuery("#CapsWarn").hide();
  } //else upper and lower are both same (i.e. not alpha key - so do not hide message if already on but do not turn on if alpha keys not hit yet)
});

// SCROLL PROFILE

jQuery(document).scroll(function() {
  var y = jQuery(this).scrollTop();
  if (y > 350 && (jQuery(window).width() >= 1024)) {
    jQuery( ".profile-menu" ).addClass( "profile-menu profile-fixed" );
    jQuery( ".profile-header" ).addClass( "profile-header profile-spacing" );
    jQuery('.profile-menu-img').show();
    jQuery('.profile-img').hide();
  } else {
    jQuery( ".profile-menu" ).removeClass( "profile-fixed" );
    jQuery( ".profile-header" ).removeClass( "profile-spacing" );
    jQuery('.profile-menu-img').hide();
    jQuery('.profile-img').show();
  }
});

// PW Minimum Requirements

jQuery(document).ready(function(){
	jQuery('input[type=password]').keyup(function() {
		var pswd = jQuery(this).val();
		//validate the length
		if ( pswd.length < 8 ) {
			jQuery('#length').removeClass('pw-valid').addClass('pw-invalid');
		} else {
			jQuery('#length').removeClass('pw-invalid').addClass('pw-valid');
		}
		//validate letter
		if ( pswd.match(/[a-z]/) ) {
			jQuery('#letter').removeClass('pw-invalid').addClass('pw-valid');
		} else {
			jQuery('#letter').removeClass('pw-valid').addClass('pw-invalid');
		}
		//validate capital letter
		if ( pswd.match(/[A-Z]/) ) {
			jQuery('#capital').removeClass('pw-invalid').addClass('pw-valid');
		} else {
			jQuery('#capital').removeClass('pw-valid').addClass('pw-invalid');
    }
		//validate number
		if ( pswd.match(/\d/) ) {
			jQuery('#number').removeClass('pw-invalid').addClass('pw-valid');
		} else {
			jQuery('#number').removeClass('pw-valid').addClass('pw-invalid');
		}
		//validate space
		if ( pswd.match(/[^a-zA-Z0-9\-\/]/) ) {
			jQuery('#space').removeClass('pw-invalid').addClass('pw-valid');
		} else {
			jQuery('#space').removeClass('pw-valid').addClass('pw-invalid');
		}
	})
});

// Already Exists

jQuery(document).ready(function(){
	jQuery('input.dynamic-help-input').keyup(function() {
		var dynamicHelp = jQuery(this).val();
		if ( dynamicHelp === "kaboom" ) {
			jQuery('.dynamic-help-text').addClass('show');
		} else {
			jQuery('.dynamic-help-text').removeClass('show');
    }
  })
});

// Refresh Page

jQuery(function () {
  jQuery('.refresh-page').click(function(){
    location.reload();
  })
})

// Spinner Demo

jQuery('#toggle-spinner-lg').on('click', function () {
  jQuery('.spinner-lg').toggleClass('d-none');
});
jQuery('#toggle-spinner-md').on('click', function () {
  jQuery('.spinner-md').toggleClass('d-none');
});
jQuery('#toggle-spinner-sm').on('click', function () {
  jQuery('.spinner-sm').toggleClass('d-none');
});
jQuery('#toggle-spinner-btn').on('click', function () {
  jQuery('.spinner-btn').toggleClass('d-none');
});

// Progress Demo

var progressControl = document.getElementById('progress-control');
if(progressControl){
  function progress1(value) {
    jQuery(".progress-bar").css({width: value + '%'});
    if (value < 5) {
      jQuery(".progress-bar").text("");
    }
    if (value === 100) {
      jQuery(".progress-bar").addClass('bg-success completed');
      jQuery(".progress-bar").text('Completed');
    } else if (value < 100 && value > 4) {
      jQuery(".progress-bar").removeClass('bg-success').text(value + '%');
    } else if (value < 5) {
      jQuery(".progress-bar").text("");
    }
  }
  progressControl.addEventListener('input', function(event) {
      progress1(event.target.valueAsNumber);
  });
  progress1(75);
}

// Skeleton
jQuery( document ).ready(function() {
  jQuery(".skeleton").addClass("d-none");
  jQuery(".epidermis").removeClass("d-none");
});

var delayTime = 3000;

/*jQuery(".skeleton-breadcrumb").append(
  '<div class="breadcrumb usd-breadcrumb"><h1 class="h3 breadcrumb-page-title font-bold pulse-gray-lighter"></h1><ol class="breadcrumb-list"><li class="breadcrumb-item pulse-gray-lighter"></li><li class="breadcrumb-item pulse-gray-lighter"></li><li class="breadcrumb-item pulse-gray-lighter"></li></ol></div>'
);
jQuery(".skeleton-card").append(
  '<div class="card"><div class="card-header pulse-gray-light"></div><div class="card-block"><p class="pulse-gray-lighter"></p><p class="pulse-gray-lighter"></p><p class="pulse-gray-lighter"></p><button class="pulse-gray-light"></button></div></div>'
);
jQuery(".skeleton-list").append(
  '<div class="list"><div class="item"><div class="avatar pulse-gray-lighter"></div><div class="item-inner"><div class="input-wrapper"><div class="item-label"><h4 class="pulse-gray-lighter"></h4><p class="pulse-gray-lighter"></p></div></div></div></div><div class="item"><div class="avatar pulse-gray-lighter"></div><div class="item-inner"><div class="input-wrapper"><div class="item-label"><h4 class="pulse-gray-lighter"></h4><p class="pulse-gray-lighter"></p></div></div></div></div><div class="item"><div class="avatar pulse-gray-lighter"></div><div class="item-inner"><div class="input-wrapper"><div class="item-label"><h4 class="pulse-gray-lighter"></h4><p class="pulse-gray-lighter"></p></div></div></div></div></div>'
);
jQuery(".skeleton-table").append(
  '<table class="table"><tr class="pulse-gray-light"><th></th><th></th><th></th><th></th><th></th></tr><tr class="pulse-gray-lighter"><td></td><td></td><td></td><td></td><td></td></tr><tr class="pulse-gray-lighter"><td></td><td></td><td></td><td></td><td></td></tr><tr class="pulse-gray-lighter"><td></td><td></td><td></td><td></td><td></td></tr></table>'
);*/


//triggered when modal is about to be shown
jQuery('#modalEditReminder').on('show.bs.modal', function(e) {

  //get data-id attribute of the clicked element
  var reminderId = jQuery(e.relatedTarget).data('reminder-id');
  var reminderDate = jQuery(e.relatedTarget).data('reminder-date');
  var reminderDesc = jQuery(e.relatedTarget).data('reminder-desc');
  var reminderType = jQuery(e.relatedTarget).data('reminder-type');
  var contactID = jQuery(e.relatedTarget).data('reminder-contact-id');

  //populate the textbox
  jQuery(e.currentTarget).find('#reminder-id').val(reminderId);
  jQuery(e.currentTarget).find('#reminder-contact-id').val(contactID);
  jQuery(e.currentTarget).find('#reminder-date').val(reminderDate);
  jQuery(e.currentTarget).find('#reminder-desc').val(reminderDesc);
  jQuery(e.currentTarget).find('#reminder-type').val(reminderType);
});

jQuery('#modalEditAssociation').on('show.bs.modal', function(e) {

  //get data-id attribute of the clicked element
  var associationId = jQuery(e.relatedTarget).data('association-id');
  var associationFirstName = jQuery(e.relatedTarget).data('firstname');
  var associationLastName = jQuery(e.relatedTarget).data('lastname');
  var associationBirthMonth = jQuery(e.relatedTarget).data('birth-month');
  var associationBirthDay = jQuery(e.relatedTarget).data('birth-day');
  var associationBirthYear = jQuery(e.relatedTarget).data('birth-year');
  var associationRelationship = jQuery(e.relatedTarget).data('relationship');
  var associationNotes = jQuery(e.relatedTarget).data('notes');

  //populate the textbox
  jQuery(e.currentTarget).find('#association-id').val(associationId);
  jQuery(e.currentTarget).find('#association-first-name').val(associationFirstName);
  jQuery(e.currentTarget).find('#association-last-name').val(associationLastName);
  jQuery(e.currentTarget).find('#association-birth-month').val(associationBirthMonth);
  jQuery(e.currentTarget).find('#association-birth-day').val(associationBirthDay);
  jQuery(e.currentTarget).find('#association-birth-year').val(associationBirthYear);
  jQuery(e.currentTarget).find('#association-relationship').val(associationRelationship);
  jQuery(e.currentTarget).find('#association-notes').val(associationNotes);
});

jQuery('#modalEditNote').on('show.bs.modal', function(e) {

  //get data-id attribute of the clicked element
  var notesId = jQuery(e.relatedTarget).data('notes-id');
  var noteInsert = jQuery(e.relatedTarget).data('note-insert');
  var noteText = jQuery(e.relatedTarget).data('note-text');
  var noteInteractionType = jQuery(e.relatedTarget).data('note-interaction-type');

  //populate the textbox
  jQuery(e.currentTarget).find('#notes-id').val(notesId);
  jQuery(e.currentTarget).find('#note-insert').val(noteInsert);
  jQuery(e.currentTarget).find('#note-text').val(noteText);
  jQuery(e.currentTarget).find('#note-interaction-type').val(noteInteractionType);
});

jQuery('#modalEditDate').on('show.bs.modal', function(e) {

  //get data-id attribute of the clicked element
  var dateId = jQuery(e.relatedTarget).data('date-id');
  var dateTitle = jQuery(e.relatedTarget).data('date-title');
  var dateMonth = jQuery(e.relatedTarget).data('date-month');
  var dateDay = jQuery(e.relatedTarget).data('date-day');
  var dateNotes = jQuery(e.relatedTarget).data('date-notes');

  //populate the textbox
  jQuery(e.currentTarget).find('#date-id').val(dateId);
  jQuery(e.currentTarget).find('#date-title').val(dateTitle);
  jQuery(e.currentTarget).find('#date-month').val(dateMonth);
  jQuery(e.currentTarget).find('#date-day').val(dateDay);
  jQuery(e.currentTarget).find('#date-notes').val(dateNotes);
});