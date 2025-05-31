<?php
$mesajTrimis = false;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Date din formular
    $nume = htmlspecialchars($_POST['nume']);
    $emailClient = htmlspecialchars($_POST['email']);
    $telefon = htmlspecialchars($_POST['telefon']);
    $mesaj = htmlspecialchars($_POST['mesaj']);

    // 1️⃣ Trimitem mail clientului
    try {
        $mailClient = new PHPMailer(true);
        $mailClient->isSMTP();
        $mailClient->Host = 'smtp.gmail.com';
        $mailClient->SMTPAuth = true;
        $mailClient->Username = 'steriemioaraelena@gmail.com';     // ← contul tău Gmail
        $mailClient->Password = 'svbf mewu fkxh dtug';          
         $mailClient->SMTPSecure = 'tls';
        $mailClient->Port = 587;

        $mailClient->setFrom('steriemioaraelena@gmail.com', 'Wolf Chalet');
        $mailClient->addAddress($emailClient); // către client

        $mailClient->isHTML(true);
        $mailClient->Subject = 'Multumim pentru mesaj';
        $mailClient->Body    = "
            Buna, $nume!<br><br>
            Va multumim pentru mesajul dumneavoastra. Vom reveni cat de curand.<br><br>
            Toate cele bune,<br>
            <strong>Wolf Chalet</strong>
        ";
        $mailClient->send();
    } catch (Exception $e) {
        echo "Eroare la trimiterea către client: {$mailClient->ErrorInfo}";
    }

    // 2️⃣ Trimitem mesajul clientului către TINE
    try {
        $mailAdmin = new PHPMailer(true);
        $mailAdmin->isSMTP();
        $mailAdmin->Host = 'smtp.gmail.com';
        $mailAdmin->SMTPAuth = true;
        $mailAdmin->Username = 'steriemioaraelena@gmail.com';
        $mailAdmin->Password = 'svbf mewu fkxh dtug';  
        $mailAdmin->SMTPSecure = 'tls';
        $mailAdmin->Port = 587;

        $mailAdmin->setFrom('steriemioaraelena@gmail.com', 'Wolf Chalet');
        $mailAdmin->addAddress('sterie_mioara@yahoo.com'); // către tine

        $mailAdmin->isHTML(true);
        $mailAdmin->Subject = 'Mesaj nou de la client';
        $mailAdmin->Body    = "
            <strong>Nume:</strong> $nume<br>
            <strong>Email:</strong> $emailClient<br>
            <strong>Telefon:</strong> $telefon<br><br>
            <strong>Mesaj:</strong><br>$mesaj
        ";
        $mailAdmin->send();

        $mesajTrimis = true;
    } catch (Exception $e) {
        echo "Eroare la trimiterea către administrator: {$mailAdmin->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wolf Chalet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #eaf3ea;
        }

        .custom-menu-btn {
            border: 2px solid white;
            border-radius: 999px;
            padding: 6px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: transparent;
            color: white;
        }

            .custom-menu-btn .circle-icon {
                width: 30px;
                height: 30px;
                border-radius: 50%;
                background-color: white;
                display: flex;
                align-items: center;
                justify-content: center;
            }

        .offcanvas-custom {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.85);
        }

        .menu-section-title {
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: #f4f4f4;
            padding: 10px 15px;
            border-radius: 30px;
            margin-bottom: 5px;
        }
        #contact-toggle:hover + #contact-submenu {
            display: block !important;
        }

        .submenu {
            padding-left: 35px;
            margin-bottom: 15px;
        }

            .submenu a {
                display: block;
                color: #333;
                text-decoration: none;
                padding: 3px 0;
            }

                .submenu a:hover, .menu-section-title:hover {
                    background-color: #d1e7dd;
                    color: #1c4125 !important;
                    border-radius: 20px;
                    padding-left: 10px;
                    transition: all 0.3s ease-in-out;
                }

         .offcanvas-header .btn-close {
            background-color: #000;
            border-radius: 50%;
             padding: 10px;
            }

        .custom-close {
            background-color: transparent;
            font-size: 2rem;
            border: none;
            position: relative;
        }

            .custom-close::before {
                content: '✕';
                color: #333;
                font-weight: bold;
                font-size: 1.8rem;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }



        .contact-wrapper {
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            justify-content: center; /* Centrează conținutul */
        }


        .contact-box {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            height: 100%;
            min-height: 100%;
            text-align: center; /* Centrează textul */
        }



        .contact-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center; /* Centrează textul în card */
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <img src="images/logo.jpeg" alt="Wolf Chalet Logo" style="height: 40px;">
                <span class="fw-bold text-white">Wolf Chalet</span>
            </a>
            <button class="custom-menu-btn" data-bs-toggle="offcanvas" data-bs-target="#menuOffcanvas">
                <span>Meniu</span>
                <div class="circle-icon">
                    <i class="fas fa-bars text-dark"></i>
                </div>
            </button>
        </div>
    </nav>

    <!-- Menu -->
    <div class="offcanvas offcanvas-end offcanvas-custom" tabindex="-1" id="menuOffcanvas">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Wolf Chalet</h5>
            <button type="button" class="btn-close custom-close" data-bs-dismiss="offcanvas" aria-label="Închide"></button>

        </div>
        <div class="offcanvas-body">

            <div class="menu-section-title">
                <i class="fas fa-home"></i>
                <a href="index.html" class="text-dark text-decoration-none">ACASĂ</a>
            </div>

            <div class="menu-section-title"><i class="fas fa-briefcase"></i> SERVICII</div>
            <div class="submenu">
                <a href="atractii_turistice.html">Atracții turistice</a>
                <a href="cazare.html">Cazare</a>
            </div>
 
            <div class="menu-section-title position-relative" id="contact-toggle" style="cursor: pointer;">
                <i class="fas fa-at"></i>
                <span class="text-dark text-decoration-none">CONTACT</span>
            </div>
            <div class="submenu" id="contact-submenu">
                <a href="contact.html">Date de contact</a>
                <a href="rezervari.php">Rezervări</a>
            </div>
        </div>
    </div>

    <!-- CONTACT -->
    <section class="container py-5" id="contact">
        <div class="row g-4 align-items-stretch">
            <!-- Coloana 1 -->
            <div class="col-md-6 d-flex">
                <div class="p-4 bg-white rounded shadow-sm w-100 d-flex flex-column justify-content-between">
                    <h5 class="mb-3" style="text-align: center;">Date de contact</h5> <!-- Centrăm titlul -->
                    <p><i class="fas fa-phone-alt me-2 text-success" style="text-align: center;"></i> (+40)752682470 / (+40)765215144</p>
                    <p><i class="fas fa-envelope me-2 text-success"  style="text-align: center;"></i> hellowolfchalet@gmail.com</p>
                    <p><i class="fas fa-map-marker-alt me-2 text-success"  style="text-align: center;"></i> Moieciu de Sus 56, Jud. Brașov, România</p>
                    <div class="mt-4 ratio ratio-4x3 rounded overflow-hidden">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22397.957958686075!2d25.316308505355554!3d45.43464661365864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b3399d5b1fcd5f%3A0x12b31b5326d2e033!2s507134%20Moieciu%20de%20Sus%2C%20Rom%C3%A2nia!5e0!3m2!1sro!2sus!4v1742664831649!5m2!1sro!2sus" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>




       <!-- Coloana 2 -->
<div class="col-md-6 d-flex">
    <div class="p-4 bg-white rounded shadow-sm w-100 d-flex flex-column justify-content-between">
        <?php if ($mesajTrimis): ?>
            <div class="alert alert-success text-center mb-3">
                ✅ Mesajul a fost trimis cu succes!
            </div>
        <?php endif; ?>

        <h5 class="mb-3" style="text-align: center;">Trimite-ne un mesaj</h5>
        <form class="mt-2" method="POST" action="">
            <div class="mb-1">
                <label class="form-label">Nume</label>
                <input type="text" class="form-control" name="nume" required>
            </div>
            <div class="mb-1">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Telefon</label>
                <input type="tel" class="form-control" name="telefon">
            </div>
            <div class="mb-3">
                <label class="form-label">Mesaj</label>
                <textarea class="form-control" rows="8" name="mesaj" required></textarea>
            </div>
            <button class="btn btn-success w-100" type="submit">Trimite mesajul</button>
        </form>
    </div>
</div>

    </section>
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <img src="images/logo.jpeg" alt="Wolf Chalet Logo" style="height: 40px;">
            <p class="mt-6 mb-2 fs-7">
                <svg class="me-1" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 0a6 6 0 0 0-6 6c0 4.222 5.34 9.367 5.653 9.683a.5.5 0 0 0 .694 0C8.66 15.367  14 10.221 14 6a6 6 0 0 0-6-6zm0   8a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" />
                </svg>Adresă: Moieciu de Sus 56, Jud. Brașov, Romania
            </p>
            <p class="mb-1 fs-7">
                <svg xmlns="http://www.w3.org/2000/svg"
                     width="20" height="20"
                     fill="currentColor"
                     viewBox="0 0 24 24">
                    <path d="M6.62 10.79
           a15.053 15.053 0 0 0 6.59 6.59  l2.2-2.2 a1 1 0 0 1 1.11-.21  c1.2.5 2.5.77 3.86.77  a1 1 0 0 1 1 1V20 c0 .55-.45 1-1 1  C9.16 21 3 14.84 3 6 c0-.55.45-1 1-1h3.5  a1 1 0 0 1 1 1  c0 1.36.27 2.66.77 3.86   a1 1 0 0 1-.21 1.11 l-2.2 2.2z" />
                </svg> Telefon: (+40)752682470 / (+40)765215144
            </p>
            <p class="mb-4 fs-7">
                <svg xmlns="http://www.w3.org/2000/svg"
                     width="20" height="20"
                     fill="currentColor"
                     viewBox="0 0 24 24">
                    <path d="M20 4H4C2.9 4 2 4.9 2 6v12c0 1.1.9 2 2 2h16
           c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4
           l-8 5-8-5V6l8 5 8-5v2z" />
                </svg> E-mail: hellowolfchalet@gmail.com
            </p>
        </div>
    </footer>
    <!-- EmailJS -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
