$(document).ready(function() {

  var sidebar = "dev-page dev-page-loaded";
  var footer = "dev-page-footer dev-page-footer-fixed";

  if (typeof(sessionStorage.sidebar) != 'undefined') {
    sidebar = sessionStorage.sidebar;
  }

  if (typeof(sessionStorage.footer) != 'undefined') {
    footer = sessionStorage.footer;
  }

  $("#page-sidebar")[0].className = sidebar;
  $("#page-footer")[0].className = footer;

  // Events
  $(".dev-page-sidebar-minimize").click(saveSession);
  $(".dev-page-sidebar-collapse-icon").click(saveSession);
  $(".dev-page-footer-fix").click(saveSession);
  $(".dev-page-footer-collapse").click(saveSession);

  var x = 0;

  function saveSession() {

    // stored side-bar class name in cookie
    var interval = setInterval(function() {

      var sidebar = $("#page-sidebar")[0].className;
      document.cookie = sessionStorage.sidebar = sidebar;

      var footer = $("#page-footer")[0].className;
      document.cookie = sessionStorage.footer = footer;

      if (x > 0) { 
        clearInterval(interval);
        x = 0;
      }

      x++;

    },1000);

  }

});