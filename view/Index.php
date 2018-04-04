<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
</head>
<body>
<h2>Header</h2>
<hr>
<a href="index.php?option=add">Add new task</a>
<style>

    .message {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
    }

    .message img {
        padding: 10px;
        border: 2px solid #32007d;
        margin-top: 10px;
    }

</style>
<!--<form action="/--><? //= $item['task']['id'] ?><!--" method="get">-->
<form action="/a" method="get">
    <?php foreach ($todo as $item) : ?>
        <div class="message">
            <p>Автор: <?php echo $item['user']['name'] ?> | Дата: <?= $item['task']['date'] ?></p>
            <p>Email: <?php echo $item['user']['email'] ?></p>
            <div>Task: <?= nl2br(htmlspecialchars($item['task']['text'])) ?></div>
            <img src="<?php echo IMAGE . $item['task']['img'] ?>" alt="<?php echo $item['task']['img'] ?>">
            <p><a href="index.php?option=delete/<?php echo $item['task']['id'] ?>">Delete this task</a></p>
            <p><a href="index.php?option=done/<?php echo $item['task']['id'] ?>">Done this task</a></p>
        </div>
    <?php endforeach; ?>
</form>
<hr>
<h3>Footer</h3>
</body>
</html>