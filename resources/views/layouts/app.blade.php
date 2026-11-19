
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#111210">
    <title>@yield('title', 'Dashboard') - MotoCare</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --ink: #f0eee7;
            --ink2: #d5d1c5;
            --paper: #111210;
            --white: #191a17;
            --stone: #252620;
            --muted: #929187;
            --line: #30312a;
            --brass: #c4a66b;
            --green: #8ba78a;
            --red: #c77d70;
            --sidebar: 255px;
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            background: var(--paper);
            color: var(--ink);
            font: 14px 'DM Sans', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        a { color: inherit; }
        button, input, select, textarea { font: inherit; }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 30;
            width: var(--sidebar);
            padding: 28px 19px;
            display: flex;
            flex-direction: column;
            background: #0b0c0a;
            color: #f7f5ee;
            border-right: 1px solid #292a23;
            transition: transform .32s ease;
        }

        .brand {
            padding: 5px 10px 35px;
            font: 800 25px 'Manrope', sans-serif;
            letter-spacing: -1.5px;
        }

        .brand span { color: var(--brass); }

        .brand-caption {
            display: block;
            margin-top: 5px;
            color: #77776d;
            font: 9px 'DM Sans', sans-serif;
            letter-spacing: 2.2px;
            text-transform: uppercase;
        }

        .nav-label {
            padding: 12px 11px;
            color: #77776d;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.7px;
            text-transform: uppercase;
        }

        .nav { display: grid; gap: 6px; }

        .nav a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 11px;
            border: 1px solid transparent;
            border-radius: 7px;
            color: #b9b8af;
            text-decoration: none;
            font-size: 13px;
            transition: .22s;
        }

        .nav a:hover {
            background: #20211c;
            color: #fff;
            transform: translateX(3px);
        }

        .nav a.active {
            background: #27271f;
            border-color: #51452f;
            color: #fff;
        }

        .nav-mark {
            width: 25px;
            height: 25px;
            display: grid;
            place-items: center;
            border: 1px solid #514a3b;
            border-radius: 6px;
            color: var(--brass);
            font-size: 9px;
            font-weight: 700;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 17px 11px 0;
            border-top: 1px solid #303129;
            color: #85847b;
            font-size: 11px;
            line-height: 1.8;
        }

        .sidebar-bottom strong {
            display: block;
            color: #e5e2d8;
            font-size: 12px;
        }

        /* MAIN AREA */
        .main {
            min-height: 100vh;
            margin-left: var(--sidebar);
            background:
                radial-gradient(ellipse at 85% 0%, #29251a22, transparent 38%),
                var(--paper);
        }

        .topbar {
            height: 72px;
            padding: 0 42px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--line);
            background: #111210eF;
            backdrop-filter: blur(14px);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .topbar-left, .topbar-right {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .topbar-title {
            color: #aaa99e;
            font-size: 12px;
            letter-spacing: .3px;
        }

        .topbar-right {
            color: #aaa99e;
            font-size: 12px;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #8ba78a;
            box-shadow: 0 0 0 4px #8ba78a1b;
        }

        .mobile-toggle {
            display: none;
            width: 36px;
            height: 36px;
            border: 1px solid var(--line);
            border-radius: 7px;
            background: var(--white);
            color: var(--brass);
            cursor: pointer;
        }

        .content {
            width: 100%;
            max-width: 1500px;
            margin: auto;
            padding: 39px 42px 55px;
            animation: pageIn .5s ease both;
        }

        @keyframes pageIn {
            from { opacity: 0; transform: translateY(9px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1, h2, h3 {
            font-family: 'Manrope', sans-serif;
            letter-spacing: -.8px;
            color: #f1efe8;
        }

        h1 {
            margin: 0 0 7px;
            font-size: clamp(25px, 3vw, 34px);
            font-weight: 700;
        }

        .sub {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .eyebrow {
            margin-bottom: 10px;
            color: var(--brass);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        /* BUTTONS */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 16px;
            border: 1px solid transparent;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
        }

        .btn:hover { transform: translateY(-2px); }

        .primary {
            background: var(--brass);
            color: #17150f;
        }

        .primary:hover { background: #d5b77b; }

        .light {
            background: #292a23;
            color: #e8e5db;
            border-color: #414137;
        }

        .danger {
            background: #392622;
            color: #e3a095;
            border-color: #59372f;
        }

        .small { padding: 7px 10px; font-size: 11px; }

        /* STAT CARDS */
        .cards {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 15px;
            margin-bottom: 27px;
        }

        .stat, .box, .formbox {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 9px;
        }

        .stat {
            position: relative;
            overflow: hidden;
            min-height: 140px;
            padding: 20px;
            transition: .25s;
        }

        .stat:hover {
            transform: translateY(-4px);
            border-color: #776443;
            box-shadow: 0 12px 28px #0005;
        }

        .stat-label { color: #a19f93; font-size: 12px; }

        .stat-value {
            margin-top: 17px;
            font: 700 29px 'Manrope', sans-serif;
            letter-spacing: -1.2px;
            color: #f3eee2;
        }

        .stat-icon {
            position: absolute;
            top: 17px;
            right: 18px;
            color: var(--brass);
            font-size: 17px;
        }

        .stat-foot {
            margin-top: 7px;
            color: #85847b;
            font-size: 10px;
        }

        /* TABLE */
        .box {
            overflow: hidden;
            box-shadow: 0 4px 16px #0002;
        }

        .box-head {
            min-height: 60px;
            padding: 19px 21px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            border-bottom: 1px solid var(--line);
            font: 700 13px 'Manrope', sans-serif;
            color: #eeeae0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: var(--white);
        }

        th, td {
            padding: 15px 19px;
            border-bottom: 1px solid #2b2c25;
            text-align: left;
            vertical-align: middle;
            font-size: 12px;
        }

        th {
            background: #20211c;
            color: #aaa797;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        tbody tr { transition: background .2s; }
        tbody tr:hover { background: #24251f; }
        tr:last-child td { border-bottom: 0; }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .actions form { margin: 0; }
        .money { font-weight: 700; color: var(--brass); }

        .pagination { padding: 15px; }
        .pagination nav { display: flex; justify-content: space-between; }

        .pagination a, .pagination span {
            padding: 7px 10px;
            color: var(--brass);
            text-decoration: none;
            font-size: 12px;
        }

        .empty {
            padding: 38px 20px;
            color: var(--muted);
            text-align: center;
            font-size: 12px;
        }

        /* NOTIFICATIONS */
        .alert {
            margin-bottom: 19px;
            padding: 14px 17px;
            border: 1px solid transparent;
            border-radius: 7px;
            font-size: 12px;
            animation: pageIn .3s ease both;
        }

        .success {
            background: #202b20;
            border-color: #394d37;
            color: #a9c7a4;
        }

        .error {
            background: #30201d;
            border-color: #59372f;
            color: #e3a095;
        }

        /* FORMS */
        .formbox {
            max-width: 960px;
            padding: 27px;
        }

        .fields {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .field.full { grid-column: 1 / -1; }

        label {
            display: block;
            margin-bottom: 8px;
            color: #c5c1b5;
            font-size: 12px;
            font-weight: 600;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #414138;
            border-radius: 6px;
            outline: none;
            background: #20211c;
            color: #eeeae0;
            font-size: 13px;
            transition: border-color .2s, box-shadow .2s;
        }

        input:focus, select:focus, textarea:focus {
            border-color: var(--brass);
            background: #24251f;
            box-shadow: 0 0 0 3px #c4a66b20;
        }

        input::placeholder, textarea::placeholder { color: #77766c; }

        select option {
            background: #20211c;
            color: #eeeae0;
        }

        textarea { min-height: 105px; resize: vertical; }

        .error-text {
            margin-top: 6px;
            color: #e39b8f;
            font-size: 11px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid var(--line);
        }

        /* DASHBOARD HERO */
        .hero {
            position: relative;
            min-height: 310px;
            margin-bottom: 25px;
            overflow: hidden;
            border: 1px solid #48402e;
            border-radius: 10px;
            background: #20211c;
            color: #fff;
            isolation: isolate;
        }

        .hero:before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            background:
                linear-gradient(90deg, #10110ff2 0%, #10110fce 42%, #10110f20 100%),
                url('https://images.unsplash.com/photo-1558981806-ec527fa84c39?auto=format&fit=crop&w=1800&q=85')
                center 55% / cover;
            transform: scale(1.015);
            transition: transform 1s ease;
        }

        .hero:hover:before { transform: scale(1.055); }

        /* Video background for dashboard */
        .hero video {
            position: absolute;
            inset: 0;
            z-index: -2;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 560px;
            padding: 42px 40px;
        }

        .hero .eyebrow { color: #d4b879; }

        .hero h1 {
            max-width: 500px;
            margin-bottom: 12px;
            font-size: clamp(28px, 4vw, 43px);
            line-height: 1.12;
            color: #fff;
        }

        .hero p {
            max-width: 440px;
            color: #d2d0c7;
            font-size: 13px;
            line-height: 1.8;
        }

        .hero-tag {
            display: inline-flex;
            margin-top: 12px;
            padding: 8px 11px;
            border: 1px solid #c4a66b77;
            border-radius: 4px;
            color: #e7d7b7;
            font-size: 10px;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        /* DASHBOARD VISUAL */
        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.5fr) minmax(240px, .8fr);
            gap: 17px;
        }

        .visual-card {
            min-height: 210px;
            position: relative;
            overflow: hidden;
            border: 1px solid #39392f;
            border-radius: 9px;
            background: #20211c;
            color: #fff;
        }

        .visual-card img {
            width: 100%;
            height: 210px;
            object-fit: cover;
            display: block;
            opacity: .72;
            transition: transform .6s;
        }

        .visual-card:hover img { transform: scale(1.04); }

        .visual-caption {
            position: absolute;
            inset: auto 0 0;
            padding: 35px 20px 18px;
            background: linear-gradient(transparent, #10110fee);
        }

        .visual-caption strong {
            display: block;
            font: 700 15px 'Manrope', sans-serif;
        }

        .visual-caption span {
            display: block;
            margin-top: 5px;
            color: #d5d0c4;
            font-size: 11px;
        }

        .mobile-overlay {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 20;
            background: #000a;
        }

        /* RESPONSIVE */
        @media(max-width: 1050px) {
            .content { padding: 30px 25px; }
            .topbar { padding: 0 25px; }
            .cards { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media(max-width: 760px) {
            .dashboard-grid { grid-template-columns: 1fr; }
        }

        @media(max-width: 700px) {
            .sidebar { transform: translateX(-100%); }

            body.menu-open .sidebar { transform: translateX(0); }
            body.menu-open .mobile-overlay { display: block; }

            .main { margin-left: 0; }
            .topbar { height: 62px; padding: 0 16px; }

            .mobile-toggle {
                display: grid;
                place-items: center;
            }

            .content { padding: 26px 16px 40px; }
            .cards { gap: 10px; }

            .stat {
                min-height: 120px;
                padding: 15px;
            }

            .stat-value { font-size: 23px; }
            .fields { grid-template-columns: 1fr; }
            .field.full { grid-column: auto; }

            .heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .box { overflow-x: auto; }
            table { min-width: 650px; }
            .topbar-title { display: none; }
            .hero-content { padding: 30px 23px; }
            .hero { min-height: 290px; }
        }

        
/* VIDEO BANNER DI SEMUA HALAMAN */
.page-video {
    height: 260px;
    position: relative;
    overflow: hidden;
    border-bottom: 1px solid #51452f;
    background: #111;
}

.page-video video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: .48;
}

.page-video::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, #111210 0%, #11121088 55%, #11121033 100%);
}

/* LOADING SCREEN */
.motocare-loader {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 15px;
    background: #10110f;
    opacity: 0;
    visibility: hidden;
    transition: opacity .25s ease, visibility .25s ease;
}

.motocare-loader.active {
    opacity: 1;
    visibility: visible;
}

.loader-gear {
    color: #c4a66b;
    font-size: 55px;
    animation: gearSpin 2s linear infinite;
}

/* MOTOR BERGERAK SAAT LOADING */
.loader-bike-track {
    position: relative;
    width: 260px;
    height: 55px;
    overflow: hidden;
    border-bottom: 2px solid #665638;
}

.loader-bike {
    position: absolute;
    left: -55px;
    bottom: 5px;
    font-size: 38px;
    animation: bikeRide 1.8s ease-in-out infinite;
}

@keyframes bikeRide {
    0% {
        left: -55px;
        transform: translateY(0);
    }
    45% {
        transform: translateY(-5px);
    }
    100% {
        left: 270px;
        transform: translateY(0);
    }
}

.loader-brand {
    color: #f0eee7;
    font: 800 23px 'Manrope', sans-serif;
    letter-spacing: 2px;
}

.loader-brand span {
    color: #c4a66b;
}

.loader-text {
    color: #929187;
    font-size: 11px;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.loader-track {
    width: 190px;
    height: 3px;
    overflow: hidden;
    border-radius: 10px;
    background: #30312a;
}

.loader-progress {
    width: 40%;
    height: 100%;
    background: #c4a66b;
    animation: loaderMove 1.2s ease-in-out infinite;
}

@keyframes gearSpin {
    to { transform: rotate(360deg); }
}

@keyframes loaderMove {
    0% { transform: translateX(-110%); }
    100% { transform: translateX(350%); }
}

/* ANIMASI KONTEN */
.content {
    animation: pageIn .55s ease both;
}

@media(max-width: 700px) {
    .page-video { height: 170px; }
}
onclick="document.body.classList.remove('menu-open')"></div>
@media(prefers-reduced-motion: reduce) {
    .loader-gear,
    .loader-progress {
        animation: none;
    }
}

        @media(prefers-reduced-motion: reduce) {
            *, *:before, *:after {
                scroll-behavior: auto !important;
                animation-duration: .01ms !important;
                transition-duration: .01ms !important;
            }
        }
        
/* OIL DROPLETS - REALISTIC GLASS SPLASH */
.oil-splash {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    pointer-events: none;
    overflow: hidden;
}

.oil-splash::before {
    content: "";
    position: absolute;
    inset: -5%;
    background:
        radial-gradient(ellipse 38px 52px at 8% 16%, #101311 55%, #050606 78%, transparent 82%),
        radial-gradient(ellipse 17px 25px at 18% 35%, #171b18 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 55px 38px at 28% 12%, #111512 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 23px 34px at 43% 25%, #171b18 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 68px 45px at 52% 8%, #101311 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 25px 38px at 70% 20%, #171b18 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 48px 64px at 90% 14%, #101311 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 35px 48px at 12% 75%, #171b18 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 60px 42px at 30% 88%, #101311 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 20px 30px at 48% 72%, #171b18 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 45px 60px at 68% 85%, #101311 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 30px 43px at 88% 72%, #171b18 55%, #050606 80%, transparent 85%);

    filter: drop-shadow(0 3px 5px rgba(0,0,0,.9));
    animation: oilDrip 10s ease-in forwards;
}

.oil-splash::after {
    content: "";
    position: absolute;
    inset: -5%;
    background:
        radial-gradient(ellipse 12px 17px at 5% 48%, #171b18 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 9px 13px at 22% 65%, #171b18 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 15px 21px at 38% 48%, #101311 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 11px 16px at 60% 38%, #171b18 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 17px 24px at 78% 48%, #101311 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 12px 17px at 95% 42%, #171b18 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 8px 12px at 42% 92%, #101311 55%, #050606 80%, transparent 85%),
        radial-gradient(ellipse 14px 20px at 95% 92%, #171b18 55%, #050606 80%, transparent 85%);

    filter: drop-shadow(0 2px 4px #000);
    animation: oilDrip 10s ease-in forwards;
}

/* PREMIUM TYPOGRAPHY */
.oil-success-message {
    position: relative;
    z-index: 2;
    color: #f4f0e6;
    font-family: 'Arial', sans-serif;
    font-size: clamp(20px, 3vw, 34px);
    font-weight: 800;
    letter-spacing: 7px;
    text-align: center;
    text-transform: uppercase;
    text-shadow: 0 3px 15px rgba(0,0,0,.9);
    animation: messageOut 10s ease-in forwards;
}

/* OIL FLOW DOWN */
@keyframes oilDrip {
    0% {
        opacity: 0;
        transform: translateY(-15px);
    }

    8% {
        opacity: 1;
        transform: translateY(0);
    }

    65% {
        opacity: 1;
        transform: translateY(0);
    }

    85% {
        opacity: .8;
        transform: translateY(12vh);
    }

    100% {
        opacity: 0;
        transform: translateY(40vh);
    }
}

@keyframes messageOut {
    0%, 65% {
        opacity: 1;
        transform: translateY(0);
    }

    85% {
        opacity: .5;
        transform: translateY(10px);
    }

    100% {
        opacity: 0;
        transform: translateY(20px);
    }
}


/* ERROR ANIMATION */
.oil-error-effect {
    animation: errorFade 2.8s forwards;
}

.error-symbol {
    width: 100px;
    height: 100px;
    border: 4px solid #e05245;
    border-radius: 50%;
    color: #ff6254;
    font-size: 65px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 0 35px rgba(224, 82, 69, .4);
    animation: errorShake .55s ease;
}

.error-message {
    margin-top: 25px;
    color: #ff7669;
    font-size: 19px;
    font-weight: 800;
    letter-spacing: 2px;
    text-align: center;
    opacity: 0;
    animation: effectText .5s ease .3s forwards;
}

.error-detail {
    margin-top: 10px;
    color: #eee;
    font-size: 13px;
    text-align: center;
    max-width: 85%;
    opacity: 0;
    animation: effectText .5s ease .5s forwards;
}

@keyframes errorShake {
    0%, 100% { transform: translateX(0); }
    20%, 60% { transform: translateX(-12px); }
    40%, 80% { transform: translateX(12px); }
}

@keyframes errorFade {
    0%, 75% { opacity: 1; }
    100% { opacity: 0; visibility: hidden; }
}

    </style>

    @yield('styles')
</head>


<body>

<!-- LOADING ANIMATION -->
<div class="motocare-loader" id="motocareLoader">
    <div class="loader-gear">⚙</div>
    <div class="loader-brand">MOTO<span>CARE</span></div>
    <div class="loader-text">Preparing your workshop...</div>
    <div class="loader-track">
        <div class="loader-progress"></div>
    </div>
</div>

<div class="mobile-overlay" onclick="document.body.classList.remove('menu-open')"></div>


<aside class="sidebar">
    <div class="brand">
        MOTO<span>CARE</span>
        <span class="brand-caption">Motorcycle service platform</span>
    </div>

    <div class="nav-label">Workspace</div>

    <nav class="nav">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <span class="nav-mark">DB</span>Dashboard
        </a>

        <a href="{{ route('panel.index','customers') }}" class="{{ request()->is('panel/customers*') ? 'active' : '' }}">
            <span class="nav-mark">01</span>Pelanggan
        </a>

        <a href="{{ route('panel.index','vehicles') }}" class="{{ request()->is('panel/vehicles*') ? 'active' : '' }}">
            <span class="nav-mark">02</span>Kendaraan
        </a>

        <a href="{{ route('panel.index','service-registrations') }}" class="{{ request()->is('panel/service-registrations*') ? 'active' : '' }}">
            <span class="nav-mark">03</span>Pendaftaran Servis
        </a>

        <a href="{{ route('panel.index','service-details') }}" class="{{ request()->is('panel/service-details*') ? 'active' : '' }}">
            <span class="nav-mark">04</span>Detail Servis
        </a>

        <a href="{{ route('panel.index','service-payments') }}" class="{{ request()->is('panel/service-payments*') ? 'active' : '' }}">
            <span class="nav-mark">05</span>Pembayaran
        </a>
    </nav>

    <div class="sidebar-bottom">
        <strong>MotoCare Management</strong>
        Motorcycle Service System<br>
        Version 1.0
    </div>
</aside>

<div class="main">
    <header class="topbar">
        <div class="topbar-left">
            <button class="mobile-toggle" onclick="document.body.classList.toggle('menu-open')" aria-label="Buka menu">
                ☰
            </button>
            <span class="topbar-title">MOTOCARE / @yield('title','Dashboard')</span>
        </div>

        <div class="topbar-right">
            <span class="status-dot"></span>
            <span>Workspace aktif</span>
        </div>
    
</header>

<!-- VIDEO BACKGROUND UNTUK SEMUA HALAMAN -->
<div class="page-video">
    <video autoplay muted loop playsinline preload="none">
        <source src="{{ asset('videos/motocare-intro.mp4') }}" type="video/mp4">
    </video>
</div>

<section class="content">

        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif
        @if(session('success'))
    <div class="oil-success-effect">
        <div class="oil-splash"></div>
        <div class="oil-success-message">
            DATA BERHASIL DISIMPAN
        </div>
    </div>
@endif

@if(session('error') || $errors->any())
    <div class="oil-error-effect">
        <div class="error-symbol">!</div>
        <div class="error-message">
            DATA GAGAL DIPROSES
        </div>
        <div class="error-detail">
            @if($errors->any())
                {{ $errors->first() }}
            @else
                {{ session('error') }}
            @endif
        </div>
    </div>
@endif

        @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert error">Periksa kembali data yang kamu masukkan.</div>
        @endif

        @yield('content')
    </section>
</div>

<script>

// LOADING SAAT PINDAH MENU
const loader = document.getElementById('motocareLoader');

document.querySelectorAll('.nav a').forEach(function(link) {
    link.addEventListener('click', function(event) {
        const href = link.getAttribute('href');

        if (
            !href ||
            href.startsWith('#') ||
            event.ctrlKey ||
            event.metaKey ||
            event.shiftKey ||
            event.altKey ||
            event.button !== 0
        ) {
            return;
        }

        if (loader) {
            loader.classList.add('active');
        }
    });
});

// Pastikan loading hilang saat halaman tampil kembali
window.addEventListener('pageshow', function() {
    if (loader) {
        loader.classList.remove('active');
    }
});

document.querySelectorAll('.alert').forEach(function(el) {
    window.setTimeout(function() {
        el.style.transition = 'opacity .4s,transform .4s';
        el.style.opacity = '0';
        el.style.transform = 'translateY(-6px)';

        window.setTimeout(function() {
            el.remove();
        }, 450);
    }, 5000);
});

document.querySelectorAll('.nav a.active').forEach(function(link) {
    link.setAttribute('aria-current', 'page');
});

document.querySelectorAll('[data-counter]').forEach(function(el) {
    var target = Number(el.dataset.counter || 0);
    var start = 0;
    var duration = 650;
    var begin = null;

    function tick(t) {
        if (!begin) begin = t;

        var p = Math.min((t - begin) / duration, 1);
        el.textContent = Math.round(target * (1 - Math.pow(1 - p, 3))).toLocaleString('id-ID');

        if (p < 1) requestAnimationFrame(tick);
    }

    requestAnimationFrame(tick);
});
</script>

@yield('scripts')
</body>
</html>
