<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      /* width: 80rem;
      height: 45rem; */
      background: #2AB826;
    }

    .Main {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
    }

    .Main-judul {
      top: 5%;
      width: 100%;
      height: 8rem;
      flex-shrink: 0;
      /* margin: 0.5rem; */
      position: relative;
      /* background: #D9D9D9; */
    }

    .Main-judul p {
      margin: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 3.5rem;
      text-align: center;
      width: 90%;
      font-family: RobotoM;
      color: #ffff;
    }

    .Main-status {
      /* top: 105%; */
      width: 25%;
      height: 4.375rem;
      flex-shrink: 0;
      margin-top: 0.5rem;
      /* margin-left: 5%; */
      position: relative;
      border: 3px solid #000000;
      border-radius: 30px;
      background-color: #fdec00;
    }

    .Main-status p {
      margin: 0;
      position: absolute;
      top: 50%;
      left: 40%;
      transform: translate(-50%, -50%);
      width: 90%;
      font-family: RobotoM;
      font-size: 2rem;
    }

    .Main-status img {
      margin: 0;
      position: absolute;
      top: 50%;
      left: 80%;
      transform: translate(-50%, -50%);
      width: 2.5rem;
      height: 2.5rem;
    }

    .Main-tanggal {
      top: 100%;
      width: 73.6%;
      height: 4.375rem;
      /* left: 30%; */
      flex-shrink: 0;
      margin-top: 0.5rem;
      margin-left: 0.5%;
      position: relative;
      border: 3px solid #000000;
      border-radius: 30px;
      background-color: #fdec00;
    }

    .Main-tanggal p {
      margin: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 90%;
      font-family: RobotoM;
      font-size: 2rem;
    }

    .Main-data-diri {
      width: 25%;
      height: 30rem;
      flex-shrink: 0;
      margin-top: 0.5rem;
      /* margin-left: 5%; */
      position: relative;
      border: 3px solid #000000;
      border-radius: 30px;
      background-color: #e1eae9;

    }

    .Main-data-diri img {
      margin: 0;
      position: absolute;
      top: 33%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 90%;
      height: 60%;
      border: 3px solid #000000;
      border-radius: 30px;
    }

    .Main-bio {
      margin: 0;
      position: absolute;
      width: 95%;
      height: 30%;
      top: 80%;
      left: 50%;
      transform: translate(-50%, -50%);
      border: 3px solid #000000;
      border-radius: 30px;
      background-color: #fdec00;
      /* width: 90%; */
      font-family: RobotoM;
      font-size: 1.7rem;
    }

    .Main-tabel {
      width: 73.6%;
      height: auto;
      /* left: 30%; */
      flex-shrink: 0;
      margin-top: 0.5rem;
      margin-left: 0.5%;
      position: relative;
    }

    table,
    th,
    td {
      border-collapse: collapse;
    }

    th {
      background-color: #e1eae9;
      width: 90%;
      font-family: RobotoM;
      font-size: 2rem;
    }

    td {
      background-color: #ffff;
      width: 90%;
      font-family: Roboto;
      font-size: 1.5rem;
    }


    .tabel-kegiatan {
      width: 100%;
      height: 100%;
      table-layout: fixed;
      border-collapse: collapse;
      text-align: center;
    }

    .tabel-kegiatan th,
    .tabel-kegiatan td {
      border: 3px solid black;
      /* font-size: 2rem; */
      padding: 0.7rem;
      /* border-radius: 30px; */
      /* overflow: hidden; */
      white-space: normal;
    }


    .tabel-kegiatan th.jam-head {
      width: 25%;
    }

    .tabel-kegiatan th.kegiatan-head {
      width: 75%;
    }

    .judul,
    .status,
    .tanggal,
    .nama,
    .jabatan,
    .jam-head,
    .kegiatan-head,
    .jam-data,
    .kegiatan-data {
      text-align: center;
    }

    @font-face {
      font-family: "Inter";
      src: url("font/Inter-Regular.ttf") format("truetype");

      font-family: "Roboto";
      src: url("font/Roboto-Regular.ttf") format("truetype");

      font-family: "RobotoM";
      src: url("font/Roboto-Medium.ttf") format("truetype");
    }

    @keyframes fade {
      from {
        opacity: 0.4;
      }

      to {
        opacity: 1;
      }
    }

    ::-webkit-scrollbar {
      width: 0.1em;
    }

    ::-webkit-scrollbar-thumb {
      background-color: transparent;
    }

    @media screen and (max-width: 1024px) {
      .Main {
        flex-direction: column;
      }

      .Main-judul {
        width: 100%;
      }

      .Main-judul p {
        font-size: 2rem;
      }

      .Main-status {
        width: 100%;
      }

      .Main-tanggal {
        width: 100%;
      }

      .Main-data-diri {
        width: 100%;
      }

      .Main-tabel {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <div class="Main">
    <div class="Main-judul">
      <div>
        <p class="judul">Jadwal Kegiatan Pimpinan</p>
      </div>
    </div>
    <?php include 'koneksi.php'; ?>
    <?php $query = mysqli_query($conn, "SELECT * FROM kegiatan"); ?>
    <?php while ($row = mysqli_fetch_assoc($query)) : ?>
      <div class="Main-status SSstatus">
        <div>
          <p class="status"><?php echo $row['kehadiran'] ?></p>
          <img src="assets/Status/<?php $status = $row['kehadiran'];
                                  if ($status == 'HADIR') echo 'checkmark.png';
                                  elseif ($status == 'TIDAK HADIR') echo 'denied.png';
                                  elseif ($status == 'CUTI') echo 'yellowminus.png';
                                  elseif ($status == 'DINAS LUAR') echo 'checkmark.png'; ?>" alt="">
        </div>
      </div>
    <?php endwhile ?>
    <div class="Main-tanggal">
      <div>
        <p class="tanggal" id="date"></p>
      </div>
    </div>
    <?php $query = mysqli_query($conn, "SELECT * FROM kegiatan"); ?>
    <?php while ($row = mysqli_fetch_assoc($query)) : ?>
      <div class="Main-data-diri SSdatadiri">
        <div>
          <a href="password/<?php echo $row['id']; ?>"><img src="assets/Foto/<?php echo $row['gambar'] ?>" alt="" class="gambar" /></a>
        </div>
        <div class="Main-bio">
          <div class="Main-nama">
            <p class="nama"><?php echo $row['nama'] ?></p>
          </div>
          <div class="Main-jabatan">
            <p class="jabatan"><?php echo $row['jabatan'] ?></p>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
    <?php $query = mysqli_query($conn, "SELECT * FROM kegiatan"); ?>
    <?php while ($row = mysqli_fetch_assoc($query)) : ?>
      <div class="Main-tabel SStabel">
        <table class="tabel-kegiatan">
          <tr>
            <th class="jam-head">Jam</th>
            <th class="kegiatan-head">Kegiatan</th>
          </tr>
          <tr>
            <td class="jam-data"><?php echo $row['jam1'] ?> : <?php echo $row['menit1'] ?></td>
            <td class="kegiatan-data"><?php echo $row['kegiatan1'] ?></td>
          </tr>
          <tr>
            <td class="jam-data"><?php echo $row['jam2'] ?> : <?php echo $row['menit2'] ?></td>
            <td class="kegiatan-data"><?php echo $row['kegiatan2'] ?></td>
          </tr>
          <tr>
            <td class="jam-data"><?php echo $row['jam3'] ?> : <?php echo $row['menit3'] ?></td>
            <td class="kegiatan-data"><?php echo $row['kegiatan3'] ?></td>
          </tr>
          <tr>
            <td class="jam-data"><?php echo $row['jam4'] ?> : <?php echo $row['menit4'] ?></td>
            <td class="kegiatan-data"><?php echo $row['kegiatan4'] ?></td>
          </tr>
          <tr>
            <td class="jam-data"><?php echo $row['jam5'] ?> : <?php echo $row['menit5'] ?></td>
            <td class="kegiatan-data"><?php echo $row['kegiatan5'] ?></td>
          </tr>
        </table>
      </div>
    <?php endwhile; ?>
  </div>
  <script>
    window.onload = setInterval(clock, 1000);

    function clock() {
      var d = new Date();
      var dayOfWeek = d.getDay();
      var date = d.getDate();
      var dateArr = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", ];
      var year = d.getFullYear();
      var month = d.getMonth();
      var monthArr = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
      var monthName = monthArr[month];
      var dayName = dateArr[dayOfWeek];
      document.getElementById("date").innerHTML = dayName + ", " + date + " " + monthName + " " + year;
    }
    let slideIndex = [];
    let slideId = ["SSstatus", "SSdatadiri", "SStabel"];
    for (let i = 0; i < slideId.length; i++) {
      slideIndex.push(0);
      showSlides(0, i);
      autoSlide(i);
    }

    function autoSlide(no) {
      plusSlides(1, no);
      setTimeout(autoSlide.bind(null, no), 2000);
    }

    function plusSlides(n, no) {
      showSlides((slideIndex[no] += n), no);
    }

    function showSlides(n, no) {
      let i;
      let x = document.getElementsByClassName(slideId[no]);
      if (n > x.length) {
        slideIndex[no] = 1;
      }
      if (n < 1) {
        slideIndex[no] = x.length;
      }
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex[no] - 1].style.display = "block";
    }

    document.addEventListener("keydown", function(event) {
      // Arrow right key (move to next slide)
      if (event.key === "ArrowRight") {
        for (let i = 0; i < slideId.length; i++) {
          plusSlides(1, i);
        }
      }

      // Arrow left key (move to previous slide)
      if (event.key === "ArrowLeft") {
        for (let i = 0; i < slideId.length; i++) {
          plusSlides(-1, i);
        }
      }
    });   
  </script>
</body>

</html>