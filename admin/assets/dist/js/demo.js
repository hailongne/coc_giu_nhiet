/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */

/* eslint-disable camelcase */

(function ($) {
  "use strict";
  function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
  }

  // Function to create a block of skin color options
  function createSkinBlock(colors, callback, noneSelected) {
    var $block = $("<select />", {
      class: noneSelected
        ? "custom-select mb-3 border-0"
        : "custom-select mb-3 text-light border-0 " +
          colors[0].replace(/accent-|navbar-/, "bg-"),
    });

    if (noneSelected) {
      var $default = $("<option />", {
        text: "None Selected",
      });

      $block.append($default);
    }

    colors.forEach(function (color) {
      var $color = $("<option />", {
        class: (typeof color === "object" ? color.join(" ") : color)
          .replace("navbar-", "bg-")
          .replace("accent-", "bg-"),
        text: capitalizeFirstLetter(
          (typeof color === "object" ? color.join(" ") : color)
            .replace(/navbar-|accent-|bg-/, "")
            .replace("-", " ")
        ),
      });

      $block.append($color);
    });
    if (callback) {
      $block.on("change", callback);
    }

    return $block;
  }

  // Container for control sidebar content
  var $sidebar = $(".control-sidebar");
  var $container = $("<div />", {
    class: "p-3 control-sidebar-content",
  });

  $sidebar.append($container);

  // Add title and horizontal line
  $container.append('<h5>Customize Phúc Long</h5><hr class="mb-2"/>');

  // Dark mode toggle
  var $dark_mode_checkbox = $("<input />", {
    type: "checkbox",
    value: 1,
    checked: $("body").hasClass("dark-mode"),
    class: "mr-1",
  }).on("click", function () {
    if ($(this).is(":checked")) {
      $("body").addClass("dark-mode");
    } else {
      $("body").removeClass("dark-mode");
    }
  });
  var $dark_mode_container = $("<div />", { class: "mb-4" })
    .append($dark_mode_checkbox)
    .append("<span>Dark Mode</span>");
  $container.append($dark_mode_container);

  // Header options
  $container.append("<h6>Header Options</h6>");
  var $header_fixed_checkbox = $("<input />", {
    type: "checkbox",
    value: 1,
    checked: $("body").hasClass("layout-navbar-fixed"),
    class: "mr-1",
  }).on("click", function () {
    if ($(this).is(":checked")) {
      $("body").addClass("layout-navbar-fixed");
    } else {
      $("body").removeClass("layout-navbar-fixed");
    }
  });
  var $header_fixed_container = $("<div />", { class: "mb-1" })
    .append($header_fixed_checkbox)
    .append("<span>Fixed</span>");
  $container.append($header_fixed_container);

  var $dropdown_legacy_offset_checkbox = $("<input />", {
    type: "checkbox",
    value: 1,
    checked: $(".main-header").hasClass("dropdown-legacy"),
    class: "mr-1",
  }).on("click", function () {
    if ($(this).is(":checked")) {
      $(".main-header").addClass("dropdown-legacy");
    } else {
      $(".main-header").removeClass("dropdown-legacy");
    }
  });
  var $dropdown_legacy_offset_container = $("<div />", { class: "mb-1" })
    .append($dropdown_legacy_offset_checkbox)
    .append("<span>Dropdown Legacy Offset</span>");
  $container.append($dropdown_legacy_offset_container);

  var $no_border_checkbox = $("<input />", {
    type: "checkbox",
    value: 1,
    checked: $(".main-header").hasClass("border-bottom-0"),
    class: "mr-1",
  }).on("click", function () {
    if ($(this).is(":checked")) {
      $(".main-header").addClass("border-bottom-0");
    } else {
      $(".main-header").removeClass("border-bottom-0");
    }
  });
  var $no_border_container = $("<div />", { class: "mb-4" })
    .append($no_border_checkbox)
    .append("<span>No border</span>");
  $container.append($no_border_container);

  // Sidebar options
  $container.append("<h6>Sidebar Options</h6>");
  var $sidebar_collapsed_checkbox = $("<input />", {
    type: "checkbox",
    value: 1,
    checked: $("body").hasClass("sidebar-collapse"),
    class: "mr-1",
  }).on("click", function () {
    if ($(this).is(":checked")) {
      $("body").addClass("sidebar-collapse");
      $(window).trigger("resize");
    } else {
      $("body").removeClass("sidebar-collapse");
      $(window).trigger("resize");
    }
  });
  var $sidebar_collapsed_container = $("<div />", { class: "mb-1" })
    .append($sidebar_collapsed_checkbox)
    .append("<span>Collapsed</span>");
  $container.append($sidebar_collapsed_container);

  $(document).on(
    "collapsed.lte.pushmenu",
    '[data-widget="pushmenu"]',
    function () {
      $sidebar_collapsed_checkbox.prop("checked", true);
    }
  );
  $(document).on("shown.lte.pushmenu", '[data-widget="pushmenu"]', function () {
    $sidebar_collapsed_checkbox.prop("checked", false);
  });

  var $sidebar_fixed_checkbox = $("<input />", {
    type: "checkbox",
    value: 1,
    checked: $("body").hasClass("layout-fixed"),
    class: "mr-1",
  }).on("click", function () {
    if ($(this).is(":checked")) {
      $("body").addClass("layout-fixed");
      $(window).trigger("resize");
    } else {
      $("body").removeClass("layout-fixed");
      $(window).trigger("resize");
    }
  });
  var $sidebar_fixed_container = $("<div />", { class: "mb-1" })
    .append($sidebar_fixed_checkbox)
    .append("<span>Fixed</span>");
  $container.append($sidebar_fixed_container);

  var $sidebar_mini_checkbox = $("<input />", {
    type: "checkbox",
    value: 1,
    checked: $("body").hasClass("sidebar-mini"),
    class: "mr-1",
  }).on("click", function () {
    if ($(this).is(":checked")) {
      $("body").addClass("sidebar-mini");
    } else {
      $("body").removeClass("sidebar-mini");
    }
  });
  var $sidebar_mini_container = $("<div />", { class: "mb-1" })
    .append($sidebar_mini_checkbox)
    .append("<span>Sidebar Mini</span>");
  $container.append($sidebar_mini_container);

  var $sidebar_mini_md_checkbox = $("<input />", {
    type: "checkbox",
    value: 1,
    checked: $("body").hasClass("sidebar-mini-md"),
    class: "mr-1",
  }).on("click", function () {
    if ($(this).is(":checked")) {
      $("body").addClass("sidebar-mini-md");
    } else {
      $("body").removeClass("sidebar-mini-md");
    }
  });
  var $sidebar_mini_md_container = $("<div />", { class: "mb-1" })
    .append($sidebar_mini_md_checkbox)
    .append("<span>Sidebar Mini MD</span>");
  $container.append($sidebar_mini_md_container);

  var $sidebar_mini_xs_checkbox = $("<input />", {
    type: "checkbox",
    value: 1,
    checked: $("body").hasClass("sidebar-mini-xs"),
    class: "mr-1",
  }).on("click", function () {
    if ($(this).is(":checked")) {
      $("body").addClass("sidebar-mini-xs");
    } else {
      $("body").removeClass("sidebar-mini-xs");
    }
  });
  var $sidebar_mini_xs_container = $("<div />", { class: "mb-1" })
    .append($sidebar_mini_xs_checkbox)
    .append("<span>Sidebar Mini XS</span>");
  $container.append($sidebar_mini_xs_container);

  var $flat_sidebar_checkbox = $("<input />", {
    type: "checkbox",
    value: 1,
    checked: $("body").hasClass("layout-navbar-fixed"),
    class: "mr-1",
  }).on("click", function () {
    if ($(this).is(":checked")) {
      $("body").addClass("layout-navbar-fixed");
    } else {
      $("body").removeClass("layout-navbar-fixed");
    }
  });
  var $flat_sidebar_container = $("<div />", { class: "mb-1" })
    .append($flat_sidebar_checkbox)
    .append("<span>Flat Sidebar</span>");
  $container.append($flat_sidebar_container);

  // Sidebar color
  var $sidebar_dark_skin = createSkinBlock(
    [
      "navbar-dark navbar-primary",
      "navbar-dark navbar-secondary",
      "navbar-dark navbar-info",
      "navbar-dark navbar-success",
      "navbar-dark navbar-danger",
      "navbar-dark navbar-indigo",
      "navbar-dark navbar-purple",
      "navbar-dark navbar-pink",
      "navbar-dark navbar-navy",
      "navbar-dark navbar-lightblue",
      "navbar-dark navbar-teal",
      "navbar-dark navbar-cyan",
      "navbar-dark navbar-dark",
      "navbar-dark navbar-gray-dark",
      "navbar-dark navbar-gray",
    ],
    function () {
      var color = $(this).find("option:selected").attr("class");
      var $mainHeader = $(".main-header");
      $mainHeader.removeClass(function (index, className) {
        return (className.match(/(^|\s)navbar-\S+/g) || []).join(" ");
      });

      $mainHeader.addClass(color);
    },
    true
  ).appendTo($container);
  $container.append("<h6>Navbar Variants</h6>");
})(jQuery);
