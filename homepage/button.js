<!-- Getbutton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "085790774702", // WhatsApp number
            telegram: "jordanistiqlal", // Telegram bot username
            call_to_action: "Message us", // Call to action
            button_color: "#A8CE50", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "whatsapp,telegram", // Order of buttons
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /Getbutton.io widget -->