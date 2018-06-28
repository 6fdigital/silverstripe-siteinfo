<?php

namespace Dnkfbrknme\SiteInfo\Extension;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldDataColumns;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\TreeDropdownField;
use \SilverStripe\ORM\DataExtension;
use \SilverStripe\Forms\FieldList;
use \SilverStripe\Forms\ToggleCompositeField;
use \SilverStripe\Forms\DropdownField;
use \SilverStripe\Forms\TextField;
use SilverWare\Countries\Forms\CountryDropdownField;


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
        "Type" => "Enum('Event, Organization, Person, LocalBusiness', 'Organization')",
        "Company1" => "Varchar(255)",
        "Company2" => "Varchar(255)",
        "Firstname" => "Varchar(255)",
        "Surname" => "Varchar(255)",
        "Street" => "Varchar(255)",
        "StreetNumber" => "Varchar(255)",
        "Latitude" => "Varchar(100)",
        "Longitude" => "Varchar(100)",
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
        "FormPrivacyHint" => "HTMLText",
        "CheckboxPrivacyLabel" => "HTMLText",
        "FacebookLink" => "Varchar(255)",
        "TwitterLink" => "Varchar(255)",
        "GooglePlusLink" => "Varchar(255)",
        "PinterestLink" => "Varchar(255)",
        "YoutubeLink" => "Varchar(255)",
        "VimeoLink" => "Varchar(255)",
        "XINGLink" => "Varchar(255)",
        "LinkedInLink" => "Varchar(255)",
        "TumblerLink" => "Varchar(255)",
        "InstagramLink" => "Varchar(255)",
        "FivehundredPXLink" => "Varchar(255)"
    );


    /**
     * @var array
     */
    private static $has_one = array(
        "Logo" => "SilverStripe\Assets\Image",
        "GenericImage" => "SilverStripe\Assets\Image",
        "ImprintPage" => "SilverStripe\CMS\Model\SiteTree",
        "PrivacyPage" => "SilverStripe\CMS\Model\SiteTree",
        "TermsPage" => "SilverStripe\CMS\Model\SiteTree"
    );


    /**
     * @var array
     */
    private static $has_many = array(
        "BankAccounts" => "Dnkfbrknme\SiteInfo\Model\BankAccount"
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
            new UploadField("Logo", _t('SiteInfo.LOGO', 'Logo')),
            new UploadField("GenericImage", _t('SiteInfo.GENERICIMAGE', 'Generic Image')),
            new HTMLEditorField("OpeningTimes", _t('SiteInfo.OPENINGTIMES', 'Opening Hours')),
            new HTMLEditorField("Description1", _t('SiteInfo.DESCRIPTION1', 'Description 1')),
            new HTMLEditorField("Description2", _t('SiteInfo.DESCRIPTION2', 'Description 2'))
        ));

        //
        $tglPrivacy = new ToggleCompositeField("Privacy", _t("SiteInfo.PRIVACY_TAB_TITLE", "Privacy"), array(
            new HTMLEditorField("FormPrivacyHint", _t('SiteInfo.FORM_PRIVACY_HINT', 'Privacy Hint for your Forms')),
            new HTMLEditorField("CheckboxPrivacyLabel", _t('Siteinfo.CHECKBOX_PRIVACY_LABEL', 'Privacy Checkbox Label'))
        ));

        //
        $tglAddress = new ToggleCompositeField("Address", _t('SiteInfo.ADDRESSTABTITLE', 'Address'), array(
            new TextField("Street", _t('SiteInfo.STREET', 'Street')),
            new TextField("StreetNumber", _t('SiteInfo.STREETNUMBER', 'Steetnumber')),
            new TextField("POBox", _t('SiteInfo.POBOX', 'PO Box')),
            new TextField("Zip", _t('SiteInfo.ZIP', 'Zip')),
            new TextField("City", _t('SiteInfo.CITY', 'City')),
            new CountryDropdownField("Country", _t('SiteInfo.COUNTRY', 'Country'), ["Deutschland" => "Deutschland"]),
            new TextField("Latitude", _t('SiteInfo.LATITUDE', 'Latitude')),
            new TextField("Longitude", _t('SiteInfo.LONGITUDE', 'Longitude'))
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
        $tglWebsite = new ToggleCompositeField("Website", _t('SiteInfo.WEBSITETABTITLE', 'Website'), array(
            new TreeDropdownField("ImprintPage", _t('SiteInfo.IMPRINT', 'Imprint Page'), "SilverStripe\CMS\Model\SiteTree"),
            new TreeDropdownField("PrivacyPage", _t('SiteInfo.PRIVACY', 'Privacy Page'), "SilverStripe\CMS\Model\SiteTree"),
            new TreeDropdownField("TermsPage", _t('SiteInfo.TERMS', 'Terms Page'), "SilverStripe\CMS\Model\SiteTree")
        ));

        //
        $tglSocialMedia = new ToggleCompositeField("SocialMedia", _t('SiteInfo.SOCIALMEDIATABTITLE', 'Social Media'), array(
            new TextField("FacebookLink", _t('SiteInfo.FACEBOOKLINK', 'Facebook Link')),
            new TextField("TwitterLink", _t('SiteInfo.TWITTERLINK', 'Twitter Link')),
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

        // persons data grid
        $bankAccountsField = new GridField(
            "BankAccounts",
            _t("BankAccount.PLURAL_NAME","Bank Accounts"),
            $this->owner->BankAccounts(),
            GridFieldConfig_RecordEditor::create()
        );
        $bankAccountsConfig = $bankAccountsField->getConfig();
        $dataColumns = $bankAccountsConfig->getComponentByType(GridFieldDataColumns::class);

        $dataColumns->setDisplayFields([
            "BankName" => _t("SiteInfo.BANK_ACCOUNT_BANK_NAME","Bank Name"),
            "IBAN" => _t("SiteInfo.BANK_ACCOUNT_IBAN","IBAN"),
            "BIC" => _t("SiteInfo.BANK_ACCOUNT_BIC","BIC")
        ]);

        //
        $f->addFieldToTab($mainTabTitle, $tglMisc);
        $f->addFieldToTab($mainTabTitle, $tglPrivacy);
        $f->addFieldToTab($mainTabTitle, $tglAddress);
        $f->addFieldToTab($mainTabTitle, $tglContact);
        $f->addFieldToTab($mainTabTitle, $tglWebsite);
        $f->addFieldToTab($mainTabTitle, $tglSocialMedia);
        $f->addFieldToTab($mainTabTitle, new LiteralField("spacer", "<br/><hr/><br/>"));
        $f->addFieldToTab($mainTabTitle, $bankAccountsField);
    }


    // - - -


    /**
     * Add translated labels for the dropdown field
     *
     * @return array
     */
    protected function _typesNice() {
        $enumValues = singleton("SilverStripe\SiteConfig\SiteConfig")->dbObject("Type")->enumValues();

        $values = array();

        foreach($enumValues as $enumValue) {
            $values[$enumValue] = _t("SiteInfo.TYPE" . strtoupper($enumValue), $enumValue);
        }

        return $values;
    }
}
