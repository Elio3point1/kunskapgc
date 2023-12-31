<!DOCTYPE html>
<html>
    <?php
    try { 
        $mysqlClient = new PDO(
            'mysql:host=localhost;dbname=kunskapgc;charset=utf8',
            'root',
            'root',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
    catch (Exception $e)
    {
        die('Erreur :' . $e->getMessage());
    }

    $testsStatement = $mysqlClient->prepare('SELECT * FROM test');
    $testsStatement->execute();
    $tests = $testsStatement->fetchAll();
    ?>
    <head>
        <title>Test PHP</title>
    </head>
    <body>
        <?php echo '<p>Bonjour le monde</p>'; ?>
        <p>Nous sommes le <?php echo date('d/m/Y h:i:s'); ?>.</p>
        <?php
        foreach ($tests as $test) {
        ?>
            <p>Bonjour <?php echo $test['full_name']; ?>
        <?php
        }
        ?>
    </body>
</html>