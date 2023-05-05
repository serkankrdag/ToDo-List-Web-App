<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text = $_POST['text'];
    $char_count = strlen($text);
    $word_count = str_word_count($text);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Character and Word Counter</title>
</head>
<body>
    <form method="post">
        <textarea name="text" placeholder="Enter text"></textarea>
        <br>
        <button type="submit">Count</button>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <div>
            <p>Character count: <?php echo $char_count; ?></p>
            <p>Word count: <?php echo $word_count; ?></p>
        </div>
    <?php endif; ?>
</body>
</html>

<script>
    const form = document.querySelector('form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const formData = new FormData(form);
        const response = await fetch(window.location.href, {
            method: 'POST',
            body: formData
        });
        const data = await response.text();
        const resultDiv = document.createElement('div');
        resultDiv.innerHTML = data;
        form.parentNode.insertBefore(resultDiv, form.nextSibling);
    });
</script>
