<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="jquery-3.2.1.js"></script>
</head>
<body>

<input id="input">
<ul id="result" style="float:left">
</ul>

<ul id="seleccionados" style="min-height:400px;float:right;border:1px red solid">
</ul>

</body>
</html>

<style>
.lipais {
  cursor:pointer;
}
</style>

<script>
  $(function() {

    $( document ).on( "click", ".lipais", function() {
      $('#seleccionados').append($(this));
    });


    $('#input').on('keyup',function() {

      var q = $(this).val();

      if(q != '' && q.length > 0) {
        $.get({
           url: 'autocomplete_result.php?q='+q,
           success : function(response) {
             $('#result').empty();

             $('#result').append(response);

           }
        });

      }
      });

  });
</script>
