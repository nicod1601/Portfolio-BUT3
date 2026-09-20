    <main>
        <!-- Hero -->
        <section class="hero" id="home">
            <h1 class="glitch" data-text="PORTFOLIO">PORTFOLIO</h1>
            <p class="tagline"><strong>Nicolas Delpech</strong> — Étudiant en BUT Informatique, 1ère année. Bienvenue sur mon espace professionnel.</p>
        </section>

        <!-- Accueil -->
        <section id="about">
            <div class="eyebrow-line"><span>Profile</span><i></i></div>
            <div class="about-grid">
                <div class="about-photo">
                    <img src="assets/images/profile.jpeg" alt="Photo de Nicolas Delpech">
                </div>
                <div class="about-text">
                    <p><b>Nicolas Delpech</b></p>
                    <p>Étudiant en BUT Informatique, 1ère année.</p>
                    <p><b>Parcours :</b> STI2D, BUT Informatique, Redoublement.</p>
                    <div class="tag-row">
                        <span>STI2D</span>
                        <span>BUT Informatique</span>
                        <span>Développement</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Compétences (BUT) -->
        <section id="but">
            <div class="eyebrow-line"><span>LES COMPÉTENCES</span><i></i></div>
            <h2 class="title">Le référentiel BUT</h2>
            <div class="comp-grid">
                <a class="comp-card" href="/competence/c1">
                    <div class="code">C1</div>
                    <h3>Réaliser</h3>
                    <p>Développer des applications en réponse à un besoin métier identifié.</p>
                </a>
                <a class="comp-card" href="/competence/c2">
                    <div class="code">C2</div>
                    <h3>Optimiser</h3>
                    <p>Optimiser des applications informatiques et en garantir la qualité.</p>
                </a>
                <a class="comp-card" href="/competence/c3">
                    <div class="code">C3</div>
                    <h3>Collaborer</h3>
                    <p>Travailler en équipe, partager les tâches et participer à la réussite d’un projet collectif.</p>
                </a>
            </div>
        </section>

        <!-- Projets -->
        <section id="projets">
            <div class="eyebrow-line"><span>PROJETS</span><i></i></div>
            <div class="projets-panel">
                <p>Retrouve l'ensemble des projets réalisés pendant ma formation, avec le détail des technologies utilisées et mon rôle sur chacun d'eux.</p>
                <a class="btn" href="/projet">Voir les projets</a>
            </div>
        </section>

        <!-- Contact -->
        <section id="contact">
            <div class="eyebrow-line"><span>CONTACT</span><i></i></div>
            <div class="contact-row">
                <a class="contact-item" href="mailto:nicolas.delpech@example.com">nicod162005@gmail.com</a>
                <a class="contact-item" href="https://github.com/nicod1601">GitHub</a>
            </div>
        </section>
    </main>

    @include('layout/footer');

    <script src="/assets/js/style.js"></script>
</body>
</html>