function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
  // document.location.href = "index.html";
}

$(function () {
  $("#AddHistory").bind("click", function () {
    var txtComment = document.getElementById("txtComment").value;
    var chkNotify = document.getElementById("chkNotify");
    var notifyme = "";
    if (chkNotify.checked == true) {
      notifyme = "Yes";
    } else {
      notifyme = "No";
    }
    console.log(notifyme);
    var ddlStatus = document.getElementById("ddlStatus").value;
    var div = $("<tr />");
    div.html(GetDynamicTextBox(""));
    $("#TextBoxContainer").append(div);
  });
  $("body").on("click", ".remove", function () {
    $(this).closest("tr").remove();
  });
});
function GetDynamicTextBox(value) {
  return `<td class="text-left">09/03/2022</td><td class="text-left">${txtComment.value}</td><td class="text-left">${chkNotify.value}</td><td class="text-left">${ddlStatus.value}</td></tr>`;
}
