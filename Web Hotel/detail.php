<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Detail</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
        .main-video {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        .thumbnail {
            width: 100%;
            height: 100px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Contoh data properti
        $properties = [
            1 => [
                "title" => "Standard Class",
                "location" => "",
                "main_video" => "asset/Kimi No Na Wa (Your Name) _ Mitsuha Miyamizu's Room 360° VR.mp4",
                "images" => [
                    "path/to/image1-1.jpg",
                    "path/to/image1-2.jpg",
                    "path/to/image1-3.jpg",
                    "path/to/image1-4.jpg",
                    "path/to/image1-5.jpg"
                ],
                "price" => "Rp 600.000"
            ],
            2 => [
                "title" => "Deluxe Class",
                "location" => "",
                "main_video" => "C:/Users/byu/Documents/Web Hotel/asset/Kimi No Na Wa (Your Name) _ Mitsuha Miyamizu's Room 360° VR.mp4",
                "images" => [
                    "path/to/image2-1.jpg",
                    "path/to/image2-2.jpg",
                    "path/to/image2-3.jpg",
                    "path/to/image2-4.jpg",
                    "path/to/image2-5.jpg"
                ],
                "price" => "Rp 750.000"
            ],
            3 => [
                "title" => "Family Class",
                "location" => "",
                "main_video" => "asset/Kimi No Na Wa (Your Name) _ Mitsuha Miyamizu's Room 360° VR.mp4",
                "images" => [
                    "path/to/image3-1.jpg",
                    "path/to/image3-2.jpg",
                    "path/to/image3-3.jpg",
                    "path/to/image3-4.jpg",
                    "path/to/image3-5.jpg"
                ],
                "price" => "Rp 1.815.000"
            ]
        ];

        // Ambil ID properti dari URL
        $id = $_GET['id'];
        $property = $properties[$id];
        ?>

        <h1 class="my-4"><?php echo $property["title"]; ?></h1>
        <div class="row">
            <div class="col-md-8">
                <!-- Embed the video -->
                <video class="main-video" controls>
                    <source src="<?php echo $property["main_video"]; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <?php foreach ($property["images"] as $image) { ?>
                        <div class="col-md-6 mb-4">
                            <img src="<?php echo $image; ?>" class="thumbnail" alt="Thumbnail">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h3 class="my-3">Description</h3>
                <p>Deskripsi properti akan ditampilkan di sini.</p>
            </div>
            <div class="col-md-4">
                <h3 class="my-3">Details</h3>
                <ul>
                    <li>Lokasi: <?php echo $property["location"]; ?></li>
                    <li>Harga: <?php echo $property["price"]; ?></li>
                </ul>
                <a href="form_pemesanan.php?id=<?php echo $id; ?>" class="btn btn-warning">Pesan Sekarang</a>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS scripts -->
    <script src="path/to/jquery.min.js"></script>
    <script src="path/to/popper.min.js"></script>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>
</html>