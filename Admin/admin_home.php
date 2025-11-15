<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - BookJP.vn</title>
    <link rel="stylesheet" href="CSS/Giohang.css"> <!-- tái sử dụng giao diện người dùng -->
    <link rel="stylesheet" href="../font/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
  <style>
        /* ----------------------------------- */
        /* Cấu trúc Layout Chính */
        /* ----------------------------------- */
        body {
            margin: 0;
            font-family: 'Inter', Arial, sans-serif;
            background-color: #f4f6f9; /* Màu nền nhẹ */
            display: flex; /* Dùng Flexbox cho Sidebar và Content */
            min-height: 100vh;
        }

        /* Sidebar cố định bên trái */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background-color: #3b3a72; /* Màu Sidebar tối */
            color: white;
            padding: 20px 0;
            position: fixed; /* Cố định sidebar */
            top: 0;
            left: 0;
            z-index: 10;
        }

        .logo {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            padding: 0 20px;
        }

        .main-nav a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #ddd;
            text-decoration: none;
            transition: background-color 0.2s, color 0.2s;
        }

        .main-nav a i {
            margin-right: 10px;
            width: 20px;
        }

        .main-nav a:hover,
        .main-nav .active {
            background-color: #2e2d5c; /* Màu nền khi hover/active */
            color: white;
            border-left: 4px solid #8c82eb; /* Thanh màu nổi bật */
            padding-left: 16px;
        }

        /* ----------------------------------- */
        /* Nội dung Chính */
        /* ----------------------------------- */
        .main-content {
            margin-left: 260px; /* Bằng chiều rộng sidebar */
            flex-grow: 1;
            padding: 20px;
        }

        .top-bar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 10px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .search-bar input {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 300px;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 10px;
        }
        
        /* ----------------------------------- */
        /* Bố cục Grid cho Dashboard */
        /* ----------------------------------- */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 cột chính */
            gap: 20px;
        }

        .widget-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .card-title {
            font-size: 16px;
            font-weight: 600;
            color: #3b3a72;
            margin-bottom: 15px;
            display: flex; /* Đảm bảo title căn giữa nếu có icon */
            align-items: center;
        }

        /* Vị trí chứa biểu đồ */
        .chart-container {
            position: relative;
            height: 200px; /* Chiều cao cố định cho biểu đồ */
            width: 100%;
        }

        /* Đảm bảo canvas chiếm hết không gian container */
        .chart-container canvas {
            max-width: 100%;
            height: 100%;
            display: block;
        }

        /* Thiết lập cho các hàng bên dưới (Campaigns, Social Media) */
        .full-width {
            grid-column: 1 / span 3; /* Chiếm toàn bộ 3 cột */
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Chia thành 2 cột bên trong */
            gap: 20px;
        }
        
        /* Thiết lập cho các ô nhỏ dưới cùng (Revenue, Order, Invoices) */
        .triple-row {
            grid-column: 1 / span 3;
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Chia thành 3 cột bên trong */
            gap: 20px;
            margin-top: 20px;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .dashboard-grid {
                grid-template-columns: 1fr; /* Chuyển sang 1 cột trên màn hình nhỏ */
            }
            .full-width {
                grid-column: 1 / span 1;
                grid-template-columns: 1fr;
            }
            .triple-row {
                grid-column: 1 / span 1;
                grid-template-columns: 1fr;
            }
            .main-content {
                margin-left: 0;
            }
            .sidebar {
                /* Sidebar ẩn hoặc thu gọn trên mobile */
                width: 100%;
                height: 60px;
                position: relative;
                padding: 10px 0;
                display: none; /* Tạm thời ẩn để tập trung vào nội dung chính */
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">Admix.</div>
        <nav class="main-nav">
            <a href="admin_home.php" class="active"><i class="fa-solid fa-gauge"></i> Dashboard</a>
            <a href="#"><i class="fa-solid fa-inbox"></i> Inbox <span style="margin-left: auto; background: #8c82eb; padding: 2px 8px; border-radius: 4px; font-size: 12px;">17</span></a>
            <a href="add_product.php"><i class="fa-solid fa-list-check"></i> Thêm sản phẩm</a>
            <a href="admin_user.php"><i class="fa-solid fa-user-gear"></i> Quản lý người dùng</a>
            <a href="admin_products.php"><i class="fa-solid fa-tag"></i> Quản lý sản phẩm</a>
            <a href="admin_order.php"><i class="fa-solid fa-file-invoice"></i> Quản lý Đơn hàng</a>
        </nav>
    </div>

   <div class="main-content">
        <!-- Thanh Top Bar -->
        <div class="top-bar-content">
            <div class="search-bar">
                <input type="text" placeholder="Search..." />
            </div>
            <div class="user-info">
                <span>Admin</span>
                <!-- Thay thế bằng ảnh placeholder -->
                <img src="../Media/pic1.jpg" alt="User Avatar" />
            </div>
        </div>

        <!-- Dashboard Grid (Nội dung gốc của bạn) -->
        <div class="dashboard-grid">
            
            <!-- Hàng 1 / Widget 1: This Year Leads (Biểu đồ 1) -->
            <div class="widget-card">
                <div class="card-title">This Year Leads</div>
                <!-- Vị trí đặt biểu đồ Chart.js -->
                <div class="chart-container">
                    <canvas id="yearlyRevenueChart"></canvas>
                </div>
                <p style="font-size: 30px; font-weight: bold; margin: 10px 0; color: #3b3a72;">Tổng doanh thu</p>
            </div>

            <!-- Hàng 1 / Widget 2: Monthly Leads (Biểu đồ 2) -->
            <div class="widget-card">
                <div class="card-title">Monthly Leads</div>
                <!-- Vị trí đặt biểu đồ Chart.js -->
                <div class="chart-container">
                    <canvas id="monthlyRevenueChart"></canvas>
                </div>
                <p style="font-size: 30px; font-weight: bold; margin: 10px 0; color: #3b3a72;">Tổng tuần</p>
            </div>


            <!-- Hàng 1 / Widget 3: Top Countries -->
            <div class="widget-card">
                <div class="card-title">Top Countries</div>
                <ul style="list-style: none; padding: 0;">
                    <li style="padding: 5px 0; border-bottom: 1px solid #eee;">Việt Nam <span style="float: right;">75%</span></li>
                    <li style="padding: 5px 0; border-bottom: 1px solid #eee;">USA <span style="float: right;">25%</span></li>
                    <li style="padding: 5px 0;">Khác <span style="float: right;">15%</span></li>
                </ul>
            </div>

            <!-- Hàng 2 (full-width, chia 2 cột): Campaigns & Social Media -->
            <div class="full-width">
                <div class="widget-card">
                    <div class="card-title">Sản phẩm & Kết quả</div>
                    <p style="margin-bottom: 8px;">Diệt slime suốt 300 năm <span style="float: right;">97 out of 283 <span style="color: #28a745; font-weight: bold;">30.34%</span></span></p>
                    <p style="margin-bottom: 8px;">Fly me to the moon <span style="float: right;">97 out of 283 <span style="color: #28a745; font-weight: bold;">30.34%</span></span></p>
                </div>

                <div class="widget-card">
                    <div class="card-title">Marketing</div>
                    <p style="margin-bottom: 8px;">Facebook $12,345 <span style="color: #28a745; float: right;">↑ 30.34%</span></p>
                    <p style="margin-bottom: 8px;">Twitter $9,876 <span style="color: #dc3545; float: right;">↓ 5.12%</span></p>
                </div>
            </div>

            <!-- Hàng 3 (triple-row, 3 cột nhỏ): Revenue, Order, Invoices -->
            <div class="triple-row">
                <div class="widget-card" style="text-align: center;">
                    <div class="card-title" style="justify-content: center;">Revenue</div>
                    <h3 style="color: #8c82eb; margin: 0;">$312K</h3>
                    <p style="font-size: 12px; color: #777; margin: 0;">This September</p>
                </div>
                <div class="widget-card" style="text-align: center;">
                    <div class="card-title" style="justify-content: center;">Order</div>
                    <h3 style="color: #8c82eb; margin: 0;">5,400</h3>
                    <p style="font-size: 12px; color: #777; margin: 0;">Total Orders</p>
                </div>
                <div class="widget-card" style="text-align: center;">
                    <div class="card-title" style="justify-content: center;">Invoices</div>
                    <h3 style="color: #8c82eb; margin: 0;">345</h3>
                    <p style="font-size: 12px; color: #777; margin: 0;">Sent</p>
                </div>
            </div>
        </div>
    </div>
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dữ liệu giả định cho biểu đồ năm
            const yearlyData = {
                labels: ['Tháng 1', 'Tháng 4', 'Tháng 7', 'Tháng 10'],
                datasets: [{
                    label: 'Doanh thu năm (ngàn VND)',
                    data: [30, 45, 60, 55],
                    borderColor: '#8c82eb',
                    backgroundColor: 'rgba(140, 130, 235, 0.2)',
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#3b3a72',
                    borderWidth: 3
                }]
            };

            // Cấu hình biểu đồ năm
            const yearlyConfig = {
                type: 'line',
                data: yearlyData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Quan trọng để giữ chiều cao 200px
                    plugins: {
                        legend: { display: false },
                        title: { display: false }
                    },
                    scales: {
                        x: { display: false }, // Ẩn trục X
                        y: { beginAtZero: true, display: false } // Ẩn trục Y
                    }
                }
            };

            // Vẽ biểu đồ năm
            const yearlyChartElement = document.getElementById('yearlyRevenueChart');
            if (yearlyChartElement) {
                new Chart(yearlyChartElement, yearlyConfig);
            }

            // Dữ liệu giả định cho biểu đồ tuần
            const monthlyData = {
                labels: ['Tuần 1', 'Tuần 2', 'Tuần 3', 'Tuần 4'],
                datasets: [{
                    label: 'Doanh thu tuần (ngàn VND)',
                    data: [12, 18, 15, 25],
                    borderColor: '#28a745',
                    backgroundColor: 'rgba(40, 167, 69, 0.2)',
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#28a745',
                    borderWidth: 3
                }]
            };

            // Cấu hình biểu đồ tuần
            const monthlyConfig = {
                type: 'bar', // Dùng biểu đồ cột cho biểu đồ tuần/tháng
                data: monthlyData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Quan trọng để giữ chiều cao 200px
                    plugins: {
                        legend: { display: false },
                        title: { display: false }
                    },
                    scales: {
                        x: { display: false }, // Ẩn trục X
                        y: { beginAtZero: true, display: false } // Ẩn trục Y
                    }
                }
            };

            // Vẽ biểu đồ tuần
            const monthlyChartElement = document.getElementById('monthlyRevenueChart');
            if (monthlyChartElement) {
                new Chart(monthlyChartElement, monthlyConfig);
            }
        });
    </script>
</body>
</html>
