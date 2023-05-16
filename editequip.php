<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="editequipbutton.php" method="POST">
        <input type="submit" name="back" value="Back to main menu">
    </form>
    <form action="editequipbutton.php" method="POST">
        <label for="name">Name : </label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
        <br />
        <label for="port">Port : </label>
        <input type="text" name="port" value="<?php echo htmlspecialchars($_POST['port']); ?>">
        <br />
        <label for="type">Type : </label>
        <input type="text" name="type" value="<?php echo htmlspecialchars($_POST['type']); ?>">
        <br />
        <label for="startcommand">Start command : </label>
        <input type="text" name="startcommand" value="<?php echo htmlspecialchars($_POST['startcommand']); ?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_POST['id']); ?>">
        <br />
        <label for="stopcommand">Stop command : </label>
        <input type="text" name="stopcommand" value="<?php echo htmlspecialchars($_POST['stopcommand']); ?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_POST['id']); ?>">
        <br />
        <input type="submit" name="apply" value="Apply all change">
    </form>
</body>
</html>