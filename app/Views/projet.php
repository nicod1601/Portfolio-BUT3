<section id="projets">
    <div class="eyebrow-line">
        <span>04 // PROJETS</span>
        <i></i>
    </div>
    <h2 class="title">Mes Projets</h2>

    <div class="proj-grid proj-grid--carousel">
        <?php foreach ($data as $id => $projet): ?>
            <article class="proj-card proj-card--media" id="projet-<?= esc($id) ?>">

                <div class="proj-carousel" data-carousel>
                    <?php foreach ($projet['images'] as $index => $image): ?>
                        <img
                            src="<?= esc($image) ?>"
                            alt="<?= esc($projet['title']) ?> - image <?= $index + 1 ?>"
                            class="proj-image <?= $index === 0 ? 'active' : '' ?>"
                            data-slide="<?= $index ?>"
                        >
                    <?php endforeach; ?>

                    <?php if (count($projet['images']) > 1): ?>
                        <button class="carousel-btn prev" type="button" aria-label="Image précédente">&#10094;</button>
                        <button class="carousel-btn next" type="button" aria-label="Image suivante">&#10095;</button>

                        <div class="carousel-dots">
                            <?php foreach ($projet['images'] as $index => $image): ?>
                                <span class="dot <?= $index === 0 ? 'active' : '' ?>" data-dot="<?= $index ?>"></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="proj-body">
                    <span class="proj-tag">PROJET <?= esc($id) ?></span>
                    <h3><?= esc($projet['title']) ?></h3>
                    <p><?= nl2br(esc(trim(preg_replace('/\s+/', ' ', $projet['description'])))) ?></p>

                    <?php if (!empty($projet['technique'])): ?>
                        <div class="proj-tech">
                            <?php foreach ($projet['technique'] as $tech): ?>
                                <span><?= esc($tech) ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

            </article>
        <?php endforeach; ?>
    </div>
</section>

<script src="assets/js/projet.js"></script>