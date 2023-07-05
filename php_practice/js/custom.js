$(document).ready(function () {
  $(window).on("load", function () {
    // show active page
    $(".sub-list.active").closest(".title").addClass("active-parent");
    $(".sub-list.active").parent(".list").show();
  });
  // Sidebar with Submenu
  $(".title ul").hide();
  $(".title a").click(function (e) {
    $(this).parent(".title").children("ul").slideToggle("100");
    $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
  });
  $(".title .list .sub-list a").click(function (e) {
    $(this).parent(".sub-list").children("ul").slideToggle("100");
  });
  $(document).bind("click", function (e) {
    var $clicked = $(e.target);
    if (!$clicked.parents().hasClass("drop-down"))
      $(".breadcrumb-item .language .drop-down .options ul").hide();
  });

  $("#register-form").validate({
    rules: {
      username: {
        required: true,
        maxlength: 100,
      },
      email: {
        required: true,
        email: true,
        // accept: "[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,}",
      },
      phone: {
        required: true,
        minlength: 10,
        maxlength: 20,
        digits: true,
      },
    },
    messages: {
      username: {
        required: "Username is required",
      },
      email: {
        required: "Email is required",
        // email: "Invalid Email",
      },
      phone: {
        required: "Phone Number is required",
        // minlength: "this field must contain at least {10} digits",
        // digits: "this field can only contain numbers",
      },
    },
  });

  // AJAX Check email already existed
  $("#email_address").on("change", function (e) {
    var email_id = $("#email_address").val();
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email_id)) {
      return false;
    }
    $.ajax({
      type: "POST",
      url: "./ajax/check_email.php",
      data: { email: email_id },
      dataType: "json",
      success: function (response) {
        if (response.status == "False") {
          $(".email-error").text(response.message);
          $("#email_address").val("");
        } else {
          $(".email-error").text("");
        }
      },
    });
  });

  //  Check phone validation
  $("#contact_number").on("change", function () {
    var contact_num = $("#contact_number").val();
    var regex = /^[0-9]{10}/;
    if (!regex.test(contact_num)) {
      $(".contact-error").text(" only numbers & at least {10} digits");
      return false;
    }
    $.ajax({
      type: "POST",
      url: "./ajax/check_contact.php",
      data: { contact: contact_num },
      dataType: "json",
      success: function (response) {
        if (response.status == "False") {
          $(".contact-error").text(response.message);
          $("#contact_number").val("");
        } else {
          $(".contact-error").text("");
        }
      },
    });
  });

  // AJAX Country City Dropdown
  $("#country").on("change", function () {
    var countryId = $(this).val();
    // console.log(countryId);

    $("#state").empty();

    $.ajax({
      type: "POST",
      url: "./ajax/ajax.php",
      dataType: "json",
      data: { id: countryId },
      success: function (response) {
        //console.log(response);
        $("#state").append(`<option value="">Select State</option>`);
        $.each(response, function (k, v) {
          //console.log(k);
          //console.log(v);
         
          $("#state").append('<option value="' + k + '">' + v + "</option>");
        });
        $("#state").append(`<option value="other" id="other-option">Other</option>`);
      },
      error: function (response) {
        console.log(response);
      },
    });
  });

  $("#state").on("change", function () {
    var stateId = $(this).val();
    if (stateId == "other") {
      $("#exampleModal").modal("show");
    }

    $("#city").empty();
    $.ajax({
      type: "POST",
      url: "./ajax/ajax.php",
      dataType: "json",
      data: { stateId: stateId },
      success: function (response) {
        $("#city").append(`<option value="">Select City</option>`);
        $.each(response, function (k, v) {
          
          $("#city").append('<option value="' + k + '">' + v + "</option>");
        });
      },
      error: function (response) {
        console.log(response);
      },
    });
  });

  $("#save_state").on("click", function () {
    var state = $("#new_state_name").val();
    var country = $("#country").val();
    if(state == ""){
      $(".modal-box").append(
        "<div><p class='text-danger mt-1 ms-3 mb-2 state-error'>Can't add blank State</p></div>"
      );
    }
    else{
      $.ajax({
        type: "POST",
        url: "./ajax/ajax.php",
        dataType: "json",
        data: { state_name: state, country_id: country },
        success: function (response) {
          if(response.status == "Blank"){
            $(".modal-box").append(
                  "<div><p class='text-danger mt-1 ms-3 mb-2 state-error'>Blank State Not Allowed</p></div>"
                );
          }
          if (response.status == "False") {
            $(".modal-box").remove(
              "<div><p class='text-danger mt-1 ms-3 mb-2 state-error'>Alredy Existed State</p></div>"
            );
            $(".modal-box").append(
              "<div><p class='text-danger mt-1 ms-3 mb-2 state-error'>Alredy Existed State</p></div>"
            );
          } if (response.status == "True") {
            $("#state").append('<option id="other-id" value="' + response.state_id + '" selected>' + response.name + '</option>');
            $("#exampleModal").modal("hide");
  
          }
        },
        error: function (response) {
          console.log(response);
        },
      });
    }
    // $(this).off('click');
   
  });
  $(".close").on("click", function (e) {
    console.log("Close");
    //$("#state option:selected").removeAttr("selected");
    $('#state').val('').trigger('change');

    /* $("#other-option").remove();
    $("#state").append(`<option value="other" id="other-option">Other</option>`);
    $(".state-error").remove();
    $("#new_state_name").val(""); */

  })
});
