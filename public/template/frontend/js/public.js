$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function loadMore()
{
    const page = parseInt($('#page').val(), 10);
    $.ajax({
        type : 'POST',
        dataType : 'JSON',
        data : { page },
        url : '/services/load-product',
        success : function (result) {
            if (result.html !== '') {
                $('#loadProduct').append(result.html);
                $('#page').val(page + 1);

            } else {
                alert('Đã load xong Sản Phẩm');
                $('#button-loadMore').css('display', 'none');
            }
        }
    })
}


// quickview
$(document).ready(function () {
    // Sự kiện click nút Quick View
    $('.quickview-btn').on('click', function (e) {
        e.preventDefault(); // Ngăn không cho mở trang mới

        const productId = $(this).data('id'); // Lấy ID sản phẩm
        const modal = $('.js-modal1'); // Lấy modal Quick View

        // Gửi yêu cầu AJAX
        $.ajax({
            url: `/product/${productId}`, // API lấy thông tin sản phẩm
            type: 'GET',
            success: function (data) {
                // Cập nhật thông tin trong modal
                modal.find('.js-name-detail').text(data.name);
                modal.find('.mtext-106').text(data.priceSale ? `${data.priceSale} VNĐ` : `${data.price} VNĐ`);
                modal.find('.stext-102').text(data.description || "Không có mô tả");

                // Thay đổi hình ảnh
                const gallery = modal.find('.slick3');
                gallery.empty(); // Xóa ảnh cũ
                if (data.images && data.images.length > 0) {
                    data.images.forEach(image => {
                        gallery.append(`
                            <div class="item-slick3">
                                <div class="wrap-pic-w">
                                    <img src="${image}" alt="${data.name}">
                                </div>
                            </div>
                        `);
                    });
                } else {
                    gallery.append(`
                        <div class="item-slick3">
                            <div class="wrap-pic-w">
                                <img src="${data.thumb}" alt="${data.name}">
                            </div>
                        </div>
                    `);
                }

                // Hiển thị modal
                modal.addClass('show-modal1');
            },
            error: function () {
                alert('Không thể lấy thông tin sản phẩm.');
            }
        });
    });

    // Sự kiện đóng Modal
    $('.js-hide-modal1').on('click', function () {
        $('.js-modal1').removeClass('show-modal1');
    });
});

