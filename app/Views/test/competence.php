<main>
    <section class="comp-header">
        <div class="code-badge">[ <?=$data['code']?> ]</div>
        <h1 class="comp-title"><?=$data['title']?></h1>
        <p class="comp-desc"><?=$data['description']?></p>
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
            <ul class="skills-list">
                <?php foreach ($data['ressources'] as $ressource): ?>
                    <li class="ue-chip"><?=$ressource?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <section>
        <div class="eyebrow-line"><span>Où je me situe</span><i></i></div>
        <p>
            <?=$data['situation']?>
        </p>
    </section>
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