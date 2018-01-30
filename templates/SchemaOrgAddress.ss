<%--

Possible include vars:

- HideLogo [1|0]
- HideGenericImage [1|0]
- HideCompany1 [1|0]
- HideCompany2 [1|0]
- HideStreetInfo [1|0]
- HideZip [1|0]
- HideCity [1|0]
- HideCounty [1|0]
- HideGeoInfo [1|0]
- HidePhone [1|0]
- HideFax [1|0]
- HideEmail [1|0]
- HideWebsite [1|0]

--%>


<% with $SiteConfig %>

    <div itemscope itemtype="http://schema.org/{$Type}">

        <% if $Logo && $Top.HideLogo == "" && $Type != "Event" %>
            <% with $Logo %>
                <meta itemprop="logo" content="{$BaseHref}{$Filename}" />
            <% end_with %>
        <% end_if %>

        <% if $GenericImage && $Top.HideGenericImage == "" && $Type != "Organization" %>
            <% with $GenericImage %>
                <meta itemprop="image" content="{$BaseHref}{$Filename}" />
            <% end_with %>
        <% end_if %>

        <% if $Company1 && $Top.HideCompany1 == "" %>
            <span itemprop="name">$Company1 <% if $Company2 && $Top.HideCompany2 == 0 %>$Company2<% end_if %></span>
            <br><br>
        <% end_if %>

        <% if $Top.HideStreetInfo == "" && $Top.HideZip == "" && $Top.HideCity == "" && $Top.HideCountry == "" %>
            <strong><%t SchemaOrgAddress.ADDRESS "Address" %>:</strong>
        <% end_if %>
        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
            <% if $Street && $StreetNumber && $Top.HideStreetInfo == "" %>
                <span itemprop="streetAddress">$Street $StreetNumber</span>
                <br>
            <% end_if %>

            <% if $Zip && $Top.HideZip == "" %>
                <span itemprop="postalCode">$Zip</span>
            <% end_if %>

            <% if $City && $Top.HideCity == "" %>
                <span itemprop="addressLocality">$City<% if $Country %><br> $Top.CountryNice<% end_if %></span>
            <% end_if %>
        </div>

        <% if $Latitude && $Longitude && $Top.HideGeoInfo == "" %>
            <div itemtype="http://schema.org/GeoCoordinates" itemscope="" itemprop="geo">
                <meta itemprop="latitude" content="$Latitude" />
                <meta itemprop="longitude" content="$Longitude" />

            </div>
        <% end_if %>

        <br>

        <% if $Phone && $Top.HidePhone == "" %>
            <strong><%t SchemaOrgAddress.PHONE %>:</strong> <span itemprop="telephone">$Phone</span>
            <br>
        <% end_if %>

        <% if $Fax && $Top.HideFax == "" %>
            <strong><%t SchemaOrgAddress.FAX %>:</strong> <span itemprop="faxNumber">$Fax</span>
            <br>
        <% end_if %>

        <% if $Email && $Top.HideEmail == "" %>
            <strong><%t SchemaOrgAddress.EMAIL %>:</strong> <a href="$Email" itemprop="email">$Email</a>
            <br>
        <% end_if %>

        <% if $Website && $Top.HideWebsite == "" %>
            <strong><%t SchemaOrgAddress.WEBSITE %>:</strong> <a href="$Website" itemprop="url">$Website</a>
        <% end_if %>
    </div>

<% end_with %>
