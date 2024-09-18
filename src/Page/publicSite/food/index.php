<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>food index </title>
    <link href="../../../../dist/styles.css" rel="stylesheet">
</head>

<body>
    <div class=" flex flex-row justify-between gap-4 p-10 ">

        <img class=" w-96 h-100" src="http://localhost/php/src/Page/Picture/food/food.png" alt="food">
        <div class=" flex flex-row justify-between gap-4">
            <div class=" px-4  ">
                <div class="underline text-xl font-bold text-gray-700 ">
                    <h1 calss="">MeatAndPoultry </h1>
                </div>
                <?php 
                    $MeatAndPoultry = array('Beef', 'Pork', 'Poultry', 'Lamb & Veal', 'Sausage', 'Pre-Packed Delicatessen');

                    echo '<ul class="list-disc pl-5">';
                    foreach($MeatAndPoultry as $item){
                        echo '<li>' . htmlspecialchars($item) . '</li>';
                    }
                    echo '</ul>';
                    ?>

            </div>

            <div class=" px-4  ">
                <div class="underline text-xl font-bold text-gray-700 ">
                    <h1 calss="">MeatAndPoultry </h1>
                </div>
                <?php 
                    $MeatAndPoultry = array('Beef', 'Pork', 'Poultry', 'Lamb & Veal', 'Sausage', 'Pre-Packed Delicatessen');

                    echo '<ul class="list-disc pl-5">';
                    foreach($MeatAndPoultry as $item){
                        echo '<li>' . htmlspecialchars($item) . '</li>';
                    }
                    echo '</ul>';
                    ?>

            </div>
            <div class=" px-4  ">
                <div class="underline text-xl font-bold text-gray-700 ">
                    <h1 calss="">MeatAndPoultry </h1>
                </div>
                <?php 
                    $MeatAndPoultry = array('Beef', 'Pork', 'Poultry', 'Lamb & Veal', 'Sausage', 'Pre-Packed Delicatessen');

                    echo '<ul class="list-disc pl-5">';
                    foreach($MeatAndPoultry as $item){
                        echo '<li>' . htmlspecialchars($item) . '</li>';
                    }
                    echo '</ul>';
                    ?>

            </div>


        </div>
        <div>
            <?php include 'C:/xampp/htdocs/php/src/Page/publicSite/new/button.php'; ?>
        </div>
    </div>
</body>

</html>