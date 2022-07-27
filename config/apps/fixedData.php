<?php

return [
   'status' => [
        0 => [ 'id' => 1, 'value' => 'Mới' ],
        1 => [ 'id' => 2, 'value' => 'Cũ (90 - 99%)' ],
        2 => [ 'id' => 3, 'value' => 'Cũ (<90%)' ],
    ],
    'typeProductData' => [
        0 => [ 'id' => 0, 'value' => "Sản phẩm đăng bán" ],
        1 => [ 'id' => 1, 'value' => "Sản phẩm đăng mua" ],
    ],
    'storageType' => [
        0 => [ 'id' => 1, 'value' => 'HDD', 'type' => 1],
        1 => [ 'id' => 2, 'value' => 'SSD', 'type' => 2],
        2 => [ 'id' => 3, 'value' => 'SSHD', 'type' => 3]
    ],
    'sex' => [
        0 => [ 'id' => 1, 'value' => 'Nam'],
        1 => [ 'id' => 2, 'value' => 'Nữ'],
        2 => [ 'id' => 3, 'value' => 'Khác']
    ],
    'command' => [
        0 => [ 'id' => 1, 'category_id' => 1, 'value' => 'Sử dụng cơ bản' ],
        1 => [ 'id' => 2, 'category_id' => 1, 'value' => 'Sử dụng giải trí nhẹ nhàng' ],
        2 => [ 'id' => 3, 'category_id' => 1, 'value' => 'Sử dụng với tác vụ nặng (Chơi game, chỉnh sửa hình ảnh, video ...)' ],
        3 => [ 'id' => 4, 'category_id' => 2, 'value' => 'Sử dụng văn phòng, học tập' ],
        4 => [ 'id' => 5, 'category_id' => 2, 'value' => 'Sử dụng thiết kế 2D' ],
        5 => [ 'id' => 6, 'category_id' => 2, 'value' => 'Sử dụng thiết kế 3D' ],
        6 => [ 'id' => 7, 'category_id' => 2, 'value' => 'Sử dụng quay dựng video' ],
        7 => [ 'id' => 8, 'category_id' => 2, 'value' => 'Sử dụng chơi game' ],
        8 => [ 'id' => 9, 'category_id' => 2, 'value' => 'Sử dụng lập trình' ],
        9 => [ 'id' => 10, 'category_id' => 3, 'value' => 'Sử dụng văn phòng, học tập' ],
        10 => [ 'id' => 11, 'category_id' => 3, 'value' => 'Sử dụng thiết kế 2D' ],
        11 => [ 'id' => 12, 'category_id' => 3, 'value' => 'Sử dụng thiết kế 3D' ],
        12 => [ 'id' => 13, 'category_id' => 3, 'value' => 'Sử dụng quay dựng video' ],
        13 => [ 'id' => 14, 'category_id' => 3, 'value' => 'Sử dụng chơi game' ],
        14 => [ 'id' => 15, 'category_id' => 3, 'value' => 'Sử dụng lập trình' ],
    ],
    'resolution' => [
        0 => [ 'id' => 1, 'value' => 'HD (1366x768 pixels)' ],
        1 => [ 'id' => 2, 'value' => 'HD+ (1600x900 pixels)' ],
        2 => [ 'id' => 3, 'value' => 'FullHD (1920x1080 pixels)' ],
        3 => [ 'id' => 4, 'value' => '2K (2560x1440 pixels)' ],
        4 => [ 'id' => 5, 'value' => '4K (3840x2160 pixels)' ],
        5 => [ 'id' => 6, 'value' => '5K (5120x2880 pixels)' ],
        6 => [ 'id' => 7, 'value' => '6K (6144x3456 pixels)' ],
    ],
    'display_size' => [
        0 => [ 'id' => 1, 'value' => '< 13 inch'],
        1 => [ 'id' => 2, 'value' => '13 - 13.9 inch'],
        2 => [ 'id' => 3, 'value' => '14 - 14.9 inch'],
        3 => [ 'id' => 4, 'value' => '15 - 15.9 inch'],
        4 => [ 'id' => 5, 'value' => '> 16 inch'],
    ],
    'storage' => [
        0 => [ 'value' => 8 ],
        1 => [ 'value' => 16 ],
        2 => [ 'value' => 32 ],
        3 => [ 'value' => 64 ],
        4 => [ 'value' => 128 ],
        5 => [ 'value' => 256 ],
        6 => [ 'value' => 512 ],
        7 => [ 'value' => 1024 ],
        8 => [ 'value' => 2048 ],
        9 => [ 'value' => 4096 ],
    ]
];
