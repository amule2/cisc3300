<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Submission</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            margin: 20px;
        }
        .error {
            color: red;
            margin: 10px;
        }
        .success {
            color: green;
            margin: 10px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        textarea {
            width: 300px;
            height: 100px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>New Note</h2>

    <div id="message"></div>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php
    // Ensure $success is defined to avoid "Undefined variable" error
    $success = $success ?? false;
    ?>

    <?php if ($success): ?>
        <div class="success">
            <p>Note submitted successfully!</p>
        </div>
    <?php endif; ?>

    <form id="noteForm" method="POST" action="index.php">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>

        <button type="submit">Submit</button>
    </form>

    <script>
        document.getElementById('noteForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const title = document.getElementById('title').value;
            const description = document.getElementById('description').value;

            try {
                //sending the data to the server
                const response = await fetch('./index.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ title, description })
                });

                const data = await response.json();

                const messageDiv = document.getElementById('message');
                if (data.error) {
                    messageDiv.className = 'error';
                    messageDiv.innerHTML = data.error.map(err => `<p>${err}</p>`).join("");;
                } else {
                    messageDiv.className = 'success';
                    messageDiv.textContent = data.message;
                    document.getElementById('noteForm').reset();
                }
            } catch (err) {
                console.error('Error:', err);
            }
        });
    </script>


</div>

</body>
</html>
