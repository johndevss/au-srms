<?php
// Initialize the session
require_once __DIR__ . "/../../../database/config.php";
 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/section.css">
  <script>
    async function loadStrand(strand) {
      try {
        const response = await fetch(`/?page=fetch_section&strand=${encodeURIComponent(strand)}`);
        if (!response.ok) {
          throw new Error('Failed to load data');
        }
        const html = await response.text();
        const tbody = document.querySelector('#section-body');
        const title = document.querySelector('#section-title');
        if (tbody) {
          tbody.innerHTML = html;
        }
        if (title) {
          title.textContent = strand;
        }
      } catch (err) {
        console.error(err);
        const tbody = document.querySelector('#section-body');
        if (tbody) {
          tbody.innerHTML = '<tr><td colspan="8">Unable to load data.</td></tr>';
        }
      }
    }

    document.addEventListener('DOMContentLoaded', () => {
      loadStrand('ICT');
    });
  </script>
  <title>Admin</title>
</head>
<body>
  <div class="heading">
    <header>
      <img class="threeLines" src="/assets/images/three_lines.png">
      <h1 class="text">Student Result Management System</h1>
    </header>
  </div>

  <div class="navigation">
    <nav>
      <a style="text-decoration: none;" href="/">
      <img class="aulogo"; src="/assets/images/aulogo.png"></a>
      <br> <br> <br>

        <ul class="nav">
          <li>
            <!--Dashboard-->
            <a href="/">
              <span class="icon"><img class="not-active" src="/assets/images/four_squares.png" title="Dashboard"></span>
            </a>
          </li>
          <li>
            <!--list-->
            <a href="/?page=list">
              <span class="active"><img class="active-icon" src="/assets/images/list.png" title="Management"></span>
            </a>
          </li>
          <li>
            <!--logout-->
            <a href="/logout.php">
              <span class="icon"><img class="not-active" src="/assets/images/logout.png" title="Logout"></span>
            </a>
          </li>
        </ul>
      </nav>
    </div>

  <div class="main">
  <a href="/?page=list"><img class="back-btn" src="/assets/images/left-arrow.png"></a>
  <h1 class="inner-heading">Section Management</h1>
  <main>
    <div class="tables">
       <label>Select Strand:</label>
      <button onclick="loadStrand('ICT');" style=" margin-left: 1%; font-size: 10px; font-family: 'Public Sans', sans-serif;padding: 5px 10px; border-radius: 30px; background-color: #f4f4f4;">ICT</button>

      <button onclick="loadStrand('STEM');" style=" margin-left: 2%; font-size: 10px; font-family: 'Public Sans', sans-serif;padding: 5px 10px; border-radius: 30px; background-color: #f4f4f4;">STEM</button>

      <button onclick="loadStrand('ABM');" style=" margin-left: 2%; font-size: 10px; font-family: 'Public Sans', sans-serif;padding: 5px 10px; border-radius: 30px; background-color: #f4f4f4;">ABM</button>

      <button onclick="loadStrand('GAS');" style=" margin-left: 2%; font-size: 10px; font-family: 'Public Sans', sans-serif;padding: 5px 10px; border-radius: 30px; background-color: #f4f4f4;">GAS</button>

      <button onclick="loadStrand('HUMSS');" style=" margin-left: 2%; font-size: 10px; font-family: 'Public Sans', sans-serif;padding: 5px 10px; border-radius: 30px; background-color: #f4f4f4;">HUMSS</button> <br>

      <a href="/?page=addstudent"><button style=" font-size: 10px; font-family: 'Public Sans', sans-serif;padding: 5px 10px; border-radius: 30px; background-color: #f4f4f4;">Add Student</button></a>
  <h1 id="section-title"></h1>
  <table id="table" class="table-bordered">
          <thead>
            <tr>
              <th>Last Name</th>
              <th>First Name</th>
              <th>Sex</th>
              <th>Email</th>
              <th>Mobile Number</th>
              <th>Strand</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="section-body">
            <tr><td colspan="8">Loading...</td></tr>
          </tbody>
      </table>
</main>

</div>

</body>
</html>
