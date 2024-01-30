function send_request(url,method,data){
  
    $.ajax({
      type: method,
      url: url,
      data: data,
      contentType: false,
      processData: false,
      success: function (response) {
        return response;
      }
   });
    
  }