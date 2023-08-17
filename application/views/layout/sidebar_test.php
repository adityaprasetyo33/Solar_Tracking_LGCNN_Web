<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

	<ul class="sidebar-nav" id="sidebar-nav">

		<li class="nav-item">
			<a class="nav-link collapsed" href="<?= base_url() ?>">
				<i class="bi bi-grid"></i>
				<span>Dashboard</span>
			</a>
		</li><!-- End Dashboard Nav -->

		<li class="nav-item">
			<a class="nav-link collapsed" href="<?= base_url() ?>monitoring">
				<i class="ri ri-computer-line"></i>
				<span>Monitoring</span>
			</a>
		</li><!-- End Monitoring Nav -->

		<li class="nav-item">
			<a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
				<i class="ri ri-folder-5-line"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
				<li>
					<a href="<?= base_url() ?>training">
						<i class="ri ri-numbers-line" style="font-size:16px"></i><span>Training</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url() ?>test" class="active">
						<i class="ri ri-book-2-line" style="font-size:16px"></i><span>Test</span>
					</a>
				</li>


			</ul>
		</li><!-- End Data Nav -->
	</ul>

</aside><!-- End Sidebar-->
