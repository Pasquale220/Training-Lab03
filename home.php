<?php
// Dati per le sezioni
$about = [
    "title" => "Chi Siamo",
    "content" => "AllStars Competitions è il punto di riferimento per gli appassionati di competizioni sportive e teamwork. Unisciti a noi per scoprire eventi emozionanti, team straordinari e storie che ispirano.",
    "image" => "./img/aboutus-home.jpg",
    "link" => "?page=about"
];

$events = [
    [
        "title" => "Torneo di Basket",
        "description" => "Un evento epico con le migliori squadre regionali.",
        "image" => "./img/basket.jpg"
    ],
    [
        "title" => "Campionato di Calcio",
        "description" => "La sfida per il titolo si avvicina: non perderla!",
        "image" => "./img/calcio.jpg"
    ],
    [
        "title" => "Gara di Atletica",
        "description" => "Velocità, forza e resistenza in una competizione unica.",
        "image" => "./img/atletica.jpg"
    ]
];

$testimonials = [
    [
        "quote" => "AllStars mi ha fatto scoprire il vero significato di competizione. Esperienza incredibile!",
        "author" => "Marco Rossi"
    ],
    [
        "quote" => "Eventi fantastici e ben organizzati. Consiglio a tutti!",
        "author" => "Giulia Bianchi"
    ],
    [
        "quote" => "Ho trovato nuovi amici e compagni di squadra. Grazie AllStars!",
        "author" => "Luca Verdi"
    ]
];
?>

<section class="hero">
    <div class="hero-content">
        <h1>Benvenuti su AllStars Competitions</h1>
        <p>Scopri eventi unici, team straordinari e tutto ciò che ruota attorno al mondo delle competizioni sportive!</p>
        <a href="?page=teams" class="hero-btn">Scopri di più</a>
    </div>
    <div class="hero-image">
        <img src="./img/main-home.jpg" alt="Immagine Hero">
    </div>
</section>

<section class="about-us">
    <div class="about-content">
        <h2><?php echo $about['title']; ?></h2>
        <p><?php echo $about['content']; ?></p>
        <a href="<?php echo $about['link']; ?>" class="btn">Scopri di più</a>
    </div>
    <div class="about-image">
        <img src="<?php echo $about['image']; ?>" alt="Chi Siamo">
    </div>
</section>

<section class="featured-events">
    <h2>Eventi in Evidenza</h2>
    <div class="events-grid">
        <?php foreach ($events as $event): ?>
            <div class="event">
                <img src="<?php echo $event['image']; ?>" alt="<?php echo $event['title']; ?>">
                <h3><?php echo $event['title']; ?></h3>
                <p><?php echo $event['description']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="testimonials">
    <h2>Le Nostre Testimonianze</h2>
    <div class="testimonials-grid">
        <?php foreach ($testimonials as $testimonial): ?>
            <div class="testimonial">
                <p>"<?php echo $testimonial['quote']; ?>"</p>
                <h4>- <?php echo $testimonial['author']; ?></h4>
            </div>
        <?php endforeach; ?>
    </div>
</section>


