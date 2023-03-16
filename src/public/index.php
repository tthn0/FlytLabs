<?php
$GLOBALS["/"] = $_SERVER["DOCUMENT_ROOT"] . "/.."; // Project root (outside of public folder)

require_once($GLOBALS["/"] . "/modules/utilities.php");

load_environment_variables();

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
switch ($path) {
    case "/":
        load_page(
            "home",
            "FlytLabs | Experimental, Community Driven Software",
            "High quality, open source software pushing boundaries and exploring innovative solutions that revolutionize the way people interact with technology.",
        );
        break;
    case "/" . $_ENV["ADMIN_PASSWORD"]:
        load_page(
            "admin",
            "FlytLabs | Admin Panel",
        );
        break;
    case "/api":
        require_once($GLOBALS["/"] . "/modules/api.php");
        break;
    case "/unifye":
        load_page(
            "unifye",
            "Unifye | A Contact Consolidation Service",
            "Unifye is a contact consolidation service meant for ease and convenience that gives you a central hub to manage how others can find you online.",
        );
        break;
    case "/xobus":
        load_page(
            "xobus",
            "Xobus | An Experimental Artificial Intelligence",
            "Xobus is an experimental artificial intelligence that that feeds creativity, makes choices, then learns from them."
        );
        break;
    case "/importable":
        load_page(
            "importable",
            "Importable | Supercharge Your Projects With AI",
            "Importable enables developers universal access to plugins, modules, configurations, and other types of files found across the internet",
        );
        break;
    case "/about":
        load_page(
            "about",
            "FlytLabs | Learn More About Our Startup",
            "Learn more about FlytLabs and our mission to create a better future in regards to software and AI for everyone.",
        );
        break;
    case "/updates":
        load_page(
            "updates",
            "FlytLabs | See The Latest Updates From Our Projects Here",
            "Stay connected and informed by seeing the latest updates from our innovative projects.",
        );
        break;
    case "/post":
        load_page(
            "post",
            "FlytLabs | View Full Post Details",
            "See the entirety of a post from our updates page.",
        );
        break;
    case "/help":
        load_page(
            "help",
            "FlytLabs | Calling Developers To Contribute To Our Projects",
            "Interested in working with FlytLabs? We are looking for developers to join our team and help us with our projects!",
        );
        break;
    case "/cookies":
        load_page(
            "cookies",
            "FlytLabs | Cookie Policy",
            "View our cookie policy to learn more about how we use cookies and how you can control them.",
        );
        break;
    case "/privacy":
        load_page(
            "privacy",
            "FlytLabs | Privacy Policy",
            "View our privacy policy to learn more about how we collect and use your data.",
        );
        break;
    case "/terms":
        load_page(
            "terms",
            "Flytlabs | Our Terms Of Service",
            "View our terms of service to learn more about how you can use our services and what you can expect from us.",
        );
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        load_page(
            "404",
            "FlytLabs | 404 Not Found",
            "The page you are looking for could not be found.",
        );
        break;
}