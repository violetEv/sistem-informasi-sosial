<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login Multi User</title>
	<!-- <link rel="stylesheet" href="globals.css" /> -->
	<link rel="stylesheet" href="styleguide.css" />
	<link rel="stylesheet" href="style-login.css" />
</head>

<body>
	<!-- <div class="container"> -->
	<div class="sign-in">
		<form action="login_aksi.php" method="POST">
			<div class="div-wrapper">
				<div class="frame-3">
					<!-- form login -->
					<div class="frame-5">
						<div class="frame-7">
							<div class="smithy-weber-3">Selamat Datang Kembali !</div>
							<!-- form input -->
							<div class="input">
								<div class="field">
									<img class="img-2" src="img/person.svg" />
									<input type="text" class="smithy-weber-4" name="username" placeholder="Username" id="input-1" />
								</div>
							</div>
							<div class="input">
								<div class="field">
									<img class="img-2" src="img/padlock.svg" />
									<input type="password" class="smithy-weber-4" name="psw" placeholder="Password" id="input-1">
								</div>
							</div>
						</div>
					</div>
					<!-- button -->
					<div class="frame-7">
						<div class="frame-8">
							<button type="submit" class="smithy-weber-5">Masuk</button>
						</div>
						<div class="frame-9">
							<button type="reset" class="smithy-weber-6">Reset</button>
						</div>
					</div>
					<!-- bawah button -->
					<div class="frame-10">
						<div class="smithy-weber-7">Belum mempunyai akun?</div>
						<a href="?register=true" id="registerLink" class="smithy-weber-8">Buat Akun</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>

</html>