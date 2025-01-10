<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Non Trovata - 404</title>
    <style>
        /* Pagina 404 */
.error-page {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
    text-align: center;
    background-color: #f2f2f2;
    color: #333;
}

.error-container {
    max-width: 600px;
    padding: 20px;
    border-radius: 10px;
    background-color: #ffffff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.error-container h1 {
    font-size: 6rem;
    color: #004080;
    margin-bottom: 20px;
}

.error-container p {
    font-size: 1.5rem;
    margin-bottom: 20px;
    color: #666;
}

.error-container .btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #004080;
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
    font-size: 1.2rem;
    transition: background-color 0.3s;
}

.error-container .btn:hover {
    background-color: #003060;
}

    </style>
</head>
<body>

    <main class="error-page">
        <div class="error-container">
            <h1>404</h1>
            <p>Ops! La pagina che stai cercando non esiste.</p>
            <a href="index.php" class="btn">Torna alla Home</a>
        </div>
    </main>
</body>
</html>
