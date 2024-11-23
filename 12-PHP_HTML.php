<?php
require_once '12-PHP_HTML_head.php';
$titolo = "Pagina di esempio";
$testo = "Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
$numeroParagrafi = 3;
$flag = true;
?>

<!DOCTYPE html>
<html lang="en">

<?php echo headPHP($titolo, $flag); ?>
<body>
    <h1><?php echo $titolo?></h1>
    <?php for($i = 0; $i < $numeroParagrafi; $i++) { ?>
        <p><?php echo $testo?></p>
    <?php } ?>

    <hr>

    <?php if($flag) { ?>
        <h2>Titolo ramo vero</h2>
    <?php } else { ?>
        <h2>Titolo ramo falso</h2>
    <?php } ?>

    <hr>

    <?php require_once '12-PHP_HTML_footer.php'; ?>

</body>
</html>