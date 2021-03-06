<?php
require_once ('system/config.php');
require_once ('system/database.php');
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
    <title>Sistema de postagem</title>
</head>
<body>

<?php

    $posts = DBread('posts', 'WHERE status = 1 ORDER BY data DESC');

if(!$posts)
    echo '<h2>Nenhuma postagem Encontrada!</h2>';
else
    foreach($posts as $post):
        ?>

        <h2>
            <a href="single.php?id=<?php echo $post['id']; ?>" title="<?php echo $post['titulo']; ?>">
                <?php echo $post['titulo']; ?>
            </a>
        </h2>

        <p>
            por <b> <?php echo $post['autor']; ?></b>
            em <b> <?php echo date('d/m/Y', strtotime($post['data'])); ?></b>
            Visitas <b> <?php echo $post['visitas']; ?></b>
        </p>

        <p>
            <?php
                $str = strip_tags($post['conteudo']);
                $len = strlen($str);
                $max = 500;

                if($len <= $max)
                    echo $str;
                else
                    echo substr( $str, 0, $max). '...';
            ?>
        </p>

    <?php endforeach; ?>



</body>
</html>