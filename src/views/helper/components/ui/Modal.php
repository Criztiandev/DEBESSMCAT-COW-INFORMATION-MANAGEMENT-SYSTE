<div id="modal" hidden class="fixed top-0 left-0 w-screen h-screen" style="z-index: 999">
    <div id="backdrop" class="w-full h-full bg-black/50"></div>
    <section
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 min-w-[400px] min-h-[400px] max-w-[800px] max-h-[800px] w-full bg-white shadow-xl rounded-lg rounded-md overflow-x-hidden overflow-y-scroll bg-white dark:bg-gray-900 p-8">
        <div class="">

        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        $("#backdrop").click(event => {
            $("#modal").toggle();
            $('body').css('overflow', 'auto');
        });
    });
</script>