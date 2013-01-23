<?php


/**
 * 
 * @author marcokernler
 *
 */
class SiteInfo extends DataObjectDecorator
{
	/**
	 * 	Add some more fields to the base site config
	 * 
	 * 	@return	Array	A list of additional fields
	 */
	public function extraStatics()
	{
		return array
		(
			"db" => array
			(
				"Company1" => "Varchar(255)",
				"Company2" => "Varchar(255)",
				"Firstname" => "Varchar(255)",
				"Surname" => "Varchar(255)",
				"Street" => "Varchar(255)",
				"Streetnumber" => "Varchar(255)",
				"Zip" => "Varchar(255)",
				"City" => "HTMLText",
				"Country" => "Varchar(255)",
				"Phone" => "Varchar(255)",
				"Fax" => "Varchar(255)",
				"Mobile" => "Varchar(255)",
				"Email" => "Varchar(255)",
				"Website" => "Varchar(255)",
				"Vatnumber" => "Varchar(255)",
				"CommercialRegister" => "Varchar(255)"
			)
		);
	}
	
	
	/**
	 * 	Update the base fields with our added ones
	 * 
	 * 	@param $fields The list of existing fields
	 */
	public function updateCMSFields(FieldSet $fields)
	{
		// General informations
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new LiteralField("moduleheadline", "<h2>" . _t('MODULEHEADLINE', 'Siteinfo') . "</h2>" ));
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new TextField("Company1", _t('SiteInfo.COMPANY1', 'Company 1' )));
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new TextField("Company2", _t('SiteInfo.COMPANY2', 'Company 2' )));
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new TextField("Firstname", _t('SiteInfo.FIRSTNAME', 'Firstname')));
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new TextField("Surname",_t('SiteInfo.SURNAME', 'Surname')));
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new TextField("Street", _t('SiteInfo.STREET', 'Street')));
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new TextField("Streetnumber", _t('SiteInfo.STREETNUMBER', 'Steetnumber')));
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new TextField("Zip", _t('SiteInfo.ZIP', 'Zip')));
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new TextField("City", _t('SiteInfo.CITY', 'City')));
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new TextField("Country", _t('SiteInfo.COUNTY', 'Country')));
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new TextField("Phone", _t('SiteInfo.PHONE', 'Phone')));
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new TextField("Fax", _t('SiteInfo.FAX', 'Fax')));
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new TextField("Mobile", _t('SiteInfo.MOBILE', 'Mobile')));
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new TextField("Email", _t('SiteInfo.EMAIL', 'E-Mail')));
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new TextField("Website", _t('SiteInfo.WEBSITE', 'Website')));
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new TextField("Vatnumber", _t('SiteInfo.VATNUMBER', 'Vat Number')));
		$fields->addFieldToTab("Root." . _t('MODULETABTITEL', 'Siteinfo'), new TextField("CommercialRegister", _t('SiteInfo.COMMERCIALREGISTER', 'Vat Number')));
	}
}

?>