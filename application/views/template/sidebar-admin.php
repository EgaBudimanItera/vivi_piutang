<?php
	$hakakses=$this->session->userdata('userHakAkses');
?>	
<!-- BEGIN SIDEBAR -->
<aside class="left-side sidebar-offcanvas">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?=base_url()?>assets/front-end/images/logoola.png" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><strong><?=$this->session->userdata('userNama')?> (<?=$this->session->userdata('userHakAkses')?>)</strong></p>
				<a href="#"><i class="fa fa-circle text-green"></i> Online</a>
			</div>
		</div>
		<form action="#" method="get" class="sidebar-form">
			
			
		</form>
		<ul class="sidebar-menu">
			<li class="<?php if($link=='dashboard' ||$link==""){echo'active';}?>">
				<a href="<?=base_url()?>c_dashboard">
					<i class="fa fa-home"></i><span>Dashboard</span>
				</a>
			</li>
			<?php
				if($hakakses=="ADM"){
			?>
			<li class="<?php if($link=='satuan'){echo'active';}?>">
				<a href="<?=base_url()?>c_satuan">
					<i class="fa fa-briefcase"></i><span>Data Satuan Barang</span>	
				</a>
			</li>
			<li class="<?php if($link=='barang'){echo'active';}?>">
				<a href="<?=base_url()?>c_barang">
					<i class="fa fa-truck"></i><span>Data Barang</span>	
				</a>
			</li>
			<li class="<?php if($link=='pembayaran'){echo'active';}?>">
				<a href="<?=base_url()?>c_pembayaran">
					<i class="fa fa-dollar"></i><span>Data Pembayaran</span>	
				</a>
			</li>
			<li class="<?php if($link=='historipiutang'){echo'active';}?>">
				<a href="<?=base_url()?>c_histori">
					<i class="fa fa-tasks"></i><span>Histori Piutang</span>	
				</a>
			</li>
			<li class="<?php if($link=='analisa'){echo'active';}?>">
				<a href="<?=base_url()?>c_histori/analisa">
					<i class="fa fa-puzzle-piece"></i><span>Analisa Umur Piutang</span>	
				</a>
			</li>
			<?php
				}elseif($hakakses=="Penjualan"){
			?>
			<li class="<?php if($link=='pelanggan'){echo'active';}?>">
				<a href="<?=base_url()?>c_pelanggan">
					<i class="fa fa-user"></i><span>Data Pelanggan</span>	
				</a>
			</li>
			
			<li class="<?php if($link=='penjualan'){echo'active';}?>">
				<a href="<?=base_url()?>c_penjualan">
					<i class="fa fa-cubes"></i><span>Data Penjualan</span>	
				</a>
			</li>
			
			<?php
				}elseif($hakakses=="Pimpinan"){
			?>
			<li class="<?php if($link=='historipiutang'){echo'active';}?>">
				<a href="<?=base_url()?>c_histori">
					<i class="fa fa-tasks"></i><span>Histori Piutang</span>	
				</a>
			</li>
			<li class="<?php if($link=='analisa'){echo'active';}?>">
				<a href="<?=base_url()?>c_histori/analisa">
					<i class="fa fa-puzzle-piece"></i><span>Analisa Umur Piutang</span>	
				</a>
			</li>
			<li class="<?php if($link=='login'){echo'active';}?>">
				<a href="<?=base_url()?>c_userlogin">
					<i class="fa fa-users"></i><span>Data User Login</span>	
				</a>
			</li>
			<?php
				}
			?>
			
			
			<li class="<?php if($link=='ubahpassword'){echo'active';}?>">
				<a href="<?=base_url()?>c_userlogin/ubahpassword">
					<i class="fa fa-pencil"></i><span>Ubah Password</span>	
				</a>
			</li>
		</ul>
	</section>
</aside>
<!-- END SIDEBAR -->

		