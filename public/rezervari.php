    <?php

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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.4/dist/locomotive-scroll.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

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

            .offcanvas-header .btn-close {
                background-color: #000;
                border-radius: 50%;
                padding: 10px;
            }

            .zoom-bg {
                animation: zoomInOut 50s ease-in-out infinite;
                transform-origin: center;
            }

            @keyframes zoomInOut {
                0% {
                    transform: scale(0.9);
                }

                50% {
                    transform: scale(1.1);
                }

                100% {
                    transform: scale(0.9);
                }
            }

            .scrolling-title {
                font-size: 2.5rem;
                font-weight: bold;
                white-space: nowrap;
                color: #2f4f1e;
                text-align: center;
            }

            .fade-in {
                opacity: 1 !important;
                transform: translateY(0px) !important;
                transition: all 0.8s ease;
            }

            [data-scroll][data-scroll-class] {
                opacity: 0;
                transform: translateY(40px);
            }

            .menu-section-title:hover,
            .submenu a:hover {
                background-color: #d1e7dd; /* un verde pal discret */
                color: #1c4125 !important; /* text mai închis */
                border-radius: 20px;
                padding-left: 10px;
                transition: all 0.3s ease-in-out;
            }

            .submenu a {
                transition: all 0.3s ease;
                padding: 3px 5px;
                border-radius: 12px;
            }

            .custom-close {
                background-color: transparent;
                background-image: none;
                font-size: 2rem;
                line-height: 1;
                color: black;
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



            form#booking-form .form-control {
                padding: 12px;
                border-radius: 12px;
                border: 1px solid #ced4da;
                font-size: 0.95rem;
            }

                form#booking-form .form-control:focus {
                    border-color: #1c4125;
                    box-shadow: 0 0 0 0.2rem rgba(28, 65, 37, 0.2);
                }




            #calendar-vizual {
                max-width: 150%;
                margin-top: 0.5px;
                padding: 15px;
                background: #f5f8f4;
                border-radius: 15px;
                border: 1px solid #ced4da;
            }

            #rezervari-ocupate {
                background: #f8f9fa;
                padding: 20px;
                border-radius: 15px;
                border-left: 4px solid #842029;
                /* 🔽 Asta îl centrează și îi limitează lățimea */
                max-width: 800px;
                margin: 80px auto;
                box-shadow: 0 0 10px rgba(0,0,0,0.05);
            }


                #rezervari-ocupate strong {
                    color: #842029;
                    font-weight: 600;
                    display: block;
                    margin-bottom: 10px;
                    font-size: 1.1rem;
                }


                #rezervari-ocupate > div {
                    background-color: #f8d7da;
                    padding: 2px 5px;
                    margin: 1px 0;
                    border-radius: 6px;
                    color: #842029;
                    font-size: 0.9rem;
                    display: flex;
                    align-items: center;
                    gap: 6px;
                    max-width: 600px;
                    margin: 5 auto;
                }




            h1.text-center {
                font-size: 2.2rem;
                font-weight: 600;
                color: #1c4125;
            }


            #booking-form label {
                font-weight: 900;
                color: #1c4125;
            }

            #calendar-vizual .flatpickr-input {
                display: none !important;
            }

            .flatpickr-calendar.inline .flatpickr-months {
                justify-content: space-between;
                gap: 50px; /* spațiu între lunile afișate */
            }




            /* Spațiere între lunile din Flatpickr */
            .flatpickr-calendar.inline .flatpickr-innerContainer {
                display: flex !important;
                justify-content: space-between;
                gap: 40px;
                padding: 10px 20px;
            }

            /* Înlătură marginile interne implicite */

            .flatpickr-calendar.inline {
                box-shadow: 0 2px 6px rgba(0,0,0,0.05);
                border-radius: 12px;
                padding: 10px 15px;
                width: auto;
                max-width: 340px;
                background: #f8f9f8;
                margin: auto;
            }

            #calendar-vizual .flatpickr-calendar.inline {
                max-width: 520px;
                margin: auto;
            }


            .flatpickr-day.disabled,
            .flatpickr-day.disabled:hover {
                background-color: #f8d7da !important;
                color: #842029 !important;
                cursor: not-allowed;
                border-radius: 8px;
            }

            .flatpickr-day:not(.disabled):not(.today):hover {
                background-color: #d1e7dd !important;
                color: #1c4125 !important;
                border-radius: 8px;
            }

            html, body {
                height: 500%;
                overflow: auto; /* 🚫 blocăm scroll-ul default */
            }

            [data-scroll-container] {
                min-height: 100vh;
                height: auto !important;
                overflow: visible !important;
                position: relative;
            }

            footer {
                padding-top: 60px;
                padding-bottom: 60px;
            }
        </style>

    </head>
    <body data-scroll-container>
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

        <!-- Offcanvas Menu -->
        <!-- Offcanvas Menu -->
        <div class="offcanvas offcanvas-end offcanvas-custom" tabindex="-1" id="menuOffcanvas">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Wolf Chalet</h5>
                <button type="button" class="btn-close custom-close" data-bs-dismiss="offcanvas" aria-label="Închide"></button>

            </div>
            <div class="offcanvas-body">

                <!-- ACASA -->
                <div class="menu-section-title">
                    <i class="fas fa-home"></i>
                    <a href="index.html" class="text-dark text-decoration-none">ACASĂ</a>
                </div>

                <!-- SERVICII -->
                <div class="menu-section-title"><i class="fas fa-briefcase"></i> SERVICII</div>
                <div class="submenu">
                    <a href="atractii_turistice.html">Atracții turistice</a>
                    <a href="cazare.html">Cazare</a>
                </div>

                <!-- GALERIE -->
                <div class="menu-section-title">
                    <i class="fas fa-image"></i>
                    <a href="#" class="text-dark text-decoration-none">GALERIE FOTO</a>
                </div>

                <!-- CONTACT cu submeniu -->
                <div class="menu-section-title position-relative" id="contact-toggle" style="cursor: pointer;">
                    <i class="fas fa-at"></i>
                    <span class="text-dark text-decoration-none">CONTACT</span>
                </div>
                <div class="submenu" id="contact-submenu">
                    <a href="contact.php">Date de contact</a>
                    <a href="rezervari.php">Rezervări</a>
                </div>

            </div>
        </div>

        <div class="container">
            <h1 class="text-center my-5">Completează formularul pentru a rezerva cabana</h1>

            <form id="booking-form" class="row g-3" novalidate>
                <div class="col-md-6"><input type="text" name="nume" class="form-control" placeholder="Nume complet" required /></div>
                <div class="col-md-6"><input type="email" name="email" class="form-control" placeholder="Email" required /></div>
                <div class="col-md-6"><input type="tel" name="telefon" class="form-control" placeholder="Telefon" required /></div>
                <div class="col-md-6"><input type="number"id="guests"name="persoane" class="form-control" placeholder="Număr persoane (minim 8)" required/></div>
                <div class="col-md-6"><input type="text" id="checkin" name="checkin" class="form-control" placeholder="Check-in" required /></div>
                <div class="col-md-6"><input type="text" id="checkout" name="checkout" class="form-control" placeholder="Check-out" required /></div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success">
                        Trimite rezervare <span id="spinner" class="spinner-border spinner-border-sm d-none"></span>
                    </button>
                </div>
                <div class="col-12">
                    <h4 class="mt-5">📆 Verifică disponibilitatea</h4>

                    <div class="row mt-4">
                        <!-- Calendar vizual -->
                        <div class="col-md-8">
                            <div id="calendar-vizual"></div>
                        </div>
                        <!-- Legendă, citat sau imagine -->
                         <div class="col-md-2">
                            <div class="mt-2 ps-md-2">
                                <h6 class="fw-semibold">Legendă:</h6>
                                <ul class="list-unstyled small">
                                    <li>🔴 Zile ocupate</li>
                                    <li>🟢 Zile disponibile</li>
                                    <li>🗓️ Selectează minim 2 nopți</li>
                                </ul>
                                <blockquote class="blockquote fst-italic text-muted mt-8">
                                    „Undeva între brazi și stele, găsești liniștea adevărată.”
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="rezervari-ocupate" class="mt-4">
            <strong>Perioade deja rezervate:</strong>
        </div>

        <!-- Footer -->

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
 <script>
  document.addEventListener("DOMContentLoaded", () => {
    let rezervariExistente = [];

    // 1) Încarcă rezervările și initializează calendar vizual
    fetch('fetch_rezervari.php')
      .then(r => r.json())
      .then(data => {
        rezervariExistente = data;
        const container = document.getElementById("rezervari-ocupate");
        const opt = { year: 'numeric', month: 'short', day: 'numeric' };
        rezervariExistente.forEach(r => {
          const el = document.createElement("div");
          el.textContent = `⛔ ${new Date(r.checkin).toLocaleDateString("ro-RO", opt)} – ${new Date(r.checkout).toLocaleDateString("ro-RO", opt)}`;
          container.appendChild(el);
        });
        initCalendarVizual();
      });

    // Helper pentru disable flatpickr
    const intervaleBlocate = () =>
      rezervariExistente.map(r => ({ from: r.checkin, to: r.checkout }));

    // 2) inițializează input-urile flatpickr
    const checkinCalendar = flatpickr("#checkin", {
      minDate: "today",
      dateFormat: "Y-m-d",
      disable: intervaleBlocate(),
      onChange: (_, dateStr) => checkoutCalendar.set("minDate", dateStr)
    });
    const checkoutCalendar = flatpickr("#checkout", {
      minDate: "today",
      dateFormat: "Y-m-d",
      disable: intervaleBlocate()
    });

    // 3) calendar vizual inline
    function initCalendarVizual() {
      flatpickr(document.createElement("input"), {
        inline: true,
        appendTo: document.getElementById("calendar-vizual"),
        locale: "ro",
        dateFormat: "Y-m-d",
        disable: intervaleBlocate(),
        showMonths: 1
      });
    }

    // 4) trimite formularul prin AJAX cu validări
    document.getElementById("booking-form").addEventListener("submit", e => {
      e.preventDefault();
      const form = e.target;
      const data = new FormData(form);

      const persoane = parseInt(data.get('persoane'), 10);
      const ci = new Date(data.get('checkin'));
      const co = new Date(data.get('checkout'));
      const nopti = (co - ci) / (1000 * 60 * 60 * 24);

      // Validări client-side
      if (persoane < 8) {
        Swal.fire("Eroare", "Trebuie să rezervați cel puțin 8 persoane.", "warning");
        return;
      }
      if (nopti < 2) {
        Swal.fire("Eroare", "Trebuie să rezervați cel puțin 2 nopți.", "warning");
        return;
      }

      const spinner = document.getElementById("spinner");
      spinner.classList.remove("d-none");

      fetch('submit_booking.php', {
        method: 'POST',
        body: data
      })
      .then(r => r.json())
      .then(resp => {
        spinner.classList.add("d-none");
        if (resp.success) {
          rezervariExistente.push({
            checkin: data.get('checkin'),
            checkout: data.get('checkout')
          });
          checkinCalendar.set("disable", intervaleBlocate());
          checkoutCalendar.set("disable", intervaleBlocate());
          const opt = { year: 'numeric', month: 'short', day: 'numeric' };
          const el = document.createElement("div");
          el.textContent = `⛔ ${new Date(data.get('checkin')).toLocaleDateString("ro-RO", opt)} – ${new Date(data.get('checkout')).toLocaleDateString("ro-RO", opt)}`;
          document.getElementById("rezervari-ocupate").appendChild(el);
          form.reset();
          checkinCalendar.clear();
          checkoutCalendar.clear();
          Swal.fire("Rezervare salvată!", "Vă mulțumim, rezervarea a fost înregistrată.", "success");
        } else {
          Swal.fire("Eroare", resp.message || "A apărut o eroare.", "error");
        }
      })
      .catch(() => {
        spinner.classList.add("d-none");
        Swal.fire("Eroare", "Nu s-a putut trimite cererea.", "error");
      });
    });
  });
</script>


        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.4/dist/locomotive-scroll.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();

            const scroll = new LocomotiveScroll({
                el: document.querySelector("[data-scroll-container]"),
                smooth: true
            });

            // Asigură-te că scroll-ul se actualizează după ce totul s-a încărcat
            setTimeout(() => {
                scroll.update();
            }, 100);
        </script>

    </body>
</html>
