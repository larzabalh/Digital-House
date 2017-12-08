<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<input id="input">
<button>Click para buscar!</button>

<div id="images"></div>


</body>
</html>


<script>
    $("button").on("click", handleButtonClick);

    function jsonFlickrFeed(json) {

        $("#images").empty();

        $.each(json.items, function(i, item) {

            var el = '<p>' + item.title + '</p>';
            el += '<img src="'+item.media.m+'" />';

            $('#images').append(el);

            //$("<img />").attr("src", item.media.m).appendTo("#images");
        });
    };

    function handleButtonClick() {

        $.ajax({
            url: 'https://api.flickr.com/services/feeds/photos_public.gne',
            dataType: 'jsonp',
            data: { "tags": $("#input").val(), "format": "json" }
        });
    }
</script>
