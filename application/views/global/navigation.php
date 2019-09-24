<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="index.html">NF Logistik</a>
  <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-collapse collapse" id="navbarResponsive" style="">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
        <a class="nav-link" href="<?php echo base_url();?>">
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text">Dashboard</span>
        </a>
      </li>
      <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Charts">
        <a class="nav-link" href="charts.html">
          <i class="fa fa-fw fa-area-chart"></i>
          <span class="nav-link-text">Charts</span>
        </a>
      </li> -->
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Data Rujukan">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseDataRujukan" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-archive"></i>
          <span class="nav-link-text">Data Rujukan</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseDataRujukan">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Barang">
            <a class="nav-link" href="<?php echo base_url();?>barang">
              <i class="fa fa-fw fa-gift"></i>
              <span class="nav-link-text">Barang</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Merk">
            <a class="nav-link" href="<?php echo base_url();?>merk">
              <i class="fa fa-fw fa-tags"></i>
              <span class="nav-link-text">Merk</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Unit">
            <a class="nav-link" href="<?php echo base_url();?>unit">
              <i class="fa fa-fw fa-at"></i>
              <span class="nav-link-text">Unit</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Gudang">
            <a class="nav-link" href="<?php echo base_url();?>gudang">
              <i class="fa fa-fw fa-home"></i>
              <span class="nav-link-text">Gudang</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Data Logistik">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseDataLogistik" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-building-o"></i>
          <span class="nav-link-text">Data Logistik</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseDataLogistik">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Produk">
            <a class="nav-link" href="<?php echo base_url();?>produk">
              <i class="fa fa-fw fa-qrcode"></i>
              <span class="nav-link-text">Produk</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Stok">
            <a class="nav-link" href="<?php echo base_url();?>stok">
              <i class="fa fa-fw fa-shopping-cart"></i>
              <span class="nav-link-text">Stok</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Harga Jual">
            <a class="nav-link" href="<?php echo base_url();?>harga">
              <i class="fa fa-fw fa-money"></i>
              <span class="nav-link-text">Harga Jual</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
  </div>
</nav>