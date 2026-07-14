@extends('master')

@section('title', 'Event - Arusha Debate Championship 2026')

@section('canonical', 'https://www.tands.or.tz/ADC2026')

@section('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        :root {
            --gold:    #C9A84C;
            --gold-lt: #E8C97A;
            --navy:    #0B1A2E;
            --navy-md: #162742;
            --navy-lt: #1E3558;
            --cream:   #F5F0E8;
            --muted:   #8A9AB5;
            --white:   #FFFFFF;
            --radius:  10px;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--cream);
            color: var(--navy);
            overflow-x: hidden;
        }

        /* ─── HERO ─────────────────────────────────────────────── */
        .hero {
            position: relative;
            min-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
            background: var(--navy);
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background: url('/public/Images/ADC2026/hero.jpg') center/cover no-repeat;
            opacity: .18;
            transform: scale(1.04);
            animation: slow-zoom 18s ease-in-out infinite alternate;
        }

        @keyframes slow-zoom {
            from { transform: scale(1.04); }
            to   { transform: scale(1.12); }
        }

        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(201,168,76,.01) 1px, transparent 1px),
                linear-gradient(90deg, rgba(201,168,76,.01) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        .hero-inner {
            position: relative;
            z-index: 2;
            padding: 40px 20px;
            animation: fade-up .9s ease both;
        }

        @keyframes fade-up {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .hero-eyebrow {
            display: inline-block;
            font-size: .78rem;
            font-weight: 500;
            letter-spacing: .22em;
            text-transform: uppercase;
            color: var(--gold);
            border: 1px solid rgba(201,168,76,.4);
            padding: 6px 18px;
            border-radius: 100px;
            margin-bottom: 28px;
            backdrop-filter: blur(4px);
        }

        .hero h1 {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(2.6rem, 7vw, 5.5rem);
            font-weight: 900;
            color: var(--white);
            line-height: 1.1;
            margin-bottom: 18px;
        }

        .hero h1 span { color: var(--gold); font-style: italic; }

        .hero-meta {
            font-size: 1.05rem;
            color: var(--muted);
            margin-bottom: 38px;
            letter-spacing: .03em;
        }

        .hero-meta a { color: var(--gold-lt); text-decoration: none; }
        .hero-meta a:hover { text-decoration: underline; }

        .hero-divider {
            width: 80px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            margin: 0 auto 38px;
        }

        .hero-cta {
            display: inline-flex;
            gap: 14px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn-gold {
            display: inline-block;
            padding: 13px 32px;
            background: var(--gold);
            color: var(--navy);
            font-weight: 500;
            font-size: .95rem;
            border-radius: var(--radius);
            text-decoration: none;
            transition: background .25s, transform .2s;
        }
        .btn-gold:hover { background: var(--gold-lt); transform: translateY(-2px); }

        .btn-ghost {
            display: inline-block;
            padding: 13px 32px;
            border: 1px solid rgba(201,168,76,.5);
            color: var(--gold-lt);
            font-size: .95rem;
            border-radius: var(--radius);
            text-decoration: none;
            transition: border-color .25s, color .25s, transform .2s;
        }
        .btn-ghost:hover { border-color: var(--gold); color: var(--gold); transform: translateY(-2px); }

        .scroll-hint {
            position: absolute;
            bottom: 32px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            color: rgba(255,255,255,.35);
            font-size: .72rem;
            letter-spacing: .12em;
            text-transform: uppercase;
            z-index: 2;
            animation: bounce 2.4s ease-in-out infinite;
        }
        .scroll-hint svg { width: 18px; opacity: .5; }
        @keyframes bounce {
            0%,100% { transform: translateX(-50%) translateY(0); }
            50%      { transform: translateX(-50%) translateY(8px); }
        }

        /* ─── FLOATING DOWNLOAD ─────────────────────────────────── */
        .floating-download {
            position: fixed;
            top: 110px;
            right: 24px;
            z-index: 999;
        }

        .floating-download a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 20px;
            background: var(--gold);
            color: var(--navy);
            font-weight: 600;
            font-size: .88rem;
            border-radius: var(--radius);
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(201,168,76,.35);
            transition: background .25s, transform .2s;
        }
        .floating-download a:hover { background: var(--gold-lt); transform: translateY(-2px); }
        .floating-download svg { width: 16px; flex-shrink: 0; }

        /* ─── SECTION SHARED ────────────────────────────────────── */
        section { padding: 80px 0; }

        .container {
            width: min(1160px, 92%);
            margin: 0 auto;
        }

        .section-label {
            display: inline-block;
            font-size: .72rem;
            font-weight: 500;
            letter-spacing: .2em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 12px;
        }

        .section-title {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(1.9rem, 4vw, 3rem);
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 18px;
            line-height: 1.2;
        }

        .section-lead {
            font-size: 1.05rem;
            color: #4A5568;
            max-width: 660px;
            line-height: 1.75;
        }

        .title-rule {
            width: 52px;
            height: 3px;
            background: var(--gold);
            border-radius: 2px;
            margin-bottom: 22px;
        }

        /* ─── ABOUT ─────────────────────────────────────────────── */
        .about-section { background: var(--white); }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 70px;
            align-items: center;
            margin-top: 60px;
        }

        .about-image-wrap { position: relative; }

        .about-image-wrap img {
            width: 100%;
            border-radius: 12px;
            object-fit: cover;
            aspect-ratio: 4/3;
            display: block;
        }

        .about-badge {
            position: absolute;
            bottom: -22px;
            right: -22px;
            width: 120px;
            height: 120px;
            background: var(--gold);
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--navy);
            font-weight: 700;
            line-height: 1.2;
            font-size: .8rem;
            box-shadow: 0 8px 24px rgba(201,168,76,.4);
            padding: 10px;
        }

        .about-badge .year {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 900;
        }

        .stat-row {
            display: flex;
            gap: 36px;
            margin-top: 36px;
            flex-wrap: wrap;
        }

        .stat-item { border-left: 3px solid var(--gold); padding-left: 16px; }
        .stat-num {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 900;
            color: var(--navy);
        }
        .stat-label { font-size: .82rem; color: var(--muted); font-weight: 500; }

        /* ─── GALLERY ────────────────────────────────────────────── */
        .gallery-section { background: var(--navy); }
        .gallery-section .section-label { color: var(--gold); }
        .gallery-section .section-title { color: var(--white); }
        .gallery-section .title-rule { background: var(--gold); }
        .gallery-section .section-lead { color: var(--muted); }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-top: 48px;
        }

        .gallery-card {
            border: 1px solid rgba(201,168,76,.25);
            border-radius: 12px;
            padding: 28px 24px;
            text-align: center;
            transition: border-color .25s, transform .25s;
            backdrop-filter: blur(4px);
            background: rgba(255,255,255,.03);
        }
        .gallery-card:hover { border-color: var(--gold); transform: translateY(-4px); }

        .gallery-icon {
            width: 48px;
            height: 48px;
            background: rgba(201,168,76,.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }
        .gallery-icon svg { width: 22px; color: var(--gold); }

        .gallery-card h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            color: var(--white);
            margin-bottom: 8px;
        }

        .gallery-card p { font-size: .88rem; color: var(--muted); margin-bottom: 20px; }

        .btn-gallery {
            display: inline-block;
            padding: 9px 22px;
            border: 1px solid rgba(201,168,76,.5);
            color: var(--gold-lt);
            font-size: .85rem;
            border-radius: 8px;
            text-decoration: none;
            transition: all .22s;
        }
        .btn-gallery:hover { background: var(--gold); color: var(--navy); border-color: var(--gold); }

        /* ─── ACTIVITIES ────────────────────────────────────────── */
        .activities-section { background: var(--cream); padding-bottom: 80px; }

        .activity-list { margin-top: 60px; display: flex; flex-direction: column; gap: 70px; }

        .activity-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .activity-row.reverse .activity-text { order: 2; }
        .activity-row.reverse .activity-visual { order: 1; }

        .activity-num {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: 900;
            color: var(--gold);
            opacity: .25;
            line-height: 1;
            margin-bottom: -10px;
        }

        .activity-text h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.7rem;
            color: var(--navy);
            margin-bottom: 14px;
        }

        .activity-text p {
            font-size: 1rem;
            color: #4A5568;
            line-height: 1.75;
        }

        .activity-visual img {
            width: 100%;
            border-radius: 12px;
            aspect-ratio: 4/3;
            object-fit: cover;
            box-shadow: 0 12px 40px rgba(11,26,46,.12);
        }

        /* ─── RESPONSIVE ────────────────────────────────────────── */
        @media (max-width: 900px) {
            .about-grid,
            .activity-row,
            .activity-row.reverse .activity-text,
            .activity-row.reverse .activity-visual {
                grid-template-columns: 1fr;
                order: unset;
            }
            .about-badge { right: 12px; bottom: 12px; width: 100px; height: 100px; }
            .gallery-grid { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 600px) {
            section { padding: 60px 0; }
            .floating-download { top: 70px; right: 12px; }
            .floating-download a { padding: 9px 14px; font-size: .8rem; }
            .stat-row { gap: 22px; }
            .gallery-grid { grid-template-columns: 1fr; }
        }
    </style>
@endsection

@section('content')

<section class="hero">
    <div class="hero-bg"></div>

    <div class="hero-inner">
        <div class="hero-eyebrow">Tanzania &amp; Debate Society &nbsp;·&nbsp; ADC 2026</div>

        <h1>Arusha Debate<br><span>Championship</span></h1>

        <p class="hero-meta">
            14th &amp; 15th March 2026 &nbsp;|&nbsp;
            <a href="https://www.turkishmaarif.or.tz" target="_blank" rel="noopener">Turkish Maarif School, Arusha</a>
        </p>

        <div class="hero-divider"></div>

        <div class="hero-cta">
            <a href="#about" class="btn-gold">About the Event</a>
            <a href="#activities" class="btn-ghost">Explore Activities</a>
        </div>
    </div>

    <div class="scroll-hint">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
        Scroll
    </div>
</section>

{{-- ─── ABOUT ────────────────────────────────────────────────── --}}
<section class="about-section" id="about">
    <div class="container">
        <div>
            <span class="section-label">About the Event</span>
            <div class="title-rule"></div>
        </div>

        <div class="about-grid">
            <div class="about-image-wrap">
                <img src="{{ url('/public/Images/ADC2026/DSC07830.jpg') }}" alt="ADC 2026 at Turkish Maarif School">
                <div class="about-badge">
                    <span class="year">2026</span>
                    <span>ADC</span>
                </div>
            </div>

            <div>
                <h2 class="section-title">Where Ideas<br>Meet Argument</h2>
                <p class="section-lead">
                    The Arusha Debate Championship 2026 brought together students from both <strong>primary and secondary schools</strong> across the region for two days of rigorous debate, eloquent public speaking, and intellectual competition. Hosted at <strong>Turkish Maarif School</strong> in Arusha on <strong>14th &amp; 15th March 2026</strong> (08:00 AM – 4:00 PM each day), the tournament was graced by a <strong>United Nations Official</strong> as Guest of Honor.
                </p>
                <div style="margin: 22px 0 28px; padding: 18px 22px; border-left: 4px solid var(--gold); background: rgba(201,168,76,.07); border-radius: 0 8px 8px 0;">
                    <div style="font-size:.72rem; font-weight:600; letter-spacing:.16em; text-transform:uppercase; color:var(--gold); margin-bottom:6px;">Theme 2026</div>
                    <div style="font-family:'Playfair Display',serif; font-size:1.15rem; color:var(--navy); font-style:italic;">"Innovating Solutions – Creativity, Technology &amp; Resilience"</div>
                </div>
                <div class="stat-row">
                    <div class="stat-item">
                        <div class="stat-num">2</div>
                        <div class="stat-label">Days of Competition</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-num">3</div>
                        <div class="stat-label">Activities</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-num">08:00</div>
                        <div class="stat-label">Start Time, Both Days</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ─── GALLERY ──────────────────────────────────────────────── --}}
<section class="gallery-section" id="gallery">
    <div class="container">
        <span class="section-label">Photography</span>
        <div class="title-rule"></div>
        <h2 class="section-title">Event Gallery</h2>
        <p class="section-lead">Relive the moments from ADC 2026 through our official event photography sets.</p>

        <div class="gallery-grid">
            <div class="gallery-card">
                <div class="gallery-icon">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h4>Event Photos — Set 1</h4>
               
                {{-- Replace # with actual gallery link --}}
                <a href="https://ovagraphics.pixieset.com/arushadebate2026/" class="btn-gallery" target="_blank" rel="noopener">View Photos</a>
            </div>

            <div class="gallery-card">
                <div class="gallery-icon">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h4>Event Photos — Set 2</h4>
                {{-- Replace # with actual gallery link --}}
                <a href="https://ovagraphics.pixieset.com/arushadebate2026day2/" class="btn-gallery" target="_blank" rel="noopener">View Photos</a>
            </div>

            <div class="gallery-card">
                <div class="gallery-icon">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h4>Event Photos — Set 3</h4>
                {{-- Replace # with actual gallery link --}}
                <a href="https://ovamedia74.pixieset.com/arushadebateday2ep2/" class="btn-gallery" target="_blank" rel="noopener">View Photos</a>
            </div>
        </div>
    </div>
</section>

{{-- ─── ACTIVITIES ───────────────────────────────────────────── --}}
<section class="activities-section" id="activities">
    <div class="container">
        <span class="section-label">What Took Place</span>
        <div class="title-rule"></div>
        <h2 class="section-title">Activities Included</h2>

        <div class="activity-list">

            {{-- Public Speaking --}}
            <div class="activity-row">
                <div class="activity-text">
                    <div class="activity-num">01</div>
                    <h4>Public Speaking</h4>
                    <p>Participants delivered powerful, well-crafted speeches on a range of topics. This category tested confidence, articulation, vocal projection, and the ability to hold an audience's attention from the opening word to the final call to action.</p>
                </div>
                <div class="activity-visual">
                    <img src="{{ url('/public/Images/ADC2026/DSC07699.jpg') }}" alt="Public Speaking at ADC 2026">
                </div>
            </div>

            {{-- Debates --}}
            <div class="activity-row reverse">
                <div class="activity-text">
                    <div class="activity-num">02</div>
                    <h4>Debates</h4>
                    <p>Teams clashed in structured rounds, constructing compelling cases for or against challenging motions. Critical thinking, rapid rebuttal, and effective teamwork defined the winners at every stage of the competition.</p>
                </div>
                <div class="activity-visual">
                    <img src="{{ url('/public/Images/ADC2026/DSC07830.jpg') }}" alt="Debates at ADC 2026">
                </div>
            </div>

        </div>
    </div>
</section>

@endsection