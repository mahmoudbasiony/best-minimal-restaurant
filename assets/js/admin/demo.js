/**
 * Import data demo js.
 */
(function($){
    "use strict";
    $(document).on('click', '.urestaurant__import-button', function(e){
        e.preventDefault();

        var data = {
            'action' : 'urestaurant_import_demo_data',
            'security' : urestaurantDemo.ajax_nonce,
        };

        // Confirm import dialog.
        Swal.fire({
            title: urestaurantDemo.texts.dialog_title,
            text: urestaurantDemo.texts.dialog_text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: urestaurantDemo.texts.dialog_no,
            confirmButtonText: urestaurantDemo.texts.dialog_yes,
        }).then((result) => {
            if (result.value) {
                // Send import ajax.
                ajaxCall( data );
            }
        })
    });

    /**
     * The main AJAX call, which executes the import process.
     *
     * @param data data The data to be passed to the AJAX call.
     */
    function ajaxCall( data ) {
        $.ajax({
            url : urestaurantDemo.ajax_url,
            data : data,
            type : 'POST',
            beforeSend: function(e) {
                $('.js-urestaurant-ajax-loader').show();
            },
            success : function(response) {
                $('.js-urestaurant-ajax-loader').hide();
                var message = '';
                if(response && response.status && 500 == response.status){
                    message = response.message;
                    Swal.fire(
                        'Oops!',
                        message,
                        'error'
                    );
                }

                if(response && response.status && 509 == response.status){
                    message = response.message;
                    Swal.fire(
                        '',
                        message,
                        'info'
                    );
                }

                if(response && response.status && 200 == response.status){
                    message = response.message;
                    Swal.fire(
                        'Congratulations!',
                        message,
                        'success'
                    );
                }

                if(response && false === response.success && response.data && response.data.status && 500 === response.data.status){
                    message = response.data.message;
                    Swal.fire(
                        'Oops...!',
                        message,
                        'error'
                    );
                }
            },
            error : function(jqXHR, status, message) {
                $('.js-urestaurant-ajax-loader').hide();
                Swal.fire(
                    'Oops...!',
                    message,
                    'error'
                );
            }
        });
    }
})(jQuery);