
<% with $SiteConfig %>

    <div itemscope itemtype="http://schema.org/Organization">
        <% if $Company1 %>
            <span itemprop="name">$Company1 <% if $Company2 %>$Company2<% end_if %></span>
            <br><br>
        <% end_if %>


        <strong><%t SchemaOrgAddress.ADDRESS "Address" %>:</strong>
        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
            <% if $Street && $StreetNumber %>
                <span itemprop="streetAddress">$Street $StreetNumber</span>
                <br>
            <% end_if %>

            <% if $Zip %>
                <span itemprop="postalCode">$Zip</span>
            <% end_if %>

            <% if $City %>
                <span itemprop="addressLocality">$City<% if $Country %><br> $Top.CountryNice<% end_if %></span>
            <% end_if %>
        </div>
        <br>

        <% if $Phone %>
            <strong><%t SchemaOrgAddress.PHONE %>:</strong> <span itemprop="telephone">$Phone</span>
            <br>
        <% end_if %>

        <% if $Fax %>
            <strong><%t SchemaOrgAddress.FAX %>:</strong> <span itemprop="faxNumber">$Fax</span>
            <br>
        <% end_if %>

        <% if $Email %>
            <strong><%t SchemaOrgAddress.EMAIL %>:</strong> <a href="$Email" itemprop="email">$Email</a>
            <br>
        <% end_if %>

        <% if $Website %>
            <strong><%t SchemaOrgAddress.WEBSITE %>:</strong> <a href="$Website" itemprop="url">$Website</a>
        <% end_if %>
    </div>

<% end_with %>