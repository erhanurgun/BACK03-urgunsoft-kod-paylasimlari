<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Veri Gönderme</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <div id="message"></div>
    <form id="form" enctype="multipart/form-data">
        <input type="file" name="dosya">
        <input type="submit" value="Gönder">
    </form>
    <script>
        $(document).ready(function() {
            $("#form").submit(function(e) {
                e.preventDefault();
                let allData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "request.php",
                    data: allData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        let json = JSON.parse(data);
                        if (json.success) {
                            $("#message").html(json.success);
                        } else {
                            $("#message").html(json.error);
                        }
                    }
                }, "json");
            });
        });
    </script>

</html>