<style>
    @import url('main.css');
</style>
<header class="desktop">
    <nav>
        <picture>
            <source srcset="../Assets/Icons/logo_dark@2x.svg" media="(prefers-color-scheme: dark)">
            <img src="../Assets/Icons/logo_light@2x.svg" alt="Logo" onclick="location.href='index.php'">
        </picture>
        <ul>
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="unifye.php">Unifye</a></li>
            <li><a href="xobus.php">Xobus AI</a></li>
            <li><a href="importable.php">Importable</a></li>
        </ul>
    </nav>
</header>
<header class="mobile">
    <nav>
        <img src="../Assets/Icons/logo@1x.svg" alt="Logo" onclick="location.href='index.php'">
        <div id="menu" onclick="">
            <div></div>
        </div>
        <ul>
            <li><a href="index.php" class="active" tabindex="-1">Home</a></li>
            <li><a href="unifye.php" tabindex="-1">Unifye</a></li>
            <li><a href="xobus.php" tabindex="-1">Xobus AI</a></li>
            <li><a href="importable.php" tabindex="-1">Importable</a></li>
        </ul>
    </nav>
</header>