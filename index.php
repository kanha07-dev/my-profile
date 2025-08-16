<?php
// --- Handle Contact Form ---
$contact_message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $msg = htmlspecialchars($_POST["msg"]);

    // Example mail sending (configure your SMTP or hosting mail)
    $to = "routharekrushna163@gmail.com";
    $subject = "New Contact from $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$msg";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        $contact_message = "✅ Thanks, $name! Your message has been sent.";
    } else {
        $contact_message = "❌ Sorry, something went wrong. Please try again later.";
    }
}

// --- Handle Resume Download ---
if (isset($_GET['download_resume'])) {
    $resume_file = __DIR__ . '/pdf/hare_Resume.pdf';
    if (!file_exists($resume_file)) {
        http_response_code(404);
        exit('Resume file not found.');
    }
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="hare_Resume.pdf"');
    header('Content-Length: ' . filesize($resume_file));
    readfile($resume_file);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Harekrushna Rout — Web Developer</title>
<meta name="description" content="Portfolio of Harekrushna Rout, a web developer specializing in modern, responsive websites and apps." />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
:root{
 --bg: #0b1220;
 --accent: #6ee7b7;
 --accent-2: #60a5fa;
 --text: #e5e7eb;
 --subtext: #a1a1aa;
}
html,body{
 background: radial-gradient(1000px 700px at 80% -100%, rgba(96,165,250,.25), transparent),
             radial-gradient(900px 600px at -20% 10%, rgba(110,231,183,.18), transparent),
             var(--bg);
 color: var(--text);
 font-family: Poppins, system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial;
}
.glass{backdrop-filter: blur(10px); background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);}
.brand-gradient{background: linear-gradient(90deg, var(--accent), var(--accent-2)); -webkit-background-clip:text; background-clip:text; color: transparent;}
.btn-accent{background: linear-gradient(90deg, var(--accent), var(--accent-2)); border: none; color:#0a0f1a; font-weight:700;}
.btn-accent:hover{opacity:.9; color:#0a0f1a;}
.nav-link{color: var(--subtext)!important}
.nav-link.active, .nav-link:hover{color: var(--text)!important}
.avatar{width: 160px; height: 160px; border-radius: 50%; object-fit: cover; border: 3px solid rgba(255,255,255,.15)}
.section{padding: 80px 0}
.tag{border:1px solid rgba(255,255,255,.12); border-radius: 999px; padding:.35rem .75rem; font-size:.9rem;}
.card{background: rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); color: var(--text)}
.form-control, .form-select{background: rgba(255,255,255,0.06); color:var(--text); border:1px solid rgba(255,255,255,0.1)}
.form-control::placeholder{color:#9aa3af}
.icon-link{display:inline-flex; align-items:center; gap:.5rem; text-decoration:none}
.icon-link:hover{opacity:.85}
.underline{position: relative}
.underline::after{content:""; position:absolute; left:0; bottom:-6px; width:40px; height:3px; background: linear-gradient(90deg, var(--accent), var(--accent-2)); border-radius:2px}
.shadow-soft{box-shadow: 0 20px 80px rgba(0,0,0,.45)}
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top glass">
 <div class="container">
  <a class="navbar-brand fw-bold" href="#home">
   <span class="brand-gradient">HR</span> <span class="ms-2">Harekrushna Rout</span>
  </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
   <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="nav">
   <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
    <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
    <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
   </ul>
  </div>
 </div>
</nav>

<!-- HERO -->
<header id="home" class="section">
<div class="container">
<div class="row align-items-center g-5">
 <div class="col-lg-7">
  <h1 class="display-4 fw-bold lh-1 mb-3">Hi, I'm <span class="brand-gradient">Harekrushna Rout</span></h1>
  <p class="lead text-secondary">Web Developer crafting fast, accessible, and beautiful web experiences.</p>
  <div class="d-flex flex-wrap gap-3 mt-4">
   <a href="#projects" class="btn btn-accent btn-lg shadow-soft"><i class="bi bi-rocket-takeoff me-2"></i>See My Work</a>
   <a href="#contact" class="btn btn-outline-light btn-lg"><i class="bi bi-envelope me-2"></i>Contact Me</a>
   <a class="icon-link ms-lg-3" href="?download_resume=1"><i class="bi bi-file-earmark-arrow-down"></i> Download Resume</a>
  </div>
  <div class="d-flex gap-3 mt-4">
   <a class="icon-link text-light" href="https://github.com/kanha07-dev/" target="_blank"><i class="bi bi-github"></i> GitHub</a>
   <a class="icon-link text-light" href="https://www.linkedin.com/in/harekrushna1?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app/" target="_blank"><i class="bi bi-linkedin"></i> LinkedIn</a>
   <a class="icon-link text-light" href="mailto:routharekrushna163@gmail.com"><i class="bi bi-envelope-open"></i> Email</a>
  </div>
 </div>
 <div class="col-lg-5 text-center">
  <div class="p-4 rounded-4 glass shadow-soft d-inline-block">
   <img class="avatar" src="img\image1.png" alt="Harekrushna Rout profile photo" />
  </div>
 </div>
</div>
</div>
</header>

<!-- ABOUT -->
<section id="about" class="section">
<div class="container">
<div class="row justify-content-between align-items-center g-4">
 <div class="col-lg-6">
  <h2 class="fw-bold underline mb-3">About</h2>
  <p class="text-secondary">I'm a passionate web developer focused on building responsive websites and web apps with clean code and delightful UX. I enjoy turning ideas into products and learning new tools along the way.</p>
  <ul class="list-unstyled mt-3 text-secondary">
   <li class="mb-2"><i class="bi bi-check2-circle me-2 text-success"></i>Strong foundation in HTML, CSS, JavaScript</li>
   <li class="mb-2"><i class="bi bi-check2-circle me-2 text-success"></i>Experience with React, Bootstrap, REST APIs</li>
   <li class="mb-2"><i class="bi bi-check2-circle me-2 text-success"></i>Performance-first mindset & accessibility</li>
  </ul>
 </div>

 </div>
</div>
</div>
</section>

<!-- SKILLS -->
<section id="skills" class="section">
<div class="container">
<h2 class="fw-bold underline mb-5">Skills</h2>
<div class="row g-3">
<?php
$skills = [
 ["bi-code-slash","HTML5"],
 ["bi-palette","CSS3 / Bootstrap"],
 ["bi-braces","JavaScript"],
 ["bi-lightning-charge","React (Basics)"],
 ["bi-server","Node.js (Basics)"],
 ["bi-database","SQL / MongoDB"],
 ["bi-git","Git & GitHub"],
 ["bi-speedometer2","Performance & SEO"]
];
foreach($skills as $skill){
 echo "<div class='col-6 col-md-3'><div class='card p-3 h-100'><i class='bi {$skill[0]} fs-3'></i><div class='mt-2 fw-semibold'>{$skill[1]}</div></div></div>";
}
?>
</div>
</div>
</section>

<!-- PROJECTS -->
<section id="projects" class="section">
<div class="container">
<h2 class="fw-bold underline mb-5">Projects</h2>
<div class="row g-4">
<?php
$projects = [
 ["img//sg.png","snake game",["HTML","Bootstrap","JS"]],
 ["img//calculator.png","calculator",["HTML","Bootstrap","JS"]],
 ["img//to do.png","to do list",["HTML","Bootstrap","JS"]]
];
foreach($projects as $p){
 echo "<div class='col-md-6 col-lg-4'><div class='card h-100 shadow-soft'><img src='{$p[0]}' class='card-img-top'><div class='card-body d-flex flex-column'><h5 class='card-title'>{$p[1]}</h5><p class='card-text text-secondary'>{$p[2]}</p><div class='mt-auto d-flex gap-2'>";
 foreach($p[3] as $tag) echo "<span class='tag'>$tag</span>";
 echo "</div><div class='mt-3 d-flex gap-3'><a class='icon-link' href='#'><i class='bi bi-box-arrow-up-right'></i> Live</a><a class='icon-link' href='https://github.com/kanha07-dev/'><i class='bi bi-github'></i> Code</a></div></div></div></div>";
}
?>
</div>
</div>
</section>

<!-- CONTACT -->
<section id="contact" class="section">
<div class="container">
<h2 class="fw-bold underline mb-4">Contact</h2>
<?php if($contact_message): ?>
<div class="alert alert-info"><?= $contact_message ?></div>
<?php endif; ?>
<div class="row g-4">
<div class="col-lg-6">
<form class="glass p-4 rounded-4 shadow-soft" method="POST" action="#contact">
 <div class="row g-3">
  <div class="col-md-6">
   <label class="form-label">Name</label>
   <input class="form-control" name="name" placeholder="Your name" required>
  </div>
  <div class="col-md-6">
   <label class="form-label">Email</label>
   <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
  </div>
  <div class="col-12">
   <label class="form-label">Message</label>
   <textarea class="form-control" name="msg" rows="4" placeholder="How can I help you?" required></textarea>
  </div>
  <div class="col-12 d-flex gap-3 align-items-center">
   <button class="btn btn-accent" type="submit"><i class="bi bi-send me-2"></i>Send</button>
   <a class="btn btn-outline-light" href="mailto:youremail@example.com"><i class="bi bi-envelope"></i> Email Me</a>
  </div>
 </div>
</form>
</div>
<div class="col-lg-6">
 <div class="p-4 rounded-4 glass shadow-soft h-100">
  <h5 class="mb-3">Let's build something great</h5>
  <p class="text-secondary">Prefer email? Reach me at <a class="text-white" href="mailto:youremail@example.com">youremail@example.com</a>. I'm open to internships, freelance gigs, and collaborations.</p>
  <ul class="list-unstyled text-secondary">
   <li class="mb-2"><i class="bi bi-geo-alt me-2"></i>India (Remote)</li>
   <li class="mb-2"><i class="bi bi-clock me-2"></i>Response within 24 hours</li>
  </ul>
 </div>
</div>
</div>
</div>
</section>

<footer class="py-4 text-center text-secondary">
<div class="container small">© <?= date("Y") ?> Harekrushna Rout. Built with ❤ using Bootstrap.</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
