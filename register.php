<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="style-register.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" target="_blank" rel="noreferrer noopener"></script>

</head>

<body>
    <div class="sign-up">
        <form action="register_aksi.php" method="post">
            <div class="div-wrapper">
                <div class="frame-3">
                    <div class="frame-5">
                        <div class="frame-7">
                            <div class="smithy-weber-3">Daftar Sekarang !</div>
                            <!-- form input -->
                            <div class="input">
                                <div class="field">
                                    <img class="img-2" src="img/user.svg" />
                                    <input class="smithy-weber-4" name="username" placeholder="Username" type="text" />
                                </div>
                            </div>
                            <div class="input">
                                <div class="field">
                                    <img class="img-2" src="img/padlock.svg" />
                                    <input type="password" name="psw" class="smithy-weber-4" placeholder="Password" />
                                </div>
                            </div>
                            <div class="input">
                                <div class="field">
                                    <img class="img-2" src="img/user-edit.svg" />
                                    <input type="text" name="nama" class="smithy-weber-4" placeholder="Nama sesuai KTP/KK" />
                                </div>
                            </div>
                            <div class="input">
                                <div class="field">
                                    <img class="img-2" src="img/mail.svg" />
                                    <input class="smithy-weber-4" name="email" placeholder="Masukkan email user@gmail.com" type="email" />
                                </div>
                            </div>
                            <div class="input">
                                <div class="field">
                                    <img class="img-2" src="img/route.svg" />
                                    <input type="text" name="alamat" class="smithy-weber-4" placeholder="Alamat sesuai KTP/KK" />
                                </div>
                            </div>
                            <div class="input">
                                <div class="field">
                                    <img class="img-2" src="img/call.svg" />
                                    <input type="text" name="tlp" class="smithy-weber-4" placeholder="Nomor telepon" />
                                </div>
                            </div>
                            <!-- selection -->
                            <div class="input">
                                <div class="field">
                                    <img class="img-2" src="img/people.svg" />
                                    <select name="level" id="level" class="smithy-weber-4">
                                        <option value="status" label="Status" selected disabled></option>
                                        <option value="petugas" label="Petugas"></option>
                                        <option value="warga" label="Warga"></option>
                                    </select>
                                </div>
                            </div>
                            <div class="input"  id="pDetails">
                                <div class="field" >
                                    <img class="img-2" src="img/card-tick.svg" />
                                    <input type="text" class="smithy-weber-4" placeholder="NIP" minlength="18" maxlength="18" name="nip" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- button -->
                    <div class="frame-7">
                        <div class="frame-8">
                            <button type="submit" class="smithy-weber-6">Buat Akun
                        </div>
                        <div class="frame-9">
                            <button type="reset" class="smithy-weber-7">Reset
                        </div>
                    </div>

                </div>
                <!-- bawah button -->
                <div class="frame-10">
                    <div class="smithy-weber-8">Sudah mempunyai akun?</div>
                    <a href="?login=true" id="loginLink" class="smithy-weber-9">Masuk</a>
                </div>
            </div>
    </div>
    </form>
    </div>
    <script>
            $('#level').change(function() {
                var responseID = $(this).val();
                if (responseID == "petugas") {
                    $('#pDetails').removeClass("hidden");
                    $('#pDetails').addClass("show");
                } else if (responseID == "warga" && "status") {
                    $('#pDetails').removeClass("show");
                    $('#pDetails').addClass("hidden");
                }
                console.log(responseID);
            });
        </script>
</body>

</html>