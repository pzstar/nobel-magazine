jQuery(document).ready(function($) {
  var toggleSection = $(".nm-toggle-section");
  /*
     toggleSection.each(
     function () {
     var controlName = $(this).data('control');
     var controlValue = wp.customize.control(controlName).setting.get();
     var parentHeader = $(this).parent();
     if (typeof (controlName) !== 'undefined' && controlName !== '') {
     var iconClass = 'dashicons-visibility';
     if (controlValue === 'on') {
     iconClass = 'dashicons-hidden';
     parentHeader.addClass('nobel-magazine-section-hidden').removeClass('nobel-magazine-section-visible');
     } else {
     parentHeader.addClass('nobel-magazine-section-visible').removeClass('nobel-magazine-section-hidden');
     }
     $(this).children().attr('class', 'dashicons ' + iconClass);
     }
     }
     );
     
     toggleSection.on(
     'click',
     function (e) {
     alert('clicked');
     e.stopPropagation();
     var controlName = $(this).data('control');
     var parentHeader = $(this).parent();
     var controlValue = wp.customize.control(controlName).setting.get();
     if (typeof (controlName) !== 'undefined' && controlName !== '') {
     var iconClass = 'dashicons-visibility'; 
     
     if (controlValue === 'off') {
     iconClass = 'dashicons-hidden';
     parentHeader.addClass('nobel-magazine-section-hidden').removeClass('nobel-magazine-section-visible');
     wp.customize.control(controlName).setting.set('on');
     $('[data-customize-setting-link=' + controlName + ']').siblings('.onoffswitch').addClass('switch-on');
     } else {
     parentHeader.addClass('nobel-magazine-section-visible').removeClass('nobel-magazine-section-hidden');
     wp.customize.control(controlName).setting.set('off');
     $('[data-customize-setting-link=' + controlName + ']').siblings('.onoffswitch').removeClass('switch-on');
     }
     
     $(this).children().attr('class', 'dashicons ' + iconClass);
     }
     }
     );
     */
  $("body").on("click", ".switch-section.onoffswitch", function() {
    var controlName = $(this)
      .siblings("input")
      .data("customize-setting-link");
    var controlValue = $(this)
      .siblings("input")
      .val();
    var iconClass = "dashicons-visibility";
    if (controlValue === "off") {
      iconClass = "dashicons-hidden";
      $("[data-control=" + controlName + "]")
        .parent()
        .addClass("nobel-magazine-section-hidden")
        .removeClass("nobel-magazine-section-visible");
    } else {
      $("[data-control=" + controlName + "]")
        .parent()
        .addClass("nobel-magazine-section-visible")
        .removeClass("nobel-magazine-section-hidden");
    }
    $("[data-control=" + controlName + "]")
      .children()
      .attr("class", "dashicons " + iconClass);
  });
});
