	
	
	<style>
		.blink_me {
		  animation: blinker 2s linear infinite;
		}

		@keyframes blinker {  
		  50% { opacity: 0; }
		}
	</style>
	
	<?php
		
		function menu_sa() {  
			$arg = func_get_args();
			$db = $arg[0];
			$username = $arg[0];
	?>
      <ul>
        <li><a class="text-right closeclick" href="#">close &times;</a></li>
        <li>
            <div class="imgprofile text-center">
            <?php
				
				$sql = "SELECT * FROM master.login WHERE kodelogin = :kodelogin";
				$sql = $db->prepare($sql);
				$sql->execute([
					'kodelogin'=>$_SESSION['kodelogin']
				]);
				$data = $sql->fetch();
            ?>

                <img src="<?php echo $data["images"] == "" ? "images/foto/no-images.png" : "images/foto/".$rowImg["images"] ?>" class="img-circle img-responsive center-block"  />
                <br /><strong><?php echo $data["nama"];?></strong>
				
				<a href="#" class="logoutK"><i class="fa fa-power-off"></i> Log out</a>
				
			</div>
        </li>
		<?php 
			}
			function menu_beranda() { 
				$arg = func_get_args();
				$light_gift = $arg[0];
				
		?>
        <li>
            <?php if($light_gift > 0) { ?>
				<a href="?dashboard"><i class="fa fa-dashboard fa-2x"></i> Beranda </a>
				
            <?php } else { ?>
				<a href="?dashboard"><i class="fa fa-dashboard fa-2x"></i> Beranda</a>
            <?php } ?>
		</li>
		<?php } function menu_data_master() { ?>
		<li>
			<a href="#"><i class="fa fa-building fa-2x"></i> Data Master<span class="fa arrow"></span></a>
			<ul >
				<li><a href="#" class="back">Main Menu</a></li>
				<li class="nav-label"><strong>Input Data Monitoring</strong></li>
				<li>
					<a href="?datamaster-lihat-material"><i class="fa fa-building fa-2x"></i> Material</a>
				</li>
				<li>
					<a href="?datamaster-lihat-vendor"><i class="fa fa-building fa-2x"></i> Vendor</a>
				</li>
			</ul>
		</li>
		<?php 
			}
			function menu_customer() { ?>
		<li>
			<a href="?material"><i class="fa fa-refresh fa-2x"></i> Material</a>
		</li>
		<?php 
			}
			function menu_kontrak() { ?>
		<li>
			<a href="?kontrak"><i class="fa fa-refresh fa-2x"></i> Kontrak</a>
		</li>
		<?php 
			}
			function menu_pengadaan() { ?>
		<li>
			<a href="?pengadaan"><i class="fa fa-refresh fa-2x"></i> Pengadaan</a>
		</li>
		<?php 
			}
			function menu_hps() { ?>
		<li>
			<a href="?hps"><i class="fa fa-refresh fa-2x"></i> HPS</a>
		</li>
		<?php 
			}
			function menu_nego() { ?>
		<li>
			<a href="?nego"><i class="fa fa-refresh fa-2x"></i> Nego</a>
		</li>
		<?php 
			}
			function menu_po() { ?>
		<li>
			<a href="?po"><i class="fa fa-refresh fa-2x"></i> PO</a>
		</li>
		<?php 
			}
			function menu_invoice() { ?>
		<li>
			<a href="?invoice"><i class="fa fa-refresh fa-2x"></i> Invoice</a>
		</li>
		<?php 
			}
			function menu_material_masuk() { ?>
		<li>
			<a href="?materialmasuk"><i class="fa fa-refresh fa-2x"></i> Material Masuk</a>
		</li>
		<?php 
			}
			function menu_pengiriman_material() { ?>
		<li>
			<a href="?pengirimanmaterial"><i class="fa fa-refresh fa-2x"></i> Pengiriman Material</a>
		</li>
		<?php 
			}
			function menu_pemakaian_material() { ?>
		<li>
			<a href="?pemakaianmaterial"><i class="fa fa-refresh fa-2x"></i> Pemakaian Material</a>
		</li>
		<?php 
			}
			function menu_monitoring() { ?>
		<li>
			<a href="?monitoring"><i class="fa fa-refresh fa-2x"></i> Monitoring</a>
		</li>
		<?php 
			}
			function menu_laporan() { ?>
		<li>
			<a href="?laporan"><i class="fa fa-refresh fa-2x"></i> Laporan</a>
		</li>
		<?php 
			}
			
			
			
			
			// Apar punya
			function menu_laporans() {
				$jenisuser = $_SESSION['jenisuser'];
				
				$label = '';
				if($jenisuser == 'app')
					$label = 'GI';
				else if($jenisuser == 'ki')
					$label = 'APP';
		?>
		<li>
			<a href="#"><i class="fa fa-file fa-2x"></i> Laporan</a>
			<ul >
				<li><a href="#" class="back">Main Menu</a></li>
				<li class="nav-label"><strong>Laporan</strong></li>
				
				<?php
					if($jenisuser == 'gi') {
				?>
				<li>
					<a href="?laporan_unit_lihat=apar"><i class="fa fa-file fa-2x"></i> Apar <?php //echo strtoupper($jenisuser); ?></a>
				</li>
				
				<li>
					<a href="?laporan_unit_lihat=pengisian"><i class="fa fa-file fa-2x"></i> Pengisian <?php //echo strtoupper($jenisuser); ?></a>
				</li>
				<li>
					<a href="?laporan_unit_lihat=pemakaian"><i class="fa fa-file fa-2x"></i> Pemakaian <?php //echo strtoupper($jenisuser); ?></a>
				</li>
				<?php 					
					}
					else if($jenisuser != 'gi') { 
				?>
				<li>
					<a href="?laporan_lihat=apar"><i class="fa fa-file fa-2x"></i> Apar <?php //echo $label; ?></a>
				</li>
				<?php 
					//if($jenisuser == 'gi') { 
				?>
						<li>
							<a href="?laporan_lihat=pengisian"><i class="fa fa-file fa-2x"></i> Pengisian <?php //echo $label; ?></a>
						</li>
						<li>
							<a href="?laporan_lihat=pemakaian"><i class="fa fa-file fa-2x"></i> Pemakaian <?php //echo $label; ?></a>
						</li>				
				<?php 					
					//}
					}
				?>
				
				
				
				
			</ul>
		</li>
		<?php } ?>
      </ul>
