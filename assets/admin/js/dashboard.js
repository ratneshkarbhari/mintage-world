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

// Text editor start
ClassicEditor.create(document.querySelector("#editor"), {
  // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
})
  .then((editor) => {
    window.editor = editor;
  })
  .catch((err) => {
    console.error(err.stack);
  });
// Text editor end

// $(document).ready(function () {
//   $("#myTable").on("click", ".BtnRemove", function () {
//     $(this).closest("tr").remove();
//   });
// });

// $(document).ready(function () {
//   $("#AddVariation").click(function () {
//     // var single = $("#single").val();
//     var selTag = document.getElementById("single");
//     console.log(selTag);
//     var text = selTag.options[selTag.selectedIndex].text;
//     var variationname = document.getElementById("variationname").value;
//     $("#myTable").append(
//       "<tr><td>" +
//         text +
//         "</td><td>" +
//         variationname +
//         "</td><td> <a class='btn btn-danger btn-sm mb-0 BtnRemove'>Remove</a></td></tr>"
//     );
//   });
// });

// $(document).ready(function () {
//   var selTag = document.getElementById("SelectList");
//   var SelectInput = document.getElementById("SelectInput");
//   var html =
//     "<tr><td>" +
//     selTag.innerHTML +
//     "</td><td><input id='variationname' type='text' class='form-control' placeholder='Enter Variation Title' value=''>" +
//     '</td><td> <a class="btn btn-primary btn-sm mb-0 addProduct" id="addProduct">  Add </a>  <button class="btn btn-danger remove"><i class="fa fa-times" aria-hidden="true"></i></button></td></tr>';

//   $(document).on("click", ".addProduct", function () {
//     // console.log(selTag);
//     $("#myTable tbody").append(html);
//   });

//   $(document).on("click", ".remove", function () {
//     $(this).parents("tr").remove();
//      select2();
//   });
// });
