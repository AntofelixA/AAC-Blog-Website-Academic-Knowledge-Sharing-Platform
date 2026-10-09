<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Computer Science Department</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: #0a0a0a;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      display: flex;
      max-width: 1200px;
      background: #e0e7ef;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
    }

    .image-section {
      flex: 1;
      background: #000;
    }

    .image-section img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .content-section {
      flex: 2;
      padding: 30px;
      color: #000;
    }

    .content-section h2 {
      margin-top: 0;
      font-size: 24px;
      color: #1a1a1a;
    }

    .content-section p {
      line-height: 1.6;
      font-size: 16px;
      color: #333;
    }
  </style>
</head>
<body>

<div class="container">
  <!-- Left Image -->
  <div class="image-section">
    <img src="about_image.jpg" alt="Department Image">
  </div>

  <!-- Right Content -->
  <div class="content-section">
    <h2>About Our Computer Science Department</h2>
    <p>
      The Department of Computer Applications was started in the academic year 1999-2000 with MCA Programme.
      The MCA Programme was approved by AICTE, New Delhi. The department also offers PGDCA for the graduates of
      any discipline and Computer Education Programme for other Arts and Science UG students. The objective of
      the MCA programme is to prepare post graduates for productive careers in software industry, corporate sector,
      Govt. organizations and academia by providing skill based environment for teaching and research in the core
      and emerging areas of the discipline.
    </p>
    <p>
      The Bachelor of Computer Science programme started in the academic year 2011-2012 affiliated by Madurai Kamaraj
      University. The department aims to provide a quality degree program that ensures the students integrate theory and
      practical knowledge in developing a software model to solve socially and culturally relevant issues in the core and
      other discipline. The prime focus is to promote the effective integration of technology with state-of-the-art
      facilities in teaching and research activities. The department is merged with the Department of Computer Applications
      in the academic year 2016-2017 and named as Department of Computer Science & Applications.
    </p>
  </div>
</div>

</body>
</html>
