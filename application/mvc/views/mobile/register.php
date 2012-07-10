<!DOCTYPE html>
<html>
<head>
    <title>TrxnMVC Register</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a4/jquery.mobile-1.0a4.min.css" />
    <script src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.0a4/jquery.mobile-1.0a4.min.js"></script>
</head>
<body>
<script>
    function onSuccess(data, status)
    {
        data = $.trim(data);
        if(data == 'true'){
            window.location.replace('<?php echo urlpath;?>/mobile/index');
        } else {
            document.getElementById('resultFail').innerHTML = 'Unable to submit data, please check parameters and try again';
            document.getElementById('resultFailDescription').innerHTML = data;
        }
    }

    function onError(data, status)
    {
        // handle an error
        document.getElementById('resultFail').innerHTML = 'Unable to submit data, please check parameters and try again';
    }

    $(document).ready(function() {
        $("#submit").live(function(){

            var formData = $("#registerDetails").serialize();

            $.ajax({
                type: "POST",
                url: "/mobile/register",
                cache: false,
                data: formData,
                success: onSuccess,
                error: onError
            });

            return false;
        });
    });
</script>

<!-- call ajax page -->
<div data-role="page" id="registerDetailsPage">
    <div data-role="header">
        <h1>TrxnMVC Register</h1>
    </div>

    <div data-role="content">
        <form id="registerDetails">
            <div data-role="fieldcontain">
                <div id="result">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" value=""  />

                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" value=""  />

                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value=""  />

                    <label for="mobile">Mobile Phone</label>
                    <input type="text" name="mobile" id="mobile" value=""  />

                    <div id="resultFail"></div>
                    <div id="resultFailDescription"></div>

                    <button data-theme="b" id="submit" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>