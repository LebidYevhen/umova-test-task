'use strict';

$(document).ready(function () {
    $('.city').select2({
        dropdownPosition: 'below'
    });

    $('input[name=phone]').inputmask({"mask": "999-999-9999"});

    $('#form').submit(function (e) {
        e.preventDefault();

        const formData = $(this).serialize();

        const form = $('.form');

        $.ajax({
            type: 'POST',
            url: 'submit.php',
            data: formData,
            dataType: 'json',
            beforeSend: function () {
                form.css({'opacity': 0.5, 'pointer-events': 'none'});
            },
            success: function (response) {
                $('.error-field').remove();
                $('.success').remove();
                if (response.errors !== null && response.errors !== undefined) {
                    renderErrors(response.errors);
                }
                if (response.success === true) {
                    form[0].reset();
                    const successField = $('<span>');
                    successField.text(response.message).addClass(`success`);
                    form.prepend(successField);
                }
                if (response.success === false) {
                    const errorField = $('<span>');
                    errorField.text(response.message).addClass(`error`);
                    form.prepend(errorField);
                }
                form.css({'opacity': 1, 'pointer-events': ''});
            },
        });
    });

    function renderErrors(errors) {
        $.each(errors, function (key, value) {
            const errorField = $('<span>');
            errorField.text(value).addClass(`error-field ${key}`);
            if (key === 'privacyPolicy') {
                $('.form__privacy-policy-wrapper').after(errorField);
            } else {
                $(`label[for=${key}]`).append(errorField);
            }
        })
    }

    const passwordInput = $('input[type=password]');
    passwordInput.on('change', function () {
        if ($(this).val()) {
            $(this).parent().addClass('not-empty');
        } else {
            $(this).parent().removeClass('not-empty');
        }
    })

    const showPassword = $('.password-show');
    showPassword.on('click', function () {
        const input = $(this).parent().addClass('visible').find('input[type=password]');
        input.attr('type', 'text');
    })

    const hidePassword = $('.password-hide');
    hidePassword.on('click', function () {
        const input = $(this).parent().removeClass('visible').find('input[type=text]');
        input.attr('type', 'password');
    })
});

(function ($) {

    var Defaults = $.fn.select2.amd.require('select2/defaults');

    $.extend(Defaults.defaults, {
        dropdownPosition: 'auto'
    });

    var AttachBody = $.fn.select2.amd.require('select2/dropdown/attachBody');

    var _positionDropdown = AttachBody.prototype._positionDropdown;

    AttachBody.prototype._positionDropdown = function () {

        var $window = $(window);

        var isCurrentlyAbove = this.$dropdown.hasClass('select2-dropdown--above');
        var isCurrentlyBelow = this.$dropdown.hasClass('select2-dropdown--below');

        var newDirection = null;

        var offset = this.$container.offset();

        offset.bottom = offset.top + this.$container.outerHeight(false);

        var container = {
            height: this.$container.outerHeight(false)
        };

        container.top = offset.top;
        container.bottom = offset.top + container.height;

        var dropdown = {
            height: this.$dropdown.outerHeight(false)
        };

        var viewport = {
            top: $window.scrollTop(),
            bottom: $window.scrollTop() + $window.height()
        };

        var enoughRoomAbove = viewport.top < (offset.top - dropdown.height);
        var enoughRoomBelow = viewport.bottom > (offset.bottom + dropdown.height);

        var css = {
            left: offset.left,
            top: container.bottom
        };

        // Determine what the parent element is to use for calciulating the offset
        var $offsetParent = this.$dropdownParent;

        // For statically positoned elements, we need to get the element
        // that is determining the offset
        if ($offsetParent.css('position') === 'static') {
            $offsetParent = $offsetParent.offsetParent();
        }

        var parentOffset = $offsetParent.offset();

        css.top -= parentOffset.top
        css.left -= parentOffset.left;

        var dropdownPositionOption = this.options.get('dropdownPosition');

        if (dropdownPositionOption === 'above' || dropdownPositionOption === 'below') {
            newDirection = dropdownPositionOption;
        } else {

            if (!isCurrentlyAbove && !isCurrentlyBelow) {
                newDirection = 'below';
            }

            if (!enoughRoomBelow && enoughRoomAbove && !isCurrentlyAbove) {
                newDirection = 'above';
            } else if (!enoughRoomAbove && enoughRoomBelow && isCurrentlyAbove) {
                newDirection = 'below';
            }

        }

        if (newDirection == 'above' ||
            (isCurrentlyAbove && newDirection !== 'below')) {
            css.top = container.top - parentOffset.top - dropdown.height;
        }

        if (newDirection != null) {
            this.$dropdown
                .removeClass('select2-dropdown--below select2-dropdown--above')
                .addClass('select2-dropdown--' + newDirection);
            this.$container
                .removeClass('select2-container--below select2-container--above')
                .addClass('select2-container--' + newDirection);
        }

        this.$dropdownContainer.css(css);

    };

})(window.jQuery);

