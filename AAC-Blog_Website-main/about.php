<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leadership</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Internal CSS -->
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body */
        body {
            font-family: 'Poppins', sans-serif;
            background: #f9f9f9;
            color: #333;
            line-height: 1.6;
            padding-bottom: 60px;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            background: #007bff; /* Blue color */
            padding: 15px 40px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .donate {
            background: #fff;
            color: #007bff;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.5s ease, color 0.5s ease;
        }

        .donate:hover {
            background: #0056b3;
            color: #fff;
        }

        /* Leadership Section */
        .leadership {
            text-align: center;
            padding: 40px 20px;
        }

        .leadership h1 {
            font-size: 2.5rem;
            margin-bottom: 40px;
            color: #222;
            text-transform: uppercase;
        }

        /* CEO Section */
        .leader-ceo {
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            display: inline-block;
            margin-bottom: 50px;
        }

        .leader-ceo img {
            width: 100%;
            height: auto;
            max-width: 300px;
            border-radius: 12px;
            object-fit: contain; /* Show full image */
            margin-bottom: 15px;
            background: #f0f0f0;
        }

        .leader-ceo h2 {
            font-size: 1.5rem;
            color: #444;
        }

        .leader-ceo p {
            font-size: 1rem;
            color: #007bff;
            font-weight: bold;
        }

        /* Member Cards Grid */
        .leader-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .leader-card {
            background: #fff;
            padding: 20px;
            border-radius: 16px;
            border: 1px solid #eee;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .leader-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .leader-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: contain; /* Show full image */
            margin-bottom: 12px;
            background: #f0f0f0;
        }

        .leader-card h3 {
            font-size: 1rem;
            color: #444;
            margin-bottom: 6px;
            text-transform: capitalize;
        }

        .leader-card p {
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <header class="navbar">
        <a href="#" class="donate">Our Work</a>
    </header>

    <!-- Leadership Section -->
    <section class="leadership">
        <h1>Project Members</h1>
        
        <!-- CEO -->
        <div class="leader-ceo">
            <img src="about_image/kalai.jpg" alt="President & CEO">
            <h2>Ms Kalaiselvi A</h2>
            <p>MSc, BEd, MPhil, SET, Assistant Professor</p>
        </div>

        <!-- Members Grid -->
        <div class="leader-grid">
            <div class="leader-card">
                <img src="about_image/blog-profile.png" alt="Member Image">
                <h3>Toni Vasanth J</h3>
                <p>Batch (2024–2026)</p>
            </div>
            <div class="leader-card">
                <img src="about_image/blog-profile.png" alt="Member Image">
                <h3>Rajan S</h3>
                <p>Batch (2024–2026)</p>
            </div>
            <div class="leader-card">
                <img src="about_image/blog-profile.png" alt="Member Image">
                <h3>Sivaranjan</h3>
                <p>Batch (2024–2026)</p>
            </div>
            <div class="leader-card">
                <img src="about_image/blog-profile.png" alt="Member Image">
                <h3>Muthupandi K</h3>
                <p>Batch (2024–2026)</p>
            </div>
            <div class="leader-card">
                <img src="about_image/blog-profile.png" alt="Member Image">
                <h3>Mithun V</h3>
                <p>Batch (2024–2026)</p>
            </div>
            <div class="leader-card">
                <img src="about_image/blog-profile.png" alt="Member Image">
                <h3>Anto Felix A</h3>
                <p>Batch (2024–2026)</p>
            </div>
            <div class="leader-card">
                <img src="about_image/blog-profile.png" alt="Member Image">
                <h3>Kesavakumar M</h3>
                <p>Batch (2024–2026)</p>
            </div>
            <div class="leader-card">
                <img src="about_image/blog-profile.png" alt="Member Image">
                <h3>Vijay M</h3>
                <p>Batch (2024–2026)</p>
            </div>
            <div class="leader-card">
                <img src="about_image/blog-profile.png" alt="Member Image">
                <h3>Kiruba P</h3>
                <p>Batch (2024–2026)</p>
            </div>
            <div class="leader-card">
                <img src="about_image/blog-profile.png" alt="Member Image">
                <h3>Deepika S</h3>
                <p>Batch (2024–2026)</p>
            </div>
        </div>
    </section>
</body>
</html>