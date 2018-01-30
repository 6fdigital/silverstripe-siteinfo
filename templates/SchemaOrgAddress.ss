<%--

Possible include vars:

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

--%>


<% with $SiteConfig %>

    <div itemscope itemtype="http://schema.org/{$Type}">

        <% if $GenericImage && $HideGenericImage == "" %>
            <% with $GenericImage %>
                <meta itemprop="image" content="https://www.denkfabrik-neueMedien.de/{$Filename}" />
            <% end_with %>
        <% end_if %>

        <% if $Company1 && $HideCompany1 == "" %>
            <span itemprop="name">$Company1 <% if $Company2 && $HideCompany2 == 0 %>$Company2<% end_if %></span>
            <br><br>
        <% end_if %>

        <strong><%t SchemaOrgAddress.ADDRESS "Address" %>:</strong>
        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
            <% if $Street && $StreetNumber && $HideStreetInfo == "" %>
                <span itemprop="streetAddress">$Street $StreetNumber</span>
                <br>
            <% end_if %>

            <% if $Zip && $HideZip == "" %>
                <span itemprop="postalCode">$Zip</span>
            <% end_if %>

            <% if $City && $HideCity == "" %>
                <span itemprop="addressLocality">$City<% if $Country %><br> $Top.CountryNice<% end_if %></span>
            <% end_if %>
        </div>
        <br>

        <% if $Phone && $HidePhone == "" %>
            <strong><%t SchemaOrgAddress.PHONE %>:</strong> <span itemprop="telephone">$Phone</span>
            <br>
        <% end_if %>

        <% if $Fax && $HideFax == "" %>
            <strong><%t SchemaOrgAddress.FAX %>:</strong> <span itemprop="faxNumber">$Fax</span>
            <br>
        <% end_if %>

        <% if $Email && $HideEmail == "" %>
            <strong><%t SchemaOrgAddress.EMAIL %>:</strong> <a href="$Email" itemprop="email">$Email</a>
            <br>
        <% end_if %>

        <% if $Website && $HideWebsite == "" %>
            <strong><%t SchemaOrgAddress.WEBSITE %>:</strong> <a href="$Website" itemprop="url">$Website</a>
        <% end_if %>
    </div>

<% end_with %>
