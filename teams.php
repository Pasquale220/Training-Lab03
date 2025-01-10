<?php
// Gestione del form e logica per l'estrazione
$teams = [];
$matches = [];
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recupero squadre dal form
    for ($i = 1; $i <= 12; $i++) {
        $team = htmlspecialchars(trim($_POST["team$i"]));
        if (!empty($team)) {
            $teams[] = $team;
        }
    }

    // Controllo se sono state inserite 12 squadre
    if (count($teams) === 12) {
        // Mescoliamo le squadre
        shuffle($teams);

        // Generiamo i match per il primo turno
        for ($i = 0; $i < 6; $i++) {
            $matches[] = [$teams[$i * 2], $teams[$i * 2 + 1]];
        }

        // Salviamo i match nel file di testo
        $fileContent = "Primo turno del torneo:\n";
        foreach ($matches as $key => $match) {
            $fileContent .= "Match " . ($key + 1) . ": " . $match[0] . " vs " . $match[1] . "\n";
        }

        $fileName = "primo_turno_torneo.txt";
        file_put_contents($fileName, $fileContent);

        $message = "Estrazione effettuata! I risultati sono stati salvati in '$fileName'.";
    } else {
        $message = "Inserisci esattamente 12 squadre.";
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
        <img src="./img/teams.jpg" alt="Hero AllStars">
    </div>
</section>


<section class="team-input">
    <h1>Torneo a Eliminazione Diretta</h1>
    <h2>Inserisci le Squadre</h2>
    <form method="post">
        <?php for ($i = 1; $i <= 12; $i++): ?>
            <label for="team<?php echo $i; ?>">Squadra <?php echo $i; ?>:</label>
            <input type="text" id="team<?php echo $i; ?>" name="team<?php echo $i; ?>" required>
        <?php endfor; ?>
        <button type="submit">Effettua Estrazione</button>
    </form>
</section>

<?php if (!empty($matches)): ?>
    <section class="match-results">
        <h2>Risultati del Primo Turno</h2>
        <ul>
            <?php foreach ($matches as $key => $match): ?>
                <li>Match <?php echo $key + 1; ?>: <?php echo $match[0]; ?> vs <?php echo $match[1]; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php endif; ?>

<?php if (!empty($message)): ?>
    <section class="message">
        <p><?php echo $message; ?></p>
    </section>
<?php endif; ?>