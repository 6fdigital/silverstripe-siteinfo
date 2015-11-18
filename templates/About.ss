
<% with $SiteConfig %>

    <% if $Description1 %>
        $Description1
    <% end_if %>

    <% if $Description2 %>
        $Description2
    <% end_if %>

    <% include SchemaOrgAddress %>
<% end_with %>