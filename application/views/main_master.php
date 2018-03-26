<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        /**
         * @mainpage Commentaar bij Project23_1718
         * 
         * # Wat?
         * Je vindt hier onze Docygen-commentaar bij het PHP-project <b>Project23_1718</b>.
         * - De commentaar bij onze model- en controller-klassen vind je onder het menu <em>Klassen</em>
         * - De commentaar bij onze view-bestanden vind je onder het menu <em>Bestanden</em>
         * - Ook de originele commentaar geschreven bij het Codeigniter-framwork is opgenomen.
         * 
         * # Wie?
         * Dit project is geschreven en becommentarieerd door Nico Claes, Lorenz Cleymans, Tijmen Elseviers, Michiel Olijslagers & Geffrey Wuyts.
         */
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Minder Mobiele Centrale</title>

        <!-- Bootstrap Core CSS -->
        <?php echo pasStylesheetAan("bootstrap.min.css"); ?>
        <?php echo pasStylesheetAan("main_style.css"); ?>
        <?php echo pasStylesheetAan("../fontawesome/css/fontawesome-all.min.css"); ?>

        <?php echo haalJavascriptOp("jquery-3.3.1.min.js"); ?>
        <?php echo haalJavascriptOp("bootstrap.min.js"); ?>

        <script type="text/javascript">
            var site_url = '<?php echo site_url(); ?>';
            var base_url = '<?php echo base_url(); ?>';
        </script>

    </head>

    <body>
        <!-- navbar -->
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top">
                <?php echo anchor('home', toonAfbeelding("MMC_white.png", "height=50px"), 'class="navbar-brand"') ?>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarCollapse" style="">
                    <?php echo $menu ?>
                </div>
            </nav>
        </header>

        <!-- Content -->
        <div class="container">
            <!-- pagina titel -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 id="pageTitle"><?php echo $titel; ?></h1>
                </div>
            </div>
            <!-- pagina inhoud -->
            <?php echo $inhoud; ?>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row footText">
                    <span>Nico C.</span>
                    <span class="footerNaam">Lorenz C.</span>
                    <span class="footerNaam">Tijmen E.</span>
                    <span class="footerNaam">Michiel O.</span>
                    <span class="mr-auto">Geffrey W.</span>

                    <span id="footerTeam">Team 23 Christel Maes</span>

                    <script>
                        $('span').filter(function () {
                            return $(this).text() === "<?php echo $author; ?>";
                        }).css('text-decoration', 'underline');
                    </script>
                </div>
            </div>
        </footer>

    </body>

</html>
