<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Larang Rakepenak</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
        .discount-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: red;
            color: white;
            padding: 5px;
            font-size: 12px;
            font-weight: bold;
        }
        .location-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: blue;
            color: white;
            padding: 5px;
            font-size: 12px;
            font-weight: bold;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Hotel Larang Rakepenak</h1>
        <div class="row">
            <?php
            // Contoh data hotel
            $hotels = [
                [
                    "id" => 1,
                    "title" => "Standar",
                    "location" => "Larang Rakepenak",
                    "image" => "asset/Hotel_standar.jpeg",
                    "discount" => "Hemat 25%",
                    "rating" => "8.6/10",
                    "reviews" => "10575",
                    "old_price" => "Rp 800.000",
                    "new_price" => "Rp 600.000"
                ],
                [
                    "id" => 2,
                    "title" => "Deluxe",
                    "location" => "Larang Rakepenak",
                    "image" => "asset/Hotel_deluxe.jpeg",
                    "discount" => "Hemat 25%",
                    "rating" => "8.4/10",
                    "reviews" => "9284",
                    "old_price" => "Rp 1.000.000",
                    "new_price" => "Rp 750.000"
                ],
                [
                    "id" => 3,
                    "title" => "Family",
                    "location" => "Larang Rakepenak",
                    "image" => "asset/Hotel_familly.jpeg",
                    "discount" => "Hemat 25%",
                    "rating" => "8.6/10",
                    "reviews" => "7382",
                    "old_price" => "Rp 2.420.000",
                    "new_price" => "Rp 1.815.000"
                ]
            ];

            // Loop melalui data hotel dan tampilkan
            foreach ($hotels as $hotel) {
                echo '<div class="col-md-4">';
                echo '<div class="card mb-4">';
                echo '<img src="' . $hotel["image"] . '" class="card-img-top" alt="' . $hotel["title"] . '">';
                echo '<div class="discount-badge">' . $hotel["discount"] . '</div>';
                echo '<div class="location-badge">' . $hotel["location"] . '</div>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $hotel["title"] . '</h5>';
                echo '<p class="card-text text-muted"><del>' . $hotel["old_price"] . '</del></p>';
                echo '<p class="card-text text-danger"><strong>' . $hotel["new_price"] . '</strong></p>';
                echo '<a href="detail.php?id=' . $hotel["id"] . '" class="btn btn-primary">Lihat Detail</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <!-- Include Bootstrap JS scripts -->
    <script src="path/to/jquery.min.js"></script>
    <script src="path/to/popper.min.js"></script>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>
</html>