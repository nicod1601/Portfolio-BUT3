<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réaliser un développement d'application — C1 — Nicolas Delpech</title>
    <style>
        :root {
            --bg: #05070d;
            --bg-elevated: #0b0f1a;
            --line: rgba(255, 255, 255, 0.08);
            --text: #e7ebf5;
            --muted: #8a92a8;
            --accent: #4fd8ff;
            --accent-soft: rgba(79, 216, 255, 0.12);
            --accent2: #8c6bff;
            --sidebar-w: 230px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Sora', 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        canvas#bg-canvas {
            position: fixed; top: 0; left: 0;
            width: 100%; height: 100%;
            z-index: 0;
            pointer-events: none;
        }

        .sidebar {
            position: fixed; top: 0; left: 0;
            width: var(--sidebar-w); height: 100vh;
            padding: 2.8rem 2rem;
            display: flex; flex-direction: column; gap: 3rem;
            z-index: 10;
            border-right: 1px solid var(--line);
            background: linear-gradient(180deg, rgba(5,7,13,0.4), rgba(5,7,13,0.85));
            backdrop-filter: blur(6px);
        }

        .sidebar .mark { font-family: 'Space Mono', monospace; font-size: 0.75rem; letter-spacing: 0.15em; color: var(--muted); }
        .sidebar .mark span { color: var(--accent); }

        .nav-links { display: flex; flex-direction: column; gap: 0.3rem; }

        .nav-links a {
            color: var(--text); text-decoration: none; font-size: 1.05rem; font-weight: 500;
            padding: 0.7rem 0.2rem; position: relative;
            transition: color 0.25s ease, padding-left 0.25s ease;
        }

        .nav-links a::before {
            content: ''; position: absolute; left: -0.9rem; top: 50%; transform: translateY(-50%);
            width: 3px; height: 0; background: var(--accent); transition: height 0.25s ease;
        }

        .nav-links a:hover, .nav-links a:focus-visible { color: var(--accent); padding-left: 0.5rem; }
        .nav-links a:hover::before, .nav-links a:focus-visible::before { height: 60%; }

        .nav-group { display: flex; flex-direction: column; }

        .nav-sub {
            display: flex; flex-direction: column; margin-left: 0.6rem;
            border-left: 1px solid var(--line); padding-left: 0.9rem; gap: 0.1rem;
        }

        .nav-sub a { font-size: 0.88rem; font-weight: 400; color: var(--muted); padding: 0.45rem 0.2rem; }
        .nav-sub a:hover { color: var(--accent); padding-left: 0.5rem; }
        .nav-sub a.active { color: var(--accent); }

        .sidebar-foot { margin-top: auto; font-size: 0.78rem; color: var(--muted); font-family: 'Space Mono', monospace; }

        main { margin-left: var(--sidebar-w); position: relative; z-index: 1; }
        section { padding: 5rem 6vw; max-width: 1000px; }

        .breadcrumb {
            display: inline-flex; align-items: center; gap: 0.5rem;
            color: var(--muted); text-decoration: none; font-size: 0.9rem;
            margin-bottom: 2rem; transition: color 0.25s ease;
        }
        .breadcrumb:hover { color: var(--accent); }

        .comp-header { padding-top: 4rem; padding-bottom: 3rem; }

        .code-badge {
            display: inline-block;
            font-family: 'Space Mono', monospace;
            font-size: 0.8rem;
            color: var(--accent);
            border: 1px solid rgba(79, 216, 255, 0.35);
            background: var(--accent-soft);
            padding: 0.35rem 0.8rem;
            border-radius: 999px;
            margin-bottom: 1.4rem;
        }

        h1.comp-title {
            font-family: 'Chakra Petch', 'Space Mono', monospace;
            font-size: clamp(2.1rem, 4.5vw, 3.2rem);
            font-weight: 700;
            margin-bottom: 1.4rem;
            max-width: 700px;
        }

        .comp-desc { color: var(--muted); font-size: 1.1rem; max-width: 640px; }

        .eyebrow-line { display: flex; align-items: center; gap: 1rem; margin: 0 0 2rem; }
        .eyebrow-line span { font-family: 'Space Mono', monospace; font-size: 0.8rem; color: var(--accent); white-space: nowrap; }
        .eyebrow-line i { height: 1px; width: 100%; background: var(--line); }

        .skills-list { list-style: none; display: flex; flex-direction: column; gap: 0.9rem; }
        .skills-list li {
            position: relative; padding-left: 1.6rem; color: var(--text); font-size: 1.02rem;
        }
        .skills-list li::before {
            content: ''; position: absolute; left: 0; top: 0.55rem;
            width: 8px; height: 8px; border-radius: 50%; background: var(--accent);
        }

        .ue-chips { display: flex; flex-wrap: wrap; gap: 0.6rem; }
        .ue-chip {
            font-family: 'Space Mono', monospace; font-size: 0.78rem;
            padding: 0.55rem 0.9rem; border-radius: 8px;
            border: 1px solid var(--line); background: var(--bg-elevated); color: var(--muted);
        }

        footer { padding: 2.5rem 6vw 3rem; color: var(--muted); font-size: 0.8rem; font-family: 'Space Mono', monospace; }

        @media (max-width: 820px) {
            .sidebar {
                width: 100%; height: auto; position: static;
                flex-direction: row; justify-content: space-between; align-items: center;
                padding: 1.2rem 5vw; border-right: none; border-bottom: 1px solid var(--line);
            }
            .nav-links { flex-direction: row; gap: 1.2rem; flex-wrap: wrap; }
            .nav-sub { display: none; }
            .nav-group:hover .nav-sub { display: flex; }
            main { margin-left: 0; }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Chakra+Petch:wght@700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <canvas id="bg-canvas"></canvas>

    <aside class="sidebar">
        <div class="mark">NICOLAS<span>.DEV</span></div>
        <nav class="nav-links">
            <a href="./portfolio.html#about">About Me</a>
            <div class="nav-group">
                <a href="./portfolio.html#but">BUT</a>
                <div class="nav-sub">
                    <a href="./competence1.html" class="active">C1 — Réaliser</a>
                    <a href="./competence2.html">C2 — Optimiser</a>
                    <a href="./competence3.html">C3 — Collaborer</a>
                </div>
            </div>
            <a href="./projet-travaille.html">Projets</a>
            <a href="./portfolio.html#contact">Contact</a>
        </nav>
        <div class="sidebar-foot">BUT Informatique — 1ère année</div>
    </aside>

    <main>
        <section class="comp-header">
            <a class="breadcrumb" href="./portfolio.html#but">&larr; Retour au portfolio</a>
            <div class="code-badge">BIN51 · Compétence C1</div>
            <h1 class="comp-title">Réaliser un développement d'application</h1>
            <p class="comp-desc">Concevoir, développer et déployer des applications informatiques répondant à un besoin métier, en garantissant la qualité, la sécurité et la performance du code produit.</p>
        </section>

        <section>
            <div class="eyebrow-line"><span>CE QUE ÇA RECOUVRE</span><i></i></div>
            <ul class="skills-list">
                <li>Analyser un besoin et concevoir une solution logicielle adaptée</li>
                <li>Développer en respectant les bonnes pratiques de programmation</li>
                <li>Automatiser les processus de build, de test et de déploiement</li>
                <li>Assurer la qualité et la maintenabilité du code</li>
            </ul>
        </section>

        <section>
            <div class="eyebrow-line"><span>UNITÉS D'ENSEIGNEMENT ASSOCIÉES</span><i></i></div>
            <div class="ue-chips">
                <span class="ue-chip">Qualité algorithmique</span>
                <span class="ue-chip">Programmation avancée</span>
                <span class="ue-chip">Sensibilisation à la programmation multimédia</span>
                <span class="ue-chip">Automatisation de la chaîne de production</span>
                <span class="ue-chip">Qualité de développement</span>
                <span class="ue-chip">Virtualisation avancée</span>
                <span class="ue-chip">Nouveaux paradigmes de bases de données</span>
                <span class="ue-chip">Économie durable et numérique</span>
                <span class="ue-chip">Anglais</span>
                <span class="ue-chip">Développement avancé</span>
            </div>
        </section>

        <footer>© 2026 Nicolas Delpech — Portfolio BUT Informatique</footer>
    </main>

    <script>
        const canvas = document.getElementById('bg-canvas');
        const ctx = canvas.getContext('2d');
        let w, h, particles;
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        function resize() {
            w = canvas.width = window.innerWidth;
            h = canvas.height = document.body.scrollHeight;
        }

        function initParticles() {
            const count = Math.floor((w * h) / 22000);
            particles = Array.from({ length: count }, () => ({
                x: Math.random() * w, y: Math.random() * h,
                vx: (Math.random() - 0.5) * 0.15, vy: (Math.random() - 0.5) * 0.15,
                r: Math.random() * 1.4 + 0.4
            }));
        }

        function draw() {
            ctx.clearRect(0, 0, w, h);
            const linkDist = 130;
            for (let i = 0; i < particles.length; i++) {
                const p = particles[i];
                if (!prefersReducedMotion) {
                    p.x += p.vx; p.y += p.vy;
                    if (p.x < 0 || p.x > w) p.vx *= -1;
                    if (p.y < 0 || p.y > h) p.vy *= -1;
                }
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(120, 190, 255, 0.55)';
                ctx.fill();
                for (let j = i + 1; j < particles.length; j++) {
                    const q = particles[j];
                    const dx = p.x - q.x, dy = p.y - q.y;
                    const dist = Math.sqrt(dx * dx + dy * dy);
                    if (dist < linkDist) {
                        ctx.beginPath();
                        ctx.moveTo(p.x, p.y); ctx.lineTo(q.x, q.y);
                        ctx.strokeStyle = `rgba(79, 216, 255, ${0.12 * (1 - dist / linkDist)})`;
                        ctx.lineWidth = 1;
                        ctx.stroke();
                    }
                }
            }
            if (!prefersReducedMotion) requestAnimationFrame(draw);
        }

        window.addEventListener('resize', () => { resize(); initParticles(); });
        resize();
        initParticles();
        draw();
    </script>
</body>
</html>