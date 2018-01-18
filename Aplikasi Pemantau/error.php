<html>
<head>
    <title>Microsoft Azure Web App - Error 404</title>
    <style type="text/css">
        html {
            height: 100%;
            width: 100%;
        }

        #feature {
            width: 960px;
            margin: 75px auto 0 auto;
            overflow: auto;
        }

        #content {
            font-family: "Segoe UI";
            font-weight: normal;
            font-size: 22px;
            color: #ffffff;
            float: left;
            width: 460px;
            margin-top: 68px;
            margin-left: 0px;
            vertical-align: middle;
        }

            #content h1 {
                font-family: "Segoe UI Light";
                color: #ffffff;
                font-weight: normal;
                font-size: 60px;
                line-height: 48pt;
                width: 800px;
            }

        p a, p a:visited, p a:active, p a:hover {
            color: #ffffff;
        }

        #content a.button {
            background: #0DBCF2;
            border: 1px solid #FFFFFF;
            color: #FFFFFF;
            display: inline-block;
            font-family: Segoe UI;
            font-size: 24px;
            line-height: 46px;
            margin-top: 10px;
            padding: 0 15px 3px;
            text-decoration: none;
        }

            #content a.button img {
                float: right;
        
+IPD,1460:        padding: 10px 0 0 15px;
            }

            #content a.button:hover {
                background: #1C75BC;
            }        
    </style>
    <script type="text/javascript">
        function toggle_visibility(id) {
            var e = document.getElementById(id);
            if (e.style.display == 'block')
                e.style.display = 'none';
            else
                e.style.display = 'block';
        }
    </script>
</head>
<body bgcolor="#00abec">
    <div id="feature">
        <div id="content">
            <h1>Error 404 - Web app not found.</h1>
            <p>The web app you have attempted to reach is not available in this Microsoft Azure App Service region. This could be due to one of several reasons:
            <p>
                1. The web app owner has registered a custom domain to point to the Microsoft Azure App Service, but has not yet configured Azure to recognize it. <a href="#" onclick="toggle_visibility('moreone');">Click here to read more</a></abbr>.
                <div id="moreone" style="display:none">
                    <font size=2>
                      When an app owner wants to use a custom domain with a <a href="http://www.windowsazure.com/en-us/services/web-sites/">Microsoft Azure Web Apps</a> web app, Azure needs to be configured to recognize the custom domain name, so that it can route the request to the appropriate server in the region. After regi
+IPD,1460:stering the domain with a domain provider and configuring a DNS CNAME record to point to the app&#39;s Azurewebsites.net address (for example, contoso.azurewebsites.net), the web app owner also needs to go to the Azure Portal and configure the app for the new domain. <a href="http://www.windowsazure.com/en-us/documentation/articles/web-sites-custom-domain-name/">Click here</a> to learn more about configuring the custom domains for a web app.
                     </font>
</div>
        <p>
          2. The web app owner has moved the web app to a different region, but the DNS cache is still directing to the old IP Address that was used in the previous region. <a href="#" onclick="toggle_visibility('moretwo');">Click here to read more.</a>
            <div id="moretwo" style="display:none">
                <font size=2>
                    With <a href="http://www.windowsazure.com/en-us/services/web-sites/">Web Apps</a>, the app is stored in a datacenter located in the region that the web app owner has selected when creating the app, and Azure?s DNS server resolves the web app address that was chosen for it to that datacenter. DNS servers are in charge of resolving the name of the server the user is trying to reach into an IP address, but clients cache this information in order to be able to load the page as fast as possible. If this app was deleted and re-created in another region, the new app will have a different IP address, b
+IPD,764:ut the client might still be caching the old IP address.

                    First, try flushing the DNS client resolver cache <a href="https://technet.microsoft.com/en-us/library/bb490921.aspx">as described here</a>. If this does not help, this is probably due to the caching done on an intermediate DNS server such as the one used by your Internet Service Provider. If so, this issue should clear up soon, once the DNS cache reaches its time-to-live period. Please try to visit the app again in approximately one hour. If you continue to receive this error page, please contact <a href="http://www.windowsazure.com/en-us/support/options/">Microsoft support</a>.
                    </font>
            </div>
        </div>
     </div>
</body>
</html>
