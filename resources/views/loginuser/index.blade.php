<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - login &amp; signup form with html css &amp; javascript</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
    @include('sweetalert::alert')

<!-- partial:index.partial.html -->
<div class="wrapper">
      <div class="title-text">
        <div class="title login">Login Form</div>
        <div class="title signup">Signup Form</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          <form action="{{ route('logincus') }}" method="POST" class="login">
            @csrf
            <div class="field">
              <input type="text" name="email" placeholder="Masukkan Email" required>
            </div>
            <div class="field">
              <input type="text" name="password" placeholder="Masukkan Password" required>
            </div>
            <div class="pass-link"><a href="#">Forgot password?</a></div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Login">
            </div>
            <div class="signup-link">Not a member? <a href="">Signup now</a></div>
          </form>


          <form action="{{ route('loginuser.store') }}" method="POST" class="signup">
            @csrf
            <div class="field">
              <input type="text" placeholder="Masukkan Nama Lengkap" name="nama" required>
            </div>
            <div class="field">
              <input type="email" placeholder="Masukkan Email" name="email" required>
            </div>
            <div class="field">
              <select name="jkel" id="" required>
                <option value="">--Pilih Jenis Kelamin--</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="field">
              <input type="number" placeholder="Masukkan No.Telepon" name="telepon" required>
            </div>
            <div class="field">
              <textarea name="alamat" id="" cols="30" rows="10" placeholder="Masukkan Alamat"></textarea>
            </div>
            <div class="field">
              <input type="text" placeholder="Masukkan Kota" name="kota" required>
            </div>
            <div class="field">
              <input type="password" placeholder="Masukkan Password" name="pwd" required>
            </div>
            <input type="text" name="status" value="Pelanggan" hidden>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Signup">
            </div>
          </form>
        </div>
      </div>
    </div>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
