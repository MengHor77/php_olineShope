<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <!-- <link href="../../../dist/styles.css" rel="stylesheet"> -->
    <link href="/php/src/dist/styles.css" rel="stylesheet">
</head>

<home>
    <header>
        <?php include __DIR__ . '/../Layout/Header/headerPubliceSite.php'; ?>
    </header>

    <main class=" w-full h-full flex flex-row items-center justify-between px-10 ">

        <div>
            <?php include 'slide.php'; ?>


        </div>

        <div class="  flex flex-col gap-2 p-4 justify-between items-center mb-24">
            <div>
                <h1 class="font-bold text-2xl">
                    Product Of The Week
                </h1>
            </div>
            <div>
                <img class=" w-full  h-full " src="http://localhost/php/src/Page/Picture/home/coeurLion.png"
                    alt="coeurLion">

            </div>
            <div class=" flex flex-col items-center justify-between h-full w-full ">
                <div class=" flex flex-col items-center justify-center gap-2">
                    <p class="font-bold text-2xl">
                        Coulommiers Portion - Cœur De Lion
                    </p>
                    <div class=" w-full h-full  flex flex-row gap-2  items-center justify-center ">
                        <div>
                            <p class="text-primary  font-bold text-3xl line-through "> $11.00</p>
                        </div>
                        <div>
                            <p class=" text-custom-pink font-bold text-3xl"> $6.00</p>
                        </div>
                    </div>
                    <p class="text-gray-500">
                        Best Before on 23.09.2024
                    </p>
                </div>
                <div class="  w-52 h-10 mt-10  font-bold flex  text-white  flex-row gap-1 bg-primary rounded-lg items-center justify-center"
                    ​>
                    <span class="iconify" data-icon="hugeicons:shopping-basket-02" data-inline="false"></span>
                    <p> Buy</p>

                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php include __DIR__ . '/../Layout/Footer/footer.php'; ?>
    </footer>


</home>

</html>