<?php
display("helper/partials/head.partials.php");
display("helper/partials/navbar.partials.php");
display("helper/partials/sidebar.partials.php");

?>


<main class="p-4 md:ml-64 h-auto pt-20 ">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update Feed</h2>

            <!-- Feed Form -->
            <form action="/feed/update?id=<?= $credentials['COW_ID'] ?>" method="POST">
                <!-- Request Method -->
                <input name="_method" value="PUT" hidden />

                <!-- Actual Form -->
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="COW_ID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cow
                            ID</label>
                        <input type="text" name="COW_ID" id="COW_ID"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type Cow Id" value="<?= $credentials['COW_ID'] ?>" required="">
                    </div>
                    <div>
                        <label for="FEED_TYPE" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Feed
                            Type</label>
                        <select id="type" name="FEED_TYPE"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" <?= !isset($credentials["FEED_TYPE"]) ? 'selected' : '' ?>>Select type
                            </option>
                            <option value="TV" <?= isset($credentials["FEED_TYPE"]) && $credentials["FEED_TYPE"] == 'TV' ? 'selected' : '' ?>>TV/Monitors</option>
                            <option value="PC" <?= isset($credentials["FEED_TYPE"]) && $credentials["FEED_TYPE"] == 'PC' ? 'selected' : '' ?>>PC</option>
                            <option value="GA" <?= isset($credentials["FEED_TYPE"]) && $credentials["FEED_TYPE"] == 'GA' ? 'selected' : '' ?>>Gaming/Console</option>
                            <option value="PH" <?= isset($credentials["FEED_TYPE"]) && $credentials["FEED_TYPE"] == 'PH' ? 'selected' : '' ?>>Phones</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="QUANTITY"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                        <input type="number" name="QUANTITY" id="QUANTITY" value="<?= $credentials['QUANTITY'] ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="0 - 100" required="">
                    </div>
                    <div>
                        <label for="FREQUENCY" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Feed
                            Type</label>
                        <select id="type" name="FREQUENCY"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" <?= !isset($credentials["FREQUENCY"]) ? 'selected' : '' ?>>Select type
                            </option>
                            <option value="TV" <?= isset($credentials["FREQUENCY"]) && $credentials["FREQUENCY"] == 'TV' ? 'selected' : '' ?>>TV/Monitors</option>
                            <option value="PC" <?= isset($credentials["FREQUENCY"]) && $credentials["FREQUENCY"] == 'PC' ? 'selected' : '' ?>>PC</option>
                            <option value="GA" <?= isset($credentials["FREQUENCY"]) && $credentials["FREQUENCY"] == 'GA' ? 'selected' : '' ?>>Gaming/Console</option>
                            <option value="PH" <?= isset($credentials["FREQUENCY"]) && $credentials["FREQUENCY"] == 'PH' ? 'selected' : '' ?>>Phones</option>
                        </select>
                    </div>



                </div>
                <button type="submit"
                    class=" sm:col-span-2 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Update
                </button>
            </form>
        </div>
    </section>
</main>


<!-- Script -->
<?php require from("views/helper/components/script/response.script.php"); ?>


<?php display("helper/partials/footer.partials.php"); ?>