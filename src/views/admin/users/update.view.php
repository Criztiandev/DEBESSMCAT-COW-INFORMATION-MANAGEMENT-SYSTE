<?php
display("helper/partials/head.partials.php");
display("helper/partials/navbar.partials.php");
display("helper/partials/sidebar.partials.php");
?>


<main class="p-4 md:ml-64 h-auto pt-20 ">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update Vaccine</h2>
            <form action="/users/update?id=<?= $credentials['ID'] ?>" method="POST">
                <!-- Request Method -->
                <input name="_method" value="PUT" hidden />


                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">


                    <!-- FIRST NAME -->
                    <div class="w-full">
                        <label for="FIRST_NAME"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                        <input type="text" name="FIRST_NAME" id="FIRST_NAME"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Enter your first name" value="<?= $credentials["FIRST_NAME"] ?>" required="">
                    </div>

                    <!-- LAST NAME -->
                    <div class="w-full">
                        <label for="LAST_NAME" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                            Name</label>
                        <input type="text" name="LAST_NAME" id="LAST_NAME"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Enter your last name" value="<?= $credentials["LAST_NAME"] ?>" required="">
                    </div>

                    <!-- EMAIL -->
                    <div class="w-full">
                        <label for="EMAIL"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="EMAIL" id="EMAIL"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Enter your email" value="<?= $credentials["EMAIL"] ?>" required="">
                    </div>

                    <div>
                        <label for="ROLE"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select id="ROLE" name="ROLE"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" <?= !isset($credentials["ROLE"]) ? 'selected' : '' ?>>Select Role
                            </option>
                            <option value="staff" <?= isset($credentials["ROLE"]) && $credentials["ROLE"] == 'staff' ? 'selected' : '' ?>>Staff</option>
                            <option value="admin" <?= isset($credentials["ROLE"]) && $credentials["ROLE"] == 'admin' ? 'selected' : '' ?>>Admin</option>
                        </select>
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
<?php
require from("views/helper/components/script/response.script.php"); ?>


<?php display("helper/partials/footer.partials.php"); ?>