jQuery(document).ready(function($) {
  // MultiCheck box Control JS
  $('.customize-control-checkbox-multiple input[type="checkbox"]').on(
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
  $(".select-image-control").on("change", function() {
    var activeImage = $(this)
      .find(":selected")
      .attr("data-image");
    $(this)
      .next(".select-image-wrap")
      .find("img")
      .attr("src", activeImage);
  });
});
