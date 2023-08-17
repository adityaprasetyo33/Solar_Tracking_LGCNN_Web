<main id="main" class="main">

	<?php
	$arah = $output[0]['hasil'];; // Misalnya, arah hadap sel adalah Tenggara

	// Mendefinisikan kelas ikon panah sesuai dengan arah hadap sel
	$arrowClass = '';
	$arahClass = '';

	if ($arah == 1) {
		$arahClass = 'Atas';
		$arrowClass = 'record-circle';
	} elseif ($arah == 2) {
		$arahClass = 'Depan';
		$arrowClass = 'arrow-down';
	} elseif ($arah == 3) {
		$arahClass = 'Depan Serong Kanan';
		$arrowClass = 'arrow-down-left';
	} elseif ($arah == 4) {
		$arahClass = 'Kanan';
		$arrowClass = 'arrow-left';
	} elseif ($arah == 5) {
		$arahClass = 'Belakang Serong Kanan';
		$arrowClass = 'arrow-up-left';
	} elseif ($arah == 6) {
		$arahClass = 'Belakang';
		$arrowClass = 'arrow-up';
	} elseif ($arah == 7) {
		$arahClass = 'Belakang Serong Kiri';
		$arrowClass = 'arrow-up-right';
	} elseif ($arah == 8) {
		$arahClass = 'Kiri';
		$arrowClass = 'arrow-right';
	} elseif ($arah == 9) {
		$arahClass = 'Depan Serong Kiri';
		$arrowClass = 'arrow-down-right';
	} else {
		$arahClass = '????';
		$arrowClass = 'question'; // Jika arah tidak diketahui
	}

	?>
	<style>
		.arah-solar {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 59vh;
		}

		.solar-cell {
			max-width: 200px;
			max-height: 200px;
		}

		.arrow-icon {
			font-size: 100px;
			margin-top: 20px;
		}

		.keterangan {
			display: flex;
			justify-content: center;
			align-items: center;
		}
	</style>

	<div class="pagetitle">
		<h1>Dashboard</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
				<li class="breadcrumb-item active">Dashboard</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<section class="section">
		<div class="row">
			<div class="col-lg-6">

				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Arah Sel Surya</h5>
						<div class="arah-solar">
							<img src="assets/img/solar_panel.png" alt="Solar Panel" class="solar-cell">
							<i class="bi bi-<?php echo $arrowClass; ?> arrow-icon"></i>
						</div>
						<div class="keterangan">
							<h6><?php echo $arahClass; ?></h6>
						</div>
					</div>
				</div>

			</div>

			<div class="col-lg-6">

				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Tegangan Sel Surya</h5>
						<div class="label">
							voltage
						</div>
						<h2 id="voltage_value">
							<?= $output[0]['v_dinamis']; ?>V
						</h2>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Grafik Tegangan</h5>
						<!-- Line Chart -->
						<canvas id="lineChart" style="max-height: 400px;"></canvas>
						<script>
							window.setTimeout(function() {
								window.location.reload();
							}, 300000);
							document.addEventListener("DOMContentLoaded", () => {
								new Chart(document.querySelector('#lineChart'), {
									type: 'line',
									data: {
										labels: [
											<?php
											for ($i = count($output) - 1; $i >= 0; $i--) {
												if ($i != 0) {
													echo "'" . $output[$i]['insert_at'] . "',";
												} else {
													echo  "'" . $output[$i]['insert_at'] . "'";
												}
											}
											?>
										],
										datasets: [{
											label: 'Line Chart',
											data: [
												<?php
												for ($i = count($output) - 1; $i >= 0; $i--) {
													if ($i != 0) {
														echo $output[$i]['v_dinamis'] . ",";
													} else {
														echo $output[$i]['v_dinamis'];
													}
												}
												?>
											],
											fill: false,
											borderColor: 'rgb(75, 192, 192)',
											tension: 0.1
										}]
									},
									options: {
										scales: {
											y: {
												beginAtZero: false
											}
										}
									}
								});
							});
						</script>
						<!-- End Line CHart -->
					</div>
				</div>

			</div>
		</div>
	</section>

</main><!-- End #main -->
