<?php
$aboutData = [
    "title" => "Chi Siamo",
    "description" => "AllStars Competitions è un portale dedicato agli appassionati di sport e competizioni. Il nostro obiettivo è offrire un punto di incontro per eventi, squadre e storie straordinarie. Collaboriamo con atleti, organizzatori e fan per creare esperienze indimenticabili.",
    "mission" => "Creare una comunità che celebra lo sport, il lavoro di squadra e lo spirito competitivo, offrendo contenuti di qualità e promuovendo eventi coinvolgenti.",
    "vision" => "Diventare il punto di riferimento globale per le competizioni sportive e la connessione tra appassionati di sport.",
    "team" => [
        ["name" => "Marco Rossi", "role" => "Fondatore & CEO", "image" => "./img/ceo.jpg"],
        ["name" => "Giulia Bianchi", "role" => "Responsabile Marketing", "image" => "./img/marketing.jpg"],
        ["name" => "Luca Verdi", "role" => "Coordinatore Eventi", "image" => "./img/coordinatore.jpg"]
    ]
];

// Variabili per gestire i messaggi
$formMessage = "";
$formError = "";

// Validazione e salvataggio del form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $name = htmlspecialchars(trim($_POST['name']));
    $topic = htmlspecialchars(trim($_POST['topic']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Verifica che tutti i campi siano compilati
    if (empty($email) || empty($name) || empty($topic) || empty($message)) {
        $formError = "Tutti i campi sono obbligatori.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formError = "L'indirizzo email non è valido.";
    } else {
        // Salvataggio nel file di testo
        $file = 'contact_data.txt';
        $entry = "Email: $email\nNome e Cognome: $name\nArgomento: $topic\nMessaggio: $message\n---\n";
        if (file_put_contents($file, $entry, FILE_APPEND)) {
            $formMessage = "Grazie per averci contattato! Il tuo messaggio è stato inviato con successo.";
        } else {
            $formError = "Errore durante l'invio del messaggio. Riprova più tardi.";
        }
    }
}

?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Chi Siamo</h1>
        <p>Un portale dedicato agli appassionati di sport, eventi e competizioni straordinarie. Scopri la nostra missione e il nostro team.</p>
    </div>
    <div class="hero-image">
        <img src="./img/about-us.jpg" alt="Hero AllStars">
    </div>
</section>

<!-- Descrizione -->
<section class="about-description">
    <h2>La Nostra Storia</h2>
    <p><?php echo $aboutData['description']; ?></p>
</section>

<!-- Missione e Visione -->
<section class="about-mission-vision">
    <div class="mission">
        <h2>Missione</h2>
        <p><?php echo $aboutData['mission']; ?></p>
    </div>
    <div class="vision">
        <h2>Visione</h2>
        <p><?php echo $aboutData['vision']; ?></p>
    </div>
</section>

<!-- Team -->
<section class="about-team">
    <h2>Il Nostro Team</h2>
    <div class="team-grid">
        <?php foreach ($aboutData['team'] as $member): ?>
            <div class="team-member">
                <img src="<?php echo $member['image']; ?>" alt="<?php echo $member['name']; ?>">
                <h3><?php echo $member['name']; ?></h3>
                <p><?php echo $member['role']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

        <!-- Form di Contatto -->
        <section class="contact-form">
            <h2>Contattaci</h2>
            <?php if ($formError): ?>
                <p class="error"><?php echo $formError; ?></p>
            <?php elseif ($formMessage): ?>
                <p class="success"><?php echo $formMessage; ?></p>
            <?php endif; ?>

            <form action="" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="name">Nome e Cognome:</label>
                <input type="text" id="name" name="name" required>

                <label for="topic">Argomento:</label>
                <select id="topic" name="topic" required>
                    <option value="" disabled selected>Seleziona un argomento</option>
                    <option value="informazioni">Richiesta informazioni</option>
                    <option value="collaborazione">Proposta di collaborazione</option>
                    <option value="altro">Altro</option>
                </select>

                <label for="message">Messaggio:</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <button type="submit">Invia</button>
            </form>
        </section>
