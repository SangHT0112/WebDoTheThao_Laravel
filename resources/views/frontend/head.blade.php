
	<title>{{$title}}</title>
	<meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="/template/frontend/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/frontend/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/frontend/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/frontend/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/frontend/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/frontend/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/frontend/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/frontend/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/frontend/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/frontend/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/frontend/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/frontend/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/frontend/css/util.css">
	<link rel="stylesheet" type="text/css" href="/template/frontend/css/main.css">

<!--===============================================================================================-->
    <style>body {
            font-family: 'Roboto', sans-serif; /* Áp dụng font Roboto cho toàn bộ trang */
            line-height: 1.6; /* Điều chỉnh khoảng cách dòng */
            letter-spacing: 0.5px; /* Điều chỉnh khoảng cách giữa các chữ */
            font-size: 16px; /* Điều chỉnh kích thước chữ cho dễ đọc */
            color: #333; /* Màu chữ mặc định */
            overflow-x: hidden;
        }

        /* Cập nhật cho các tiêu đề */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Roboto', sans-serif;
            font-weight: 500; /* Đảm bảo tiêu đề nổi bật */
            margin-bottom: 15px; /* Khoảng cách dưới tiêu đề */
            color: #222; /* Màu chữ tối cho tiêu đề */
        }

        /* Cập nhật cho các đoạn văn bản */
        p, .description, .content {
            font-family: 'Roboto', sans-serif;
            font-weight: 400; /* Font nhẹ cho văn bản */
            color: #555; /* Màu chữ cho văn bản */
            line-height: 1.8; /* Điều chỉnh khoảng cách dòng cho dễ đọc */
        }

        /* Cập nhật cho các phần tử khác */
        a, .link {
            font-family: 'Roboto', sans-serif;
            text-decoration: none;
            color: #007bff;
        }


        .bg0.p-t-130.p-b-85 {
            padding-bottom: 0 !important; /* Loại bỏ padding dưới */
        }

        .text-center {
            margin-bottom: 0 !important; /* Loại bỏ margin dưới */
        }

        .footer {
            margin-bottom: 0 !important; /* Nếu có phần footer */
        }

        /* Cập nhật các phần tử có class `.ltext` nếu cần */
        .ltext-101, .ltext-102, .ltext-103 {
            font-family: 'Roboto', sans-serif;
            font-weight: 500;
        }

        /* Đảm bảo rằng các phần tử trong giao diện người dùng (UI) đều sử dụng font chữ đồng nhất */
        input, textarea, select {
            font-family: 'Roboto', sans-serif;
        } </style>
    <script>// Hàm mở modal
        function openModal(productId) {
            var modal = document.getElementById('modal' + productId);
            modal.style.display = 'block';
        }

        // Hàm đóng modal
        function closeModal(productId) {
            var modal = document.getElementById('modal' + productId);
            modal.style.display = 'none';
        }

        // Khi người dùng nhấn vào một modal nào đó, sẽ gọi hàm openModal
        document.querySelectorAll('.js-show-modal1').forEach(button => {
            button.addEventListener('click', function() {
                var productId = this.getAttribute('data-product-id');
                openModal(productId);
            });
        });

        // Khi người dùng nhấn vào nút đóng, sẽ gọi hàm closeModal
        document.querySelectorAll('.js-hide-modal1').forEach(button => {
            button.addEventListener('click', function() {
                var productId = this.getAttribute('data-product-id');
                closeModal(productId);
            });
        });
    </script>
<meta name="csrf-token" content="{{ csrf_token() }}">
