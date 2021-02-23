jQuery(document).ready(function($) {
  // MultiCheck box Control JS
  $('.customize-control-nm-checkbox-multiple input[type="checkbox"]').on(
    "change",
    function() {
      var checkbox_values = $(this)
        .parents(".customize-control")
        .find('input[type="checkbox"]:checked')
        .map(function() {
          return $(this).val();
        })
        .get()
        .join(",");

      $(this)
        .parents(".customize-control")
        .find('input[type="hidden"]')
        .val(checkbox_values)
        .trigger("change");
    }
  );

  // Select Image Js
  $(".nm-image-selector").on("change", function() {
    var activeImage = $(this)
      .find(":selected")
      .attr("data-image");
    $(this)
      .next(".nm-image-container")
      .find("img")
      .attr("src", activeImage);
  });
});
