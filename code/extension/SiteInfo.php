<?php


/**
 *
 * @author marcokernler
 *
 */
class SiteInfo extends DataExtension
{
    /**
     *  Add some more fields to the base site config
     *
     *  @var array   A list of additional fields
     */
    private static $db = array (
        "Company1" => "Varchar(255)",
        "Company2" => "Varchar(255)",
        "Firstname" => "Varchar(255)",
        "Surname" => "Varchar(255)",
        "Street" => "Varchar(255)",
        "StreetNumber" => "Varchar(255)",
        "POBox" => "Varchar(255)",
        "Zip" => "Varchar(255)",
        "City" => "HTMLText",
        "Country" => "Varchar(2)",
        "Phone" => "Varchar(255)",
        "Fax" => "Varchar(255)",
        "Mobile" => "Varchar(255)",
        "Email" => "Varchar(255)",
        "Website" => "Varchar(255)",
        "OpeningTimes" => "HTMLText",
        "Vatnumber" => "Varchar(255)",
        "CommercialRegister" => "Varchar(255)",
        "Description1" => "HTMLText",
        "Description2" => "HTMLText",
        "FacebookLink" => "Varchar(255)",
        "TwitterLink" => "Varchar(255)",
        "TwitterUsername" => "Varchar(255)",
        "GooglePlusLink" => "Varchar(255)",
        "PinterestLink" => "Varchar(255)",
        "YoutubeLink" => "Varchar(255)",
        "VimeoLink" => "Varchar(255)",
        "XINGLink" => "Varchar(255)",
        "LinkedInLink" => "Varchar(255)",
        "TumblerLink" => "Varchar(255)",
        "InstagramLink" => "Varchar(255)",
        "FivehundredPXLink" => "Varchar(255)",
        "Type" => "Enum('event, organization, person, localbusiness', 'organization')"
    );


    /**
     * @var array
     */
    private static $has_one = array(
        "GenericImage" => "Image"
    );


    // - - -


    /**
     *  Update the base fields with our added ones
     *
     *  @param $fields FieldList The list of existing fields
     */
    public function updateCMSFields(FieldList $f) {

        //
        $mainTabTitle = "Root." . _t('SiteInfo.MODULETABTITLE', 'Siteinfo');

        //
        $tglMisc = new ToggleCompositeField("Misc", _t('SiteInfo.MISCTABTITLE', 'Misc'), array(
            new DropdownField("Type", _t("SiteInfo.TYPE", "Type"), $this->_typesNice()),
            new TextField("Company1", _t('SiteInfo.COMPANY1', 'Company 1' )),
            new TextField("Company2", _t('SiteInfo.COMPANY2', 'Company 2' )),
            new TextField("Firstname", _t('SiteInfo.FIRSTNAME', 'Firstname')),
            new TextField("Surname", _t('SiteInfo.SURNAME', 'Surname')),
            new TextField("Vatnumber", _t('SiteInfo.VATNUMBER', 'Vat Number')),
            new TextField("CommercialRegister", _t('SiteInfo.COMMERCIALREGISTER', 'Commercial Register')),
            new UploadField("GenericImage", _t('SiteInfo.GENERICIMAGE', 'Generic Image')),
            new HtmlEditorField("OpeningTimes", _t('SiteInfo.OPENINGTIMES', 'Opening Hours')),
            new HtmlEditorField("Description1", _t('SiteInfo.DESCRIPTION1', 'Description 1')),
            new HtmlEditorField("Description2", _t('SiteInfo.DESCRIPTION2', 'Description 2'))
        ));

        //
        $tglAddress = new ToggleCompositeField("Address", _t('SiteInfo.ADDRESSTABTITLE', 'Address'), array(
            new TextField("Street", _t('SiteInfo.STREET', 'Street')),
            new TextField("StreetNumber", _t('SiteInfo.STREETNUMBER', 'Steetnumber')),
            new TextField("POBox", _t('SiteInfo.POBOX', 'PO Box')),
            new TextField("Zip", _t('SiteInfo.ZIP', 'Zip')),
            new TextField("City", _t('SiteInfo.CITY', 'City')),
            new CountryDropdownField("Country", _t('SiteInfo.COUNTRY', 'Country'))
        ));

        //
        $tglContact = new ToggleCompositeField("Contact", _t('SiteInfo.CONTACTTABTITLE', 'Contact'), array(
            new TextField("Phone", _t('SiteInfo.PHONE', 'Phone')),
            new TextField("Fax", _t('SiteInfo.FAX', 'Fax')),
            new TextField("Mobile", _t('SiteInfo.MOBILE', 'Mobile')),
            new TextField("Email", _t('SiteInfo.EMAIL', 'E-Mail')),
            new TextField("Website", _t('SiteInfo.WEBSITE', 'Website'))
        ));

        //
        $tglSocialMedia = new ToggleCompositeField("SocialMedia", _t('SiteInfo.SOCIALMEDIATABTITLE', 'Social Media'), array(
            new TextField("FacebookLink", _t('SiteInfo.FACEBOOKLINK', 'Facebook Link')),
            new TextField("TwitterLink", _t('SiteInfo.TWITTERLINK', 'Twitter Link')),
            new TextField("TwitterUsername", _t('SiteInfo.TWITTERUSERNAME', 'Twitter Benutzername')),
            new TextField("GooglePlusLink", _t('SiteInfo.GOOGLEPLUSLINK', 'Google+ Link')),
            new TextField("PinterestLink", _t('SiteInfo.PINTERESTLINK', 'Pinterest Link')),
            new TextField("YoutubeLink", _t('SiteInfo.YOUTUBELINK', 'Youtube Link')),
            new TextField("VimeoLink", _t('SiteInfo.VIMEOLINK', 'Vimeo Link')),
            new TextField("XINGLink", _t('SiteInfo.XINGLINK', 'XING Link')),
            new TextField("LinkedInLink", _t('SiteInfo.LINKEDINLINK', 'LinkedIn Link')),
            new TextField("TumblerLink", _t('SiteInfo.TUMBLERLINK', 'Tumbler Link')),
            new TextField("InstagramLink", _t('SiteInfo.INSTAGRAMLINK', 'Instagram Link')),
            new TextField("FivehundredPXLink", _t('SiteInfo.FIVEHUNDREDPXLINK', '500px Link'))
        ));

        //
        $f->addFieldToTab($mainTabTitle, $tglMisc);
        $f->addFieldToTab($mainTabTitle, $tglAddress);
        $f->addFieldToTab($mainTabTitle, $tglContact);
        $f->addFieldToTab($mainTabTitle, $tglSocialMedia);
    }


    // - - -


    /**
     * Add translated labels for the dropdown field
     *
     * @return array
     */
    protected function _typesNice() {
        $enumValues = singleton("SiteConfig")->dbObject("Type")->enumValues();

        $values = array();

        foreach($enumValues as $enumValue) {
            $values[$enumValue] = _t("SiteInfo.TYPE" . strtoupper($enumValue));
        }

        return $values;
    }
}
