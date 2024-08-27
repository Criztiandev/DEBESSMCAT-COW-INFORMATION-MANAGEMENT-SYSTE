<?php
display("helper/partials/head.partials.php");
display("helper/partials/navbar.partials.php");
display("helper/partials/sidebar.partials.php");

?>


<main class="p-4 md:ml-64 h-auto pt-20 overflow-hidden">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update Vaccine</h2>
            <form action="/vaccine/update?id=<?= $credentials['COW_ID'] ?>" method="POST">
                <!-- Request Method -->
                <input name="_method" value="PUT" hidden />


                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    <div class="sm:col-span-2">
                        <label for="COW_ID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cow
                            ID</label>
                        <input type="text" name="COW_ID" id="COW_ID"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type Cow Id" value="<?= $credentials['COW_ID'] ?? "" ?>" disabled>
                    </div>
                    <div>
                        <label for="TYPE"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                        <select id="type" name="TYPE"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" <?= !isset($credentials["VACCINE_TYPE"]) ? 'selected' : '' ?>>Select type
                            </option>
                            <option value="Hemorrhagic Septicemia vaccine">Hemorrhagic Septicemia vaccine</option>
                            <option value="Bovine Viral Diarrhea (BVD) vaccine">Bovine Viral Diarrhea (BVD) vaccine
                            </option>
                            <option value="Infectious Bovine Rhinotracheitis (IBR) vaccine">Infectious Bovine
                                Rhinotracheitis (IBR) vaccine</option>
                            <option value="Blackleg vaccine">Blackleg vaccine</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="DOV" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of
                            Vacination</label>
                        <input type="date" name="DOV" id="DOV"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="0 - 100" value="<?= $credentials['DOV'] ?>" required="">
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