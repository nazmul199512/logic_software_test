var ajax_url = `${site_url}/server.php`;

$(document).ready(function () {
    select_input();
    save();
    _delete();
    prepare_update();
    update();
    _referesh();
});

/**
 * Defines input fields value
 */
function select_input() {
    $(`.country-list a`).on(`click`, function (e) {
        e.preventDefault();
        $(`.country-form input`).eq(0).val($(this).data(`id`));
        $(`.country-form input`).eq(1).val(``);
        $(`.country-form input`).eq(2).val($(this).data(`id`));
    });
}

/**
 * Creates a country record
 */
function save() {
    $(`.btn.save`).on(`click`, function (e) {
        let data = new FormData();

        data.append(`country-name`, $(`#country-name`).val());
        data.append(`current-name`, $(`#current-name`).val());
        data.append(`new-name`, $(`#new-name`).val());
        data.append(`action`, `save`);

        $.ajax({
            type: "POST",
            url: ajax_url,
            data: data,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.length == 0) {
                    alert(`This country already existed!!`);
                    return;
                }
                $(`.short-name-list`).append(res);
            },
            error: function (res) {
                alert(`Something went wrong!`);
            },
            complete: function (res) {
                $(`.country-form [type=text]`).val(``);
                prepare_update();
            },
        });
    });
}

/**
 * Updates a country record
 */
function update() {
    $(`.btn.update`).on(`click`, function (e) {
        let data = new FormData();
        let current_name = $(`#current-name`).val();

        data.append(`current-name`, current_name);
        data.append(`new-name`, $(`#new-name`).val());
        data.append(`action`, `update`);

        $.ajax({
            type: "POST",
            url: ajax_url,
            data: data,
            contentType: false,
            processData: false,
            success: function (response) {
                $(
                    `.short-name-list [data-country-name="${current_name}"]`
                ).replaceWith(response);
            },
            error: function (res) {
                alert(`Something went wrong!`);
            },
            complete: function (res) {
                $(`.country-form [type=text]`).val(``);
                prepare_update();
            },
        });
    });
}
/**
 * Deletes a country record
 */
function _delete() {
    $(`.btn.delete`).on(`click`, function (e) {
        if (confirm(`Are you sure to delete?`)) {
            let data = new FormData();
            let current_name = $(`#current-name`).val();

            data.append(`action`, `delete`);
            data.append(`current-name`, $(`#current-name`).val());

            $.ajax({
                type: "POST",
                url: ajax_url,
                data: data,
                contentType: false,
                processData: false,
                success: function (response) {
                    $(`.short-name-list [data-country-name="${current_name}"]`)
                        .parent()
                        .css({
                            backgroundColor: `red`,
                        })
                        .hide(500, function (e) {
                            $(this).remove();
                        });
                },
                error: function (res) {
                    alert(`Something went wrong!`);
                },
            });
        }
    });
}

/**
 * Refreshes the window
 */
function _referesh() {
    $(`.btn.refresh`).on(`click`, function (e) {
        location.reload();
    });
}

/**
 * Defines input values to edit
 * 
 * Also binds function to perform a new function
 */
function prepare_update() {
    $(`.short-name-list a`)
        .unbind(`click`)
        .on(`click`, function (e) {
            e.preventDefault();
            $(`#current-name`).val($(this).data(`country-name`));
            $(`#new-name`).val($(this).data(`current-name`));
        });
}
