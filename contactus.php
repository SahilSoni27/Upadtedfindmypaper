<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Support Team Page</title>
  <style>
    /* Global Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      line-height: 1.6;
    }

    /* Hero Section */
    .hero {
      text-align: center;
      padding: 50px 20px;
    }

    .hero .highlight {
      color: #ff007a;
    }

    .hero-buttons .btn {
      padding: 10px 20px;
      margin: 10px;
      border: 1px solid #333;
      cursor: pointer;
      border-radius: 40px;
    }

    .hero-buttons .btn.primary {
      background: #333;
      color: #fff;
      text-decoration: none;
      
    }

    /* Team Section */
    .team {
      display: flex;
      justify-content: center;
      gap: 20px;
      padding: 50px 20px;
    }

    .team .profile {
      text-align: center;
    }

    .team .profile img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
    }

    /* Links */
    .team .profile a {
      color: black; /* Set link color to black */
      text-decoration: none; /* Remove underline from links */
    }

    .team .profile a:hover {
      color: #333; /* Darken color on hover (same as regular text color) */
    }

    /* Contact Section */
    .contact {
      display: flex;
      justify-content: space-between;
      padding: 50px;
      background: #f8f8f8;
    }

    .contact-info {
      max-width: 40%;
    }

    .contact-container .email a {
      color: black; /* Consistent with your theme's orange */
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .contact-container .email a:hover {
      color: #007bff; /* Hover effect */
    }
  </style>
</head>
<body>

<?php include('navbar2.php'); ?>
    
  <!-- Hero Section -->
  <section class="hero">
    <h1>We are here to <span class="highlight">assist</span> you with any questions you might have.</h1>
    <p>Feel free to reach out directly, and I’ll get back to you as soon as possible.</p><br>
    <div class="hero-buttons">
    <a href="https://wa.me/919428235545?text=Hello." 
       target="_blank" 
       class="btn primary">
        Get in touch
    </a>
</div>

  </section>

  <!-- Team Section -->
  <section class="team">
    <div class="profile">
      <img src="https://via.placeholder.com/120" alt="Sahil Soni" onerror="this.src='img/sahil.png'">
      <h3><a href="https://www.linkedin.com/in/sahil-narayan-soni" target="_blank">Sahil Soni</a></h3>
      
    </div>
    <div class="profile">
      <img src="https://via.placeholder.com/120" alt="Prayag Mehta" onerror="this.src=">
      <h3><a href="https://www.linkedin.com/in/prayag-mehta" target="_blank">Prayag Mehta</a></h3>
      
    </div>
    <div class="profile">
        <img src="https://via.placeholder.com/120" alt="Lakshya Mehta" onerror="this.src='img/lakshy.png'">
        <h3><a href="https://www.linkedin.com/in/lakshy-mehta/" target="_blank">Lakshy Mehta</a></h3>
        
      </div>
    
    <div class="profile">
        <img src="https://via.placeholder.com/120" alt="Neel Ganatara" onerror="this.src='img/neel.jpeg'">
        <h3><a href="https://www.linkedin.com/in/neel-ganatra/" target="_blank">Neel Ganatara</a></h3>
        
      </div>
    <div class="profile">
        <img src="https://via.placeholder.com/120" alt="Dhruv Maradiya" onerror="this.src=">
        <h3><a href="https://www.linkedin.com/in/dhruvmaradiya" target="_blank">Dhruv Maradiya</a></h3>
      
    </div>
  </section>

  <!-- Contact Section -->
  <section class="contact">
    <div class="contact-container">
      <h2>Contact Us</h2>
      <p>Call us: <strong>+91 9428235545</strong></p>
      <div class="email">
        <p>Email: <strong><a href="mailto:findmypaper1@gmail.com">findmypaper1@gmail.com</a></strong></p>
      </div>
      <p>Visit us: <strong>PDEU university, Gandhinagar</strong></p>
    </div>
  </section>
  <?php include('footer.php'); ?>
</body>
</html>
