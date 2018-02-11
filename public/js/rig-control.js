jQuery(document).on('ready', function () {
    jQuery('.reset-form').on('click', function () {
        jQuery(this)
            .parent()
            .parent()
            .find('input')
            .each(function () {
                jQuery(this).val(
                    jQuery(this).data('value')
                );
            });
    });
});