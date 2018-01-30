# Documentation

## Templates

The following templates are coming with the module:

### SchemaOrgAdress
Renders the the provided address information with the schema.org structure. With the following inlcude params you can hide different parts like the phone number or company name:

- HideCompany1 [1/0]
- HideCompany2 [1/0]
- HideStreetInfo [1/0]
- HideZip [1/0]
- HideCity [1/0]
- HideCounty [1/0]
- HidePhone [1/0]
- HideFax [1/0]
- HideEmail [1/0]
- HideWebsite [1/0]

#### Example
```
    <% include SchemaOrgAdress HideStreetInfo=1 ... %>
```

### About
Renders a short about-us block by including the contents of the description fields as well as the address informations rendered with the schema.org structure. Like the other template, you can control the visibility of the following blocks:

- HideDescription1 [1|0]
- HideDescription2 [1|0]
- HideAddress [1|0]

#### Example
```
    <% include About HideDescription1=1 ... %>
```