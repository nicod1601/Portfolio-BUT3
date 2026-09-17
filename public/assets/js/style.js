/**
 * bg-canvas.js
 * Fond animé façon "Sparkle" (ambiance carnaval cosmique / paillettes) pour #bg-canvas.
 * Étoiles scintillantes + paillettes flottantes + étoiles filantes occasionnelles.
 * Utilise les couleurs de ton thème (--accent, --accent2, --accent3).
 */

(() => {
    const canvas = document.getElementById('bg-canvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // Récupère les couleurs du thème définies dans style.css (fallback si absentes)
    const rootStyles = getComputedStyle(document.documentElement);
    const colors = {
        pink: rootStyles.getPropertyValue('--accent').trim() || '#ff5c8a',
        purple: rootStyles.getPropertyValue('--accent2').trim() || '#9b6bff',
        teal: rootStyles.getPropertyValue('--accent3').trim() || '#5fe3d6',
        white: '#ffffff'
    };
    const palette = [colors.pink, colors.purple, colors.teal, colors.white];

    let width, height, dpr;
    let stars = [];
    let sparkles = [];
    let shootingStars = [];
    let mouseX = 0.5, mouseY = 0.5;
    let lastShootTime = 0;

    function resize() {
        dpr = Math.min(window.devicePixelRatio || 1, 2);
        width = window.innerWidth;
        height = window.innerHeight;
        canvas.width = width * dpr;
        canvas.height = height * dpr;
        canvas.style.width = width + 'px';
        canvas.style.height = height + 'px';
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        initField();
    }

    function rand(min, max) {
        return Math.random() * (max - min) + min;
    }

    function pickColor() {
        return palette[Math.floor(Math.random() * palette.length)];
    }

    // Petites étoiles fixes qui scintillent doucement
    function initField() {
        const density = Math.floor((width * height) / 9000);
        stars = Array.from({ length: density }, () => ({
            x: rand(0, width),
            y: rand(0, height),
            r: rand(0.5, 1.6),
            baseAlpha: rand(0.25, 0.85),
            twinkleSpeed: rand(0.4, 1.4),
            phase: rand(0, Math.PI * 2),
            color: pickColor()
        }));

        // Paillettes en forme de "diamant" façon confettis, qui dérivent lentement
        const sparkleCount = Math.floor((width * height) / 55000);
        sparkles = Array.from({ length: sparkleCount }, () => ({
            x: rand(0, width),
            y: rand(0, height),
            size: rand(3, 7),
            speedY: rand(0.06, 0.22),
            speedX: rand(-0.08, 0.08),
            rotation: rand(0, Math.PI * 2),
            rotationSpeed: rand(-0.01, 0.01),
            baseAlpha: rand(0.3, 0.7),
            twinklePhase: rand(0, Math.PI * 2),
            color: pickColor()
        }));
    }

    function spawnShootingStar() {
        const startX = rand(width * 0.1, width * 0.9);
        const startY = rand(-40, height * 0.25);
        const angle = rand(0.35, 0.55); // descend en diagonale
        const speed = rand(9, 14);
        shootingStars.push({
            x: startX,
            y: startY,
            vx: Math.cos(angle) * speed,
            vy: Math.sin(angle) * speed,
            life: 1,
            color: Math.random() < 0.5 ? colors.pink : colors.purple
        });
    }

    function drawDiamond(ctx, x, y, size, rotation) {
        ctx.save();
        ctx.translate(x, y);
        ctx.rotate(rotation);
        ctx.beginPath();
        ctx.moveTo(0, -size);
        ctx.lineTo(size * 0.55, 0);
        ctx.lineTo(0, size);
        ctx.lineTo(-size * 0.55, 0);
        ctx.closePath();
        ctx.fill();
        ctx.restore();
    }

    function frame(time) {
        ctx.clearRect(0, 0, width, height);

        // Parallax très léger basé sur la position de la souris
        const parallaxX = (mouseX - 0.5) * 12;
        const parallaxY = (mouseY - 0.5) * 12;

        // Étoiles scintillantes
        for (const s of stars) {
            const twinkle = 0.5 + 0.5 * Math.sin(time * 0.001 * s.twinkleSpeed + s.phase);
            const alpha = s.baseAlpha * twinkle;
            ctx.beginPath();
            ctx.fillStyle = s.color;
            ctx.globalAlpha = alpha;
            ctx.arc(s.x + parallaxX * 0.3, s.y + parallaxY * 0.3, s.r, 0, Math.PI * 2);
            ctx.fill();
        }

        // Paillettes en forme de diamant qui dérivent vers le bas
        for (const p of sparkles) {
            p.y += p.speedY;
            p.x += p.speedX;
            p.rotation += p.rotationSpeed;
            if (p.y > height + 10) {
                p.y = -10;
                p.x = rand(0, width);
            }
            if (p.x < -10) p.x = width + 10;
            if (p.x > width + 10) p.x = -10;

            const twinkle = 0.6 + 0.4 * Math.sin(time * 0.002 + p.twinklePhase);
            ctx.globalAlpha = p.baseAlpha * twinkle;
            ctx.fillStyle = p.color;
            ctx.shadowColor = p.color;
            ctx.shadowBlur = 6;
            drawDiamond(ctx, p.x + parallaxX, p.y + parallaxY, p.size, p.rotation);
            ctx.shadowBlur = 0;
        }

        // Étoiles filantes occasionnelles
        if (!prefersReducedMotion && time - lastShootTime > rand(3500, 7000)) {
            spawnShootingStar();
            lastShootTime = time;
        }

        for (let i = shootingStars.length - 1; i >= 0; i--) {
            const st = shootingStars[i];
            st.x += st.vx;
            st.y += st.vy;
            st.life -= 0.02;

            if (st.life <= 0 || st.x > width + 50 || st.y > height + 50) {
                shootingStars.splice(i, 1);
                continue;
            }

            const tailLength = 60;
            const tailX = st.x - st.vx * (tailLength / 12);
            const tailY = st.y - st.vy * (tailLength / 12);

            const gradient = ctx.createLinearGradient(st.x, st.y, tailX, tailY);
            gradient.addColorStop(0, st.color);
            gradient.addColorStop(1, 'transparent');

            ctx.globalAlpha = st.life;
            ctx.strokeStyle = gradient;
            ctx.lineWidth = 2;
            ctx.lineCap = 'round';
            ctx.beginPath();
            ctx.moveTo(st.x, st.y);
            ctx.lineTo(tailX, tailY);
            ctx.stroke();

            ctx.beginPath();
            ctx.fillStyle = st.color;
            ctx.arc(st.x, st.y, 2.2, 0, Math.PI * 2);
            ctx.fill();
        }

        ctx.globalAlpha = 1;

        if (!prefersReducedMotion) {
            requestAnimationFrame(frame);
        }
    }

    window.addEventListener('resize', resize);
    window.addEventListener('mousemove', (e) => {
        mouseX = e.clientX / window.innerWidth;
        mouseY = e.clientY / window.innerHeight;
    });

    resize();

    if (prefersReducedMotion) {
        // Rendu statique unique, pas d'animation continue, pour respecter la préférence utilisateur
        frame(0);
    } else {
        requestAnimationFrame(frame);
    }
})();