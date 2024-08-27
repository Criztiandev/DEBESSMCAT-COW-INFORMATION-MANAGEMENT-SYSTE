<?php
display("helper/partials/head.partials.php");
display("helper/partials/navbar.partials.php");
display("helper/partials/sidebar.partials.php");

?>


<main class="p-4 md:ml-64 h-auto pt-20 ">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update Cow</h2>
            <form action="/cow/update?id=<?= $credentials['COW_ID'] ?>" method="POST">
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
                        <label for="BREED"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Breed</label>
                        <select id="breed" name="BREED"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" <?= !isset($credentials["BREED"]) ? 'selected' : '' ?>>Select breed</option>
                            <option value="TV" <?= isset($credentials["BREED"]) && $credentials["BREED"] == 'TV' ? 'selected' : '' ?>>TV/Monitors</option>
                            <option value="PC" <?= isset($credentials["BREED"]) && $credentials["BREED"] == 'PC' ? 'selected' : '' ?>>PC</option>
                            <option value="GA" <?= isset($credentials["BREED"]) && $credentials["BREED"] == 'GA' ? 'selected' : '' ?>>Gaming/Console</option>
                            <option value="PH" <?= isset($credentials["BREED"]) && $credentials["BREED"] == 'PH' ? 'selected' : '' ?>>Phones</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="AGE"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                        <input type="number" name="AGE" id="AGE" value="<?= $credentials['AGE'] ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="0 - 100" required="">
                    </div>
                    <div>
                        <label for="PRICE"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" name="PRICE" id="PRICE" value="<?= $credentials['PRICE'] ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="0" required="">
                    </div>
                    <div>
                        <label for="WEIGHT" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item
                            Weight
                            (kg)</label>
                        <input type="number" name="WEIGHT" id="WEIGHT" value="<?= $credentials['WEIGHT'] ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="12" required="">
                    </div>
                    <div>
                        <label for="health"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Health</label>
                        <select id="health" name="HEALTH_STATUS"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" <?= !isset($credentials["HEALTH_STATUS"]) ? 'selected' : '' ?>>Select Health
                                Status
                            </option>
                            <option value="TV" <?= isset($credentials["HEALTH_STATUS"]) && $credentials["HEALTH_STATUS"] == 'TV' ? 'selected' : '' ?>>TV/Monitors</option>
                            <option value="PC" <?= isset($credentials["HEALTH_STATUS"]) && $credentials["HEALTH_STATUS"] == 'PC' ? 'selected' : '' ?>>PC</option>
                            <option value="GA" <?= isset($credentials["HEALTH_STATUS"]) && $credentials["HEALTH_STATUS"] == 'GA' ? 'selected' : '' ?>>Gaming/Console</option>
                            <option value="PH" <?= isset($credentials["HEALTH_STATUS"]) && $credentials["HEALTH_STATUS"] == 'PH' ? 'selected' : '' ?>>Phones</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" name="DESCRIPTION" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Your description here"><?= $credentials['DESCRIPTION'] ?? "" ?></textarea>
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Update
                </button>
            </form>
        </div>
    </section>
</main>


<!-- Script -->
<?php require from("views/helper/components/script/response.script.php"); ?>


<?php display("helper/partials/footer.partials.php"); ?>