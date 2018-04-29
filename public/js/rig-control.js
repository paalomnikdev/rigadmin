var RigControl = {
    rigId: 0,
    minerOptions: [],
    minerCommand: null,
    checking: false,
    init: function (rigId, minerOptions, minerCommand) {
        var self = this;
        self.rigId = rigId;
        self.minerOptions = minerOptions;
        self.minerCommand = minerCommand;
        self.initCommandDropdown();
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
        jQuery('#start-miner').on('click', function () {
            self.startMiner(self.rigId);
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
        jQuery('#miner-command').on('change', function () {
            let $preview = jQuery('#preview-command');
            let commandId = jQuery(this).val();
            $preview.attr('disabled', false);
            if (commandId) {
                $preview.data('content', self.minerOptions[jQuery('#miner').val()][commandId]['command']);
            }
        });
        jQuery('#miner').on('change', function () {
            self.fillOptions(jQuery(this).val());
        });
    },

    initCommandDropdown: function () {
        let $miner = jQuery('#miner');
        if ($miner.val()) {
            this.fillOptions($miner.val());
        }
        jQuery('#preview-command').on('click', function (e) {
            e.preventDefault();
            jQuery(this).simplePopup({
                type: 'data',
                escapeKey: true,
                fadeInDuration: 1.0
            });
        });
    },

    fillOptions: function (minerId) {
        let $commandList = jQuery('#miner-command');
        $commandList.find('option:gt(0)').remove();
        if (this.minerOptions[minerId]) {
            jQuery.each(this.minerOptions[minerId], (key, value) => {
                let current = value.command == this.minerCommand;
                $commandList.append(jQuery("<option></option>")
                .attr("value", key)
                .attr('selected', current)
                .text(value.title));

                if (current) {
                    let $previewButton = jQuery('#preview-command');
                    $previewButton.attr('disabled', false);
                    $previewButton.data('content', value.command)
                }
            });
        }
        $commandList.trigger('change');
        $commandList.selectpicker('refresh');
    },

    startMiner: function () {
        let self = this;
        jQuery.ajax({
            type: 'post',
            url: '/admin/rig/miner/' + self.rigId,
            dataType: 'json',
            data: {
                _token: LA.token,
                miner_command: jQuery('#miner-command').val(),
                miner: jQuery('#miner').val()
            },
            success: function (data) {
                if (data.success) {
                    toastr.success(data.message ? data.message : 'Miner saved.');
                }
                setTimeout(() => {location.reload()}, 62000)
            },

            error: function () {
                toastr.error('System error.');
            }
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

