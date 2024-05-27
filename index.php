<html>

<head>
	<title>SosialNet</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="globals.css" />
	<link rel="stylesheet" href="styleguide.css" />
	<link rel="stylesheet" href="style-index.css" />
</head>

<body>
	<?php
	session_start();
	?>
	<div class="index">
		<div class="frame-wrapper">
			<div class="frame">
				<!-- split kiri -->
				<div class="div-left">
					<div class="group-wrapper">
						<div class="group">
							<div class="rectangle"></div>
						</div>
					</div>
					<div class="frame-2">
						<div class="text-wrapper">SosialNet</div>
						<p class="p">
							Menghubungkan masyarakat dengan informasi, bantuan sosial, dan solusi! Platform online yang memudahkan
							akses semua orang terhadap informasi sosial yang dibutuhkan.
						</p>
					</div>
				</div>
				<!-- split kanan -->
				<div class="div-right">
					<!-- logo -->
					<div class="logo-wrapper">
					<img class="img" src="img/logo.png" alt="Logo" /></div>
					<!-- tabs -->
					<div class="tabs">
						<input type="radio" class="tab-radio" name="tabs" id="tab1" checked>
						<label for="tab1" class="tab-label">Masuk</label>
						<div class="tab-content">
							<?php include 'login.php'; ?> </div>
						<input type="radio" class="tab-radio" name="tabs" id="tab2">
						<label for="tab2" class="tab-label">Buat Akun Baru</label>
						<div class="tab-content">
							<?php include 'register.php'; ?> </div>
					</div>
				</div>
				<!-- </div> -->
			</div>
		</div>
	</div>
	<?php
    if (isset($_SESSION['error_message'])) {
        echo "<script>alert('" . $_SESSION['error_message'] . "');</script>";
        unset($_SESSION['error_message']); // 
    }
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            const register = urlParams.get('register');
            if (register) {
                document.getElementById('tab2').checked = true;
            }if (urlParams.get('login')) {
                document.getElementById('tab1').checked = true;
            }
        });
    </script>
</body>

</html>