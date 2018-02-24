var RigControl = {
    rigId: 0,
    checking: false,
    init: function (rigId) {
        var self = this;
        self.rigId = rigId
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
        jQuery('.re-check').on('click', function () {
            self.recheckRig(jQuery(this).data('rigid'));
        });
        jQuery('.reboot').on('click', function () {
            self.rebootRig(jQuery(this).data('rigid'));
        });
        jQuery('.set-config').on('click', function () {
            var $row = jQuery(this)
                .parent()
                .parent();
            self.setConfig(
                jQuery(this).parent().parent().data('cardid'),
                $row
            );
        });
    },

    setConfig: function (cardId, $row) {
        var self = this,
            data = {
            _token:LA.token,
            'id': cardId
        };

        $row.find('input')
            .each(function () {
                data[jQuery(this).attr('name')] = jQuery(this).val();
            });


        return jQuery.ajax({
            type: 'post',
            url: '/admin/rig/set-config/' + self.rigId,
            dataType: 'json',
            data: data,
            error: function () {
                toastr.error('Something went wrong. Please check logs.')
            }
        })
        .then(function (data) {
            if (data.success) {
                toastr.success(data.message ? data.message : 'Saved.');
                return;
            }

            toastr.error(data.message);
        });
    },

    recheckRig: function (rigId) {
        var self = this;
        if (!self.checking) {
            return jQuery.ajax({
                url: '/admin/rig/check/' + rigId,
                dataType: 'json',
                beforeSend: function () {
                    self.checking = true;
                },
                error: function () {
                    self.checking = false;
                    toastr.error('Error! Please check logs.');
                }
            })
                .then(function (data) {
                    toastr.success('Successfully checked');
                    location.reload();
                }.bind(this));
        }
    },

    rebootRig: function (rigId) {
        var self = this;
        if (!self.checking) {
            return jQuery.ajax({
                url: '/admin/rig/reboot/' + rigId,
                dataType: 'json',
                beforeSend: function () {
                    self.checking = true;
                },
                error: function () {
                    self.checking = false;
                    toastr.error('Error! Please check logs.');
                }
            })
                .then(function () {
                    toastr.success('Successfully rebooted.');
                    window.location.href = '/admin/rig';
                }.bind(this));
        }
    }
};

