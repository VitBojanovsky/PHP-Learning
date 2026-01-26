<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Response</title>
</head>
<body>
    <main class="panel <?php echo $submitted ? 'success' : 'error'; ?>">
        <?php if ($submitted): ?>
            <h1>Thanks for your message!</h1>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>Message:</strong></p>
            <p><?php echo nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')); ?></p>
        <?php elseif ($method === 'POST'): ?>
            <h1>Please fix the issues below</h1>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <h1>No form data received</h1>
            <p>Submit the form from the homepage to see the response here.</p>
        <?php endif; ?>

        <p><a href="index.html">Back to form</a></p>
    </main>
</body>
</html>
