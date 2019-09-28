<script src="<?php echo base_url() ?>assets/jquery-migrate/jquery-migrate-1.2.1.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>

<script>

    $( "#form_offer" ).validate({
        rules: {
            filepdf: {
                required: true,
            },
            offer_pdf_title: {
                required: true,
            },
            offer_ending_date_pdf: {
                required: true,
            },
            offer_starting_date_pdf:{
                required: true,

            }
        }
    });

        $("#offer_ending_date").datepicker({dateFormat: "yy-mm-dd"});
        $("#offer_starting_date").datepicker({dateFormat: "yy-mm-dd"});

        $("#offer_ending_date_group").datepicker({dateFormat: "yy-mm-dd"});
        $("#offer_starting_date_group").datepicker({dateFormat: "yy-mm-dd"});

        $("#offer_ending_date_personal").datepicker({dateFormat: "yy-mm-dd"});
        $("#offer_starting_date_personal").datepicker({dateFormat: "yy-mm-dd"});

        $("body").on('focus', '.offer_ending_date_autocomplete', function () {
            $(this).datepicker({dateFormat: "yy-mm-dd"});
        });
        $("body").on('focus', '.offer_starting_date_autocomplete', function () {
            $(this).datepicker({dateFormat: "yy-mm-dd"});
        });

//    $( ".offer_ending_date_autocomplete" ).datepicker({ dateFormat: "yy-mm-dd" });
//    $( ".offer_starting_date_autocomplete" ).datepicker({ dateFormat: "yy-mm-dd" });

        $('#offer_ending_time').timepicker({
            'minTime': '12:00am',
            'maxTime': '11:59pm',
            'timeFormat': 'H:i:s',
            'step': '10',
            // 'showDuration': true
        });

        $('#offer_starting_time').timepicker({
            'minTime': '12:00am',
            'maxTime': '11:59pm',
            'timeFormat': 'H:i:s',
            'step': '10',
            //'showDuration': true
        });

        $('#offer_ending_time_group').timepicker({
            'minTime': '12:00am',
            'maxTime': '11:59pm',
            'timeFormat': 'H:i:s',
            'step': '10',
            // 'showDuration': true
        });

        $('#offer_starting_time_group').timepicker({
            'minTime': '12:00am',
            'maxTime': '11:59pm',
            'timeFormat': 'H:i:s',
            'step': '10',
            //'showDuration': true
        });

        $('#offer_ending_time_personal').timepicker({
            'minTime': '12:00am',
            'maxTime': '11:59pm',
            'timeFormat': 'H:i:s',
            'step': '10',
            // 'showDuration': true
        });

        $('#offer_starting_time_personal').timepicker({
            'minTime': '12:00am',
            'maxTime': '11:59pm',
            'timeFormat': 'H:i:s',
            'step': '10',
            //'showDuration': true
        });

        $('*[name=offer_send_later_date_time]').appendDtpicker();

        $("#offer_send_now").change(function () {
            var val = $(this).val();
            if (val == 0) {
                $("#offer_send_later_date_time_div").css("display", "block");
            }
            else {
                $("#offer_send_later_date_time_div").css("display", "none");
            }
        });

        $("#offer_send_now_group").change(function () {
            var val = $(this).val();
            if (val == 0) {
                $("#group_offer_send_later_date_time_div").css("display", "block");
            }
            else {
                $("#group_offer_send_later_date_time_div").css("display", "none");
            }
        });


        $("#offer_send_now_personal").change(function () {
            var val = $(this).val();
            if (val == 0) {
                $("#group_offer_send_later_date_time_div").css("display", "block");
            }
            else {
                $("#group_offer_send_later_date_time_div").css("display", "none");
            }
        });


        //Send by Birth year
        $('input:checkbox[name="send_by_birth_year"]').click(function () {
            if ($(this).is(':checked')) {
                $('#message_send_by_birth_year_id').removeAttr('disabled');
                //$('#message_send_by_birth_year_id').setAttribute('disabled', false);//= false;
            }
            else {
                $('#message_send_by_birth_year_id').attr('disabled', 'disabled');
            }
        });

        //Send by Birth Month
        $('input:checkbox[name="send_by_birth_month"]').click(function () {
            if ($(this).is(':checked')) {
                $('#message_send_by_birth_month_id').removeAttr('disabled');
            }
            else {
                $('#message_send_by_birth_month_id').attr('disabled', 'disabled');
            }
        });
        //Send by Birth Age Limit
        $('input:checkbox[name="send_by_age_limit"]').click(function () {
            if ($(this).is(':checked')) {
                $('#age_from').removeAttr('disabled');
                $('#age_to').removeAttr('disabled');
            }
            else {
                $('#age_from').attr('disabled', 'disabled');
                $('#age_to').attr('disabled', 'disabled');
            }
        });

        //Send by city
        $('input:checkbox[name="send_by_city"]').click(function () {
            if ($(this).is(':checked')) {
                $('#message_send_city_name').removeAttr('disabled');
            }
            else {
                $('#message_send_city_name').attr('disabled', 'disabled');
            }
        });

        //Send by region
        $('input:checkbox[name="send_by_region"]').click(function () {
            if ($(this).is(':checked')) {
                $('#message_send_region_name').removeAttr('disabled');
            }
            else {
                $('#message_send_region_name').attr('disabled', 'disabled');
            }
        });

        //Send by Post Code
        $('input:checkbox[name="send_by_post_code"]').click(function () {
            if ($(this).is(':checked')) {
                $('#message_send_post_code').removeAttr('disabled');
            }
            else {
                $('#message_send_post_code').attr('disabled', 'disabled');
            }
        });


        $(document).on('keyup', '.app_user_name_class', function () {
            var search_keywords = $(this).val();
            var dataString = 'search=' + search_keywords;
            if (search_keywords != '') {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Offer/ajax_find_app_user",
                    data: dataString,
                    cache: false,
                    success: function (html) {
                        $("#result_personal_client").html(html).show();
                    }

                });
            }
            return false;
        });


        jQuery("#result_personal_client").on("click", function (e) {

            var $clicked = $(e.target);
            var $name = $clicked.find('.name').html();
            var $app_user_id = $clicked.find('.client_id').html();

            $('#app_user_hidden_id').val($app_user_id);


            var decoded = $("<div/>").html($name).text();


            $('#app_user_name_text_field').val(decoded);
        });
        jQuery(document).on("click", function (e) {
            var $clicked = $(e.target);
            if (!$clicked.hasClass("app_user_name_class")) {
                jQuery("#result_personal_client").fadeOut();
            }
        });
        $('#app_user_name_text_field').click(function () {
            jQuery("#result_personal_client").fadeIn();
        });


</script>


<script>

    var i = 1;
    var sl = 1;
    $('#select_product').autocomplete({
        source: function (request, response) {
            //console.log(request);
            $.ajax({
                url: '<?php echo site_url("Products/get_all_product_data_autocomelete");?>',
                data: {'select_product': request.term},
                dataType: "json",
                type: "POST",
                success: function (data) {

                    response($.map(data, function (item) {

                        return {
                            label: item.product_id + " " + item.descrizione_h1,
                            value: item.descrizione_h1,
                            data: item
                        };
                    }));
                }

            });
        },
        autoFocus: true,
        minLength: 0,

        select: function (event, ui) {
            var names = ui.item.data;
            var select_product = names.test_name;

//                var newData = '<tr class="child text-center" ><td>' + names.product_id + '<input type="hidden" class="form-control" name="product_id[]" value="' + names.product_id + '" /></td><td><img src="' + names.linkImmagineProdotto + '" height="60" width="60"> </td><td>'+names.descrizione_h1+'</td><td>'+names.prezzo_web_netto+'</td> <td><input type="text" class="form-control" name="offer_price[]" placeholder="Offer Price" required></td><td><input type="text" class="form-control offer_ending_date_autocomplete" name="offer_start_date_auto[]" placeholder="Start Date" required></td><td><input type="text" class="form-control offer_ending_date_autocomplete" name="offer_end_date_auto[]" placeholder="End Date" required></td><td><button class="remove  btn btn-default btn-sm "><i class="fa fa-trash text-danger"> </i></button>   </td></tr>';
            var newData = '<tr class="child text-center" ><td>' + names.final_product_id + '<input type="hidden" class="form-control" name="product_id[]" value="' + names.final_product_id + '" /></td><td><img src="' + names.linkImmagineProdotto + '" height="60" width="60"> </td><td>' + names.descrizione_h1 + '</td><td>' + names.prezzo_web_netto + '<input type="hidden" name="normal_price[]" value="' + names.prezzo_web_netto + '"></td> <td><input type="number" class="form-control" name="offer_products_offer_price[]" placeholder="Offer Price" required></td><td><input type="text" class="form-control offer_ending_date_autocomplete" name="offer_products_starting_date_time[]" placeholder="Start Date" required></td><td><input type="text" class="form-control offer_ending_date_autocomplete" name="offer_products_ending_date_time[]" placeholder="End Date" required></td><td><button class="remove  btn btn-default btn-sm "><i class="fa fa-trash text-danger"> </i></button>   </td></tr>';

            $('#productTable tbody').append(newData);


            i++;
            sl++;

            ui.item.value = "";
        }


    });


    $('#productTable tbody').on('click', ".remove", function (e) {
        e.preventDefault();
        $(this).closest('tr').remove();

    });


    var i = 1;
    var sl = 1;
    $('#select_product2').autocomplete({
        source: function (request, response) {
            //console.log(request);
            $.ajax({
                url: '<?php echo site_url("Products/get_all_product_data_autocomelete");?>',
                data: {'select_product': request.term},
                dataType: "json",
                type: "POST",
                success: function (data) {

                    response($.map(data, function (item) {

                        return {
                            label: item.product_id + " " + item.descrizione_h1,
                            value: item.descrizione_h1,
                            data: item
                        };
                    }));
                }

            });
        },
        autoFocus: true,
        minLength: 0,

        select: function (event, ui) {
            var names = ui.item.data;
            var select_product = names.test_name;

            var newData = '<tr class="child text-center" ><td>' + names.final_product_id + '<input type="hidden" class="form-control" name="product_id[]" value="' + names.final_product_id + '" /></td><td><img src="' + names.linkImmagineProdotto + '" height="60" width="60"> </td><td>' + names.descrizione_h1 + '</td><td>' + names.prezzo_web_netto + '<input type="hidden" name="normal_price[]" value="' + names.prezzo_web_netto + '"></td> <td><input type="number" class="form-control" name="offer_products_offer_price[]" placeholder="Offer Price" required></td><td><input type="text" class="form-control offer_ending_date_autocomplete" name="offer_products_starting_date_time[]" placeholder="Start Date" required></td><td><input type="text" class="form-control offer_ending_date_autocomplete" name="offer_products_ending_date_time[]" placeholder="End Date" required></td><td><button class="remove  btn btn-default btn-sm "><i class="fa fa-trash text-danger"> </i></button>   </td></tr>';

            $('#productTable2 tbody').append(newData);


            i++;
            sl++;

            ui.item.value = "";
        }


    });


    $('#productTable2 tbody').on('click', ".remove", function (e) {
        e.preventDefault();
        $(this).closest('tr').remove();

    });


    slN = 1;

    $('#freeTextproductButton').click(function (e) {

        e.preventDefault();


        $("#form").validate({
            rules: {
                product_title: {
                    required: true

                },
                product_description:{
                    required: true
                },
                product_normal_price:{
                    required: true,
                    number: true
                },
                product_offer_price:{
                    required: true,
                    number: true
                },
                offer_ending_date:{
                    required: true
                },
                userfile:{
                    required: true
                },
                offer_starting_date:{
                    required: true

                }
            }
        }).form();

        if ($("#form").valid()) {


            var productTitle = $('#product_title_text_field').val();
            var productDescription = $('#product_description').val();
//            var productImage=$('#imageFreeText' ).val();
            var normalPrice = $('#normal_price').val();
            var offerPrice = $('#product_offer_price').val();
            var start_date = $('#offer_starting_date_freeText').val();
            var end_date = $('#offer_ending_date_FreeText').val();


            var newData = '<tr class="child text-center" ><td><input type="hidden" value="' + slN + '" class="readonlyInputField"  > ' + slN + '</td><td> <img id="blah" height="60" width="60" src="' + img + '"> <input type="hidden" name="product_free_text_image_storage_path[]" value="' + img + '" > </td><td>' + productTitle + '<input type="hidden" name="product_title[]" value="' + productTitle + '" > </td><td>' + productDescription + '<textarea type="hidden" style="display: none" name="product_description[]">' + productDescription + '</textarea> </td> <td>' + normalPrice + '<input type="hidden" value="' + normalPrice + '" name="normalPriceFreeText[]"> </td><td>' + offerPrice + '<input type="hidden" value="' + offerPrice + '" name="offer_products_offer_price[]"></td><td>' + start_date + '<input type="hidden" value="' + start_date + '" name="offer_products_start_date_time[]"></td><td>' + end_date + '<input type="hidden" value="' + end_date + '" name="offer_products_ending_date_time[]"></td><td><button class="remove  btn btn-default btn-sm "><i class="fa fa-trash text-danger"> </i></button>   </td></tr>';

            $('#freetextTable tbody').append(newData);

            $('#product_title_text_field').val("");
            $('#product_description').val("");
            $('#imageFreeText').val("");
            $('#normal_price').val("");
            $('#product_offer_price').val("");
            $('#offer_starting_date_freeText').val("");
            $('#offer_ending_date_FreeText').val("");
            $('#imageFreeText').val("");

            slN++;
        }

    });


    $('#freetextTable tbody').on('click', ".remove", function (e) {
        e.preventDefault();
        $(this).closest('tr').remove();

    });


    slN = 1;
    img = null;




    $('#AddProductWithoutNetwork').click(function (e) {

            e.preventDefault();
        $("#form32").validate({
            rules: {
                product_title: {
                    required: true

                },
                product_description:{
                    required: true
                },
                product_normal_price:{
                    required: true,
                    number: true
                },
                product_offer_price:{
                    required: true,
                    number: true
                },
                offer_ending_date:{
                    required: true
                },
                userfile:{
                    required: true
                },
                offer_starting_date:{
                    required: true

                }
            }
        }).form();

        if ($("#form32").valid()) {


            var productTitle = $('#product_title_text_field_add_pdf').val();
            var productDescription = $('#product_description_add_pdf').val();
//            var productImage=$('#imageFreeText_add_pdf' ).val();
            var normalPrice = $('#product_normal_price_add_pdf').val();
            var offerPrice = $('#product_offer_price_add_pdf').val();
            var start_date = $('#offer_starting_date_personal').val();
            var end_date = $('#offer_ending_date_personal').val();


//            var newData = '<tr class="child text-center" ><td><input type="hidden" value="' + slN + '" class="readonlyInputField"  > ' + slN +'</td><td><div class="gallery"><input type="hidden" name="product_free_text_image_storage_path[]" value="'+img+'" > <img id="blah" height="60" width="60" src='+img+'>  </div></td><td>'+productTitle+'<input type="hidden" name="productTitlefreeText[]" value="'+productTitle+'" ><textarea type="hidden" style="display: none" name="productDescriptionFreeText[]">'+productDescription+'</textarea>  </td><td>'+normalPrice+'<input type="hidden" value="'+normalPrice+'" name="normalPriceFreeText[]"> </td><td>'+offerPrice+'<input type="hidden" value="'+offerPrice+'" name="offerPriceFreeText[]"></td><td>'+start_date+'<input type="hidden" value="'+start_date+'" name="start_date_free[]"></td><td>'+end_date+'<input type="hidden" value="'+end_date+'" name="end_date_free[]"></td><td><button class="remove  btn btn-default btn-sm "><i class="fa fa-trash text-danger"> </i></button>   </td></tr>';

            var newData = '<tr class="child text-center" ><td><input type="hidden" value="' + slN + '" class="readonlyInputField"  > ' + slN + '</td><td> <img id="blah" height="60" width="60" src="' + img + '"> <input type="hidden" name="product_free_text_image_storage_path[]" value="' + img + '" > </td><td>' + productTitle + '<input type="hidden" name="product_title[]" value="' + productTitle + '" > </td><td style="display: none;">' + productDescription + '<textarea   name="product_description[]">' + productDescription + '</textarea> </td> <td>' + normalPrice + '<input type="hidden" value="' + normalPrice + '" name="normalPriceFreeText[]"> </td><td>' + offerPrice + '<input type="hidden" value="' + offerPrice + '" name="offer_products_offer_price[]"></td><td>' + start_date + '<input type="hidden" value="' + start_date + '" name="offer_products_start_date_time[]"></td><td>' + end_date + '<input type="hidden" value="' + end_date + '" name="offer_products_ending_date_time[]"></td><td><button class="remove  btn btn-default btn-sm "><i class="fa fa-trash text-danger"> </i></button>   </td></tr>';

            $('#productTable tbody').append(newData);

            $('#product_title_text_field_add_pdf').val("");
            $('#product_description_add_pdf').val("");
            $('#imageFreeText_add_pdf').val("");
            $('#product_normal_price_add_pdf').val("");
            $('#product_offer_price_add_pdf').val("");
            $('#offer_starting_date_personal').val("");
            $('#offer_ending_date_personal').val("");
            $('.fileupload-preview img').attr('src', 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image');

            slN++;

        }


    });


    //        $('#productTable tbody').on('click', ".remove", function (e) {
    //            e.preventDefault();
    //            $(this).closest('tr').remove();
    //
    //        });


    $('#image_add_pdf').change(function (e) {
        openFile(e);
    });
    var openFile = function (e) {
        var input = e.target;

        var reader = new FileReader();
        reader.onload = function () {
            var dataURL = reader.result;
            img = dataURL;

        };
        reader.readAsDataURL(input.files[0]);
    };

    $('#imageFreeText').change(function (e) {
        openFile(e);
    });
    var openFile = function (e) {
        var input = e.target;

        var reader = new FileReader();
        reader.onload = function () {
            var dataURL = reader.result;
            img = dataURL;

        };
        reader.readAsDataURL(input.files[0]);
    };





</script>