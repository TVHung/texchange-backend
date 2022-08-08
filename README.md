**_1. Cài đặt PostgreSQL_**
Để chạy được hệ thống đầu tiên cần cài đặt hệ quản trị cơ sở dữ liệu, ở đây em lựa chọn PostgreSQL.
Tải phần mềm postgreSQL tại trang chủ https://www.postgresql.org/download/windows/
Sau khi tải xong phần mềm, chúng ta sẽ tiến hành cài đặt bằng cách nhập các thông tin được yêu cầu như mật khẩu, port…
Sau khi cài đặt bạn có thể mở pgAdmin4 và nhập mật khẩu mà đã cấu hình ở bước cài đặt.

Kết nối thành công thì bạn có thể truy cập vào CSDL, sau đó bạn cần tạo một cơ sở dữ liệu trống để chạy dự án thông qua việc kết nối với Laravel sẽ được trình bày ở bên dưới.

**_2. Cài đặt môi trường Laravel_**
Cài đặt Xampp
Để chạy các dự án Laravel thì cần một môi trường để chạy các đoạn code PHP, với Xampp chúng ta có sẵn môi trường server với PHP mà không cần cài đặt gì thêm cả. Tải và cài đặt tại trang chủ
https://www.apachefriends.org/index.html

Cài đặt Composer
Laravel sử dụng composer để quản lý các thư viện phụ thuộc, cần phải cài đặt composer trước khi cài đặt laravel. Tải composer tại link chính thức
https://getcomposer.org/download/
Lưu ý khi cài đặt composer cần trỏ đến đúng file PHP ở trong thư mục cài đã cài đặt Xampp.

Để chạy được hệ thống cần lưu dự án ở trong thư mục htdocs của Xampp. Sau khi tải dự án về máy tính, mở màn hình terminal chạy lệnh "cp .evn.example .env".
Khi đó 1 file mới là .env được tạo ra.Bạn cần cấu hình cơ sở dữ liệu kết nối với database ở trong file .env.
Các trường dữ liệu cần cấu hình như sau:

DB_CONNECTION : Tên hệ quản trị cơ sở dữ liệu, ở đây em chọn PostgreSQL nên sẽ điền pgsql
DB_HOST: Host mà dự án sẽ chạy
DB_PORT: Cổng cơ sở dữ liệu
DB_DATABASE: Tên cơ sở dữ liệu (cần tạo trước trong hệ quản trị cơ sở dữ liệu)
DB_USERNAME: tên cơ sở dữ liệu đã tạo ở trong phần cài đặt PostgreSQL.
DB_PASSWORD: Mật khẩu cơ sở dữ liệu

Sau khi đã cấu hình xong cơ sở dữ liệu cần phải trong màn hình terminal chạy lênh "composer install" khi đó các thư viện của dự án sẽ được cài đặt.
Tiếp theo bạn cần chạy lệnh để khởi động server bằng lệnh "php artisan serve"
