<script>
$(document).ready(function() {

  // Events
  $(".dev-page-sidebar-minimize").click(saveSideBarCookie);
  $(".dev-page-sidebar-collapse").click(saveSideBarCookie);

  // stored side-bar class name in cookie
  function saveSideBarCookie() {
    
    setInterval(function() {

      var sidebar = $("#page-sidebar")[0].className;
      document.cookie = "sidebar=" + sidebar; 

    },1000);

  }

});
</script>

<!-- page sidebar -->
<div class="dev-page-sidebar">
    
    <ul class="dev-page-navigation">
        <li class="title">Navigations</li>
        <li>
            <a href="index.html"><i class="fa fa-desktop"></i> <span>Dashboard</span></a>
        </li>  
        <li>
            <a href="<?php echo $this->webroot?>UsersManage"><i class="fa fa-users"></i> <span>Users Manage</span></a>
        </li> 
        <li>
            <a href="index.html"><i class="fa fa-list"></i> <span>Chapter Exams</span></a>
        </li> 
        <li>
            <a href="index.html"><i class="fa fa-list-alt"></i> <span>Questionnaires</span></a>
        </li> 
        <li>
            <a href="index.html"><i class="fa fa-code"></i> <span>Source Codes</span></a>
        </li>  
        <li>
            <a href="index.html"><i class="fa fa-sitemap"></i> <span>Site Map</span></a>
        </li>                        
        <li>
            <a href="<?php echo $this->webroot?>/logout"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a>
        </li>
    </ul>
    
</div>
<!-- ./page sidebar -->