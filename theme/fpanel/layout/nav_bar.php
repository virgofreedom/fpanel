<nav class="small-12 columns">
    <span class="left">
      <i class="fa fa-ellipsis-h fa-lg"></i>
      <?php
      if (isset($_SESSION['infos'])){
        echo "<span>".$_SESSION['infos']['Email']."</span>";
      }
      ?>
      
    </span>
    <span class="right">
      <span id="ct"> </span>
      <a href="<?=VIRTUAL_PATH?>logout"><i class="fa fa-power-off"></i></a>
    </span>
  </nav>
  <section class="small-12 columns title">
    <a href="<?=VIRTUAL_PATH?>home">Fpanel</a>
  </section>				
<!-- end nav -->