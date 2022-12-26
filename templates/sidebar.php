<!-- Side-Nav-->
<aside class="main-sidebar hidden-print">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image"><img class="img-circle" src=""></div>
    </div>
    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">
      <li class="<?php if($page == 'home'){echo 'active';}?>"><a href="dashboard.php"><i class="fa fa-home"></i><span>Startseite</span></a></li>
      <li class="<?php if($page == 'collection'){echo 'active';}?>"><a href="page-collection.php"><i class="fa fa-diamond"></i><span>Sammlung</span></a></li>
      <li class="<?php if($page == 'news'){echo 'active';}?>"><a href="page-news.php"><i class="fa fa-newspaper-o"></i>Wiki</a></li>
      <li class="<?php if($page == 'locations'){echo 'active';}?>"><a href="page-locations.php"><i class="fa fa-map"></i>Fundorte verwalten</a></li>
      <li class="<?php if($page == 'minerals'){echo 'active';}?>"><a href="page-minerals.php"><i class="fa fa-compass"></i>Mineralien verwalten</a></li>
      <li class="<?php if($page == 'users'){echo 'active';}?>"><a href="page-edit-profile.php"><i class="fa fa-wrench"></i>Konto verwalten</a></li>
      <li class=""><a href="inc/logout.php"><i class="fa fa-sign-out fa-lg"></i> Abmelden</a></li>
    </ul>
  </section>
</aside>
