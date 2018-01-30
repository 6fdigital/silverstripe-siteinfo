# SiteInfo Module

## Requirements

SilverStripe 3.2+, < 4

## Installation
    composer require denkfabrik-neue-medien/silverstripe-siteinfo

## Overview

A module for the Silverstripe CMS to provide further informations about the owner of a website. 

## Templates

A few templates are included in the module:

### SchemaOrgAdress
Renders the the provided address informations with the schema.org structure. With the following inlcude params you can hide different parts like the phone number or company name:

- HideCompany1 [1|0]
- HideCompany2 [1|0]
- HideStreetInfo [1|0]
- HideZip [1|0]
- HideCity [1|0]
- HideCounty [1|0]
- HidePhone [1|0]
- HideFax [1|0]
- HideEmail [1|0]
- HideWebsite [1|0]

### About
Renders a short about-us block by including the contents of the description fields as well as the address informations rendered with the schema.org structure. Like the other template, you can control the visibility of the following blocks:

- HideDescription1 [1|0]
- HideDescription2 [1|0]
- HideAddress [1|0]

### Example

    <% include SchemaOrgAdress HideStreetInfo=1 ... %>
    
## Supported Fields
|Name|Description|Possible Values|
|---|---|---|
|Type|The type of the schema.org entity|Event, Organization, Person, Local Business|
|Company1|||
|Company2|||
|Firstname|||
|Surname|||
|Street|||
|StreetNumber|||
|POBox|||
|Zip|||
|City|||
|Country|||
|Phone|||
|Fax|||
|Mobile|||
|Email|||
|Website|||
|OpeningTimes|||
|Vatnumber|||
|CommercialRegister|||
|Description1|||
|Description2|||
|FacebookLink|||
|TwitterLink|||
|TwitterUsername|||
|GooglePlusLink|||
|PinterestLink|||
|YoutubeLink|||
|VimeoLink|||
|XINGLink|||
|LinkedInLink|||
|TumblerLink|||
|InstagramLink|||
|FivehundredPXLink|||
|BankAccounts|Add multiple bank accounts|Bank Name, IBAN, BIC|

## Related Modules

- [silverstripe-imprintpage](https://github.com/marcokernler/silverstripe-imprintpage)
- [silverstripe-widget-contact](https://github.com/marcokernler/silverstripe-widget-contact)
