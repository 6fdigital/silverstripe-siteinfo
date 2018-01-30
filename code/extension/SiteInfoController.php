<?php
/**
 * Created by PhpStorm.
 * User: marcokernler
 * Date: 18.11.15
 * Time: 00:12
 */


/**
 * Page_Controller Extension
 *
 * Class SiteInfoController
 */
class SiteInfoController extends Extension {

    /**
     * Render the contact informations with
     * the schema.org template
     *
     * @return mixed
     */
    public function SchemaOrgAdress() {
        return $this->owner->renderWith("SchemaOrgAddress");
    }


    /**
     * Render a tiny about-us snippet
     *
     * @return mixed
     */
    public function About() {
        return $this->owner->renderWith("About");
    }


    /**
     * Get the full translated country name
     *
     * @return false|string
     */
    public function CountryNice() {
        //
        $config = SiteConfig::current_site_config();

        return Zend_Locale::getTranslation($config->Country, "territory",  i18n::get_locale());
    }
} 