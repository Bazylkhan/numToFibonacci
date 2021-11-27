$(document).ready(function () {
  $("form").submit(function (event) {
    event.preventDefault();
    let num = $("#numToFib").val();
    //---------------
    $.ajax({
      type: $(this).attr("method"),
      url: $(this).attr("action"),
      data: new FormData(this),
      contentType: false,
      catch: false,
      processData: false,
      success: function (result) {
        $("span").empty();
        $("#num").append(num);
        $("#fibonacci").append(result);
      },
    });
  });
});
