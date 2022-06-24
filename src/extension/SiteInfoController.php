<?php
/**
 * Created by PhpStorm.
 * User: marcokernler
 * Date: 18.11.15
 * Time: 00:12
 */

namespace SixF\SiteInfo\Extension;

use \SilverStripe\Core\Extension;
use \SilverStripe\SiteConfig\SiteConfig;
use \SilverStripe\i18n\i18n;



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
}
