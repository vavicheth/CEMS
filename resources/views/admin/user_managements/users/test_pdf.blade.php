<!DOCTYPE html>
<html>
<head>
    <title>My App</title>
    <!-- 1. Include required files. -->
    <script src="https://pspdfkit.your-site.com/pspdfkit.js"></script>

    <!-- Provide proper viewport information so that the layout works on mobile devices. -->
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"
    />
</head>
<body>
<!-- 2. Element where PSPDFKit will be mounted. -->
<div id="pspdfkit" style="width: 100%; height: 480px;"></div>

<!-- 3. Initialize PSPDFKit. -->
<script>
    PSPDFKit.load({
        container: "#pspdfkit",
        documentId: "<document_id>",
        authPayload: { jwt: "<jwt>" },
        instant: true
    })
        .then(function(instance) {
            console.log("PSPDFKit loaded", instance);
        })
        .catch(function(error) {
            console.error(error.message);
        });
</script>
</body>
</html>
