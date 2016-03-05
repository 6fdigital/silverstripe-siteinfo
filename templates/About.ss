<%--

Possible include vars:

- HideDescription1 [1|0]
- HideDescription2 [1|0]
- HideAddress [1|0]

--%>

<% with $SiteConfig %>

    <% if $Description1 && $HideDescription1 == "" %>
        $Description1
    <% end_if %>

    <% if $Description2 && $HideDescription1 == "" %>
        $Description2
    <% end_if %>

    <% if $HideAddress == "" %>
        <% include SchemaOrgAddress %>
    <% end_if %>
<% end_with %>