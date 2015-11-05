<?php
echo doctype('html5');
?>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript">
            var base_url = '<?php echo $base_url ?>';
        </script>
        <?php
        if (isset($csss)) {
            foreach ($csss as $css) {
                echo "\t\t" . link_tag($css);
            }
        }
        echo "\t\t" . meta('Content-type', 'text/html; charset=utf-8', 'equiv');
        if (isset($jss_top)) {
            foreach ($jss_top as $js_top) {
                echo '		<script type="text/javascript" src="' . $js_top . '"></script>' . "\n";
            }
        }
        ?>
        <title><?php echo $title ?></title>
        <link rel="icon" type="image/png" href="<?php echo $base_assets_url ?>images/logo/32.png" />


        <!-- Specifying a Webpage Icon for Web Clip 
                 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
        <link rel="apple-touch-icon" href="<?php echo $base_assets_url ?>images/splash/sptouch-icon-iphone.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $base_assets_url ?>images/splash/touch-icon-ipad.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $base_assets_url ?>images/splash/touch-icon-iphone-retina.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $base_assets_url ?>images/splash/touch-icon-ipad-retina.png">

        <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <!-- Startup image for web apps -->
        <link rel="apple-touch-startup-image" href="<?php echo $base_assets_url ?>images/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
        <link rel="apple-touch-startup-image" href="<?php echo $base_assets_url ?>images/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
        <link rel="apple-touch-startup-image" href="<?php echo $base_assets_url ?>images/splash/iphone.png" media="screen and (max-device-width: 320px)">


        <meta name="author" content="BootBuilder">
        <meta name="robots" content="index, follow">
        <meta property="og:image" content="<?php echo $base_assets_url ?>images/logo/200.png" />
        <?php
        if (isset($keywords) and isset($description)) {
            ?>
            <meta name="keywords"  content="<?php echo $keywords ?>">
            <meta name="description" content="<?php echo $description ?>">
            <meta property="og:description" content="<?php echo $description ?>" />
            <?php
        }
        ?>
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?php echo base_url() . $this->uri->uri_string ?>" />
        <meta property="og:title" content="<?php echo $title ?>" />
    </head>
    <body <?php
    if (isset($onLoad)) {
        echo 'onLoad="' . $onLoad . '"';
    }
    ?> class="">
        <?php
        if ($debug) {
            ?>
            <div id="debug"></div>
            <?php
        }
        ?>

        <?php
        if (isset($breadcrumb)) {
            ?>
            <!-- breadcrumb start -->
            <!-- ================ -->
            <div class="breadcrumb-container hidden-xs">
                <div class="container">
                    <ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
                        <li property="itemListElement" typeof="ListItem"><i class="fa fa-home pr-10"></i><a href="<?php echo $base_url ?>" property="item" typeof="WebPage"><span>Accueil</span><meta property="position" content="1"></a></li>
                        <?php
                        if (isset($breadcrumb)) {
                            $iBread = 2;
                            foreach ($breadcrumb as $url => $label) {
                                $class = "";
                                if (empty($url)) {
                                    $class = "active";
                                }
                                ?>
                                <li class="<?php echo $class ?>" property="itemListElement" typeof="ListItem"><i class="pr-10"></i><?php if (empty($class)) { ?><a href="<?php echo $url ?>" property="item" typeof="WebPage"><?php } ?><span property="name"><?php echo $label ?></span><?php if (empty($class)) { ?></a><?php } ?><meta property="position" content="<?php echo $iBread ?>"></li>
                                <?php
                                $iBread++;
                            }
                        }
                        ?>
                    </ol>
                </div>
            </div>
            <!-- breadcrumb end -->
            <?php
        }
        ?>
