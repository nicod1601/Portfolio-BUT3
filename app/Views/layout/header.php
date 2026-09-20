<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nicolas Delpech — Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Chakra+Petch:wght@700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
        $path = trim(service('request')->getPath(), '/');
    ?>
    <canvas id="bg-canvas"></canvas>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="mark">NICOLAS DELPECH<span>.K1</span></div>
        <nav class="nav-links">
            <?php if ($path === ''): ?>
                <a href="#about">Profile</a>
            <?php else: ?>
                <a href="/">Accueil</a>
            <?php endif; ?>

            <div class="nav-group">
                <a href="#but">BUT</a>
                <div class="nav-sub">
                    
                    <?php if ($path === 'competence/c1'): ?>
                        <a href="/competence/c1" class="active">C1 — Réaliser</a>
                    <?php else: ?>
                        <a href="/competence/c1">C1 — Réaliser</a>
                    <?php endif; ?>
                    
                    <?php if ($path === 'competence/c2'): ?>
                        <a href="/competence/c2" class="active">C2 — Optimiser</a>
                    <?php else: ?>
                        <a href="/competence/c2">C2 — Optimiser</a>
                    <?php endif; ?>

                    <?php if ($path === 'competence/c3'): ?>
                        <a href="/competence/c3" class="active">C3 — Collaborer</a>
                    <?php else: ?>
                        <a href="/competence/c3">C3 — Collaborer</a>
                    <?php endif; ?>

                </div>
            </div>
            <a href="./projet-travaille.html">Projets</a>
            <a href="#contact">Contact</a>
        </nav>
        <div class="sidebar-foot">BUT Informatique — 1ère année</div>
    </aside>