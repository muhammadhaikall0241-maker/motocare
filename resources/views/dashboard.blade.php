
@extends('layouts.app')

@section('title', 'Dashboard')

@section('styles')
<style>

/* CINEMATIC INTRO */
.intro-screen {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: grid;
    place-items: center;
    overflow: hidden;
    background: #080909;
    transition: opacity .8s ease, visibility .8s ease;
}

.intro-screen.is-hidden {
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
}

.intro-screen video {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: .65;
}

.intro-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, #080909d9, #08090955, #080909b0);
}

.intro-content {
    position: relative;
    z-index: 2;
    text-align: center;
    padding: 25px;
    animation: introAppear 1.2s ease both;
}

.intro-logo {
    color: #fff;
    font: 800 clamp(35px, 7vw, 65px) 'Manrope', sans-serif;
    letter-spacing: -3px;
}

.intro-logo span {
    color: #c5a66b;
}

.intro-subtitle {
    margin-top: 12px;
    color: #d1c4a7;
    font-size: 10px;
    letter-spacing: 4px;
    text-transform: uppercase;
}

.intro-line {
    width: 65px;
    height: 2px;
    margin: 24px auto;
    background: #c5a66b;
}

.intro-skip {
    position: absolute;
    z-index: 3;
    right: 30px;
    bottom: 28px;
    padding: 11px 17px;
    border: 1px solid #c5a66b88;
    border-radius: 5px;
    background: #11111188;
    color: #eee5d2;
    cursor: pointer;
    font-size: 11px;
    letter-spacing: 1px;
}

.intro-skip:hover {
    background: #c5a66b;
    color: #111;
}

@keyframes introAppear {
    from { opacity: 0; transform: translateY(18px); }
    to { opacity: 1; transform: translateY(0); }
}

    .hero {
        min-height: 340px;
        position: relative;
        overflow: hidden;
        border: 1px solid #665638;
        border-radius: 12px;
        background: #171819;
        isolation: isolate;
    }

    .hero:before {
        content: "";
        position: absolute;
        inset: 0;
        z-index: -1;
        background:
            linear-gradient(90deg, #101112 0%, #101112e8 38%, #10111235 100%),
            url('https://images.unsplash.com/photo-1558981806-ec527fa84c39?auto=format&fit=crop&w=1800&q=85')
            center 55% / cover;
        animation: heroReveal 1.2s ease both;
    }

    .hero-video {
        position: absolute;
        inset: 0;
        z-index: -2;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: .65;
    }

    .hero-content {
        max-width: 620px;
        padding: 48px 42px;
    }

    .hero .eyebrow {
        color: #c5a66b;
        letter-spacing: 2.5px;
    }

    .hero h1 {
        font-size: clamp(30px, 4vw, 48px);
        line-height: 1.12;
        margin: 0 0 15px;
        color: #fff;
    }

    .hero p {
        color: #d1cec4;
        font-size: 13px;
        line-height: 1.9;
    }

    .hero-tag {
        border-color: #a78b58;
        color: #e6d5b2;
        letter-spacing: 1.5px;
    }

    .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 11px;
        margin-top: 22px;
    }

    .hero-link {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 12px 17px;
        border-radius: 5px;
        background: linear-gradient(135deg, #c5a66b, #987747);
        color: #171717;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        transition: .25s;
    }

    .hero-link:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px #c5a66b35;
    }

    .dashboard-heading {
        margin: 34px 0 22px;
    }

    .dashboard-heading h1 {
        color: #f0eee8;
    }

    .stat {
        background: linear-gradient(145deg, #1d1e20, #171819);
        border-color: #343536;
    }

    .stat:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 35px;
        height: 2px;
        background: #c5a66b;
        opacity: .8;
    }

    .stat-value {
        color: #f4efe3;
    }

    .dashboard-grid {
        align-items: stretch;
    }

    .visual-card {
        min-height: 250px;
        border: 1px solid #343536;
        background: #171819;
    }

    .visual-card img {
        height: 250px;
    }

    .visual-caption {
        padding: 48px 21px 21px;
    }

    .visual-caption strong {
        color: #f2eee3;
    }

    .visual-caption span {
        line-height: 1.7;
    }

    .box {
        background: #1b1c1e;
    }

    .box-head {
        color: #e9e6dc;
    }

    @keyframes heroReveal {
        from {
            opacity: .3;
            transform: scale(1.06);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @media(max-width:700px) {
        .hero {
            min-height: 330px;
        }

        .hero-content {
            padding: 32px 23px;
        }

        .hero:before {
            background:
                linear-gradient(90deg, #101112eF, #10111288),
                url('https://images.unsplash.com/photo-1558981806-ec527fa84c39?auto=format&fit=crop&w=1000&q=85')
                center / cover;
        }
    }

    @media(prefers-reduced-motion:reduce) {
        .hero:before {
            animation: none;
        }
    }
</style>
@endsection

@section('content')

<div class="intro-screen" id="motocareIntro">
    <video id="introVideo" autoplay muted playsinline preload="auto">
        <source src="{{ asset('videos/motocare-intro.mp4') }}" type="video/mp4">
    </video>

    <div class="intro-overlay"></div>

    <div class="intro-content">
        <div class="intro-logo">MOTO<span>CARE</span></div>
        <div class="intro-line"></div>
        <div class="intro-subtitle">Motorcycle Service Platform</div>
    </div>

    <button type="button" class="intro-skip" id="skipIntro">
        SKIP INTRO →
    </button>
</div>


<div class="hero">

    <video class="hero-video"
           autoplay
           muted
           loop
           playsinline
           poster="https://images.unsplash.com/photo-1558981806-ec527fa84c39?auto=format&fit=crop&w=1800&q=85">
        <source src="{{ asset('videos/motocare-intro.mp4') }}" type="video/mp4">
    </video>

    <div class="hero-content">
        <div class="eyebrow">MotoCare • Workshop Management</div>

        <h1>
            Perawatan tepat.<br>
            Perjalanan lebih hebat.
        </h1>

        <p>
            Kelola pelanggan, kendaraan, proses servis, hingga pembayaran
            dalam satu sistem manajemen bengkel yang modern dan terorganisasi.
        </p>

        <span class="hero-tag">Motorcycle Service Platform</span>

        <div class="hero-actions">
            <a href="{{ route('panel.index', 'service-registrations') }}" class="hero-link">
                + Pendaftaran Servis
            </a>
        </div>
    </div>
</div>

<div class="heading dashboard-heading">
    <div>
        <div class="eyebrow">Ringkasan Operasional</div>
        <h1>Dashboard</h1>
        <div class="sub">
            Pantau aktivitas bengkel dan data MotoCare hari ini.
        </div>
    </div>
</div>

<div class="cards">

    <div class="stat">
        <div class="stat-label">Total pelanggan</div>
        <div class="stat-icon">01</div>
        <div class="stat-value" data-counter="{{ $stats['customers'] }}">
            {{ number_format($stats['customers'], 0, ',', '.') }}
        </div>
        <div class="stat-foot">Data pelanggan terdaftar</div>
    </div>

    <div class="stat">
        <div class="stat-label">Total kendaraan</div>
        <div class="stat-icon">02</div>
        <div class="stat-value" data-counter="{{ $stats['vehicles'] }}">
            {{ number_format($stats['vehicles'], 0, ',', '.') }}
        </div>
        <div class="stat-foot">Kendaraan dalam sistem</div>
    </div>

    <div class="stat">
        <div class="stat-label">Pendaftaran servis</div>
        <div class="stat-icon">03</div>
        <div class="stat-value" data-counter="{{ $stats['registrations'] }}">
            {{ number_format($stats['registrations'], 0, ',', '.') }}
        </div>
        <div class="stat-foot">Total servis tercatat</div>
    </div>

    <div class="stat">
        <div class="stat-label">Total pembayaran</div>
        <div class="stat-icon">04</div>
        <div class="stat-value" style="font-size:22px">
            Rp {{ number_format((float) $stats['payments'], 0, ',', '.') }}
        </div>
        <div class="stat-foot">Akumulasi pembayaran</div>
    </div>

</div>

<div class="dashboard-grid">

    <div class="box">
        <div class="box-head">
            <span>Aktivitas servis terbaru</span>

            <a class="btn light small"
               href="{{ route('panel.index', 'service-registrations') }}">
                Lihat semua
            </a>
        </div>

        @if($recent->count())
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pelanggan</th>
                        <th>Kendaraan</th>
                        <th>Tanggal</th>
                        <th>Keluhan</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($recent as $item)
                        <tr>
                            <td>#{{ $item->id }}</td>
                            <td>{{ $item->customer->name ?? '-' }}</td>
                            <td>{{ $item->vehicle->plate_number ?? '-' }}</td>
                            <td>
                                {{ $item->service_date
                                    ? \Illuminate\Support\Carbon::parse($item->service_date)->format('d/m/Y')
                                    : '-' }}
                            </td>
                            <td>
                                {{ \Illuminate\Support\Str::limit($item->complaint ?? '-', 32) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty">
                Belum ada aktivitas servis. Pendaftaran servis yang baru
                akan muncul di sini.
            </div>
        @endif
    </div>

    <div class="visual-card">
        <img
            src="https://images.unsplash.com/photo-1485965120184-e220f721d03e?auto=format&fit=crop&w=900&q=85"
            alt="Sepeda motor"
            loading="lazy">

        <div class="visual-caption">
            <strong>Workshop, lebih terorganisasi.</strong>
            <span>Semua informasi servis dalam satu sistem.</span>
        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const intro = document.getElementById('motocareIntro');
    const video = document.getElementById('introVideo');
    const skip = document.getElementById('skipIntro');

    if (!intro || !video) return;

    const backgroundVideo = document.querySelector('.hero-video');

    function closeIntro() {
        if (intro.classList.contains('is-hidden')) return;

        intro.classList.add('is-hidden');

        video.pause();

        if (backgroundVideo) {
            backgroundVideo.play().catch(() => {});
        }

        sessionStorage.setItem('motocareIntroSeen', 'yes');
    }

    if (sessionStorage.getItem('motocareIntroSeen') === 'yes') {
        closeIntro();
        return;
    }

    if (backgroundVideo) {
        backgroundVideo.pause();
    }

    skip.addEventListener('click', closeIntro);

    video.addEventListener('ended', closeIntro);

    setTimeout(closeIntro, 7000);

    video.play().catch(() => {
        // Intro tetap bisa dilewati jika autoplay tidak diizinkan.
    });
});
</script>

@endsection
