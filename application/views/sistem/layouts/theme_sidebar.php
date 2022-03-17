<?php 
  $role =  $this->session->userdata('auth_id_role');
  // $role = 'HA01';
  $menu1 = $this->db->query("
              select m.* from th_menu_user mu
              join th_menu m on mu.id_menu = m.id
              where mu.id_role = '$role' 
              and mu.id_posisi= '1' and level = 1 
              order by mu.urutan asc"
          );
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
  <?php
    foreach ($menu1->result() as $m1) {
      $id_menu_level_1 = $m1->id;
      $menu2 = $this->db->query("
          select m.* from th_menu_user mu
          join th_menu m on mu.id_menu = m.id
          where mu.id_role = '$role' and level = 2 and id_parent_menu = '$id_menu_level_1' 
          order by mu.urutan asc
      ");

      $jml_menu2 = $menu2->num_rows(); 
      if($jml_menu2!=0){ ?>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-<?= $m1->id ?>" aria-expanded="false" aria-controls="ui-<?=  $m1->id ?>">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title"><?= $m1->nama_menu ?></span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-<?= $m1->id ?>">
            <ul class="nav flex-column sub-menu">
              <?php foreach ($menu2->result() as $m2) { ?>		
                <li class="nav-item"> <a class="nav-link" href="<?= site_url($m2->link_menu) ?>"><?= $m2->nama_menu ?></a></li>
              <?php } ?>
            </ul>
          </div>
        </li>
      <?php }else{ ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url($m1->link_menu) ?>">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title"><?= $m1->nama_menu ?></span>
          </a>
        </li>
      <?php }} ?>
  </ul>
</nav>