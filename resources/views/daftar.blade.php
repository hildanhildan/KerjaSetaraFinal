<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Daftar KerjaSetara</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f9f9f9;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 700px;
      background: white;
      margin: 30px auto;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 12px;
    }
    h2 {
      text-align: center;
      color: #003366;
      margin-bottom: 10px;
    }
    .form-row {
      display: flex;
      gap: 20px;
      margin-bottom: 15px;
    }
    .form-group {
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    label {
      font-weight: bold;
      margin-bottom: 5px;
    }
    input, select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    .disability-box {
      border: 1px solid #007bff;
      padding: 15px;
      border-radius: 10px;
      margin: 15px 0;
    }
    .disability-box p {
      font-weight: bold;
      margin-bottom: 10px;
    }
    .checkbox-group {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    .checkbox-item {
      background: #e9f2ff;
      padding: 10px 15px;
      border-radius: 20px;
      border: 2px solid #007bff;
      color: #003366;
      cursor: pointer;
    }
    .checkbox-item input {
      margin-right: 8px;
    }
    .form-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 20px;
    }
    .form-footer label {
      font-weight: normal;
      font-size: 14px;
    }
    .btn {
      background-color: #005792;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
    }
    .btn:hover {
      background-color: #003d6b;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Daftar KerjaSetara</h2>
    <form id="formDaftar">
      <div class="form-row">
        <div class="form-group">
          <label>Nama Depan</label>
          <input type="text" required>
        </div>
        <div class="form-group">
          <label>Nama Belakang</label>
          <input type="text" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label>Email</label>
          <input type="email" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label>Jenis Kelamin</label>
          <select required>
            <option value="">Pilih</option>
            <option>Laki-laki</option>
            <option>Perempuan</option>
            <option>Lainnya</option>
          </select>
        </div>
        <div class="form-group">
          <label>Tanggal Lahir</label>
          <input type="date" required>
        </div>
      </div>

      <div class="disability-box">
        <p>Ketunaan/Disabilitas (bisa memilih lebih dari 1 jenis)</p>
        <div class="checkbox-group">
          <label class="checkbox-item"><input type="checkbox" name="disabilitas" value="Daksa">Disabilitas Daksa</label>
          <label class="checkbox-item"><input type="checkbox" name="disabilitas" value="Rungu">Disabilitas Rungu/Wicara</label>
          <label class="checkbox-item"><input type="checkbox" name="disabilitas" value="Mental">Disabilitas Mental</label>
          <label class="checkbox-item"><input type="checkbox" name="disabilitas" value="Grahita">Disabilitas Grahita</label>
          <label class="checkbox-item"><input type="checkbox" name="disabilitas" value="Netra">Disabilitas Netra</label>
          <label class="checkbox-item"><input type="checkbox" name="disabilitas" value="Intelektual">Disabilitas Intelektual</label>
        </div>
      </div>

      <div class="form-footer">
        <label><input type="checkbox" required> Saya setuju dengan 
            <a href="syarat-ketentuan.html" target="_blank" style="color:#d62d20;">Syarat & Ketentuan</a>
        </label>
        <button type="submit" class="btn">LANJUTKAN</button>
      </div>
    </form>
  </div>
  <script>
    document.getElementById("formDaftar").addEventListener("submit", function(event) {
      event.preventDefault();
  
      // Ambil semua checkbox yang dicentang
      const selected = Array.from(document.querySelectorAll('input[name="disabilitas"]:checked'))
                           .map(cb => cb.value.toLowerCase());
  
      // Simpan ke localStorage
      localStorage.setItem("disabilities", JSON.stringify(selected));
  
      // Arahkan ke halaman selanjutnya
      window.location.href = "lengkapi.html";
    });
  </script>  
</body>
</html>
