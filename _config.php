<?php 


// add our extension to the site config
Object::add_extension("SiteConfig", "SiteInfo");
Object::add_extension("Page_Controller", "SiteInfoController");