<main id="main" class="main">
	<?php
	// print_r($jlm_data);
	?>
	<div class="pagetitle">
		<h1>Hasil Perhitungan Test LGCNN</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
				<li class="breadcrumb-item">Data</li>
				<li class="breadcrumb-item active">Test</li>
			</ol>
			<label for="jlm_data">Jumlah Data Training : </label>
			<select name="jlm_data" id="jlm_data">
				<?php
				foreach ($jlm_data as $value) {
					echo "<option value=" . $value['id'] . ">" . $value['jumlah_data'] . "</option>";
				}
				?>
			</select>
		</nav>
	</div><!-- End Page Title -->

	<section class="section">
		<div class="row">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Hasil Perhitungan dan Data</h5>
					<!-- <label for="jlm_training">Iterasi : </label>
					<select name="jlm_training" id="jlm_training">
						<option value="">-----</option>
					</select> -->
					<!-- Bordered Tabs Justified -->
					<ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
						<li class="nav-item flex-fill" role="presentation">
							<button class="nav-link w-100 active" id="training-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-training" type="button" role="tab" aria-controls="training" aria-selected="true">Training</button>
						</li>
						<li class="nav-item flex-fill" role="presentation">
							<button class="nav-link w-100" id="data-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-data" type="button" role="tab" aria-controls="data" aria-selected="false">Data</button>
						</li>
					</ul>
					<div class="tab-content pt-2" id="borderedTabJustifiedContent">
						<div class="tab-pane fade show active" id="bordered-justified-training" role="tabpanel" aria-labelledby="training-tab">
							<label for="data_ke">Data ke :</label>
							<select name="data_ke" id="data_ke">
							</select>
							<div class="row">
								<div class="col">
									<table class="table" id="Numerator-table">
										<thead style="text-align: center;">
											<tr>
												<th colspan="9">u</th>
											</tr>
											<tr>
												<th>1</th>
												<th>2</th>
												<th>3</th>
												<th>4</th>
												<th>5</th>
												<th>6</th>
												<th>7</th>
												<th>8</th>
												<th>9</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
									<table class="table" id="c-table">
										<thead style="text-align: center;">
											<tr>
												<th colspan="9">c</th>
											</tr>
											<tr>
												<th>1</th>
												<th>2</th>
												<th>3</th>
												<th>4</th>
												<th>5</th>
												<th>6</th>
												<th>7</th>
												<th>8</th>
												<th>9</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
								</div>
								<div class="col">
									<table>
										<tbody>
											<tr>
												<th>D : </th>
												<td id="denominator-value"></td>
											</tr>
											<tr>
												<th>Max C : </th>
												<td id="max-c-value"></td>
											</tr>
											<tr>
												<th>Kelas Pemenang : </th>
												<td id="kelas-value"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<table class="table" id="perhitungan-table">
								<thead style="text-align: center;">
									<tr>
										<th rowspan="2">j</th>
										<th rowspan="2">dist(j)</th>
										<th rowspan="2">r(j)</th>
										<th colspan="9">d(j,i)</th>
									</tr>
									<tr>
										<th>1</th>
										<th>2</th>
										<th>3</th>
										<th>4</th>
										<th>5</th>
										<th>6</th>
										<th>7</th>
										<th>8</th>
										<th>9</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
						<div class="tab-pane fade" id="bordered-justified-data" role="tabpanel" aria-labelledby="data-tab">
							<table class="table" id="data-table">
								<thead>
									<tr>
										<th>#</th>
										<th>Nilai 1</th>
										<th>Nilai 2</th>
										<th>Nilai 3</th>
										<th>Nilai 4</th>
										<th>Nilai 5</th>
										<th>Nilai 6</th>
										<th>Nilai 7</th>
										<th>Nilai 8</th>
										<th>Nilai 9</th>
										<th>Kelas</th>
										<th>Hasil</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th>1</th>
										<td>test</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div><!-- End Bordered Tabs Justified -->

				</div>
			</div>
		</div>
	</section>
	<script src="assets/js/jquery.min.js"></script>

	<script>
		$(document).ready(function() {
			$("#jlm_data").val($("#jlm_data option:first").val()).change();
		});

		$('#jlm_data').on('change', function() {
			var jlm_data = $(this).val();
			// console.log(jlm_data)
			$.ajax({
				url: '<?= base_url("Test/getJlmData") ?>',
				type: "POST",
				data: {
					"jlm_data": jlm_data,
				},
				dataType: "json",
				success: function(data) {
					// console.log(data)
					var option = $('#data_ke');
					option.empty();
					$.each(data, function(key, value) {
						// console.log(key)
						var id = value.id
						var text = key + 1
						if (key == 0) {
							$('#data_ke').append($("<option />").val(id).text(text).attr("selected", "selected"));
							getDataPerhitungan(id);
						} else {
							$('#data_ke').append($("<option />").val(id).text(text));
						}
					});
				}
			})
		});

		$('#data_ke').on('change', function() {
			var id = $(this).val();
			getDataPerhitungan(id);
		});

		function getDataPerhitungan(id) {
			$.ajax({
				url: '<?= base_url("Test/getDataPerhitungan") ?>',
				type: "POST",
				dataType: "json",
				data: {
					"id_data": id,
				},
				success: function(data) {
					var numerator1 = 0;
					var numerator2 = 0;
					var numerator3 = 0;
					var numerator4 = 0;
					var numerator5 = 0;
					var numerator6 = 0;
					var numerator7 = 0;
					var numerator8 = 0;
					var numerator9 = 0;
					var denominator = 0;

					var table = $('#perhitungan-table');
					table.find('tbody').empty();
					$.each(data, function(index, item) {
						var dist = parseFloat(item.dist);
						var r = parseFloat(item.r);
						var d1 = parseFloat(item.d1);
						var d2 = parseFloat(item.d2);
						var d3 = parseFloat(item.d3);
						var d4 = parseFloat(item.d4);
						var d5 = parseFloat(item.d5);
						var d6 = parseFloat(item.d6);
						var d7 = parseFloat(item.d7);
						var d8 = parseFloat(item.d8);
						var d9 = parseFloat(item.d9);

						numerator1 += d1 * r;
						numerator2 += d2 * r;
						numerator3 += d3 * r;
						numerator4 += d4 * r;
						numerator5 += d5 * r;
						numerator6 += d6 * r;
						numerator7 += d7 * r;
						numerator8 += d8 * r;
						numerator9 += d9 * r;
						denominator += r;

						var row = '<tr>' +
							'<th>' + (index + 1) + '</th>' +
							'<td>' + formatNumberWithDecimal(dist, 5) + '</td>' +
							'<td>' + formatNumberWithDecimal(r, 5) + '</td>' +
							'<td>' + formatNumberWithDecimal(d1, 5) + '</td>' +
							'<td>' + formatNumberWithDecimal(d2, 5) + '</td>' +
							'<td>' + formatNumberWithDecimal(d3, 5) + '</td>' +
							'<td>' + formatNumberWithDecimal(d4, 5) + '</td>' +
							'<td>' + formatNumberWithDecimal(d5, 5) + '</td>' +
							'<td>' + formatNumberWithDecimal(d6, 5) + '</td>' +
							'<td>' + formatNumberWithDecimal(d7, 5) + '</td>' +
							'<td>' + formatNumberWithDecimal(d8, 5) + '</td>' +
							'<td>' + formatNumberWithDecimal(d9, 5) + '</td>' +
							'</tr>';
						table.append(row);
					});
					// console.log(denominator)
					// Numerator-table
					var table2 = $('#Numerator-table');
					table2.find('tbody').empty();
					var row = '<tr>' +
						'<td>' + formatNumberWithDecimal(numerator1, 5) + '</td>' +
						'<td>' + formatNumberWithDecimal(numerator2, 5) + '</td>' +
						'<td>' + formatNumberWithDecimal(numerator3, 5) + '</td>' +
						'<td>' + formatNumberWithDecimal(numerator4, 5) + '</td>' +
						'<td>' + formatNumberWithDecimal(numerator5, 5) + '</td>' +
						'<td>' + formatNumberWithDecimal(numerator6, 5) + '</td>' +
						'<td>' + formatNumberWithDecimal(numerator7, 5) + '</td>' +
						'<td>' + formatNumberWithDecimal(numerator8, 5) + '</td>' +
						'<td>' + formatNumberWithDecimal(numerator9, 5) + '</td>' +
						'</tr>';
					table2.append(row);

					var table3 = $('#c-table');
					table3.find('tbody').empty();
					var row = '<tr>' +
						'<td>' + formatNumberWithDecimal(numerator1 / denominator, 5) + '</td>' +
						'<td>' + formatNumberWithDecimal(numerator2 / denominator, 5) + '</td>' +
						'<td>' + formatNumberWithDecimal(numerator3 / denominator, 5) + '</td>' +
						'<td>' + formatNumberWithDecimal(numerator4 / denominator, 5) + '</td>' +
						'<td>' + formatNumberWithDecimal(numerator5 / denominator, 5) + '</td>' +
						'<td>' + formatNumberWithDecimal(numerator6 / denominator, 5) + '</td>' +
						'<td>' + formatNumberWithDecimal(numerator7 / denominator, 5) + '</td>' +
						'<td>' + formatNumberWithDecimal(numerator8 / denominator, 5) + '</td>' +
						'<td>' + formatNumberWithDecimal(numerator9 / denominator, 5) + '</td>' +
						'</tr>';
					table3.append(row);
					$("#denominator-value").text(denominator);

					var array_c = [numerator1/ denominator, numerator2/ denominator, numerator3/ denominator, numerator4/ denominator, numerator5/ denominator, numerator6/ denominator, numerator7/ denominator, numerator8/ denominator, numerator9/ denominator];
					var maxValue = Math.max.apply(Math, array_c)
					var maxIndex = array_c.indexOf(maxValue)+1
					$("#max-c-value").text(maxValue);
					$("#kelas-value").text(maxIndex);
					

					// console.log(data)
				}
			})
		}



		$('#jlm_data').on('change', function() {
			var jlm_data = $(this).val();
			// console.log(jlm_data)
			$.ajax({
				url: '<?= base_url("Test/getData") ?>',
				type: "POST",
				data: {
					"jlm_data": jlm_data,
				},
				dataType: "json",
				success: function(data) {
					// console.log(data)
					var table = $('#data-table');
					var tbody = table.find('tbody');

					tbody.empty();

					count = 1;
					for (var i = 0; i < data.length; i++) {
						var row = '<tr>' +
							'<td>' + count + '</td>' +
							'<td>' + data[i].dt1 + '</td>' +
							'<td>' + data[i].dt2 + '</td>' +
							'<td>' + data[i].dt3 + '</td>' +
							'<td>' + data[i].dt4 + '</td>' +
							'<td>' + data[i].dt5 + '</td>' +
							'<td>' + data[i].dt6 + '</td>' +
							'<td>' + data[i].dt7 + '</td>' +
							'<td>' + data[i].dt8 + '</td>' +
							'<td>' + data[i].dt9 + '</td>' +
							'<td>' + data[i].kelas + '</td>' +
							'<td>' + data[i].hasil + '</td>' +
							'</tr>';
						tbody.append(row);
						count++;
					}
				}
			})
		});
		function formatNumberWithDecimal(number, decimalPlaces) {
			// Cek apakah angka tersebut bulat
			if (number % 1 === 0) {
				return number.toString(); // Jika bulat, kembalikan nilai sebagai string tanpa desimal
			} else {
				return number.toFixed(decimalPlaces).replace(/\.?0+$/, ""); // Jika tidak bulat, gunakan toFixed() untuk memformat dengan desimal
			}
		};
	</script>

</main><!-- End #main -->
