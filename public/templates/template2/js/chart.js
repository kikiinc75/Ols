function getIndex() {
    $.get(`/api/cart`, function (data) {
        $(".itemRow").remove();
        Object.keys(data).forEach(dt => {
            $(`<div class="itemRow">
                <div class="itemLeft">
                    <img src="product/${data[dt].image}" alt="none" class="cartImage">
                </div>
                <div class="itemRight">
                    ${data[dt].product} - ${data[dt].varian}
                    <hr>
                    <div class="qty">${data[dt].qty}</div>
                    <button data-id="${data[dt].id}" class="remove btn btn-outline-light">Remove</button>
                </div>
                <div class="clearBoth"></div>
            </div>`).insertAfter("#data");
        });
        $(".remove").click(function () {
            // Masih belum fix
            var id = $(this).data("id");
            $.ajax({
                url: `/api/cart/` + id,
                type: "DELETE",
                success: function (result) {
                    getIndex();
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
}
$(document).ready(function () {
    getIndex();
    $("#chart").click(function () {
        if ($("#side-bar").hasClass("d-none")) {
            $("#side-bar").removeClass("d-none");
        } else {
            $("#side-bar").addClass("d-none");
        }
    });
    $(".close").click(function () {
        $("#side-bar").addClass("d-none");
    });
    $(".add-product").click(function () {
        $("#side-bar").removeClass("d-none");
        const product_id = $(this).data("id");
        const user_id = $(this).data("user_id");

        data = { product_id, user_id };
        $.ajax({
            type: "post",
            url: `/api/cart`,
            data: data,
            success: function () {
                getIndex();
            },
            dataType: "json"
        });
    });
});
