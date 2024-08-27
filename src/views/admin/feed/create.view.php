<?php
display("helper/partials/head.partials.php");
display("helper/partials/navbar.partials.php");
display("helper/partials/sidebar.partials.php");

?>

<main class="p-4 md:ml-64 h-auto pt-20 overflow-y-scroll h-screen">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add new Feed</h2>


            <form action="/feed/create" method="POST">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    <div class="sm:col-span-2">
                        <label for="COW_ID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cow
                            ID</label>
                        <select id="COW_ID" name="COW_ID"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select Cow</option>
                            <?php foreach ($cows as $data): ?>
                                <option value="<?= $data["COW_ID"] ?>">#<?= $data["COW_ID"] ?></option>
                            <?php endforeach ?>

                        </select>
                    </div>
                    <div>
                        <label for="FEED_TYPE" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Feed
                            Type</label>
                        <select id="FEED_TYPE" name="FEED_TYPE"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select type</option>
                            <option value="Native grasses">Native grasses</option>
                            <option value="Rice straw">Rice straw</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="QUANTITY"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                        <input type="number" name="QUANTITY" id="QUANTITY"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="0 - 100" required="">
                    </div>

                    <div>
                        <label for="FREQUENCY"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Frequency</label>
                        <select id="FREQUENCY" name="FREQUENCY"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select type</option>
                            <option value=" 1-2 times daily"> 1-2 times daily</option>
                            <option value=" 2-3 times per day"> 2-3 times per day</option>
                            <option value="Morning and afternoon/evening ">Morning and afternoon/evening </option>
                            <option value="3-4 times per day">3-4 times per day</option>
                        </select>
                    </div>

                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Create
                </button>
            </form>
        </div>
    </section>
</main>



<!-- Script -->
<?php

require from("views/helper/components/script/response.script.php"); ?>


<?php display("helper/partials/footer.partials.php"); ?>