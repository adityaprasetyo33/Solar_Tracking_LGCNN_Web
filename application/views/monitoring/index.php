<main id="main" class="main">
	<?php
	// print_r($output);
	?>
	<div class="pagetitle">
		<h1>Monitoring</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
				<li class="breadcrumb-item active">Monitoring</li>
			</ol>
		</nav>
		<label for="hari">pilih tanggal</label>
		<select name="hari" id="hari"></select>
	</div><!-- End Page Title -->

	<section class="section">
		<div class="row">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Grafik Tegangan</h5>
					<!-- Line Chart -->
					<canvas id="lineChart" style="max-height: 400px;"></canvas>

					<!-- End Line CHart -->
				</div>

			</div>
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Nilai Sensor</h5>
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Sensor 1</th>
								<th>Sensor 2</th>
								<th>Sensor 3</th>
								<th>Sensor 4</th>
								<th>Sensor 5</th>
								<th>Sensor 6</th>
								<th>Sensor 7</th>
								<th>Sensor 8</th>
								<th>Sensor 9</th>
								<th>Kelas</th>
								<th>Volt Dinamis</th>
								<th>Volt Statis</th>
								<th>Waktu</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<script src="assets/js/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$.ajax({
				url: "<?= base_url("monitoring/getDay") ?>",
				type: "GET",
				dataType: "json",
				success: function(data) {
					$.each(data, function(key, value) {
						if (key == 0) {
							$('#hari').append($("<option />").val(value.tanggal).text(value.tanggal).attr("selected", "selected"));
							getData(value.tanggal);
						} else {
							$('#hari').append($("<option />").val(value.tanggal).text(value.tanggal));
						}
					});

				}
			});
		});

		$('#hari').on('change', function() {
			var tanggal = $(this).val();
			console.log(tanggal)
			getData(tanggal);
		});

		function getData(tanggal) {
			$.ajax({
				url: "<?= base_url("monitoring/getDatabyDay") ?>",
				type: "POST",
				data: {
					"tanggal": tanggal,
				},
				dataType: "json",
				success: function(data) {
					var table = $('.table');
					table.find('tbody').empty();
					createChart(data);
					$.each(data, function(index, item) {
						var row = '<tr>' +
							'<th>' + (index + 1) + '</th>' +
							'<td>' + item.sensor1 + '</td>' +
							'<td>' + item.sensor2 + '</td>' +
							'<td>' + item.sensor3 + '</td>' +
							'<td>' + item.sensor4 + '</td>' +
							'<td>' + item.sensor5 + '</td>' +
							'<td>' + item.sensor6 + '</td>' +
							'<td>' + item.sensor7 + '</td>' +
							'<td>' + item.sensor8 + '</td>' +
							'<td>' + item.sensor9 + '</td>' +
							'<td>' + item.hasil + '</td>' +
							'<td>' + item.v_dinamis + '</td>' +
							'<td>' + item.v_statis + '</td>' +
							'<td>' + item.waktu + '</td>' +
							'</tr>';
						table.append(row);
					});

				}
			});
		}

		function createChart(data) {
			var label = [];
			var dataDinamis = [];
			var dataStatis = [];
			$.each(data, function(index, item) {
				label.push(item.waktu);
				dataDinamis.push(item.v_dinamis);
				dataStatis.push(item.v_statis);
			});

			var ctx = document.getElementById('lineChart').getContext('2d');
			// if (ctx.chart) {
			// 	ctx.chart.destroy();
			// }
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: label,
					datasets: [{
						label: 'Voltase Dinamis',
						data: dataDinamis
					}, {
						label: 'Voltase Statis',
						data: dataStatis
					}]
				},
				options: {
					responsive: true,
					scales: {
						y: {
							beginAtZero: false
						}
					}
				}
			});
		}
		// document.addEventListener("DOMContentLoaded", () => {
		// 	new Chart(document.querySelector('#lineChart'), {
		// 		type: 'line',
		// 		data: {
		// 			labels: [
		// 				<?php
							// 				// for ($i = count($output) - 1; $i >= 0; $i--) {
							// 				// 	if ($i != 0) {
							// 				// 		echo "'" . $output[$i]['insert_at'] . "',";
							// 				// 	} else {
							// 				// 		echo  "'" . $output[$i]['insert_at'] . "'";
							// 				// 	}
							// 				// }
							// 				
							?>
		// 			],
		// 			datasets: [{
		// 				label: 'Line Chart',
		// 				data: [
		// 					<?php
								// 					// for ($i = count($output) - 1; $i >= 0; $i--) {
								// 					// 	if ($i != 0) {
								// 					// 		echo $output[$i]['v_dinamis'] . ",";
								// 					// 	} else {
								// 					// 		echo $output[$i]['v_dinamis'];
								// 					// 	}
								// 					// }
								// 					
								?>
		// 				],
		// 				fill: false,
		// 				borderColor: 'rgb(75, 192, 192)',
		// 				tension: 0.1
		// 			}]
		// 		},
		// 		options: {
		// 			scales: {
		// 				y: {
		// 					beginAtZero: false
		// 				}
		// 			}
		// 		}
		// 	});
		// });
	</script>
</main><!-- End #main -->
